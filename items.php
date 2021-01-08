<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/modals.php"); ?>


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
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Filters</h3>
            </div>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li> -->
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content" class="d-flex flex-column">

            <div class="pl-3">
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

            <div class="container-fluid px-4 py-3">

                <div class="row d-flex flex-row justify-content-start">
                    <?php require_once("includes/itemsPHP.php"); ?>
                </div>
                <!-- End of Row -->

            </div>
            <!-- End of Container -->

            <!-- Pagination -->
            <nav class="mt-2">
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