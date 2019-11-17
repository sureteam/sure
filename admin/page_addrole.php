<?php
include("Connections/connection.php");
?>
<?php


//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {

 //insert into table
//$item = trim(strtoupper($_POST['item']));


$role=mysqli_real_escape_string($mysqli,strtoupper($_POST['role']));
$purpose=mysqli_real_escape_string($mysqli,ucfirst($_POST['purpose'])); 
 $rdate=mysqli_real_escape_string($mysqli,$_POST['rdate']);
 if(!$role){
echo " <div class=warning>Role value must be entered!</div>";
}elseif(!$purpose){
echo " <div class=warning>Purpose value must be entered!</div>";
}else{
 $chk=mysqli_query("select * from privileges where role='$role'");$count_c=mysqli_num_rows($chk);
if($count_c){
echo "<div class=error>$role already exists in the database, Sorry save can not be activated.</div>";
}else{		 
$obj = new admin();
$obj->addroles($role,$purpose,$rdate, $mysqli);
echo " <div class=success>Operation has succeeded!</div>";
echo "<meta http-equiv=Refresh content=1;url=admin.php?action=page&icon=addrole&t=users>";	
}
 }
}
 
?>
 
<form class="cmxform" id="signupForm" method="post" action="" enctype="multipart/form-data">
<?php 
$now=date("Y-m-d"); ?>
	<input name="rdate" type="hidden" value="<?php echo $now; ?>">
<table width="100%" class="tablesbr">

<tr>
  <td colspan="2"><div class="head">Add New Role</div></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
    <td width="150">Role Name</td>
    <td>
    <input name="role" type="text" class="textbox" style="text-transform:uppercase; ">        </td>
  </tr>
  
  <tr>
    <td>Purpose:</td>
    <td><input name="purpose" type="text" class="textbox" style="text-transform:capitalize;"> </td>
  </tr>
   
  <tr>
    <td>&nbsp;</td>
    <td>
      
       	<input name="Submit" type="submit" value="Add Role" class="buttonclass"> <span class="buttons">
       	<input name="clear" type="reset" value="Clear" class="clearbutton" />
        <input name="submit" type="submit" class="refreshbutton"  onclick="window.location='admin.php?action=page&icon=addrole&t=roles';" value="Refresh"/>
        </span></td>
  </tr>
</table>
<br />
<br />
</form>

<table width="100%" border="0" class="view">
<thead>
  <tr>
    <th>&nbsp;</th>
    <th>Role</th>
    <th>Purpose;</th>
    </tr>
</thead>
<?php
 $chk=mysqli_query($mysqli, "select * from privileges order by id desc "); //limit 0,5 
 while($tk=mysqli_fetch_array($chk)){
 $id=$tk['id'];
 ?>
<tbody>
  <tr>
   <td width="10"><a href="#" onClick="ajaxwin=dhtmlwindow.open('ajaxbox', 'ajax', 'admin/<?php echo "removerole.php?id=$id";  ?>', '<?php echo "Remove role ";  ?>', 'width=650px,height=150px,center=1px,top=200px,resize=0,scrolling=1'); return false"> 
		 <img src="images/Delete.gif" title="Remove privilege" /></a></td>
    <td> <?php  echo  $tk['role']; ?></td>
    <td><?php  echo  $tk['purpose'];?></td>
    </tr>
  <?php  }  ?>
  </tbody>
</table>

 