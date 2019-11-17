<script type="text/javascript" src="js/controls.js"></script>
 
<?php
if(isset($_POST['Send'])){

$obj = new ca();
$countryid=$_POST['companyid'];
$name=mysqli_real_escape_string($mysqli,ucwords($_POST['name']));
$address=mysqli_real_escape_string($mysqli,ucfirst($_POST['address']));
$contact=$_POST['contact'];
$email= $_POST['email']; 
$district=$_POST['districtid'];
$latitude=$_POST['lat'];
$longitude=$_POST['long'];

if(!$countryid){
echo " <div class=warning>Country value must be selected!</div>";
}elseif(!$name){
echo " <div class=warning>Name value must be entered!</div>";
}elseif(!$address){
echo " <div class=warning>Address value must be entered!</div>";
}elseif(!$contact){
echo " <div class=warning>Contact value must be entered!</div>";
}elseif(!$district){
echo " <div class=warning>District value must be selected!</div>";
}elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
  echo "<div class=warning>Add a valid e-mail address </div>";
}else{
$obj->addCa($countryid,$name,$address,$contact,$email,$district,$latitude,$longitude, $mysqli);
echo " <div class=success>Operation has succeeded!</div>";
}
 
}
  
?>
<form action="" method="post" name="branches">
 

<table width="100%" border="0">
  <tr>
    <td colspan="2"><div class="head">Add New CA</div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td class="td2"> Country:</td>
    <td>  <select name="companyid" id="companyid" class="select">
      <option value="0">Select</option>
	  <option value="0">-----------------------</option><?php 
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
//$mysqli->close();
	    ?>
         </select>   </td>
  </tr>
  <tr>
    <td> Conservation Area:</td>
    <td><input name="name" type="text" id="name" class="textbox" style="text-transform:uppercase;" placeholder="Enter CA"   autocomplete="off"  required="required"/></td>
  </tr>
  <tr>
    <td valign="top"> District </td>
    <td>
    <select name="districtid" id="districtid" class="select">
      <option value="0">Select</option>
	  <option value="0">--------------------</option><?php
$table="tbl_district";
$test_query = "select * from $table order by name";
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
         </select>         </td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><input name="address" type="text" id="address" class="textbox" title="Enter address"   autocomplete="off"  required="required"  placeholder="Enter address"/></td>
  </tr>
  <tr>
    <td> Contact:</td>
    <td><input name="contact" type="text" id="contact" value="" class="fone" title="Enter phone contact" maxlength="10"  autocomplete="off"   placeholder="774400003"/><span id="errcontact"></span></td>
  </tr>
  <tr>
    <td> Email:</td>
    <td><input name="email" type="text" id="email" class="email" title="Enter email address"  pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$"  autocomplete="off"  required="required"  placeholder="xxx@domain.com"/></td>
  </tr>
  <tr>
    <td>Latitude:</td>
    <td><input name="lat" type="text" id="lat" class="textbox" title="Enter latitude"    autocomplete="off"  required="required"  placeholder="Enter Latitude"/></td>
  </tr>
  <tr>
    <td>Longitude:</td>
    <td><input name="long" type="text" id="long" class="textbox" title="Enter longitude"   autocomplete="off"  required="required"  placeholder="Enter Longitude"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="Send" type="submit" id="Send" value="Add CA"  class="buttonclass"/>
      <input type="reset" name="Reset" value="Clear"class="clearbutton" />	 
       <input name="Refresh" type="submit" id="Refresh" value="Refresh" class="refreshbutton" /></td>
  </tr>
</table>
</form>
