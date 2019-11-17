<?php include('../db_connect.php');
if(isset($_POST['send'])){
$id=$_POST['id'];
$today=date('Y-m-d');
$g="select * from tbl_flagcase where  id='$id' ";
$gr=mysqli_query($mysqli, $g) or die(mysqli_error()); $nrow=mysqli_num_rows($gr);
 $r=mysqli_fetch_array($gr);
$fid=$r['id'];
$no=$r['flagno'];
$start=$r['startdate'];
 $end=$r['enddate'];
 
//then delete from items table
$qdelete="update tbl_flagcase set enddate='$today' where  id='$id'";
$result=mysqli_query($mysqli, $qdelete) or die(mysqli_error());

echo "<script language=javascript>alert('Flag#: [ $no ] has been deleted successfully!')</script>";
 echo "<meta http-equiv=Refresh content=1;url=../api.php?action=page&icon=flag&t=InquiryDetails>";

}
?>