


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Privileges</title>
<style type="text/css">
.listbx { border:2px solid #ccc; width:300px; height: 200px; overflow-y: scroll; }
</style>

</head>

<body>

<form class="semantic" action="" method="post" id="perm" name="perm" >
  
 <table width="100%">
   <tr>
     <td colspan="3"><div class="head">Assign user privileges</div></td>
   </tr>
   <tr>
     <td colspan="3">&nbsp;</td>
    </tr>
   <tr>
     <td>Group</td>
     <td>User</td>
     <td>Privileges</td>
   </tr>
   <tr><td valign="top"><select name="usertype" size="10" class="listbox" id="usertype" onchange="javascript:perm.submit();" >
     <option value="Default"></option>
     <?php $prop=mysqli_query($mysqli, "select * from usertype order by id"); while($pt=mysqli_fetch_array($prop)){?>
     <option value="<?php echo $pt['id']; ?>"> <?php echo $pt['name']; ?></option>
     <?php } ?>
   </select></td><td valign="top"><select name="userid" size="10"  class="listbox">
    <option value="Default"></option>
     <?php
	 if(isset($_POST['usertype'])) 
      { 
	  $userid=mysqli_real_escape_string($mysqli,$_POST['usertype']); 
	 $users=mysqli_query($mysqli, "select * from users where usertype='$userid' "); while($ux=mysqli_fetch_array($users)){?>
     <option value="<?php echo $ux['username']; ?>"> <?php echo $ux['username']; ?></option>
     <?php 
	 } 
	 }?>
   </select>
   </td>
      <td valign="top"><div class="scrollbar">
	  <?php $userid=mysqli_real_escape_string($mysqli,$_POST['usertype']); 
	 $roles=mysqli_query($mysqli, "select * from privileges order by id"); while($rx=mysqli_fetch_array($roles)){?>
    <input type="checkbox" name="roleid[]" value="<?php echo $rx['id']; ?>"/> <?php echo $rx['role']; ?> <br />
     <?php } ?>
   
   
</div> </td>
   </tr>
   <tr>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
   </tr>
  </table>
  
  <div class="buttons">
   <input type="submit" value="Save Changes" name="save" class="buttonclass" >  
   <input name="clear" type="reset" value="Clear" class="clearbutton" />
   <input type="submit" value="Refresh"  onclick="window.location='admin.php?action=page&icon=addpermission&t=Permissionviews';" class="refreshbutton"/>
  
  </div>
</form>
<?php

if(isset($_POST['save'])) 
 {
 $id=($_POST['roleid']);
 $userid=($_POST['userid']);
 $date=date('Y-m-d');
 $getu=mysqli_query($mysqli, "select * from users where username='$userid'  "); $rc=mysqli_fetch_array($getu);
 if(!$userid){
echo "<div class=warning>User was left blank, save can not be activated.!</div> ";
}else{
foreach($id as $name=>$value){
$role=$value;
$chk=mysqli_query($mysqli, "select * from userassigned where userid='$userid' and roleid='$role' ");
$count_c=mysqli_num_rows($chk); $tx=mysqli_fetch_array($chk);
$rlr=mysqli_query($mysqli, "select * from privileges where id='$role'  "); $ux=mysqli_fetch_array($rlr);
$usr=mysqli_query($mysqli, "select * from users where id='$userid'  "); $uu=mysqli_fetch_array($usr);
if(!$count_c){
mysqli_query($mysqli, "insert into userassigned(userid,roleid,date)values('$userid','$role','$date')");
echo "<div class=success>Role [ $ux[role] ] has been assigned to User: [ $userid ] </div> ";

}else{	
echo "<div class=error>Role: [ $ux[role] ] was already assigned to User: [ $userid ], save can not be activated. </div> ";
}
}
}
}

?>
<br />
<table width="100%" border="0" class="view">
<thead>
  <tr>
    <th>&nbsp;</th>
    <th>User</th>
    <th>Role Assigned</th>
    </tr>
</thead>
<?php
 $chk=mysqli_query($mysqli, "select * from userassigned order by id desc "); 
 while($tk=mysqli_fetch_array($chk)){
 $rlr=mysqli_query($mysqli, "select * from privileges where id='$tk[roleid]'  "); $ux=mysqli_fetch_array($rlr);
$usr=mysqli_query($mysqli, "select * from users where id='$tk[userid]'  "); $uu=mysqli_fetch_array($usr);
 ?>
<tbody>
  <tr>
    <td width="10"><a href="#" onClick="ajaxwin=dhtmlwindow.open('ajaxbox', 'ajax', 'admin/<?php echo "removepriv.php?id=$tk[id]";  ?>', '<?php echo "Remove privilege from [ $uu[username] ] ";  ?>', 'width=650px,height=150px,center=1px,top=200px,resize=0,scrolling=1'); return false"> 
		 <img src="images/Delete.gif" title="Remove privilege" /></a></td>
    <td> <?php  echo  $tk['userid']; ?></td>
    <td><?php  echo  $ux['role'];?></td>
    </tr>
  <?php  }  ?>
  </tbody>
</table>


</body>
</html>
