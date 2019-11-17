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
$customertype=mysqli_real_escape_string($mysqli,ucfirst($_POST['customertype']));

  
if(!$customertype){
echo " <div class=warning>OffenceName value must be entered!</div>";
}else{
$obj->addoffence($customertype, $mysqli);
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
    <td colspan="2"><div class="head">Add New Offence</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
       <tr>
    <td class="td2">Offence </td>
    <td>  <input name="customertype" type="text" class="textbox" /> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="Send" type="submit" id="Send" value="Add Offence" class="buttonclass"  />
      <span class="buttons">
      <input name="clear" type="reset" value="Clear" class="clearbutton" />
      </span></td>
  </tr>
</table>
</form>
</body>
</html>
