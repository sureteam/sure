<style type="text/css">
 .error{
color:#FF0000;
font-size:10px;
}
</style>
<?php
@session_start();
//require_once('Connections/connection.php'); 
include 'functions.php';
$today=date('Y-m-d');
$time=date('g:i A'); 
//include 'safedb.php'; 
include('db_connect.php');
$type= $_SESSION['utype'] ;
$username = $_SESSION['username'];
$branchid=  $_SESSION['branchid'];
$country=  $_SESSION['country'];
$agency=  $_SESSION['agency'];
$agen=mysqli_query($mysqli, "select name from tbl_country where id='".$country."' "); $at=mysqli_fetch_array($agen);
$bra=mysqli_query($mysqli, "select branchname from tbl_branch where id='$branchid' "); $bt=mysqli_fetch_array($bra);
// Include database connection and functions here.
if(login_check($mysqli) == true) {
   // Add your protected page content here! 
 }else{
   echo '<div class=error>You are not authorized to access this page, please login. </div>';
   echo "<meta http-equiv=refresh content=3;url=index.php>";
   exit();
}
include('class.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="icon" href="images/uwa-1.png" >

<link href="css/css.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/master_green.css" rel="stylesheet" type="text/css" media="screen" />

 <link href="css/views.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/edit_forms.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/errors.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="css/gridview.css" type="text/css" />
<link rel="stylesheet" href="windowfiles/dhtmlwindow.css" type="text/css" />
<script type="text/javascript" src="windowfiles/dhtmlwindow.js"></script>

<!--<script type="text/javascript" src="js/jquery-1.2.3.min.js"></script> -->
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/pushmenu.js"></script>
<script type="text/javascript" src="js/styleswitch.js" ></script>
<script type="text/javascript" src="js/jquery-fns.js"></script>
<script type="text/javascript" src="js/controls.js"></script>

<script type="text/javascript" src="tcal.js"></script>
<link rel="stylesheet" href="tcal.css" type="text/css" />
<link rel="stylesheet" href="css/fieldsets.css" type="text/css" />
   <script type="text/javascript" language="JavaScript" src="js/registration.js"></script>
  <script type="text/javascript" src="js/firstLetter.js"></script>
    <script src="js/onlychar.js" type="text/javascript"></script>
 <script src="js/money.js" type="text/javascript"></script>
  <script src="js/onlynumbers.js" type="text/javascript"></script> 
<?php
include("incs/js.php");?>
 <script type="text/javascript" language="JavaScript" src="../js/registration.js"></script>
<title>Wildlife Offenders Tracking System | Designed by SURETEAM</title>
</head>

<body onLoad="document.registration.username.focus();">
 
<div id="page">
<div id="top-row">
	<div id="logo-area">
		<div id="logo-in"></div>
	</div>
	<div id="top-menu">
	</div>
	<div id="top-menu-right">
	<div id="themes">
          <ul>
				<li><?php echo "UID: <b>".strtolower($username)."</b> Logged in: <b>". strtolower($at['name'])."</b> "; ?></li>
				<li><a href="javascript:chooseStyle('none', 60)" checked="checked"><img src="images/green.gif" /></a></li>
				<li><a href="javascript:chooseStyle('themeblue', 60)"><img src="images/blue.gif" /></a></li>
			</ul>
        </div><!--themes-->
	</div>
	<div class="clear"></div>
</div>
 
<div id="spacer">
   
</div>

 

<div id="WrapContent">
 
    <div id="first-column">
	<div id="first-columninner">
	<div id="Navleft">
		  <div class="innerleft">
             <div id="accordion2">
              <?php include("incs/admin_sidemenu.php");?>   
             </div><!--Accordion 2--->
 		  </div><!--End inner left-->
		  </div><!--Nav Left-->
	</div>
	 </div><!--end first column-->
	 
	<div id="content">
	<?php include("incs/admin_content.php");?>
	</div>
	<div class="clear"></div>
	
</div><!--end WrapperContent-->

</div><!--end page-->
 
 
<div id="footer">
 
&copy; Copyright WLOS. All Rights Reserved.
<div id="footer-in">  Designed by TEAMSURE</div>
</div>
<div class="clear"></div>



           
  
 	 
	 
	 
 <script type="text/javascript">
var slider2=new accordion.slider("slider2");
slider2.init("slider2",0,"open");
</script>
</body>
</html>
