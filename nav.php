<nav id="nav-placeholder" class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top ">
  <a class="navbar-brand" href="#">Xchange</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Watchlist
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">

          <?php  
            if(confirm_Login()){  
              //Fetchinng favorite items
              $sqlFavoriteItems = "SELECT i.itemId as itemId, i.description as description, p.name as photoName 
              FROM favorite f 
              INNER JOIN item i ON f.itemId = i.itemId
              INNER JOIN photo p ON i.itemId = p.itemId  
              WHERE f.userId=" . $_SESSION["userId"];
              $stmtFavoriteItems = $ConnectingDB->query($sqlFavoriteItems);

              while ($favoriteItemsRows = $stmtFavoriteItems->fetch()) {
                $item_id = $favoriteItemsRows["itemId"];
                $item_description = $favoriteItemsRows["description"];
                $item_photo = $favoriteItemsRows["photoName"];
              ?>
              <a class="dropdown-item" href="#"> <?php echo $item_description; ?> &nbsp;&nbsp;&nbsp; <img src="images/uploaded/<?php echo $item_photo ; ?>" width="auto" height="50px"/> </a>
            <?php } } ?>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Categories
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">

        <?php
          //Fetchinng all the categories from category table
          $sql = "SELECT categoryId,name FROM category";
          $stmt = $ConnectingDB->query($sql);
          while ($DataRows = $stmt->fetch()) {
            $id = $DataRows["categoryId"];
            $categoryName = $DataRows["name"];
          ?>
          <a class="dropdown-item" href="items.php?categoryId=<?php echo $id; ?>&page=1"> <?php echo $categoryName; ?> </a>
        <?php } ?>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Forum</a>
      </li>
    </ul>

    <div>
    <div class="text-right small">
        <!-- Welcome message -->
        <?php  
          if(confirm_Login()){  
          ?>  
            <span style="color:white;">Welcome <?php echo $_SESSION['username']; ?> <span>
          <?php } ?>
      </div>

      <ul class="navbar-nav ml-auto nav-flex-icons">

        <!-- Notify for Requests -->
        <?php  
          if(confirm_Login()){  
        ?> 
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light"><?php totalRequestsPending($_SESSION['userId']) ?>
            <i class="fas fa-envelope"></i>
          </a>
        </li>
        <?php } else { ?>
          <li class="nav-item"></li>
        <?php } ?>

        <!-- Avatar -->
        <li class="nav-item avatar dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
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

          <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
            aria-labelledby="navbarDropdownMenuLink-55">
            
            <!-- Login-Register or MyProfile-Logout-Setings -->
            <?php  
              if(confirm_Login()){  
            ?>  
            <a class="dropdown-item" href="profile.php">My Profile</a>
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

  </div>
</nav>

<!-- Modals -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="loginForm" action="index.php" method="post">
        <?php
            echo errorLoginMessage();
        ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submitLogin" id="submitLogin" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="logoutForm" action="index.php" method="post">
        <div class="form-group">
          Are you sure you want to logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="submitLogout" id="submitLogout" class="btn btn-primary">Yes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="registerForm" action="index.php" method="post">
          <?php
            echo errorRegisterMessage();
            echo successRegisterMessage();
          ?>
          <div class="form-group">
            <label for="rUsername">Username</label>
            <input type="text" class="form-control" id="rUsername" name="rUsername" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
              placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="rPassword">Password</label>
            <input type="password" class="form-control" id="rPassword" placeholder="Enter Password" name="rPassword">
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
              placeholder="Enter Password">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submitRegister" id="submitRegister" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          <?php
          // Fetching Existing Content
          if(confirm_Login()){

              $sql  = "SELECT * FROM user WHERE userId =".$_SESSION["userId"];
              $stmt = $ConnectingDB ->query($sql);
              $imageToBeUpdated    = getUserAvatar($_SESSION['userId']);

              while ($DataRows=$stmt->fetch()) {
                $firstnameToBeUpdated    = $DataRows['firstname'];
                $lastnameToBeUpdated    = $DataRows['lastname'];
                $usernameToBeUpdated    = $DataRows['username'];
                $emailToBeUpdated    = $DataRows['email'];
              }
          ?>

          <div class="modal-body">
            <form id="settingsForm" action="index.php" method="post" enctype="multipart/form-data">
             
              <?php
                echo errorSettingsMessage();
                echo successSettingsMessage();
              ?>

              <div class="d-flex align-items-start py-3 mb-4 border-bottom"> 

                <?php  
                  if(!empty($imageToBeUpdated)){  
                ?> 
                <img src="images/uploaded/<?php echo $imageToBeUpdated ?>" width="100px" height="100px" class="rounded-circle z-depth-0" alt="avatar image">
                <?php  
                  } else {  
                ?>  
                <img src="images/profile/defaultAvatar.png" class="rounded-circle z-depth-0" width="100px" height="100px" alt="avatar image">
                <?php } ?> 

                <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
                  <p>Accepted file type .png. Less than 1MB</p> 
                  <div style="white-space:nowrap">
                    <label for="imageSelect" class="btn btn-primary">Upload</label>
                    <input class="custom-file-input" type="File" name="image" id="imageSelect" value="">
                  </div>
                </div>

              </div>

                <div class="form-group">
                  <label for="firstname">Firstname</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstnameToBeUpdated;?>">
                </div>
                <div class="form-group">
                  <label for="lastName">Lastname</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastnameToBeUpdated;?>">
                </div>
                <div class="form-group">
                  <label for="sUsername">Username</label>
                  <input type="text" class="form-control" id="sUsername" name="sUsername" value="<?php echo $usernameToBeUpdated;?>">
                </div>
                <div class="form-group">
                  <label for="sEmail">Email Address</label>
                  <input type="email" class="form-control" id="sEmail" aria-describedby="emailHelp" name="sEmail" value="<?php echo $emailToBeUpdated;?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="submitSettings" id="submitSettings" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>

          <?php } else { ?>
            <div class="modal-body"></div>
          <?php } ?>
      
    </div>
  </div>
</div>

<!-- End of Modals -->