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
    $Result = $stmt->rowcount();
    echo $Result;
  }

  // function CheckUserNameExistsOrNot($UserName){
  //   global $ConnectingDB;
  //   $sql    = "SELECT username FROM admins WHERE username=:userName";
  //   $stmt   = $ConnectingDB->prepare($sql);
  //   $stmt->bindValue(':userName',$UserName);
  //   $stmt->execute();
  //   $Result = $stmt->rowcount();
  //   if ($Result==1) {
  //     return true;
  //   }else {
  //     return false;
  //   }
  // }

  // function TotalPosts(){
  //   global $ConnectingDB;
  //   $sql = "SELECT COUNT(*) FROM posts";
  //   $stmt = $ConnectingDB->query($sql);
  //   $TotalRows= $stmt->fetch();
  //   $TotalPosts=array_shift($TotalRows);
  //   echo $TotalPosts;
  // }

  // function TotalCategories(){
  //   global $ConnectingDB;
  //   $sql = "SELECT COUNT(*) FROM category";
  //   $stmt = $ConnectingDB->query($sql);
  //   $TotalRows= $stmt->fetch();
  //   $TotalCategories=array_shift($TotalRows);
  //   echo $TotalCategories;
  // }

  // function TotalAdmins(){
  //   global $ConnectingDB;
  //   $sql = "SELECT COUNT(*) FROM admins";
  //   $stmt = $ConnectingDB->query($sql);
  //   $TotalRows= $stmt->fetch();
  //   $TotalAdmins=array_shift($TotalRows);
  //   echo $TotalAdmins;

  // }

  // function TotalComments(){
  //   global $ConnectingDB;
  //   $sql = "SELECT COUNT(*) FROM comments";
  //   $stmt = $ConnectingDB->query($sql);
  //   $TotalRows= $stmt->fetch();
  //   $TotalComments=array_shift($TotalRows);
  //   echo $TotalComments;
  // }

  // function ApproveCommentsAccordingtoPost($PostId){
  //   global $ConnectingDB;
  //   $sqlApprove = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON'";
  //   $stmtApprove =$ConnectingDB->query($sqlApprove);
  //   $RowsTotal = $stmtApprove->fetch();
  //   $Total = array_shift($RowsTotal);
  //   return $Total;
  // }

  // function DisApproveCommentsAccordingtoPost($PostId){
  //   global $ConnectingDB;
  //   $sqlDisApprove = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='OFF'";
  //   $stmtDisApprove =$ConnectingDB->query($sqlDisApprove);
  //   $RowsTotal = $stmtDisApprove->fetch();
  //   $Total = array_shift($RowsTotal);
  //   return $Total;
  // }
 
?>
