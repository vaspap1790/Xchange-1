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
    <link rel="stylesheet" href="owl/owl.carousel.css">
    <link rel="stylesheet" href="owl/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>

    <!---Navbar -->
    <?php require_once("nav.php"); ?>

    <!--- Start of SearchBar -->
    <div class="search-wrapper">
        <div>
            <h1><b>Find whatever the weather!</h1>
        </div>
        <div>
            <form id="searchForm" action="index.php" method="post" class="form-inline active-pink-4">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                    aria-label="Search" name="search">
                    <button type="submit" name="submitSearch" id="submitSearch" class="btn btn-sm peach-gradient">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
            </form>
        </div>
    </div>
    <!--- End of SearchBar --> 

    <!--- Start Recently Visited Section -->
    <?php 
        if( (isset($_COOKIE["consentCookies"]) && $_COOKIE["consentCookies"] == 1) &&
            (isset($_COOKIE['recentlyVisited']) && !empty($_COOKIE['recentlyVisited'])) 
        ){
        
                $data = unserialize($_COOKIE['recentlyVisited']);
                $dataToFetch = array_unique($data);

                if(count($dataToFetch) > 3) {    
    ?>

        <div id="recentlyVisited" class="py-4 px-5 container mt-1" style="max-width:80vw; min-width:80vw;">
            <div class="fixed-background">
                <div class="row">

                    <div class="col-12">
                    <h3 class="heading text-center pb-3" style= "color: white;"><i>Recently you visited</i></h3>
                    </div>

                    <div class="col-md-12">
                        <div class="os-animation" data-animation="fadeInUp">
                            <div id="team-slider" class="owl-carousel owl-theme">

                            <?php
                                global $ConnectingDB;
                                
                                foreach ($dataToFetch as $id) {

                                    $sqlRecenlyVisited = "SELECT i.itemId as itemId, i.name as itemName, i.description as description,
                                    i.dateTime_ as dateTime, c.categoryId as categoryId, c.name as categoryName,
                                    u.userId as userId, u.username as username, p.name as photoName
                                    FROM item i
                                    INNER JOIN category c
                                    ON i.categoryId = c.categoryId
                                    INNER JOIN user u
                                    ON i.userId = u.userId
                                    INNER JOIN photo p
                                    ON i.itemId = p.itemId 
                                    WHERE i.itemId =" . $id;
                                    
                                    $stmtRecenlyVisited = $ConnectingDB->query($sqlRecenlyVisited);

                                    if ($stmtRecenlyVisited) {
                                        $recenlyVisitedRow = $stmtRecenlyVisited->fetch();

                                        $itemId         = $recenlyVisitedRow["itemId"];
                                        $itemName       = $recenlyVisitedRow["itemName"];
                                        $description    = $recenlyVisitedRow["description"];
                                        $dateTime       = $recenlyVisitedRow["dateTime"];
                                        $categoryId     = $recenlyVisitedRow["categoryId"];
                                        $categoryName   = $recenlyVisitedRow["categoryName"];
                                        $userId         = $recenlyVisitedRow["userId"];
                                        $username       = $recenlyVisitedRow["username"];
                                        $photoName      = $recenlyVisitedRow["photoName"];

                                        $sqlRatings     = "SELECT rating FROM rating WHERE userRatedId = '$userId'";
                                        $stmtRatings    = $ConnectingDB->query($sqlRatings);
                                        $sum = 0;
                                        $countRatings = 0;

                                        while($ratingRows = $stmtRatings->fetch()){
                                            $sum += $ratingRows["rating"];
                                            $countRatings++;
                                        }
                                        $rating = ceil( $sum / $countRatings);
                                ?>
                                        <div class="card text-center p-1">
                                            <img class="card-img-top" src="images/uploaded/<?php echo $photoName ?>" alt="" width="260" height="195">
                                            <div class="card-body">    

                                                <div>Category: <a title="<?php echo $categoryName; ?>" href="items.php?categoryId=<?php echo $categoryId; ?>&page=1">
                                                <?php
                                                    if(strlen($categoryName)>8){$categoryName= substr($categoryName,0,6).'..';}
                                                    echo $categoryName; 
                                                 ?></a></div>
                                                <div><small>Uploaded in <?php echo $dateTime ?></small></div>
                                                <div>by <a href="profile.php?username=<?php echo $username; ?>"> <?php echo $username; ?> </a></div>
                                                <hr class="mt-2">
                                                <p><?php echo $itemName ?>
                                                </p>
                                                <button type="button" class="openItemModal btn btn-info btn-sm" data-toggle="modal"
                                                id="openItemModal_<?php echo $itemId; ?>" data-target="#itemModal">
                                                    Exchange
                                                </button>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }

                                ?>
                                    

                            </div>
                            <!--- End Team Slider -->
                        </div>
                        <!--- End Animation -->
                    </div>
                    <!--- End col-md-12 -->

                </div>
                <!--- End of Row Light -->

                <div class="fixed-wrap">
                    <div id="fixed-2"></div>
                </div>

            </div>
        </div>

    <?php } } ?>    
    <!-- End of Recently Visited -->            

    
    <!-- Modals -->
    <?php require_once("includes/modals.php"); ?>

    <!--- Footer -->
    <?php require_once("footer.php"); ?>
    
    <!--- Script Source Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <script src="owl/owl.carousel.js"></script>
    <script src="js/custom.js"></script>
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
    <?php if (!isset($_COOKIE["consentCookies"])) { ?>
    <script type="text/javascript"> $(document).ready(function() { $("#consentCookies").modal("show"); }) </script>
    <?php } ?>
    <!--- End of Script Source Files -->

</body>

</html>