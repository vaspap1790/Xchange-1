<!-- Start of Navbar -->
<nav id="nav-placeholder" class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top" style="background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);">

  <!-- Start of Left Part of Navbar-->
  <a class="navbar-brand" href="#">Xchange</a><link rel="shortcuticon" href="images/icons/favicon.ico" />
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- End of Left Part of Navbar-->

  <!-- Start Navbar Content-->
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">

    <!-- Start of Central Part of Navbar -->
    <ul class="navbar-nav mr-auto">

      <!-- Home -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>

      <!-- Watchlist -->
      <?php  if(confirm_Login()){  ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="dropdownWatchlist" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Watchlist
          </a>
          <div class="dropdown-menu dropdown-default" style="background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);" aria-labelledby="dropdownWatchlist">

            <?php
              $sqlFavoriteItems = "SELECT i.itemId as itemId, i.name as name, p.name as photoName 
              FROM favorite f 
              INNER JOIN item i ON f.itemId = i.itemId
              INNER JOIN photo p ON i.itemId = p.itemId  
              WHERE f.userId=" . $_SESSION["userId"];
              $stmtFavoriteItems = $ConnectingDB->query($sqlFavoriteItems);

              while ($favoriteItemsRows = $stmtFavoriteItems->fetch()) {
                $item_id = $favoriteItemsRows["itemId"];
                $item_name = $favoriteItemsRows["name"];
                $item_photo = $favoriteItemsRows["photoName"];
              ?>

              <a class="dropdown-item openItemModal" type="button" data-toggle="modal" id="openItemModal_<?php echo $item_id; ?>" data-target="#itemModal">
                <?php echo $item_name; ?> &nbsp;&nbsp;&nbsp; <img src="images/uploaded/<?php echo $item_photo; ?>" width="auto" height="50px"/>
              </a>
            <?php } ?>
          
          </div>
        </li>

      <?php } ?>

      <!-- Categories -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="dropdownCategories" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Categories
        </a>
        <div class="dropdown-menu dropdown-default" style="background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);" aria-labelledby="dropdownCategories">

        <?php
          $sqlCategories = "SELECT categoryId,name FROM category";
          $stmtCategories = $ConnectingDB->query($sqlCategories);
          while ($DataRows = $stmtCategories->fetch()) {
            $categoryId = $DataRows["categoryId"];
            $categoryName = $DataRows["name"];
          ?>
          <a class="dropdown-item" href="items.php?categoryId=<?php echo $categoryId; ?>&page=1"> <?php echo $categoryName; ?> </a>
        <?php } ?>

        </div>
      </li>

      <!-- Forum -->
      <li class="nav-item">
        <a class="nav-link" href="#">Forum</a>
      </li>
    </ul>
    <!-- End of Central Part of Navbar -->


    <!-- Start of Right Part of Navbar -->
    <div>
      <!-- Welcome message -->
      <div class="text-right small">
          <?php  
            if(confirm_Login()){  
            ?>  
              <span style="color:white;"> Welcome <?php echo $_SESSION['username']; ?> <span>
          <?php } ?>
      </div>

      <ul class="navbar-nav ml-auto nav-flex-icons">

        <!-- Notify for Requests -->
        <?php  
          if(confirm_Login()){  
            global $ConnectingDB;
            $sqlPendingRequests = "SELECT r.requestId as requestId, r.dateTime_ as requestDateTime, r.requesterId as requesterId,
            u.username as requester, i.name as requestedItemName, p.name as requestedItemPhotoName 
            FROM request r 
            INNER JOIN user u ON r.requesterId = u.userId 
            INNER JOIN item i ON i.itemId = r.itemRequestedId
            INNER JOIN photo p ON i.itemId = p.itemId
            WHERE r.ownerId = :userId 
            AND r.status = 'pending'";
            $stmtPendingRequests = $ConnectingDB->prepare($sqlPendingRequests);
            $stmtPendingRequests->bindValue(':userId',$_SESSION['userId']);
            $stmtPendingRequests->execute();
            $pendingRequestsCount = $stmtPendingRequests->rowcount();
        ?> 
        
          <li class="nav-item">
            <div class="btn-group dropleft">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuRequests" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $pendingRequestsCount ?>
                  <i class="fas fa-envelope"></i>
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuRequests">
                  <?php
                    while ($pendingRequestsRows = $stmtPendingRequests->fetch()) {
                      $requestId              = $pendingRequestsRows["requestId"];
                      $requestDateTime        = $pendingRequestsRows["requestDateTime"];
                      $requester              = $pendingRequestsRows["requester"];
                      $requesterId            = $pendingRequestsRows["requesterId"];
                      $requestedItemName      = $pendingRequestsRows["requestedItemName"];
                      $requestedItemPhotoName = $pendingRequestsRows["requestedItemPhotoName"];
                    ?>
                    <a class="dropdown-item openRequestModal" type="button" id="request_<?php echo $requestId; ?>" data-toggle="modal" data-target="#requestModal">
                      <i><?php echo $requestedItemName; ?></i> &nbsp;&nbsp;&nbsp; 
                      <img src="images/uploaded/<?php echo $requestedItemPhotoName; ?>" width="auto" height="50px"/> 
                      requested by <span style="font-weight: bold !important;"><?php echo $requester; ?></span> on <small><?php echo $requestDateTime; ?></small>
                    </a>
                    <div class="dropdown-divider"></div>
                  <?php } ?>
                </div>
              </div> 
          </li>

        <?php } else { ?>
          <li class="nav-item"></li>
        <?php } ?>

        <!-- Avatar - Dropdown -->
        <li class="nav-item avatar dropdown">
          <a class="nav-link dropdown-toggle" id="avatarDropdown" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">

            <?php  
              if(confirm_Login() && !empty(getUserAvatar($_SESSION['userId']))){  
            ?> 
            <img src="images/uploaded/<?php echo getUserAvatar($_SESSION['userId']) ?>" width="100px" height="100px" class="rounded-circle z-depth-0" alt="avatar image">
            <?php  
              } else {  
            ?>  
            <img src="images/uploaded/defaultAvatar.png" class="rounded-circle z-depth-0" width="100px" height="100px" alt="avatar image">
            <?php } ?> 
          
          </a>

          <!-- Login-Register or MyProfile-Logout-Setings -->
          <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="avatarDropdown">

            <?php  if(confirm_Login()){  ?>  
            <a class="dropdown-item" href="profile.php?username=<?php echo $_SESSION['username']; ?>">My Profile</a>
            <a class="dropdown-item" type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#logoutModal">Logout</a>
                <a class="dropdown-item" type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#settingsModal">Settings</a>
            <?php  
              } else {  
            ?>  
              <a class="dropdown-item" type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#loginModal">Login</a>
              <a class="dropdown-item" type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#registerModal">Register</a>
            <?php } ?> 

          </div>
        </li>

      </ul>
    </div>
    <!-- End of Rifht Part of Navbar -->

  </div>
  <!-- End of Navbar Content -->
</nav>
<!-- End of Navbar -->
