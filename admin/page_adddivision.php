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

$obj = new police();
$customertype=$_POST['customertype'];
$regid=$_POST['regid'];


  
if(!$regid){
echo " <div class=warning>Region value must be selected!</div>";
}elseif(!$customertype){
echo " <div class=warning>DivisionName value must be entered!</div>";
}else{
$obj->adddivision($regid,$customertype, $mysqli);
echo " <div class=success>Operation has succeeded!</div>";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Division</title>
</head>

<body>

<form action="" method="post" name="comp">
<table width="100%" border="0">
  <tr>
    <td colspan="2"><div class="head">Add New Division</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="td2">Region </td>
    <td>    <select name="regid" id="regid" class="select" >
      <option value="0">Select</option>
	  <option value="0">-----------------------</option><?php 
$table="tbl_region";
$test_query = "select * from $table";
$test_query = $mysqli->real_escape_string($test_query);
if($result = $mysqli->query($test_query)){
while ($row = $result->fetch_object()) { //only this is changed
echo "<option value=".$row->id."> ".$row->regname."</option>";
}
$result->close();
}else{ //check for error if query was wrong
 echo $mysqli->error;
}
//$mysqli->close();
	    ?>
         </select> </td>
  </tr>
       <tr>
    <td class="td2">Division </td>
    <td>  <input name="customertype" type="text" class="textbox" /> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="Send" type="submit" id="Send" value="Add Division" class="buttonclass"/>
      <span class="buttons">
      <input name="clear" type="reset" value="Clear" class="clearbutton" />
      </span></td>
  </tr>
</table>
</form>
</body>
</html>
