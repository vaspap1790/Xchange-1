<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/board.css">
</head>

<body>

    <!---Navbar -->
    <?php require_once("nav.php"); ?>
    
    <br><br><br><br>
    <section class="accordion-section clearfix" aria-label="Question Accordions">
        <div class="container">

            <h2 class="mb-4">Frequently Asked Questions </h2>
            <br>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" style="background: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%); border-radius:100px;" role="tab" id="heading0">
                        <h6 class="panel-title" >
                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                                What are the benefits of exchange?
                            </a>
                        </h6>
                    </div>
                    <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                        <div class="panel-body px-3 mb-4" >
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                Duis aute irure dolor in reprehenderit 
                                in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                                sunt in culpa qui officia deserunt mollit anim id est laborum
                            </p>
                            <ul>
                                <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</li>
                                <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>
                                <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</li>
                                <li>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3"style="background: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%); border-radius:100px;" role="tab" id="heading1">
                        <h6 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                How easy is it to find products and xchange?
                            </a>
                        </h6>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body px-3 mb-4">
                            <p> Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3"style="background: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%); border-radius:100px;" role="tab" id="heading2">
                        <h6 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                What is the uptime for ?
                            </a>
                        </h6>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body px-3 mb-4">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                 sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3"style="background: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%); border-radius:100px;" role="tab" id="heading3">
                        <h6 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                Can xchange handle multiple products for exchange?
                            </a>
                        </h6>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="panel-body px-3 mb-4">
                            <p>Porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi 
                                tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem
                                ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <br>


    <!-- Modals -->
    <?php require_once("includes/modals.php"); ?>
    
    <!--- Footer -->
    <?php require_once("footer.php"); ?>

    <!--- Script Source Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/board.js"></script>
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