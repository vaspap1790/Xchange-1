<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/indexPHP.php"); ?> 
<?php require_once("includes/modals.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AboutUs</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
        }

        container-fluid {
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        h3 {
            font-size: 72px;
            color: black;
            text-shadow: 5px 7px 1px white;
            font-size: 24px;
            text-transform: uppercase;
            font-weight: 1000;
            margin-bottom: 100px;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 100px 0;
        }

        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }
        }
    </style>
</head>

<body>

    <!---Navbar -->
    <?php require_once("nav.php"); ?>

    <!-- Container (About Section) -->
    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h1></h1><br>
                <h3>We Empower People and Create Economic Opportunity</h3>

                <br>
                <h2>We are family of brands, driven by our desire to make great products available to everyone in a sustainable way. Together we offer exchange and services, that enable people to be inspired and to express their own personal goods, making
                    it easier to live in a more circular way.</h2>

            </div>
            <div class="logo"><img src="images/icons/favicon.ico" /></div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-signal logo"></span>
            </div>
        </div>
    </div>

    <!--- Footer -->
    <?php require_once("footer.php"); ?>

    <!--- Script Source Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/custom.js"></script>
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