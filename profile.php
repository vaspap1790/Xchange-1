<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/sessions.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>

<body>

    <!---Navbar -->
    <?php require_once("nav.php"); ?>

    <!-- Add your content of header -->
    <!-- <header class="">
        <div class="navbar navbar-default visible-xs">
            <button type="button" class="navbar-toggle collapsed">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a href="./index.html" class="navbar-brand">Helen Dark</a>
        </div>

        <nav class="sidebar">
            <div class="navbar-collapse" id="navbar-collapse">
                <div class="site-header hidden-xs">
                    <a class="site-brand" href="./index.html" title="">
                        <img class="img-responsive site-logo" style="border-radius: 50%" alt=""
                            src="images/profile/profile1.jpg"> Helen Dark
                    </a>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                    </p>
                    <hr>
                    <div class="rate">

                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>


                    <hr>
                    <a href="./addItem.html" class=" btn btn-info" title=""> Add Items</a>

                </div>


            </div>
        </nav>
    </header> -->

    <main class="" id="main-collapse">

        <div class="row">
            <div class="col-xs-12 section-container-spacer">
                <h1></h1>
                <hr>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/1 (2).jpg">
                <h3>Colorfull Shoes</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/1 (4).jpg">
                <h3>Shoes</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/1 (3).jpg">
                <h3>Shoes</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/2 (1).jpg">
                <h3>Flower Pot</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/2 (2).jpg">
                <h3>Termos</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>


            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/2 (3).jpg">
                <h3>Lamp</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/2 (4).jpg">
                <h3>Lamp</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/2 (5).jpg">
                <h3>Camera Lens</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/1 (2).jpg">
                <h3>Shoes</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/1 (3).jpg">
                <h3>Shoes</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>

            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./images/profile/2 (4).jpg">
                <h3>Lamp</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</p>
                <a href="./contact.html" class="btn btn-primary" title=""> Ask</a>
            </div>
        </div>

    </main>

    <!--- Footer -->
    <?php require_once("footer.php"); ?>

    <!--- Script Source Files -->
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            navbarToggleSidebar();
            navActivePage();
        });
    </script> -->
    <!-- <script type="text/javascript" src="./main.85741bff.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script> -->
    <script src="js/custom.js"></script>
    <script src="js/profile.js"></script>
    <!--- End of Script Source Files -->

</body>

</html>