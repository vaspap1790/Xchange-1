<?php require_once("includes/db.php"); ?>
<?php require_once("includes/session.php"); ?>

<?php

  function redirect_to($New_Location){
    header("Location:".$New_Location);
    exit();
  }

  function login_Attempt($UserName,$password){
    global $ConnectingDB;
    $sql = "SELECT * FROM USER WHERE username=:userName LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName',$UserName);
    $stmt->execute();
    $result = $stmt->rowcount();
    if ($result==1) {
      $found_Account=$stmt->fetch();
      if(password_verify($password, $found_Account["password"])) {
        return $found_Account;
      }
    }else {
      return null;
    }
  }

  function confirm_Login(){
    if (isset($_SESSION["userId"])) {
      return true;
    }  else {
      return false;
    }
  }

  function check_if_logged_user_profile(){
    $searchParameters          = explode("&", $_SERVER['QUERY_STRING']);
    $firstSearchParameter      = explode("=", $searchParameters[0]);
    if(isset($firstSearchParameter[1]) ){
        $firstSearchParameterValue = $firstSearchParameter[1];
    }else{
        $firstSearchParameterValue = "No parameter";
    }

    if (confirm_Login() &&
     (strcmp($_SESSION["username"], $firstSearchParameterValue) == 0)){
        return true;
    }  else {
      return false;
    }
}

  function getProfileUsername(){
    $searchParameters          = explode("&", $_SERVER['QUERY_STRING']);
    $firstSearchParameter      = explode("=", $searchParameters[0]);
    if(isset($firstSearchParameter[1]) ){
        $firstSearchParameterValue = $firstSearchParameter[1];
    }else{
        $firstSearchParameterValue = "No parameter";
    }

    return $firstSearchParameterValue;
}

function getProfileUserId(){
  global $ConnectingDB;

  $searchParameters          = explode("&", $_SERVER['QUERY_STRING']);
  $firstSearchParameter      = explode("=", $searchParameters[0]);

  if(isset($firstSearchParameter[1]) ){
      $firstSearchParameterValue = $firstSearchParameter[1];
      $sql    = "SELECT userId FROM user WHERE username='" . $firstSearchParameterValue . "'";
      $stmt = $ConnectingDB->query($sql);
      $result= $stmt->fetch();
      $userId = $result['userId'];
  }

  return $userId;
}

  function getUserAvatar($userId){
    global $ConnectingDB;
    $sql  = "SELECT p.name FROM user u inner join photo p on u.userId = p.userId WHERE u.userId = '$userId'";
    $stmt = $ConnectingDB->query($sql);
    $result= $stmt->fetch();
    return $result['name'] ?? '';
  }

  function checkUsernameAvailability($username){
    global $ConnectingDB;
    $sql    = "SELECT username FROM user WHERE username=:username";
    $stmt   = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':username',$username);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result == 1) {
      return true;
    }else {
      return false;
    }
  }

  function totalRequestsPending($userId){
    global $ConnectingDB;
    $sql = "SELECT COUNT(*) FROM request WHERE ownerId =" . $userId . " AND status = 'pending'";
    $stmt = $ConnectingDB->query($sql);
    $totalRows= $stmt->fetch();
    $totalPosts=array_shift($totalRows);
    echo $totalPosts;
  }

  function totalRequestsAccepted($userId){
    global $ConnectingDB;
    $sql = "SELECT COUNT(*) FROM request WHERE ownerId =" . $userId . " AND status = 'accepted'";
    $stmt = $ConnectingDB->query($sql);
    $totalRows= $stmt->fetch();
    $totalPosts=array_shift($totalRows);
    echo $totalPosts;
  }

  function totalRequestsRejected($userId){
    global $ConnectingDB;
    $sql = "SELECT COUNT(*) FROM request WHERE ownerId =" . $userId . " AND status = 'rejected'";
    $stmt = $ConnectingDB->query($sql);
    $totalRows= $stmt->fetch();
    $totalPosts=array_shift($totalRows);
    echo $totalPosts;
  }
 
?>

<!-- Login -->
<?php 
  if (isset($_POST["submitLogin"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)||empty($password)) {

      $_SESSION["loginErrorMessage"]= "All fields must be filled out";
      redirect_to("index.php");

    }else {

      //code for checking username and password from Database
      $Found_Account = login_Attempt($username,$password);
      if ($Found_Account) {
        $_SESSION["userId"] = $Found_Account["userId"];
        $_SESSION["username"] = $Found_Account["username"];
        $_SESSION["loginMessage"] = false;

      }else {
        $_SESSION["loginErrorMessage"]="Incorrect Username/Password";
        redirect_to("index.php");
      }
    }
  }
?>

<!-- Logout -->
<?php
  if (isset($_POST["submitLogout"])) {

    $_SESSION["userId"] = null;
    $_SESSION["username"] = null;

    session_destroy();
    redirect_to("index.php");
  }
?> 

