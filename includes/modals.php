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
                    <img id="itemPhoto" width="440" height="280" alt="item image">
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
                <div><a style="font-weight:bold !important;" id="offered_uploadedBy_header"></a> sent:</div> &nbsp;&nbsp;
                <div><small><i><span id="fetch_message"></span></i></small></div> 
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
                <button  name="acceptRequest" id="acceptRequest" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#confirmAcceptModal">Accept</button>
                <button  name="rejectRequest" id="rejectRequest" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#confirmRejectModal">Reject</button>
            </div>
        </div>
    </div>
</div>

    <!--Confirm Accept Exchange Modal -->
    <div class="modal fade" id="confirmAcceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmExchangeModalTitle">Confirm Accept</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Accept?
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button  name="confirmAccept" id="confirmAccept" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#messageModal">Yes</button>
            </div>
        </div>
    </div>
</div>

    <!--Confirm Reject Exchange Modal -->
    <div class="modal fade" id="confirmRejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmRejectTitle">Confirm Reject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Reject?
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button  name="confirmReject" id="confirmReject" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#messageModal">Yes</button>
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
                    <button  name="submitExchange" id="submitExchange" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#confirmExchangeModal">Exchange</button>
                </div>

            </div>
        </div>
    </div>
</div>

<!--Confirm Exchange Modal -->
<div class="modal fade" id="confirmExchangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmExchangeModalTitle">Confirm Exchange</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Exchange?
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button  name="confirmExchange" id="confirmExchange" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#messageModal">Yes</button>
            </div>
        </div>
    </div>
</div>

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
            <button type="submit" name="submitRegister" id="submitRegister" class="btn btn-primary">Save</button>
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
                $firstnameToBeUpdated      = $DataRows['firstname'];
                $lastnameToBeUpdated       = $DataRows['lastname'];
                $usernameToBeUpdated       = $DataRows['username'];
                $emailToBeUpdated          = $DataRows['email'];
                $descriptionToBeUpdated    = $DataRows['description'];
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
                <div class="form-group">
                    <label for="sDescription">Description</label>
                    <textarea class="form-control rounded-0" id="sDescription" name="sDescription" rows="5"><?php echo $descriptionToBeUpdated;?></textarea>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="submitSettings" id="submitSettings" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>

          <?php } else { ?>
            <div class="modal-body"></div>
          <?php } ?>
      
    </div>
  </div>
</div>
