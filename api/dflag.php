  <link href="../css/tables.css" rel="stylesheet" type="text/css" media="screen" />
 <?php include('../db_connect.php');  
$caseno=$_GET['flagno'];
$id=$_GET['id']; ?>

<form action="api/delf.php" method="post" name="add">
<?php
$today=date('Y-m-d');
// get the names of the items
$g="select * from tbl_flagcase where  flagno='$caseno' ";
$gr=mysqli_query($mysqli, $g) or die(mysqli_error()); $nrow=mysqli_num_rows($gr);
while($r=mysqli_fetch_array($gr)){
$fid=$r['id'];
$no=$r['flagno'];
$start=$r['startdate'];
$end=$r['enddate'];
}
//-------------------------------
include('../days.php');
$diffs= dateDiff($start, $end);
$remainingdays = dateDiff($today, $end);
//---------------------------------------------- 
 
 ?>
 
</p>
<center>
<table  >
  <tr class="removetable-tr" style="font-weight:bold;">
    <th colspan="3"><center><img src="images/uwa-1.png" /></center></th>
    </tr>
	</table>
	<hr />
	<table  class="ptable">
  <tr >
    <td  >Created on: [<?php echo $start; ?> ] <input name="id" type="hidden" value="<?php echo $fid; ?>" /></td>
    </tr>
  <tr >
    <td  >Expiring on: [<?php echo $end; ?> ] </td>
  </tr>
  <tr >
    <td  ><input name="send" type="submit" id="send" value="Terminate" class="clearbutton" onclick="return confirm('Are you sure you want to termnate the flag?')" /></td>
  </tr>
</table>
</center>

 

 
</form>
 
<div id="footer">
&copy; Copyright WOTS. All Rights Reserved.
<div id="footer-in">  Designed by TEAMSURE</div>
</div>