<!-- Register -->
<?php
  if(isset($_POST["submitRegister"])){

    $username        = $_POST["rUsername"];
    $email           = $_POST["email"];
    $password        = $_POST["rPassword"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    date_default_timezone_set("Europe/Athens");
    $currentTime = time();
    $dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);

    if (checkUsernameAvailability($username)) {
      $_SESSION["registerErrorMessage"] = "Username already exists. Try another one";
      redirect_to("index.php");
    }else{
      // Query to insert new admin in DB When everything is fine
      global $ConnectingDB;
      $sql = "INSERT INTO user(username,email,password,dateTime_) ";
      $sql .= "VALUES(:username,:email,:password,:dateTime)";

      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':username',$username);
      $stmt->bindValue(':email',$email);
      $stmt->bindValue(':password',$hashed_password);
      $stmt->bindValue(':dateTime',$dateTime);
      $Execute=$stmt->execute();

      if($Execute){

        $id = $ConnectingDB->lastInsertId();
        $sqlAvatar = "INSERT INTO `PHOTO` (`name`, `userId`, `categoryId`, `itemId`, `datetime_`) VALUES
        ('defaultAvatar.png', '$id', null, null, '$dateTime')";
        $ExecuteAvatar = $ConnectingDB->query($sqlAvatar);

        $_SESSION["registerSuccessMessage"] = "New User added successfully! Now you can login";
        redirect_to("index.php");
      }else {
        $_SESSION["registerErrorMessage"]= "Something went wrong. Try Again!";
        redirect_to("index.php");
      }
    }
  }
?>


<!-- Settings -->
<?php 
  if (isset($_POST["submitSettings"])) {

    $firstname     = $_POST["firstname"];
    $lastname      = $_POST["lastname"];
    $username      = $_POST["sUsername"];
    $email         = $_POST["sEmail"];
    $description   = $_POST["sDescription"];
    $country       = $_POST["country"];
    $address       = $_POST["address"];
    $image         = $_FILES["image"]["name"];
    $target        = "images/uploaded/".basename($_FILES["image"]["name"]);

    global $ConnectingDB;

    $sqlUser = "UPDATE user
    SET firstname=:firstname,
          lastname=:lastname, 
          username=:username, 
          email=:email, 
          country=:country, 
          address=:address, 
          description=:description
    WHERE userId=" . $_SESSION["userId"];

    $stmtUser = $ConnectingDB->prepare($sqlUser);
    $stmtUser->bindValue(':firstname', $firstname);
    $stmtUser->bindValue(':lastname', $lastname);
    $stmtUser->bindValue(':username', $username);
    $stmtUser->bindValue(':email', $email);
    $stmtUser->bindValue(':country', $country);
    $stmtUser->bindValue(':address', $address);
    $stmtUser->bindValue(':description', $description);

    $executeUser= $stmtUser->execute();

    if (!empty($image)) {
      $sqlPhoto = "UPDATE photo
              SET name =:image
              WHERE userId=" . $_SESSION["userId"];

      $stmtPhoto = $ConnectingDB->prepare($sqlPhoto);
      $stmtPhoto->bindValue(':image',$image);

      $executePhoto = $stmtPhoto->execute();
      move_uploaded_file($_FILES["image"]["tmp_name"], $target);
    }
  
    if($executeUser){
      $_SESSION["settingsSuccessMessage"] = "Settings updated successfully";
      redirect_to("index.php");
    }else {
      $_SESSION["settingsErrorMessage"] = "Something went wrong. Try Again !";
      redirect_to("index.php");
    }

  }
?>

<!-- Add Item -->
<?php 
  if (isset($_POST["addItem"])) {

    $username      = $_SESSION["username"];  
    $userId        = $_SESSION["userId"];  

    $name          = $_POST["item_name"];
    $categoryId    = $_POST["selectItemCategory"];
    $description   = $_POST["iDescription"];

    $image         = $_FILES["imageItem"]["name"];
    $target        = "images/uploaded/".basename($_FILES["imageItem"]["name"]);

    date_default_timezone_set("Europe/Athens");
    $currentTime = time();
    $dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);

    global $ConnectingDB;

    $sql = "INSERT INTO item(name, userId, categoryId, description, dateTime_) ";
    $sql .= "VALUES(:name, :userId, :categoryId, :description, :dateTime)";

    $stmt = $ConnectingDB->prepare($sql);

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':userId', $userId);
    $stmt->bindValue(':categoryId',$categoryId);
    $stmt->bindValue(':description',$description);
    $stmt->bindValue(':dateTime',$dateTime);

    $execute=$stmt->execute();

    if($execute){

      if(empty($image)){
        $image = "noPhoto.png";
      }

      $id = $ConnectingDB->lastInsertId();
      $sqlPhoto = "INSERT INTO `PHOTO` (`name`, `userId`, `categoryId`, `itemId`, `datetime_`) VALUES
      ('$image', null, null, '$id', '$dateTime')";
      $executePhoto = $ConnectingDB->query($sqlPhoto);
      move_uploaded_file($_FILES["imageItem"]["tmp_name"], $target);

      $_SESSION["addItemSuccessMessage"] = "New Item added successfully!";
      redirect_to("profile.php?username=" . $username);
    }else {
      $_SESSION["addItemErrorMessage"] = "Something went wrong. Try Again!";
      redirect_to("profile.php?username=" . $username);
    }
  }
