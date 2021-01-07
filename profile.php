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
            </h4>
            <h4><?php echo $profileFirstname; ?> <?php echo $profileLastname; ?></h4>
            <h4><?php echo $profileEmail; ?></h4>

            <p><?php echo $profileDescription; ?></p>

            <?php if (check_if_logged_user_profile()){ ?>
                <h3><a href="#" class="btn btn-danger">Add New Item</a></h3>
            <?php } else { ?>
                <h3><a href="#" class="btn btn-danger">Leave a Rating</a></h3>
            <?php } ?>
        </div>
        <!---End of Sidebar -->


        <!-- Page Content -->
        <div class="container-fluid px-4 py-3">
            <div class="row d-flex flex-row justify-content-start">
                <?php require_once("includes/profilePHP.php"); ?>
            </div>
            <!-- End of Row -->
        </div>
        <!-- End of Content -->

    </div>
    <!-- End of Wrapper -->

    <!--- Footer -->
    <?php require_once("footer.php"); ?>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script> 
    <script src="js/custom.js"></script>
    <script src="js/profile.js"></script>
    <!--- End of Script Source Files -->

</body>

</html>