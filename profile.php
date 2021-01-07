<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php
    if (strcmp(getProfileUsername(), "No parameter") == 0){
        redirect_to("404.php");
    }
?>
<?php require_once("includes/modals.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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

    <!-- Start of Wrapper -->
    <div class="customWrapper pt-3">

        <!---Sidebar -->
        <div class="w3-container w3-padding-64" id="about">

            <?php

                $sqlFetchProfile  = "SELECT u.*, p.name as photoName 
                FROM user u
                INNER JOIN photo p
                ON u.userId = p.userId
                WHERE u.username='" . getProfileUsername() . "'";

                $stmtFetchProfile = $ConnectingDB ->query($sqlFetchProfile);

                while ($profileRows = $stmtFetchProfile->fetch()) {
                    $profileUserId             = $profileRows['userId'];
                    $profileFirstname          = $profileRows['firstname'];
                    $profileLastname           = $profileRows['lastname'];
                    $profileUsername           = $profileRows['username'];
                    $profileEmail              = $profileRows['email'];
                    $profileDescription        = $profileRows['description'];
                    $profilePhotoName          = $profileRows['photoName'];
                  }

                $sqlProfileRatings     = "SELECT rating FROM rating WHERE userRatedId = '$profileUserId'";
                $stmtProfileRatings    = $ConnectingDB->query($sqlProfileRatings);
                $sumProfile = 0;
                $countProfileRatings = 0;
        
                while($ratingProfileRows = $stmtProfileRatings->fetch()){
                    $sumProfile += $ratingProfileRows["rating"];
                    $countProfileRatings++;
                }
                $ratingProfile = ceil( $sumProfile / $countProfileRatings);
            ?>

            <?php if (!check_if_logged_user_profile()){ ?>
                <div class="d-flex justify-content-center">
                    <img src="images/uploaded/<?php echo $profilePhotoName; ?>" width="100px" height="100px" class="rounded-circle z-depth-0" alt="avatar image">
                </div>
            <?php } ?>


            <h4 class="w3-border-bottom w3-border-light-grey w3-padding-16 text-center">
                <?php echo $profileUsername; ?>
                <div class="rating d-flex row-reverse justify-content-center" style="display:inline">
                    <span style="font-size: medium; margin-top: 2.7%;">(<?php echo $countProfileRatings; ?>) </span>

                    <?php  for( $i=5; $i>$ratingProfile; $i-- ){  ?>
                        <input type="radio" disabled name="rating<?php echo $i; ?>" value="<?php echo $i; ?>" 
                        id="rating<?php echo $i; ?>"><label style="font-size: 1.7vw;" for="rating<?php echo $i; ?>">☆</label>
                    <?php } ?>

                    <?php  for( $i=$ratingProfile; $i>=1; $i-- ){  ?>
                        <input type="radio" disabled name="rating<?php echo $i; ?>" checked="checked" value="<?php echo $i; ?>" 
                        id="rating<?php echo $i; ?>"><label style="font-size: 1.7vw;" for="rating<?php echo $i; ?>">☆</label>
                    <?php } ?>
                </div>
                <div>
                    <span class="badge badge-pill badge-success"><?php echo totalRequestsAccepted(getProfileUserId()); ?></span> &nbsp;
                    <span class="badge badge-pill badge-info"><?php echo totalRequestsPending(getProfileUserId()); ?></span> &nbsp;
                    <span class="badge badge-pill badge-danger"><?php echo totalRequestsRejected(getProfileUserId()); ?></span> 
                </div>
            </h4>
            <h4><?php echo $profileFirstname; ?> <?php echo $profileLastname; ?></h4>
            <h4><?php echo $profileEmail; ?></h4>

            <p><?php echo $profileDescription; ?></p>

            <?php if (check_if_logged_user_profile()){ ?>
                <h3><a data-toggle="modal" data-target="#addItemModal" class="btn btn-danger">Add New Item</a></h3>
            <?php } else { ?>
                <h3><a data-toggle="modal" data-target="#ratingModal" class="btn btn-danger">Leave a Rating</a></h3>
            <?php } ?>
        </div>
        <!---End of Sidebar -->


        <!-- Page Content -->

        <div class="container mt-5 p-1">
        
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab1" data-toggle="tab">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab2" data-toggle="tab">Ratings</a>
                </li>
                <?php if (check_if_logged_user_profile()){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab3" data-toggle="tab">Requests</a>
                    </li>
                <?php } ?>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="tab1">
                    <div class="container-fluid px-4 py-3 mt-3">
                        <div class="row d-flex flex-row justify-content-start">
                            <?php require_once("includes/profilePHP.php"); ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab2">
                    <div class="container-fluid px-4 py-3 mt-3">
                        <div class="row d-flex flex-row justify-content-start">
                            <?php
                                global $ConnectingDB;

                                $sqlFetchRatings = "SELECT r.ratingId as ratingId, r.dateTime_ as ratingDateTime, r.rating as rating,
                                u.username as rater, p.name as raterPhotoName, r.comments as comments
                                FROM rating r 
                                INNER JOIN user u ON r.userRatingId = u.userId 
                                INNER JOIN photo p ON u.userId = p.userId
                                WHERE r.userRatedId =". getProfileUserId() ." ORDER BY r.userRatingId desc";                                               

                                $stmtFetchRatings = $ConnectingDB->query($sqlFetchRatings);

                                while ($fetchRatingsRows = $stmtFetchRatings->fetch()) {
                                    $ratingId             = $fetchRatingsRows["ratingId"];
                                    $ratingDateTime       = $fetchRatingsRows["ratingDateTime"];
                                    $rating               = $fetchRatingsRows["rating"];
                                    $rater                = $fetchRatingsRows["rater"];
                                    $raterPhotoName       = $fetchRatingsRows["raterPhotoName"];
                                    $comments             = $fetchRatingsRows["comments"];
                            ?>

                            <div class="card col-3 p-1">
                                <div class="card-body">
                                    <div class="rating">
                                        <input type="radio" name="rating" value="5" id="5"><label style="font-size: 1.5vw;" for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label style="font-size: 1.5vw;" for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label style="font-size: 1.5vw;" for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label style="font-size: 1.5vw;" for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label style="font-size: 1.5vw;" for="1">☆</label>
                                    </div>
                                    <div>
                                        rated by 
                                        <a href="profile.php?username=<?php echo $rater;?>"><?php echo $rater;?></a> &nbsp;&nbsp;
                                        <img src="images/uploaded/<?php echo $raterPhotoName; ?>" width="50px" height="50px" class="rounded-circle z-depth-0" alt="avatar image">
                                    </div>
                                    <div>on <span class="text-muted"><?php echo $ratingDateTime;?></span></div>
                                    <p><i>"<?php echo $comments;?>"</i></p>
                                </div>
                            </div>

                            <?php } ?>   <!--  Ending of While loop -->

                        </div>
                    </div>
                </div>

                <?php if (check_if_logged_user_profile()){ ?>

                    <div class="tab-pane" id="tab3">

                        <section class="container py-2 mb-4">

                            <div class="row">
                                <div class="col-lg-12">

                                    <table class="table table-striped table-hover">

                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Requested Item</th>
                                                <th>Photo</th>
                                                <th>DateTime</th>
                                                <th>Requester</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                            <?php
                                                global $ConnectingDB;

                                                $sqlFetchRequests = "SELECT r.requestId as requestId, r.dateTime_ as requestDateTime, r.requesterId as requesterId,
                                                u.username as requester, i.name as requestedItemName, p.name as requestedItemPhotoName, r.status as status 
                                                FROM request r 
                                                INNER JOIN user u ON r.requesterId = u.userId 
                                                INNER JOIN item i ON i.itemId = r.itemRequestedId
                                                INNER JOIN photo p ON i.itemId = p.itemId
                                                WHERE r.ownerId =". $_SESSION["userId"] ." ORDER BY r.requestId desc";                                               

                                                $stmtFetchRequests = $ConnectingDB->query($sqlFetchRequests);
                                                $sr = 0;

                                                while ($fetchRequestsRows = $stmtFetchRequests->fetch()) {
                                                    $profile_requestId              = $fetchRequestsRows["requestId"];
                                                    $profile_requestDateTime        = $fetchRequestsRows["requestDateTime"];
                                                    $profile_requester              = $fetchRequestsRows["requester"];
                                                    $profile_requesterId            = $fetchRequestsRows["requesterId"];
                                                    $profile_requestedItemName      = $fetchRequestsRows["requestedItemName"];
                                                    $profile_requestedItemPhotoName = $fetchRequestsRows["requestedItemPhotoName"];
                                                    $profile_status                 = $fetchRequestsRows["status"];
                                                    $sr++;
                                            ?>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php echo $sr; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if(strlen($profile_requestedItemName)>20){$profile_requestedItemName= substr($profile_requestedItemName,0,18).'..';}
                                                            echo $profile_requestedItemName;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <img src="images/uploaded/<?php echo $profile_requestedItemPhotoName; ?>" width="auto" height="50px"/> 
                                                    </td>
                                                    <td>
                                                        <?php echo $profile_requestDateTime; ?>
                                                    </td>
                                                    <td>
                                                        <a href="profile.php?username=<?php echo $profile_requester; ?>">
                                                            <?php
                                                                if(strlen($profile_requester)>10){$profile_requester= substr($profile_requester,0,10).'..';}
                                                                    echo $profile_requester ;
                                                            ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <span class=" 
                                                            <?php 
                                                                if ($profile_status == "pending"){
                                                                    echo "badge badge-pill badge-info";
                                                                }
                                                                if ($profile_status == "accepted"){
                                                                    echo "badge badge-pill badge-success";
                                                                }
                                                                if ($profile_status == "rejected"){
                                                                    echo "badge badge-pill badge-danger";
                                                                }
                                                            ?>
                                                        ">
                                                            <?php echo $profile_status; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm openRequestModal" type="button" 
                                                        id="requestTable_<?php echo $profile_requestId; ?>" 
                                                        data-toggle="modal" data-target="#requestModal">View
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        <?php } ?>   <!--  Ending of While loop -->
                                    </table>

                                </div><!--  Ending col-12 -->
                            </div><!--  Ending row -->
                        </section>

                    </div> <!--  Ending of tab3 -->
                <?php } ?>

            </div> <!--  Ending tab content -->

        </div>
        <!-- End of Content -->



    </div>
    <!-- End of Wrapper -->

    <!--- Footer -->
    <?php require_once("footer.php"); ?>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script> 
    <script src="js/custom.js"></script>
    <script src="js/profile.js"></script>
    <!--- End of Script Source Files -->

</body>

</html>