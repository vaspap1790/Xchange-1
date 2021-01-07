<?php require_once("includes/db.php"); ?>
<?php require_once("includes/session.php"); ?>

<?php

  function redirect_to($New_Location){
    header("Location:".$New_Location);
    exit();
  }

  function login_Attempt($UserName,$Password){
    global $ConnectingDB;
    $sql = "SELECT * FROM USER WHERE username=:userName AND password=:passWord LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName',$UserName);
    $stmt->bindValue(':passWord',$Password);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result==1) {
      return $Found_Account=$stmt->fetch();
    }else {
      return null;
    }
  }

  function confirm_Login(){
    if (isset($_SESSION["userId"])) {
      return true;
    }  else {
      return false;
    }
  }

  function check_if_logged_user_profile(){
    $searchParameters          = explode("&", $_SERVER['QUERY_STRING']);
    $firstSearchParameter      = explode("=", $searchParameters[0]);
    if(isset($firstSearchParameter[1]) ){
        $firstSearchParameterValue = $firstSearchParameter[1];
    }else{
        $firstSearchParameterValue = "No parameter";
    }

    if (confirm_Login() &&
     (strcmp($_SESSION["username"], $firstSearchParameterValue) == 0)){
        return true;
    }  else {
      return false;
    }
}

  function getUserAvatar($userId){
    global $ConnectingDB;
    $sql  = "SELECT p.name FROM user u inner join photo p on u.userId = p.userId WHERE u.userId = '$userId'";
    $stmt = $ConnectingDB->query($sql);
    $result= $stmt->fetch();
    return $result['name'] ?? '';
  }

  function checkUsernameAvailability($username){
    global $ConnectingDB;
    $sql    = "SELECT username FROM user WHERE username=:username";
    $stmt   = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':username',$username);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result == 1) {
      return true;
    }else {
      return false;
    }
  }
 
?>

<!-- Login -->
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

<!-- Logout -->
<?php
  if (isset($_POST["submitLogout"])) {

    $_SESSION["userId"] = null;
    $_SESSION["username"] = null;

    session_destroy();
    redirect_to("index.php");
  }
?> 

<!-- Register -->
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


<!-- Settings -->
<?php 
  if (isset($_POST["submitSettings"])) {

    $firstname     = $_POST["firstname"];
    $lastname      = $_POST["lastname"];
    $username      = $_POST["sUsername"];
    $email         = $_POST["sEmail"];
    $description   = $_POST["sDescription"];
    $image         = $_FILES["image"]["name"];
    $target        = "images/uploaded/".basename($_FILES["image"]["name"]);

    date_default_timezone_set("Europe/Athens");
    $currentTime = time();
    $dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);

    global $ConnectingDB;

    $sqlUser = "UPDATE user
    SET firstname=:firstname,
          lastname=:lastname, 
          username=:username, 
          email=:email, 
          description=:description
    WHERE userId=" . $_SESSION["userId"];

    $stmtUser = $ConnectingDB->prepare($sqlUser);
    $stmtUser->bindValue(':firstname', $firstname);
    $stmtUser->bindValue(':lastname', $lastname);
    $stmtUser->bindValue(':username', $username);
    $stmtUser->bindValue(':email', $email);
    $stmtUser->bindValue(':description', $description);

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

