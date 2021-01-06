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
    <title>Board</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/board.css">

    <style>
        body {
            background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
        }

        h2 {
            font-size: 72px;
            color: black;
            text-shadow: 5px 7px 1px white;
            font-size: 24px;
            text-transform: uppercase;
            font-weight: 1000;
            margin-bottom: 150px;
            margin-top: 50px;
        }

        .accordion-section .panel-default>.panel-heading {
            border: 0;
            background: #f4f4f4;
            padding: 0;
        }

        .accordion-section .panel-default .panel-title a {
            display: block;
            font-style: italic;
            font-size: 1.5rem;
        }

        .accordion-section .panel-default .panel-title a:after {
            font-family: 'FontAwesome';
            font-style: normal;
            font-size: 3rem;
            content: "\f106";
            color: #f9f9f9;
            float: right;
            margin-top: -12px;
        }

        .accordion-section .panel-default .panel-title a.collapsed:after {
            content: "\f107";
        }

        .accordion-section .panel-default .panel-body {
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

    <!---Navbar -->
    <?php require_once("nav.php"); ?>

    <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
        <div class="container">

            <h2>Frequently Asked Questions </h2>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                                What are the benefits of exchange?
                            </a>
                        </h3>
                    </div>
                    <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                        <div class="panel-body px-3 mb-4">
                            <p>With xchange, you and your visitors will benefit from a finely-tuned technology stack
                                that drives the highest levels of site performance, speed and engagement - and
                                contributes more to your bottom line. Our users fell in love
                                with:
                            </p>
                            <ul>
                                <li>Light speed deployment on the most secure and stable cloud infrastructure available
                                    on the market.</li>
                                <li>Scalability – pay for what you need today and add-on options as you grow.</li>
                                <li>All of the bells and whistles of other enterprise CMS options but without the design
                                    limitations - this CMS simply lets you realize your creative visions.</li>
                                <li>Amazing support backed by a team of Solodev pros – here when you need them.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                How easy is it to find products and xchange?
                            </a>
                        </h3>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body px-3 mb-4">
                            <p>Exchange is extremely easy. </p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                What is the uptime for ?
                            </a>
                        </h3>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body px-3 mb-4">
                            <p>Using Amazon AWS technology which is an industry leader for reliability you will be able
                                to experience an uptime in the vicinity of 99.95%.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                Can xchange handle multiple products for exchange?
                            </a>
                        </h3>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="panel-body px-3 mb-4">
                            <p>Yes, Solodev CMS is built to handle the needs of any size company. With our Multi-Site
                                Management, you will be able to easily manage all of your websites.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

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