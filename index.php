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
                    <div class="py-3 mb-4 border-bottom d-flex justify-content-center"> 
                        <img id="itemPhoto" width="440" alt="item image">
                    </div>

                    <div><small>Uploaded in <span id="dateUploaded"> </span> by <a id="uploadedBy"></a></small></div>
                    <div>Category: <a id="itemCategoryName"></a></div> 
                    <br>
                    <div><span id="item_description"></span></div> 
                    <div style="display:none"><span id="item_toExchange_id"></span></div> 
                    <div style="display:none"><span id="owner_id"></span></div> 
                    <br>

                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="requestExchange" data-dismiss="modal" data-toggle="modal" class="btn btn-primary" data-target="#exchangeModal">Ask</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="messageContent"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Modal -->
    <div class="modal fade bd-example-modal-lg" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestModalTitle">Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <h6>Your Item</h6>
                        <div class="d-flex py-3 mb-4 border-bottom">
                            <div class="mr-3">
                                <img id="owned_itemPhoto" width="120px;" height="100px" alt="item image">
                                <div style="text-align:center;"><small><i>Category: <a id="owned_itemCategoryName"></a></i></small></div>
                            </div> 
                            <div>
                                <div id="owned_itemName"></div>
                                <div><small><b>Uploaded in <span id="owned_dateUploaded"></span></b></small></div>
                                <div><small><span id="owned_item_description"></span></small></div> 
                            </div> 
                        </div>
                        
                        <h6>Offered Item</h6>
                        <div class="d-flex py-3 mb-4">
                            <div class="mr-3">
                                <img id="offered_itemPhoto" width="120px;" height="100px" alt="item image">
                                <div style="text-align:center;"><small><i>Category: <a id="offered_itemCategoryName"></a></i></small></div>
                            </div> 
                            <div>
                                <div id="offered_itemName"></div>
                                <div><small><b>Uploaded in <span id="offered_dateUploaded"></span> by <a id="offered_uploadedBy"></a></b></small></div>
                                <div><small><span id="offered_item_description"></span></small></div> 
                            </div> 
                        </div>

                        <div style="display:none" id="requestToApproveId"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  name="acceptRequest" id="acceptRequest" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#messageModal">Accept</button>
                    <button  name="rejectRequest" id="rejectRequest" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#messageModal">Reject</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Exchange Modal -->
    <div class="modal fade" id="exchangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exchangeModalTitle">Exchange</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="selectUserItem">Select item to offer for exchange</label>
                        <select class="form-control" id="selectUserItem">

                            <?php  
                            if(confirm_Login()){ 

                                $sqlUserItems = "SELECT i.itemId as itemId, i.name as name, p.name as photoName 
                                FROM item i 
                                INNER JOIN photo p ON i.itemId = p.itemId  
                                WHERE i.userId=" . $_SESSION["userId"];
                                $stmtUserItems = $ConnectingDB->query($sqlUserItems);

                                while ($userItemsRows = $stmtUserItems->fetch()) {
                                    $user_item_id = $userItemsRows["itemId"];
                                    $user_item_name = $userItemsRows["name"];
                                    $user_item_photo = $userItemsRows["photoName"];
                                ?>

                                <option value="userItemModal_<?php echo $user_item_id; ?>">
                                    <?php echo $user_item_name; ?> &nbsp;&nbsp;&nbsp; 
                                    <img src="images/uploaded/<?php echo $user_item_photo; ?>" width="auto" height="50px"/>
                                </option>

                            <?php } }?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control rounded-0" id="message" name="message" rows="5"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  name="submitConfirmExchange" id="submitConfirmExchange" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#messageModal">Exchange</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- End of Modals -->

    <!--- Footer -->
    <?php require_once("footer.php"); ?>

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