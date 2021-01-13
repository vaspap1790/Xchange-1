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

<!-- Consent Cookies Modal -->
<div class="modal fade" id="consentCookies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consentCookiesLabel">This Website Useses Cookies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="consentCookiesForm" action="index.php" method="post">
        <div class="form-group">
          We use cookies to personalise content
        </div>
        <div class="modal-footer">
          <button type="submit" name="consentCookiesAllow" id="consentCookiesAllow" class="btn btn-primary">Allow</button>
          <button type="submit" name="consentCookiesDeny" id="consentCookiesDeny" class="btn btn-primary">Don't Allow</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Terms And Policies Modal -->
<div class="modal fade bd-example-modal-lg" id="termsPoliciesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="overflow-y:initial !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="termsPoliciesLabel">Xchange Terms and Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:80vh; overflow-y:auto;">

        <h1><small>Terms and conditions</small></h1>
        <p style="text-align:justify;">
          <small>These terms and conditions (&quot;Agreement&quot;) set forth the general terms and conditions of your use of the
           <a target="_blank" rel="nofollow" href="index.php">xchange.com</a> website (&quot;Website&quot; or &quot;Service&quot;) 
           and any of its related products and services (collectively, &quot;Services&quot;). This Agreement is legally binding between
            you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;).
             By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. 
             If you are entering into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement,
              in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, 
              or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Website and Services. 
              You acknowledge that this Agreement is a contract between you and the Operator, even though it is electronic and is not physically signed by you, 
              and it governs your use of the Website and Services.
          </small>
        </p>
        <h2><small>Accounts and membership</small></h2>
        <p style="text-align:justify;">
          <small>
          If you create an account on the Website, you are responsible for maintaining the security of your account
           and you are fully responsible for all activities that occur under the account and any other actions taken in connection with it.
            We may, but have no obligation to, monitor and review new accounts before you may sign in and start using the Services.
             Providing false contact information of any kind may result in the termination of your account. You must immediately notify us
              of any unauthorized uses of your account or any other breaches of security. We will not be liable for any acts or omissions by you,
               including any damages of any kind incurred as a result of such acts or omissions.
          </small>
        </p>
        <h2><small>Links to other resources</small></h2>
        <p style="text-align:justify;">
          <small>
          Although the Website and Services may link to other resources (such as websites, mobile applications, etc.),
           we are not, directly or indirectly, implying any approval, association, sponsorship, endorsement, or affiliation 
           with any linked resource, unless specifically stated herein. We are not responsible for examining or evaluating, 
           and we do not warrant the offerings of, any businesses or individuals or the content of their resources. We do not 
           assume any responsibility or liability for the actions, products, services, and content of any other third parties. 
           You should carefully review the legal statements and other conditions of use of any resource which you access through 
           a link on the Website and Services. Your linking to any other off-site resources is at your own risk.
          </small>
        </p>
        <h2><small>Changes and amendments</small></h2>
        <p style="text-align:justify;">
          <small>
          We reserve the right to modify this Agreement or its terms relating to the Website and Services at any time,
           effective upon posting of an updated version of this Agreement on the Website. When we do, we will post a 
           notification on the main page of the Website. Continued use of the Website and Services after any such changes 
           shall constitute your consent to such changes. 
           Policy was created with <a style="color:inherit" target="_blank" href="https://www.websitepolicies.com/blog/sample-terms-conditions-template">WebsitePolicies</a>.
          </small>
        </p>
        <h2><small>Acceptance of these terms</small></h2>
        <p style="text-align:justify;">
          <small>
          You acknowledge that you have read this Agreement and agree to all its terms and conditions.
         By accessing and using the Website and Services you agree to be bound by this Agreement. 
         If you do not agree to abide by the terms of this Agreement, you are not authorized to access or use the Website and Services.
          </small>
         </p>
        <h2><small>Contacting us</small></h2>
        <p style="text-align:justify;"><small>If you would like to contact us to understand more about this Agreement or wish to contact us concerning any matter relating to it, you may send an email to xcha&#110;ge&#100;&#118;e&#64;&#103;m&#97;&#105;l.&#99;o&#109;</small></p>
        <p style="text-align:justify;"><small>This document was last updated on January 13, 2021</small></p>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#registerModal">Close</button>
        </div>

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
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="termsCheck" name="termsCheck[]">
              <label class="form-check-label" for="termsCheck">
                <a class="text-start" type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" style="text-decoration:underline; color:blue;"
                  data-target="#termsPoliciesModal"> Agree with our Terms and Conditions
                </a>
              </label>
          </div>
          <div class="modal-footer mt-3">
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

