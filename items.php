<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
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
    <link rel="stylesheet" type="text/css" href="css/items.css">
</head>

<body>

    <!---Navbar -->
    <?php require_once("nav.php"); ?>

    <br><br><br><br><br><br>

    <!-- Start of Wrapper -->
    <div class="customWrapper pt-3">

        <!-- Sidebar -->
        <nav id="sidebar" class="hideNav">
            <div class="sidebar-header">
                <h3>Filters</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Filter Categories</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <?php
                        $sqlCategories = "SELECT categoryId,name FROM category";
                        $stmtCategories = $ConnectingDB->query($sqlCategories);
                        while ($DataRows = $stmtCategories->fetch()) {
                            $categoryId = $DataRows["categoryId"];
                            $categoryName = $DataRows["name"];
                        ?>
                        <li>
                            <a href="items.php?categoryId=<?php echo $categoryId; ?>&page=1"
                            title = "<?php echo $categoryName;?>"> 
                                <?php
                                    echo $categoryName; 
                                ?> 
                                <?php 
                                    if(isset($_GET["categoryId"]) && $_GET["categoryId"] == $categoryId){ ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                <?php } ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Filter Owner Rating</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                            <?php 
                                if(isset($_GET["rating"])){
                                    $parameters = explode("&", $_SERVER['QUERY_STRING']);
                                    foreach ($parameters as $key => $value) {
                                        if(str_contains($value, 'rating')) {
                                            unset($parameters[$key]);
                                        }
                                    }
                                    $queryStringRating = implode("&", $parameters);
                                }else{
                                    $queryStringRating = $_SERVER['QUERY_STRING'];
                                }
                            ?>
                        <li>
                            <a class="d-flex justify-content-start" href="items.php?<?php echo $queryStringRating; ?>&rating=1">
                                <div class="rating">
                                    <input type="radio" disabled name="rating1" value="5" id="1_5"><label style="font-size: 1.7vw;" for="1_5">☆</label>
                                    <input type="radio" disabled name="rating1" value="4" id="1_4"><label style="font-size: 1.7vw;" for="1_4">☆</label>
                                    <input type="radio" disabled name="rating1" value="3" id="1_3"><label style="font-size: 1.7vw;" for="1_3">☆</label>
                                    <input type="radio" disabled name="rating1" value="2" id="1_2"><label style="font-size: 1.7vw;" for="1_2">☆</label>
                                    <input type="radio" disabled checked name="rating1" value="1" id="1_1"><label style="font-size: 1.7vw;" for="1_1">☆</label>
                                </div>
                                <?php 
                                    if(isset($_GET["rating"]) && $_GET["rating"] == 1){ ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                <?php } ?>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex justify-content-start" href="items.php?<?php echo $queryStringRating; ?>&rating=2">
                                <div class="rating">
                                    <input type="radio" disabled name="rating2" value="5" id="r2_5"><label style="font-size: 1.7vw;" for="r2_5">☆</label>
                                    <input type="radio" disabled name="rating2" value="4" id="r2_4"><label style="font-size: 1.7vw;" for="r2_4">☆</label>
                                    <input type="radio" disabled name="rating2" value="3" id="r2_3"><label style="font-size: 1.7vw;" for="r2_3">☆</label>
                                    <input type="radio" disabled checked name="rating2" value="2" id="r2_2"><label style="font-size: 1.7vw;" for="r2_2">☆</label>
                                    <input type="radio" disabled name="rating2" value="1" id="r2_1"><label style="font-size: 1.7vw;" for="r2_1">☆</label>
                                </div>
                                <?php 
                                    if(isset($_GET["rating"]) && $_GET["rating"] == 2){ ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                <?php } ?>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex justify-content-start" href="items.php?<?php echo $queryStringRating; ?>&rating=3">
                                <div class="rating">
                                    <input type="radio" disabled name="rating3" value="5" id="3_5"><label style="font-size: 1.7vw;" for="3_5">☆</label>
                                    <input type="radio" disabled name="rating3" value="4" id="3_4"><label style="font-size: 1.7vw;" for="3_4">☆</label>
                                    <input type="radio" disabled checked name="rating3" value="3" id="3_3"><label style="font-size: 1.7vw;" for="3_3">☆</label>
                                    <input type="radio" disabled name="rating3" value="2" id="3_2"><label style="font-size: 1.7vw;" for="3_2">☆</label>
                                    <input type="radio" disabled name="rating3" value="1" id="3_1"><label style="font-size: 1.7vw;" for="3_1">☆</label>
                                </div>
                                <?php 
                                    if(isset($_GET["rating"]) && $_GET["rating"] == 3){ ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                <?php } ?>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex justify-content-start" href="items.php?<?php echo $queryStringRating; ?>&rating=4">
                                <div class="rating">
                                    <input type="radio" disabled name="rating4" value="5" id="4_5"><label style="font-size: 1.7vw;" for="4_5">☆</label>
                                    <input type="radio" disabled checked name="rating4" value="4" id="4_4"><label style="font-size: 1.7vw;" for="4_4">☆</label>
                                    <input type="radio" disabled name="rating4" value="3" id="4_3"><label style="font-size: 1.7vw;" for="4_3">☆</label>
                                    <input type="radio" disabled name="rating4" value="2" id="4_2"><label style="font-size: 1.7vw;" for="4_2">☆</label>
                                    <input type="radio" disabled name="rating4" value="1" id="4_1"><label style="font-size: 1.7vw;" for="4_1">☆</label>
                                </div>
                                <?php 
                                    if(isset($_GET["rating"]) && $_GET["rating"] == 4){ ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                <?php } ?>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex justify-content-start" href="items.php?<?php echo $queryStringRating; ?>&rating=5">
                                <div class="rating">
                                    <input type="radio" disabled checked name="rating5" value="5" id="5_5"><label style="font-size: 1.7vw;" for="5_5">☆</label>
                                    <input type="radio" disabled name="rating5" value="4" id="5_4"><label style="font-size: 1.7vw;" for="5_4">☆</label>
                                    <input type="radio" disabled name="rating5" value="3" id="5_3"><label style="font-size: 1.7vw;" for="5_3">☆</label>
                                    <input type="radio" disabled name="rating5" value="2" id="5_2"><label style="font-size: 1.7vw;" for="5_2">☆</label>
                                    <input type="radio" disabled name="rating5" value="1" id="5_1"><label style="font-size: 1.7vw;" for="5_1">☆</label>
                                </div>
                                <?php 
                                    if(isset($_GET["rating"]) && $_GET["rating"] == 5){ ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                <?php } ?>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php if(confirm_Login()){ ?>
                    <li>
                        <?php if(isset($_GET["favorites"]) && $_GET["favorites"] == 1){
                            $parameters = explode("&", $_SERVER['QUERY_STRING']);
                            foreach ($parameters as $key => $value) {
                                if(str_contains($value, 'favorites')) {
                                    unset($parameters[$key]);
                                }
                            }
                            $queryStringFavorites = implode("&", $parameters);
                            ?>
                            <a href="items.php?<?php echo $queryStringFavorites; ?>&favorites=0">Show Only Favorites 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                </svg>
                            </a>
                        <?php }elseif ( !isset($_GET["favorites"]) || $_GET["favorites"] == 0 ){ 
                                $parameters = explode("&", $_SERVER['QUERY_STRING']);
                                foreach ($parameters as $key => $value) {
                                    if(str_contains($value, 'favorites')) {
                                        unset($parameters[$key]);
                                    }
                                }
                                $queryStringFavorites = implode("&", $parameters);?>
                            <a href="items.php?<?php echo $queryStringFavorites; ?>&favorites=1">Show Only Favorites</a>
                        <?php } ?>
                        </li>
                <?php } ?>

            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content" class="d-flex flex-column" style="width:80vw;">

            <div class="pl-4">
                <h3>
                    <span class="btn-group">
                        <button type="button" id="sidebarCollapse" class="btn peach-gradient">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </span>
                    <!-- Category Title -->
                    <?php 
                        try{
                            $searchParameters        = explode("&", $_SERVER['QUERY_STRING']);
                            $firstSearchParameter    = explode("=", $searchParameters[0]);
                            if(isset($firstSearchParameter[0])){
                                $firstSearchParameterKey = $firstSearchParameter[0];

                                if($firstSearchParameterKey == "categoryId"){
    
                                    $categoryId = $firstSearchParameter[1];
    
                                    $sqlFetchCategoryName = "SELECT name FROM CATEGORY WHERE categoryId = " . $categoryId;
                                    $stmtFetchCategoryName = $ConnectingDB->query($sqlFetchCategoryName);
                                    $row= $stmtFetchCategoryName->fetch();
                                    
                                    echo $row["name"];
                                }
                            }

                        }catch(Exception $e){}
                    ?>
                </h3>
            </div>

            <!-- <div class="px-3 py-1 d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex-row  align-items-center">
                    <span class="mr-2">Sorting</span>
                    <select class="browser-default custom-select">
                        <option selected value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="d-flex flex-row  align-items-center">
                    <span class="mr-2">Showing</span>
                    <select class="browser-default custom-select">
                        <option selected value="1">10</option>
                        <option value="2">20</option>
                        <option value="3">50</option>
                    </select>
                </div>
            </div> -->

            <div class="container px-5 py-3" style="max-width:80vw; min-width:80vw;">

                <div class="row d-flex flex-row justify-content-start">
                    <?php require_once("includes/itemsPHP.php"); ?>
                </div>
                <!-- End of Row -->

            </div>
            <!-- End of Container -->

            <!-- Pagination -->
            <nav class="mt-2 ml-5">
                <ul class="pagination pagination-lg">

                    <!-- Backward Button -->
                    <?php 
                        $searchParameters = explode("&", $_SERVER['QUERY_STRING']);

                        if( isset($page) ) {

                            if ( $page > 1 ) { 

                                if ($searchParameters[1]){ ?>

                                    <li class="page-item">
                                        <a href="items.php?<?php  echo $searchParameters[0]; ?>&page=<?php  echo $page - 1; ?>" class="page-link">&laquo;</a>
                                    </li>

                                <?php } else { ?>

                                    <li class="page-item">
                                        <a href="items.php?page=<?php  echo $page - 1; ?>" class="page-link">&laquo;</a>
                                    </li>
                    <?php } } } ?>

                    <!-- Page Numbers -->
                    <?php
                        if( isset($page) ){
                            $pagination = ceil($countItems / $numberOfItemsForEachPage);

                            for ($i=1; $i <=$pagination ; $i++) {

                                if ($i == $page) {  

                                    if ($searchParameters[1]){ ?>

                                        <li class="page-item active">
                                            <a href="items.php?<?php  echo $searchParameters[0]; ?>&page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
                                        </li>

                                    <?php } else { ?>

                                        <li class="page-item active">
                                            <a href="items.php?page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
                                        </li>

                    <?php } } else {   

                                    if ($searchParameters[1]){ ?>

                                        <li class="page-item">
                                            <a href="items.php?<?php  echo $searchParameters[0]; ?>&page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
                                        </li>

                                        <?php } else { ?>

                                        <li class="page-item">
                                            <a href="items.php?page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
                                        </li>

                    <?php  } } } } ?>

                    <!-- Forward Button -->
                    <?php 
                        if ( isset($page) && !empty($page) ) {

                            if ( $page + 1 <= $pagination ) {

                                if ($searchParameters[1]){ ?>

                                    <li class="page-item">
                                        <a href="items.php?<?php  echo $searchParameters[0]; ?>&page=<?php  echo $page + 1; ?>" class="page-link">&raquo;</a>
                                    </li>

                                <?php } else { ?>

                                    <li class="page-item">
                                        <a href="items.php?page=<?php  echo $page + 1; ?>" class="page-link">&raquo;</a>
                                    </li>
                                    
                    <?php } } }?>
                    
                </ul>
            </nav>

        </div>
        <!-- End of Content -->

    </div>
    <!-- End of Wrapper -->


    <!-- Modals -->
    <?php require_once("includes/modals.php"); ?>
    
    <!--- Footer -->
    <?php require_once("footer.php"); ?>

    <!--- Script Source Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <script src="js/custom.js"></script>
    <script src="owl/owl.carousel.js"></script>
    <script src="js/items.js"></script>
    <!--- End of Script Source Files -->

</body>

</html>