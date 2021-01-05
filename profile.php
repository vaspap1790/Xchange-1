<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
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
    
    <div class="w3-sidebar w3-bar-block" style="width:25%">
    <div class="container">
    <div class="card" style="width:250px">
    <img class="card-img-top" src="images/uploaded/avatarVP.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><h3>vaspap1790<br></h3>
      <p class="card-text">Vasilis Papadimitrakopoulos<br>vaspap1790@gmail.com<br>
      <h3>About Me</h3>Lorem ipsum dolor sit amet.</p>
      
                           
                        <hr>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <hr>
                        <a href="#" class="btn btn-primary">Add New Item</a>
   </div>
</div> 
</div>
</div>
  
    <!---Item Card -->
 


  
<div class="container" style="margin-left:25%">
  <div class="row">
     <div class="col-sm-4">
    <img class="card-img-top" src="images/uploaded/book2.jpg" alt="" width="260" height="195">
            <div class="card-body">        
                <div><small>Uploaded in 01.01.2021</small></div>
                <div>by <a> eefe1 </a></div>
                <div class="rating">
                    <span style="font-size: x-small; margin-top: 1.6%;">(25) </span>
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
                <hr style="margin-top: 0;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur. </p>                            
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Exchange
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Edit
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Delete
                </button>
                </div>
    </div>
    <div class="col-sm-4">
    <img class="card-img-top" src="images/uploaded/book2.jpg" alt="" width="260" height="195">
            <div class="card-body">        
                <div><small>Uploaded in 01.01.2021</small></div>
                <div>by <a> eefe1 </a></div>
                <div class="rating">
                    <span style="font-size: x-small; margin-top: 1.6%;">(25) </span>
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
                <hr style="margin-top: 0;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur. </p>                            
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Exchange
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Edit
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Delete
                </button>
                </div>
    </div>
    <div class="col-sm-4">
    <img class="card-img-top" src="images/uploaded/book2.jpg" alt="" width="260" height="195">
            <div class="card-body">        
                <div><small>Uploaded in 01.01.2021</small></div>
                <div>by <a> eefe1 </a></div>
                <div class="rating">
                    <span style="font-size: x-small; margin-top: 1.6%;">(25) </span>
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
                <hr style="margin-top: 0;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur. </p>                            
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Exchange
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Edit
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Delete
                </button>
                </div>
    </div>
    <div class="col-sm-4">
    <img class="card-img-top" src="images/uploaded/book2.jpg" alt="" width="260" height="195">
            <div class="card-body">        
                <div><small>Uploaded in 01.01.2021</small></div>
                <div>by <a> eefe1 </a></div>
                <div class="rating">
                    <span style="font-size: x-small; margin-top: 1.6%;">(25) </span>
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
                <hr style="margin-top: 0;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur. </p>                            
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Exchange
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Edit
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Delete
                </button>
                </div>
    </div>

    <div class="col-sm-4">
    <img class="card-img-top" src="images/uploaded/book2.jpg" alt="" width="260" height="195">
            <div class="card-body">        
                <div><small>Uploaded in 01.01.2021</small></div>
                <div>by <a> eefe1 </a></div>
                <div class="rating">
                    <span style="font-size: x-small; margin-top: 1.6%;">(25) </span>
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
                <hr style="margin-top: 0;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur. </p>                            
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Exchange
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Edit
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Delete
                </button>
                </div>
    </div>
    <div class="col-sm-4">
    <img class="card-img-top" src="images/uploaded/book2.jpg" alt="" width="260" height="195">
            <div class="card-body">        
                <div><small>Uploaded in 01.01.2021</small></div>
                <div>by <a> eefe1 </a></div>
                <div class="rating">
                    <span style="font-size: x-small; margin-top: 1.6%;">(25) </span>
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
                <hr style="margin-top: 0;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, consequuntur. </p>                            
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Exchange
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Edit
                </button>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#requestModal">
                    Delete
                </button>
                </div>
                
    </div>
  </div>
</div>
</div>


    
     
<!---Item Card Finish-->

    <!--- Footer -->
    <?php require_once("footer.php"); ?>

    <!--- Script Source Files -->
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            navbarToggleSidebar();
            navActivePage();
        });
    </script> -->
    <!-- <script type="text/javascript" src="./main.85741bff.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script> 
    <script src="js/custom.js"></script>
    <script src="js/profile.js"></script>
    <!--- End of Script Source Files -->

</body>

</html>