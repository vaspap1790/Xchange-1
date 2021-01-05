<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/indexPHP.php"); ?> 

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
    <div class="search-wrapper">
        <div>
            <h2>Find whatever the weather</h2>
        </div>
        <div>
            <form id="searchForm" action="index.php" method="post" class="form-inline active-pink-4">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                    aria-label="Search" name="search">
                    <button type="submit" name="submitSearch" id="submitSearch" class="btn btn-primary">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
            </form>
        </div>
    </div>
    <!--- End of SearchBar --> 

    <!--- Footer -->
    <?php require_once("footer.php"); ?>

    <!-- Modals -->

    <!-- Item Modal -->
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="itemForm" action="index.php" method="post">

                        <div class="d-flex align-items-start py-3 mb-4 border-bottom"> 
                            <img id="itemPhoto" width="100px" height="100px" alt="item image">
                        </div>

                        <div><small>Uploaded in <span id="dateUploaded"> </span> by <a><span id="uploadedBy"></span></small></div>
                        <br>
                        <div>Category: <span id="itemCategoryName"></span></div> 
                        <br>
                        <div><span id="item_description"></span></div> 
                        <div style="display:none"><span id="item_id"></span></div> 

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submitExchange" id="submitExchange" class="btn btn-primary">Exchange</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- End of Modals -->

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