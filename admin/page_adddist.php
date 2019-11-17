<script type="text/javascript" src="js/controls.js"></script>
<script type="text/javascript">
 function AllowAlphabet(){
               if (!dpt.dname.value.match(/^[a-zA-Z ]+$/) && dpt.dname.value !="")
               {
                    dpt.dname.value="";
                    dpt.dname.focus(); 
                    alert("Please Enter only alphabets in text");
               }
} 
</script>

<?php
 // calling method/function
if(isset($_POST['Send'])){

$obj = new departments();
$distname=mysqli_real_escape_string($mysqli,ucwords($_POST['dname']));
$countryid=$_POST['countryid'];
$chk=mysqli_query($mysqli, "select * from tbl_district where name='$distname' and  country='$countryid'  ");$nrow=mysqli_num_rows($chk); 
if($nrow){ 
echo " <div class=error>District Name already exists!</div>";
}else{
if(!$countryid){
echo " <div class=warning>Country value must be selected!</div>";
}elseif(!$distname){
echo " <div class=warning>DistrictName value must be entered!</div>";
}else{
$save = $obj->adddistrict($distname,$countryid, $mysqli);
echo " <div class=success>Operation has succeeded!</div>";
}
}//---------
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>District</title>
</head>

<body>

<form action="" method="post" name="dpt" id="dpt">
<table width="100%" border="0">
  <tr>
    <td colspan="2"><div class="head">Add New District</div></td>
  </tr>
  <tr>
    <td>Country:</td>
    <td><select name="countryid" id="countryid" class="select">
      <option value="0">Select</option>
      <option value="0">--------------------</option>
      <?php 
$table="tbl_country";
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
$mysqli->close(); 
	    ?>
    </select></td>
  </tr>
  <tr>
    <td>District Name </td>
    <td><input name="dname" type="text" id="dname" class="textbox" onKeyUp="AllowAlphabet()" style="text-transform:capitalize;" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="Send" type="submit" id="Send" value="Add District" class="buttonclass" />
	<input type="reset" name="Reset" value="Clear"class="clearbutton" />	
	<input type="submit" value="Refresh"  onclick="window.location='admin.php?action=page&icon=adddepart&t=Departments';" class="refreshbutton"/>      </td>
  </tr>
</table>
</form>

</body>
</html>