?>

<!-- Edit Item -->
<?php 
  if (isset($_POST["editItem"])) {

    try{
      $username      = $_SESSION["username"];  

      $itemId        = $_POST["editItemId"];
      $name          = $_POST["edit_item_name"];
      $categoryId    = $_POST["edit_selectItemCategory"];
      $description   = $_POST["edit_iDescription"];

      $image         = $_FILES["editImageItem"]["name"];
      $target        = "images/uploaded/".basename($_FILES["editImageItem"]["name"]);

      global $ConnectingDB;

      $sql = "UPDATE item SET name=:name, categoryId=:categoryId, description=:description
      WHERE itemId=" . $itemId;

      $stmt = $ConnectingDB->prepare($sql);

      $stmt->bindValue(':name', $name);
      $stmt->bindValue(':categoryId', $categoryId);
      $stmt->bindValue(':description', $description);

      $execute=$stmt->execute();

      $sqlFetchPhotoName = "SELECT name FROM photo WHERE itemId=" . $itemId;
      $stmtFetchPhotoName = $ConnectingDB->query($sqlFetchPhotoName);
      $fetchedPhoto= $stmtFetchPhotoName->fetch();
      $fetchedPhotoName = $fetchedPhoto['name'];

      if($fetchedPhotoName != $image && !empty($image)){
        $sqlPhoto = "UPDATE photo
        SET name =:image
        WHERE itemId=" . $itemId;

        $stmtPhoto = $ConnectingDB->prepare($sqlPhoto);
        $stmtPhoto->bindValue(':image',$image);

        $executePhoto = $stmtPhoto->execute();
        move_uploaded_file($_FILES["editImageItem"]["tmp_name"], $target);
      }   

      $_SESSION["editItemSuccessMessage"] = "Item Updated successfully";
      redirect_to("profile.php?username=" . $username);

    }catch(Exception $e){
      $_SESSION["editItemErrorMessage"] = "Something went wrong. Try again";
      redirect_to("profile.php?username=" . $username);
    }

  }
?>

<!-- Leave a Rating -->
<?php 
  if (isset($_POST["rate"])) {

    global $ConnectingDB;

    $userRatingId = $_SESSION["userId"];  

    $rating       = $_POST["rating"];
    $userRatedId  = $_POST["userRatedId"];
    $username     = $_POST["profile_username"];
    $comments     = $_POST["comments"];

    date_default_timezone_set("Europe/Athens");
    $currentTime = time();
    $dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);

    $sqlFetchRating = "SELECT * FROM rating WHERE userRatedId=" . $userRatedId . " AND userRatingId=" . $userRatingId;
    $stmtFetchRating = $ConnectingDB->query($sqlFetchRating);
    $result = $stmtFetchRating->rowcount();

    if ($result == 1) {

      $sql = "UPDATE rating SET rating=:rating, comments=:comments, dateTime_=:dateTime 
      WHERE userRatedId=" . $userRatedId . " AND userRatingId=" . $userRatingId;
  
      $stmt = $ConnectingDB->prepare($sql);
  
      $stmt->bindValue(':rating', $rating);
      $stmt->bindValue(':comments', $comments);
      $stmt->bindValue(':dateTime', $dateTime);
  
      $execute=$stmt->execute();
  
      if($execute){
        $_SESSION["ratingSuccessMessage"] = "Rating added successfully";
        redirect_to("profile.php?username=" . $username);
      }else {
        $_SESSION["ratingErrorMessage"] = "Something went wrong. Try Again!";
        redirect_to("profile.php?username=" . $username);
      }

    }else {
      
      $sql = "INSERT INTO rating(rating, comments, userRatedId, userRatingId, dateTime_) ";
      $sql .= "VALUES(:rating, :comments, :userRatedId, :userRatingId, :dateTime)";
  
      $stmt = $ConnectingDB->prepare($sql);
  
      $stmt->bindValue(':rating', $rating);
      $stmt->bindValue(':comments', $comments);
      $stmt->bindValue(':userRatedId', $userRatedId);
      $stmt->bindValue(':userRatingId', $userRatingId);
      $stmt->bindValue(':dateTime', $dateTime);
  
      $execute=$stmt->execute();
  
      if($execute){
        $_SESSION["ratingSuccessMessage"] = "Rating added successfully";
        redirect_to("profile.php?username=" . $username);
      }else {
        $_SESSION["ratingErrorMessage"] = "Something went wrong. Try Again!";
        redirect_to("profile.php?username=" . $username);
      }

    }
  }
?>