<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItemLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="itemForm" action="profile.php" method="post" enctype="multipart/form-data">

          <div class="d-flex align-items-start py-3 mb-4 border-bottom"> 
            <img src="images/uploaded/noPhoto.png" class="z-depth-0" width="100px" height="100px" alt="item image">
            <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
              <p>Accepted file type .png. Less than 1MB</p> 
              <div style="white-space:nowrap">
                <label for="imageItem" class="btn btn-primary">Upload</label>
                <input class="custom-file-input" type="File" name="imageItem" id="imageItem" value="">
              </div>
            </div>
          </div>

            <?php
                echo errorAddItemMessage();
                echo successAddItemMessage();
            ?>

            <div class="form-group">
              <label for="item_name">Title</label>
              <input type="text" class="form-control" id="item_name" name="item_name" value="">
            </div>
            <div class="form-group">
            <label for="selectItemCategory">Category</label>
                <select class="form-control" id="selectItemCategory" name="selectItemCategory">

                    <?php  
                      $sqlItemCategories = "SELECT categoryId,name FROM category";
                      $stmtItemCategories = $ConnectingDB->query($sqlItemCategories);
                      while ($itemCategoriesRows = $stmtItemCategories->fetch()) {
                        $itemCategoryId   = $itemCategoriesRows["categoryId"];
                        $itemCategoryName = $itemCategoriesRows["name"];
                    ?>

                      <option value="<?php echo $itemCategoryId; ?>">
                          <?php echo $itemCategoryName; ?>
                      </option>
                      <?php } ?>

                </select>
            </div>
            <div class="form-group">
                <label for="iDescription">Description</label>
                <textarea class="form-control rounded-0" id="iDescription" name="iDescription" rows="5"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="addItem" id="addItem" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Item Modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editItemLabel">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editItemForm" action="profile.php" method="post" enctype="multipart/form-data">

          <div class="d-flex align-items-start py-3 mb-4 border-bottom"> 
            <img src="images/uploaded/noPhoto.png" id="editItemImage" class="z-depth-0" width="100px" height="100px" alt="item image">
            <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
              <p>Accepted file type .png. Less than 1MB</p> 
              <div style="white-space:nowrap">
                <label for="editImageItem" class="btn btn-primary">Upload</label>
                <input class="custom-file-input" type="File" name="editImageItem" id="editImageItem" value="">
              </div>
            </div>
          </div>

            <?php
                echo errorEditItemMessage();
                echo successEditItemMessage();
            ?>

            <div class="form-group">
              <label for="edit_item_name">Title</label>
              <input type="text" class="form-control" id="edit_item_name" name="edit_item_name" value="">
            </div>
            <div class="form-group">
            <label for="selectItemCategory">Category</label>
                <select class="form-control" id="edit_selectItemCategory" name="edit_selectItemCategory">

                    <?php  
                      $sqlEditItemCategories = "SELECT categoryId,name FROM category";
                      $stmtEditItemCategories = $ConnectingDB->query($sqlEditItemCategories);
                      while ($itemEditCategoriesRows = $stmtEditItemCategories->fetch()) {
                        $itemEditCategoryId   = $itemEditCategoriesRows["categoryId"];
                        $itemEditCategoryName = $itemEditCategoriesRows["name"];
                    ?>

                      <option value="<?php echo $itemEditCategoryId; ?>">
                          <?php echo $itemEditCategoryName; ?>
                      </option>
                      <?php } ?>

                </select>
            </div>
            <div class="form-group">
                <label for="edit_iDescription">Description</label>
                <textarea class="form-control rounded-0" id="edit_iDescription" name="edit_iDescription" rows="5"></textarea>
            </div>
            <input type="text" id="editItemId" name="editItemId" hidden="hidden" value="">
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="editItem" id="editItem" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" id="deleteItemId" style="display:none">
          Are you sure you want to delete the item?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button  name="deleteItem" id="deleteItem" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#messageModal">Yes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Rating Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="ratingForm" action="profile.php" method="post">
          <?php
              echo errorRatingMessage();
              echo successRatingMessage();
          ?>
        <div class="form-group">
          Leave a Rating for <?php echo getProfileUsername();?>
        </div>
        <div class="rating">
            <input type="radio" name="rating" value="5" id="5"><label style="font-size: 2.2vw;" for="5">☆</label>
            <input type="radio" name="rating" value="4" id="4"><label style="font-size: 2.2vw;" for="4">☆</label>
            <input type="radio" name="rating" value="3" id="3"><label style="font-size: 2.2vw;" for="3">☆</label>
            <input type="radio" name="rating" value="2" id="2"><label style="font-size: 2.2vw;" for="2">☆</label>
            <input type="radio" name="rating" value="1" id="1"><label style="font-size: 2.2vw;" for="1">☆</label>
        </div>
        <div class="form-group">
            <label for="comments">Comments</label>
            <textarea class="form-control rounded-0" id="comments" name="comments" rows="5"></textarea>
        </div>
        <input type="text" id="userRatedId" name="userRatedId" hidden="hidden" value="<?php echo getProfileUserId();?>">
        <input type="text" id="profile_username" name="profile_username" hidden="hidden" value="<?php echo getProfileUsername();?>">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="rate" id="rate" class="btn btn-primary">Rate</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>