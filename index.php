<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/sessions.php"); ?>

<?php 
if (isset($_POST["submitLogin"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)||empty($password)) {

      $_SESSION["loginErrorMessage"]= "All fields must be filled out";
      redirect_to("index.php");

    }else {

      //code for checking username and password from Database
      $Found_Account = login_Attempt($username,$password);
      if ($Found_Account) {
        $_SESSION["userId"] = $Found_Account["userId"];
        $_SESSION["username"] = $Found_Account["username"];
        $_SESSION["loginMessage"] = false;

      }else {
        $_SESSION["loginErrorMessage"]="Incorrect Username/Password";
        redirect_to("index.php");
      }
    }
  }
?> 

<?php
  if (isset($_POST["submitLogout"])) {

    $_SESSION["userId"] = null;
    $_SESSION["username"] = null;

    session_destroy();
    redirect_to("index.php");
  }
?> 

<?php
  if(isset($_POST["submitRegister"])){

    $username        = $_POST["rUsername"];
    $email           = $_POST["email"];
    $password        = $_POST["rPassword"];

    date_default_timezone_set("Europe/Athens");
    $currentTime = time();
    $dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);

    if (checkUsernameAvailability($username)) {
      $_SESSION["registerErrorMessage"] = "Username already exists. Try another one";
      redirect_to("index.php");
    }else{
      // Query to insert new admin in DB When everything is fine
      global $ConnectingDB;
      $sql = "INSERT INTO user(username,email,password,dateTime_) ";
      $sql .= "VALUES(:username,:email,:password,:dateTime)";

      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':username',$username);
      $stmt->bindValue(':email',$email);
      $stmt->bindValue(':password',$password);
      $stmt->bindValue(':dateTime',$dateTime);
      $Execute=$stmt->execute();

      if($Execute){

        $id = $ConnectingDB->lastInsertId();
        $sqlAvatar = "INSERT INTO `PHOTO` (`name`, `userId`, `categoryId`, `itemId`, `datetime_`) VALUES
        ('defaultAvatar.png', '$id', null, null, '$dateTime')";
        $ExecuteAvatar = $ConnectingDB->query($sqlAvatar);

        $_SESSION["registerSuccessMessage"] = "New User added successfully! Now you can login";
        redirect_to("index.php");
      }else {
        $_SESSION["registerErrorMessage"]= "Something went wrong. Try Again!";
        redirect_to("index.php");
      }
    }
  }
?>

<?php 
  if (isset($_POST["submitSettings"])) {

    $firstname = $_POST["firstname"];
    $lastname  = $_POST["lastname"];
    $username  = $_POST["sUsername"];
    $email     = $_POST["sEmail"];
    $image     = $_FILES["image"]["name"];
    $target    = "images/uploaded/".basename($_FILES["image"]["name"]);

    date_default_timezone_set("Europe/Athens");
    $currentTime = time();
    $dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);

    global $ConnectingDB;

    $sqlUser = "UPDATE user
    SET firstname=:firstname, lastname=:lastname, username=:username, email=:email
    WHERE userId=" . $_SESSION["userId"];

    $stmtUser = $ConnectingDB->prepare($sqlUser);
    $stmtUser->bindValue(':firstname', $firstname);
    $stmtUser->bindValue(':lastname', $lastname);
    $stmtUser->bindValue(':username', $username);
    $stmtUser->bindValue(':email', $email);

    $ExecuteUser= $stmtUser->execute();

    if (!empty($_FILES["image"]["name"])) {
      $sqlPhoto = "UPDATE photo
              SET name =:image
              WHERE userId=" . $_SESSION["userId"];

      $stmtPhoto = $ConnectingDB->prepare($sqlPhoto);
      $stmtPhoto->bindValue(':image',$image);

      $ExecutePhoto = $stmtPhoto->execute();
      move_uploaded_file($_FILES["image"]["tmp_name"],$target);
    }
  
    if($ExecuteUser){
      $_SESSION["settingsSuccessMessage"] = "Settings updated successfully";
      redirect_to("index.php");
    }else {
      $_SESSION["settingsErrorMessage"] = "Something went wrong. Try Again !";
      redirect_to("index.php");
    }

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>

    <!---Navbar -->
    <?php require_once("nav.php"); ?>

    <!--- Start of SearchBar -->
    <form class="form-inline active-pink-4">
        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search">
        <i class="fas fa-search" aria-hidden="true"></i>
    </form>

    <div class="search-wrapper">
        <div>
            <h2>Find whatever the weather</h2>
        </div>
        <div>
            <form class="form-inline active-pink-4">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                    aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
            </form>
        </div>
    </div>
    <!--- End of SearchBar --> 

    <!--- Footer -->
    <?php require_once("footer.php"); ?>

    <!--- Script Source Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/home.js"></script>
    <?php if (isset($_SESSION["loginMessage"]) && $_SESSION["loginMessage"] == true) { ?>
    <script type="text/javascript"> $(document).ready(function() { $("#loginModal").modal("show"); }) </script>
    <?php } ?>
    <?php if (isset($_SESSION["registerMessage"]) && $_SESSION["registerMessage"] == true) { ?>
    <script type="text/javascript"> $(document).ready(function() { $("#registerModal").modal("show"); }) </script>
    <?php } ?>
    <?php if (isset($_SESSION["settingsMessage"]) && $_SESSION["settingsMessage"] == true) { ?>
    <script type="text/javascript"> $(document).ready(function() { $("#settingsModal").modal("show"); }) </script>
    <?php } ?>
    <!--- End of Script Source Files -->

</body>

</html>