

<?php
 // calling method/function
if(isset($_POST['Send'])){

$obj = new country();
$companyname= mysqli_real_escape_string($mysqli,ucwords ($_POST['companyname']));
 
  
if(!$companyname){
echo " <div class=warning>CompanyName value must be entered!</div>";
}else{
$obj->addcountry($companyname, $mysqli);
echo " <div class=success>Operation has succeeded!</div>";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Company</title>
</head>

<body>

<form action="" method="post" name="comp">
<table width="100%" border="0" >
  <tr>
    <td colspan="2"><div class="head">Add New Country</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="tdy">Country Name </td>
    <td>  <input name="companyname" type="text" class="textbox" required="required" style="text-transform:capitalize;"/> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="Send" type="submit" id="Send" value="Add Country"    class="buttonclass" /></td>
  </tr>
</table>
</form>
</body>
</html>
 