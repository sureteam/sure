<style>
.infowindow{
text-align:left;
font-size:22px;
}
 </style>
   <style>
        BODY {font-family : Verdana,Arial,Helvetica,sans-serif; color: #000000;  ; }
 
        #map { width:99%; height: 100%; z-index: 0; border:#333399 solid 2px; }
		#legend {
    font-family: Arial, sans-serif;
    background: #fff;
    padding: 10px;
    margin: 10px;
    border: 3px solid #000;
  }
   </style>

<title>Flagship</title>

<table width="100%">
        <tr>
		<td class=""><form action="" method="post" name="search" id="search">
		  <span class="td2">
		  <select name="byEntity" id="byEntity" class="searchselect" required="required">
            <option value="0">Select Entity</option>
            <option value="0">-----------------------</option>
            <?php 
$table="tbl_entities";
$test_query = "select * from $table";
$test_query = $mysqli->real_escape_string($test_query);
if($result = $mysqli->query($test_query)){
while ($row = $result->fetch_object()) { //only this is changed
echo "<option value=".$row->id."> ".$row->name."</option>";
}
$result->close();
}else{ //check for error if query was wrong
 echo $mysqli->error;
}
//$mysqli->close();
	    ?>
          </select>
		  <input name="byname" type="text" id="byname" class="searchbox" placeholder="Enter name to search" required/>
		  </span>
		  <input name="goEntity" type="submit" class="searchclass" id="goEntity" value="Go" />
		  </form></td>
		</tr>
        <tr>
          <td class="">&nbsp;</td>
        </tr>
</table>
 <hr />
 
	<?php 
if(isset($_POST['goEntity'])){

$search = mysqli_real_escape_string($mysqli, ($_POST['byEntity']));
$search2 = mysqli_real_escape_string($mysqli, ($_POST['byname']));
$today_1 = date('Y-m-d');
$show=mysqli_query($mysqli, "select * from tbl_flag where entityid = '".$search."' and comment like '%".$search2."%' ");  
$cnt=mysqli_num_rows($show);
while($x=mysqli_fetch_assoc($show)){
 
 $catid=$x['id'];
$flagdate=$x['flagdate'];
$entityid=$x['entityid'];
$comment=$x['comment'];
$flagtime=$x['flagtime'];
$agencyid=$x['agencyid'];
$flagno = $x['flagno'];
//---------------------------------------------------------------------------------------------
$aggy=mysqli_query($mysqli, "select * from tbl_agency where  id = '".$agencyid."' ");$yx=mysqli_fetch_assoc($aggy);
//---------------------------------------------------------------------------------------------

 
/**/
$query="select * from tbl_flagcase where flagno = '".$flagno."' "; 
$result=mysqli_query($mysqli, $query);
$num=mysqli_num_rows($result);
while($rows=mysqli_fetch_assoc($result))
{
$start = $rows['startdate'];
$end = $rows['enddate'];
}
 
//-------------------------------
include('days.php');
$diffs= dateDiff($start, $end);
$remainingdays = dateDiff($today, $end);
//----------------------------------------------

if($remainingdays <=0){
 echo "<script language=javascript>alert('No Flag raised is associated with the searched criteria!')</script>";
 echo " <div class=error>No Flag raised is associated with the searched criteria!</div>";
 echo "<center><a href='api.php?action=page&icon=flag&t=InquiryDetails' title='Click to add a flag!'><img src='images/flg.png' width='16' height='16'/> <h5>Create a flag?</h5></a></center>";
 exit();
}

if($today < $start){
 echo "<script language=javascript>alert('No Flag raised is associated with the searched !')</script>";
 echo " <div class=error>No Flag raised is associated with the searched criteria!</div>";
 echo "<center><a href='api.php?action=page&icon=flag&t=InquiryDetails' title='Click to add a flag!'><img src='images/flg.png' width='16' height='16'/> <h5>Create a flag?</h5></a></center>";
exit();
} 


if($cnt){
 echo "<script language=javascript>alert('Yes. You have hit a positive!')</script>";
  echo " <div class=success>Yes. You have hit a positive!</div>";
 
?>
	<table class="ptable"  width="80%">
      <thead>
        <tr>
          <th colspan="2"><?php echo "<div class=blink_me><img src='images/flg.png' width='16'  height='16'/></div>"; ?><font size="2">This information was flagged on [ <font color="#FF0000">
            <?php  echo $start; ?>
          </font> ]. It has [ <font color="#FF0000"><?php echo $remainingdays; ?> </font> ] day(s) to expire.</font></th>
        </tr>
        <tr>
          <th>Track#</th>
          <td><font size="2"><font color="#FF0000"><?php echo $flagno; ?></font></font></td>
        </tr>
        <tr>
          <th>Agency</th>
          <td><font size="2"><font color="#FF0000"><?php echo $yx['name']; ?></font></font></td>
        </tr>
        <tr>
          <th>Contact</th>
          <td><font size="2"><font color="#FF0000"><?php echo $yx['contact']; ?></font></font></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><font size="2"><font color="#FF0000"><?php echo strtolower($yx['email']); ?></font></font></td>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

<?php }else{ 
echo "<center><a href='api.php?action=page&icon=flag&t=InquiryDetails' title='Click to add a flag!'><img src='images/flg.png' width='16' height='16'/> <h5>Create a flag?</h5></a></center>";
}//else count
}
}
?>
<br>
  
 	
 