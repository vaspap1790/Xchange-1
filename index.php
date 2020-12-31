<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>


<?php 
if (isset($_POST["submitLogin"])) {

    $UserName = $_POST["username"];
    $Password = $_POST["password"];

    if (empty($UserName)||empty($Password)) {

      $_SESSION["ErrorMessage"]= "All fields must be filled out";
      redirect_to("index.php");
    }else {

      // code for checking username and password from Database
      $Found_Account = login_Attempt($UserName,$Password);
      if ($Found_Account) {
        $_SESSION["userId"]=$Found_Account["userId"];
        $_SESSION["username"]=$Found_Account["username"];
        $_SESSION["loginErrorMessage"] = false;

      }else {
        $_SESSION["ErrorMessage"]="Incorrect Username/Password";
        redirect_to("index.php");
      }
    }
  }

  if (isset($_POST["submitLogout"])) {

    $_SESSION["userId"] = null;
    $_SESSION["username"] = null;

    session_destroy();
    redirect_to("index.php");
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
    <?php if ((isset($_SESSION["loginErrorMessage"]) && $_SESSION["loginErrorMessage"] == true)) { ?>
    <script type="text/javascript"> $(document).ready(function() { $("#loginModal").modal("show"); }) </script>
    <?php } ?>
    <!--- End of Script Source Files -->

</body>

</html>