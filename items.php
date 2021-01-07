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

    <!--- Start Recently Visited Section -->
    <div id="recentlyVisited" class="py-4 px-5">

        <div class="fixed-background">

            <div class="row">

                <div class="col-12">
                    <h3 class="heading text-center pb-3">Recently you visited</h3>
                </div>

                <div class="col-md-12">
                    <div class="os-animation" data-animation="fadeInUp">
                        <div id="team-slider" class="owl-carousel owl-theme">
                            <div class="card text-center p-1">
                                <img class="card-img-top" src="images/items/used-guitar.jpg" alt="">
                                <div class="card-body">
                                    <div><small>Uploaded in 17/12/2020</small></div>
                                    <div>by <a>Username</a></div>
                                    <div class="rating">
                                        <span style="font-size: x-small; margin-top: 1.6%;">(32) </span>
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur.
                                    </p>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#requestModal">
                                        Exchange
                                    </button>
                                </div>
                            </div>

                            <div class="card text-center p-1">
                                <img class="card-img-top" src="images/items/used-guitar.jpg" alt="">
                                <div class="card-body">
                                    <div><small>Uploaded in 17/12/2020</small></div>
                                    <div>by <a>Username</a></div>
                                    <div class="rating">
                                        <span style="font-size: x-small; margin-top: 1.6%;">(32) </span>
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur.
                                    </p>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#requestModal">
                                        Exchange
                                    </button>
                                </div>
                            </div>

                            <div class="card text-center p-1">
                                <img class="card-img-top" src="images/items/used-guitar.jpg" alt="">
                                <div class="card-body">
                                    <div><small>Uploaded in 17/12/2020</small></div>
                                    <div>by <a>Username</a></div>
                                    <div class="rating">
                                        <span style="font-size: x-small; margin-top: 1.6%;">(32) </span>
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur.
                                    </p>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#requestModal">
                                        Exchange
                                    </button>
                                </div>
                            </div>

                            <div class="card text-center p-1">
                                <img class="card-img-top" src="images/items/used-guitar.jpg" alt="">
                                <div class="card-body">
                                    <div><small>Uploaded in 17/12/2020</small></div>
                                    <div>by <a>Username</a></div>
                                    <div class="rating">
                                        <span style="font-size: x-small; margin-top: 1.6%;">(32) </span>
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur.
                                    </p>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#requestModal">
                                        Exchange
                                    </button>
                                </div>
                            </div>

                            <div class="card text-center p-1">
                                <img class="card-img-top" src="images/items/used-guitar.jpg" alt="">
                                <div class="card-body">
                                    <div><small>Uploaded in 17/12/2020</small></div>
                                    <div>by <a>Username</a></div>
                                    <div class="rating">
                                        <span style="font-size: x-small; margin-top: 1.6%;">(32) </span>
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur.
                                    </p>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#requestModal">
                                        Exchange
                                    </button>
                                </div>
                            </div>

                            <div class="card text-center p-1">
                                <img class="card-img-top" src="images/items/used-guitar.jpg" alt="">
                                <div class="card-body">
                                    <div><small>Uploaded in 17/12/2020</small></div>
                                    <div>by <a>Username</a></div>
                                    <div class="rating">
                                        <span style="font-size: x-small; margin-top: 1.6%;">(32) </span>
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur.
                                    </p>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#requestModal">
                                        Exchange
                                    </button>
                                </div>
                            </div>

                            <div class="card text-center p-1">
                                <img class="card-img-top" src="images/items/used-guitar.jpg" alt="">
                                <div class="card-body">
                                    <div><small>Uploaded in 17/12/2020</small></div>
                                    <div>by <a>Username</a></div>
                                    <div class="rating">
                                        <span style="font-size: x-small; margin-top: 1.6%;">(32) </span>
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur.
                                    </p>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#requestModal">
                                        Exchange
                                    </button>
                                </div>
                            </div>

                        </div>
                        <!--- End Team Slider -->
                    </div>
                    <!--- End Animation -->
                </div>
                <!--- End col-md-12 -->

            </div>
            <!--- End of Row Light -->

            <div class="fixed-wrap">
                <div id="fixed-2">
                </div>
            </div>

        </div>

    </div>
    <!--- End Recently Visited Section -->

    <!-- Modals -->
    <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="requestModalLabel">Select Item to Exchange</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Select Category</label>
                            <select class="custom-select" id="exampleFormControlInput1">
                                <option selected>Category</option>
                                <option value="1">Category One</option>
                                <option value="2">Category Two</option>
                                <option value="3">Category Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Select Item</label>
                            <select class="custom-select" id="exampleFormControlInput2">
                                <option selected>Item</option>
                                <option value="1">Item One</option>
                                <option value="2">Item Two</option>
                                <option value="3">Item Three</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Request Exchange</button>
                </div>

            </div>
        </div>
    </div>

    <!--- Footer -->
    <?php require_once("footer.php"); ?>

    <!--- Script Source Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <script src="js/custom.js"></script>
    <script src="owl/owl.carousel.js"></script>
    <script src="js/items.js"></script>
    <!--- End of Script Source Files -->

</body>

</html>