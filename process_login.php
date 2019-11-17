<?php
 @session_start();
//include('Connections/connection.php');
include('db_connect.php');
include 'functions.php';
//sec_session_start();  // Our custom secure way of starting a php session. 

if(isset($_POST['username'], $_POST['password'])) { 
   $uname = $_POST['username'];
   $password = $_POST['password']; // The hashed password.
   if(login($uname, $password, $mysqli) == true) {
      // Login success
/*   --------------------------------------------------------------------------------------------     */ 
$type=  $_SESSION['utype'];
$branch=  $_SESSION['branchid'];
$check=mysqli_query($mysqli, "select name from usertype where id='$type' "); $gt=mysqli_fetch_array($check);
$cnty=mysqli_query($mysqli, "select * from users where username='$uname' "); $ct=mysqli_fetch_array($cnty);
$agen=mysqli_query($mysqli, "select countryid from tbl_agency where id='".$ct['agencyid']."' "); $at=mysqli_fetch_array($agen);
$_SESSION['country']= $at['countryid'];
$_SESSION['agency']= $ct['agencyid'];
/*   --------------------------------------------------------------------------------------------     */ 
if($gt['name']=='Admin'){
echo 'Success: You have been logged in!';
$_SESSION['success']="Success: You have been logged in!";
include('admin/refresh.php');
echo "<meta http-equiv=refresh content=1;url=admin.php?exploiter=$uname>";
}	  
/*   --------------------------------------------------------------------------------------------     */ 
if($gt['name']=='Clerk'){
echo 'Success: You have been logged in!';
$_SESSION['success']="Success: You have been logged in!";
//include('admin/refresh.php');
echo "<meta http-equiv=refresh content=1;url=clerk.php?exploiter=$uname>";
}	  
/*   --------------------------------------------------------------------------------------------     */
if($gt['name']=='Api'){
echo 'Success: You have been logged in!';
$_SESSION['success']="Success: You have been logged in!";
include('admin/refresh.php');
echo "<meta http-equiv=refresh content=1;url=api.php?exploiter=$uname>";
}	  
/*   --------------------------------------------------------------------------------------------     */ 
   } else {
      // Login failed
	  echo "login failed";
	  $_SESSION['fail']="Login fail";
      echo "<meta http-equiv=refresh content=0;url=index.php?error=1>"; 
	  exit(); 
   }
} else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
   echo "<meta http-equiv=refresh content=0;url=index.php?error=1>";
   exit();
}

?>
