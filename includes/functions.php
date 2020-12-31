<?php

  function redirect_to($New_Location){
    header("Location:".$New_Location);
    exit();
  }

  function login_Attempt($UserName,$Password){
    global $ConnectingDB;
    $sql = "SELECT * FROM USER WHERE username=:userName AND password=:passWord LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName',$UserName);
    $stmt->bindValue(':passWord',$Password);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result==1) {
      return $Found_Account=$stmt->fetch();
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

  function totalRequestsPending($userId){
    global $ConnectingDB;
    $sql = "SELECT requestId FROM request WHERE ownerId=:userId AND status='pending'";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userId',$userId);
    $stmt->execute();
    $result = $stmt->rowcount();
    echo $result;
  }

  function getUserAvatar($userId){
    global $ConnectingDB;
    $sql  = "SELECT p.name FROM user u inner join photo p on u.userId = p.userId WHERE u.userId = '$userId'";
    $stmt = $ConnectingDB->query($sql);
    $result= $stmt->fetch();
    return $result["name"];
  }
 
?>
