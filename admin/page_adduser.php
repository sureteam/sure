
<?php
if(isset($_POST['save'])){
include('../Connections/connection.php');
 
 $obj = new users();
 $date=date('Y-m-d');
 $uname=mysqli_real_escape_string($mysqli,$_POST['username']);
 $password=mysqli_real_escape_string($mysqli,$_POST['password']);
 $password2=mysqli_real_escape_string($mysqli,$_POST['password2']);
 $email=mysqli_real_escape_string($mysqli,$_POST['email']);
 $usertype=mysqli_real_escape_string($mysqli,$_POST['usertype']);
 $one=strtolower($uname);
 $two=strtolower($password);
 $three=strtolower($password2);
  $agencyid=mysqli_real_escape_string($mysqli,$_POST['agencyid']);
 $contact=mysqli_real_escape_string($mysqli,$_POST['contact']);
 $session = $username;
 
$salt = time();
$hashedPassword = sha1($two.$salt);
 
 if(!$one){ echo "<div class='error'>Username is required!</div>";}
 elseif(!$two){ echo "<div class='error'>Password is required!</div>";}
 elseif(!$email){ echo "<div class='error'>Email is required!</div>";}
 elseif($two<>$three ){ echo "<div class='error'>Passwords dont match!</div>";}
 else{
 $check=mysqli_query($mysqli, "select * from users where username='$one' or email='$email'");$num=mysqli_num_rows($check);
 if($num){
 echo "<div class='error'>($email) already exists in the database! </div>";
 }else{
/* 
$query = "INSERT INTO users (usertype,username,password,salt,email,date,branchid,agencyid,contact,sessionuser)values('". $usertype. "','" . $one . "', '" . $hashedPassword . "', '" . $salt . "','" . $email . "','" . $date . "','" . $branchid . "','" . $agencyid . "','" . $contact . "','" . $session . "')";
if ( !mysqli_query($mysqli, $query ) ) exit( "<div class='error'>(couldn't add new record to database!)</div><meta http-equiv=refresh content=2;>" ); 
else echo "<div class='success'>User Data has been saved!</div>   <meta http-equiv=refresh content=2;>";
*/
$obj->adduser($usertype,$one,$hashedPassword,$salt,$email,$date,$branchid,$agencyid,$contact,$session, $mysqli);
echo " <div class=success>Operation has succeeded!</div> <meta http-equiv=refresh content=1;>";

 }//else
} //else
 }//post
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>

<style type="text/css">
 
</style>
<script type="text/javascript">
$(function() {
$('.password').pstrength();
});
</script>
 

<script type="text/javascript" src="js/jquery.pstrength-min.1.2.js"> </script>
 <script type="text/javascript" src="js/controls.js"></script>
  </head>

<body>

<form class="semantic" action="" method="post" id="registration" name="registration" >
  
 <table width="100%">
   <tr>
     <td>Country:</td>
     <td><select name="ca" id="ca"  class="select"onChange="javascript:registration.submit();" >
       <option value="0">Select Country</option>
       <?php
	 $users=mysqli_query($mysqli, "select * from tbl_country   "); while($ux=mysqli_fetch_array($users)){?>
       <option value="<?php echo $ux['id']; ?>"> <?php echo $ux['name']; ?></option>
       <?php  }?>
     </select></td>
     <td>Agency:</td>
     <td><select name="agencyid" id="agencyid"  class="select" >
	          <option value="0">Select Agency</option>
	          <?php
	 if(isset($_POST['ca'])) 
      { 
	    $orgn=mysqli_real_escape_string($mysqli,$_POST['ca']); 
	 $agen=mysqli_query($mysqli, "select * from tbl_agency where countryid='$orgn' "); while($a=mysqli_fetch_array($agen)){?>
	          <option value="<?php echo $a['id']; ?>"> <?php echo $a['name']; ?></option>
	          <?php 
	 } 
	 }?>
	          </select>
       <input name="countryid" type="hidden" id="countryid" />			  </td>
   </tr>
   <tr>
     <td>

 
     <span class="required">*</span>Username:</td><td>
    <input name="username" type="text" id="username" required="required" onKeyUp="AllowAlphabet()" class="textbox" autocomplete="off" /> 
 
  </td>
      <td><span class="required">*</span>UserType:</td>
      <td><select name="usertype" id="usertype" class="select" >
        <option value="Default"></option>
        <?php $prop=mysqli_query($mysqli, "select * from usertype order by id"); while($pt=mysqli_fetch_array($prop)){?>
        <option value="<?php echo $pt['id']; ?>"> <?php echo $pt['name']; ?></option>
        <?php } ?>
      </select></td>
 </tr>
  <tr>
    <td>
 
    <span class="required">*</span>Password:</td><td>
 
<input name="password" type="password"  id="password" class="password" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off"  required="required" />
 
   </td>
      <td> <span class="required">*</span>Retype Password: </td>
      <td><input name="password2" type="password" id="password2" class="password" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off"  required="required" /></td>
  </tr>
  <tr>
    <td><span class="required">*</span>Email: </td>
    <td><input name="email" id="email"  required="required" aria-required="true"
 	        pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$"
 	        title="Your email address"
 	        type="email" spellcheck="false"   class="email" /></td>
    <td>*Contact:</td>
    <td><input name="contact" type="text" id="contact" class="textbox" oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false" autocomplete="off"  required="required" /></td>
  </tr>
  <tr><td colspan="4">&nbsp;</td> </tr>
  </table>
  
  <div class="buttons">
   <input type="submit" value="Save Changes" name="save" class="buttonclass" >  
   <input name="clear" type="reset" value="Clear" class="clearbutton" />
   <input type="submit" value="Refresh"  onclick="window.location='admin.php?action=page&icon=adduser&t=users';" class="refreshbutton"/>
  
  </div>
</form>
 <p></p><br />
 <?php
if(isset($_POST['edit'])){
$uname= mysqli_real_escape_string($mysqli,$_POST['uname']);
$pword= mysqli_real_escape_string($mysqli,$_POST['pword']);
$pword2= mysqli_real_escape_string($mysqli,$_POST['pword2']);
$email= mysqli_real_escape_string($mysqli,$_POST['email2']);
$utype= mysqli_real_escape_string($mysqli,$_POST['utype']);
$id= mysqli_real_escape_string($mysqli,$_POST['id']);
$agencyid =  mysqli_real_escape_string($mysqli,$_POST['agencyid']);
$contact= mysqli_real_escape_string($mysqli,$_POST['contact']);
 $one=strtolower($uname);
 $two=strtolower($pword);
 $three=strtolower($pword2);
 
 $salt = time();
$hashedPassword = sha1($two.$salt);

 if(!$two){ echo "<div class='error'>Username is required!</div>";}
 elseif($two<>$three ){ echo "<div class='error'>Passwords dont match!</div>";}
 elseif(!$email){ echo "<div class='error'>Email is required!</div>";}
 else{
$query="update users set username='". $one ."', password='". $hashedPassword  ."', salt='". $salt ."', email='". $email ."',usertype='". $utype ."', agencyid = '".$agencyid."', contact = '".$contact."' where id='". $id ."' "; 
 if ( !mysqli_query($mysqli, $query ) ) exit( "<div class='error'>(couldn't update this record in database!</div><meta http-equiv=refresh content=2;>)" ); 
else echo "<div class='success'>Record has been updated successfully!</div>   <meta http-equiv=refresh content=2;>";
 
}
}
?>
<?php
  
  if(isset($_POST['b_edit'])){
   $gid=$_POST['that'];
  $edt=mysqli_query($mysqli, "select * from users where id='$gid'"); $rc=mysqli_fetch_array($edt);
  $uty=mysqli_query($mysqli, "select * from usertype where id='$rc[usertype]'");  $ut=mysqli_fetch_array($uty);
  $agg=mysqli_query($mysqli, "select * from tbl_agency where id='$rc[agencyid]'");  $ag=mysqli_fetch_array($agg);
  ?>
<form class="formarea" action="" method="post">
<fieldset>
     <legend><span class="blink_me">Editing System Users</span> </legend><br /><br />
     <table border="0" width="100%">
       <tr>
         <td colspan="4"><strong>Users</strong></td>
       </tr>
       <tr>
         <td>Username:</td>
         <td><input name="uname" type="text" id="uname" value="<?php echo $rc['username']; ?>" required="required" class="textbox"/></td>
         <td>UserType</td>
         <td><select name="utype" id="utype" class="select" >
		 <option value="<?php echo $rc['usertype']; ?>"><?php echo $ut['name']; ?></option>
           <option value="0"></option>
           <?php $prop=mysqli_query($mysqli, "select * from usertype  where id <> '$rc[usertype]'"); while($pt=mysqli_fetch_array($prop)){?>
           <option value="<?php echo $pt['id']; ?>"> <?php echo $pt['name']; ?></option>
           <?php } ?>
         </select></td>
       </tr>
       <tr>
         <td>Password:</td>
         <td><input name="id" type="hidden" value="<?php echo $gid; ?>" />
             <input name="pword" type="password" id="pword" value="<?php echo $rc['password']; ?>" class="password" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off"  required="required"/></td>
         <td>Retype Password </td>
         <td><input type="password" name="pword2" id="pword2" value="<?php echo $rc['password']; ?>" class="password" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off"  required="required"/></td>
       </tr>
       <tr>
         <td>Email:</td>
         <td colspan="3"><input name="email2"  id="email2" value="<?php echo $rc['email']; ?>" aria-required="true"
 	        pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$"
 	        title="Your email address"
 	        type="email" spellcheck="false" required="required" size="30" class="email"/></td>
       </tr>
       <tr>
         <td>Agency:</td>
         <td><select name="agencyid" id="select" class="select" >
           <option value="<?php echo $rc['agencyid']; ?>"><?php echo $ag['name']; ?></option>
           <option value="0"></option>
           <?php $prop=mysqli_query($mysqli, "select * from tbl_agency  where id <> '$rc[agencyid]'"); while($a=mysqli_fetch_array($prop)){?>
           <option value="<?php echo $a['id']; ?>"> <?php echo $a['name']; ?></option>
           <?php } ?>
         </select></td>
         <td>Contact:</td>
         <td><input name="contact" type="text" id="contact" value="<?php echo $rc['contact']; ?>" required="required" class="textbox"/></td>
       </tr>
       <tr>
         <td colspan="4">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="4"><input type="submit" name="edit" value="Edit Selected" class="buttonclass" />
             <input type="reset" name="reset" value="Clear" class="clearbutton"/>
		 <input type="submit" name="Submit2" value="Refresh" class="buttonclass"/></td>
       </tr>
     </table>
</fieldset>
</form>
<?php } ?>
 <?php
// delete record
if(isset($_POST['b_drop'])){
$getid=$_POST['this'];

$checkexist=mysqli_query($mysqli, "select * from users where id='$getid' ");$exists=mysqli_fetch_array($checkexist);
if($exists['username']=='admin'){
echo "<div class='error'>[#: ". $getid ."] Record cannot be deleted because it is being used by another program!</div>";
//echo "<meta http-equiv=refresh content=1;>";
}else{
$del=mysqli_query($mysqli, "delete from users where id='$getid'");
if($del){
echo "[ID: ". $getid ."] Record delete successfully!";
echo "<meta http-equiv=refresh content=2;>";
}
}
}
?>
   
	 <?php
 $getname=mysqli_query($mysqli, "select * from users"); $numx=mysqli_num_rows($getname);
?>
<div><br /><br />
<table width="100%"  border="0" class="view" >
  <tr>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th><strong>ID</strong></th>
    <th>Agency</th>
    <th>Type</th>
    <th><strong>Username</strong></th>
    <th><strong>Password</strong></th>
    <th><strong>Email</strong></th>
    <th>Contact</th>
  </tr>
  
  <?php
 while($x=mysqli_fetch_array($getname)){ 
 $id=$x['id']; 
  $getutype=mysqli_query($mysqli, "select * from usertype where id='$x[usertype]'"); $ux=mysqli_fetch_array($getutype);
    $getutype=mysqli_query($mysqli, "select * from tbl_agency where id='$x[agencyid]'"); $ax=mysqli_fetch_array($getutype);
 ?> 
  <tr>
    <td width="20"><form method="post"><input name="that" id="that" type="hidden" value="<?php echo $id ?>" /> 
	    <input type="submit" class="b_edit" value="" name="b_edit" id="b_edit" title="Edit"   /> </form>	 </td>
    <td width="20"><form method="post"><input name="this" id="this" type="hidden" value="<?php echo $id ?>" /> 
	<input type="submit" class="b_drop" value="" name="b_drop" id="b_drop" onClick="javascript:return confirm('Click OK to delete this record');" title="Del" /> </form></td>
    <td><?php echo $x['id']; ?></td>
    <td><?php echo $ax['name']; ?></td>
    <td><?php echo $ux['name']; ?></td>
    <td><?php echo $x['username']; ?></td>
    <td><?php echo md5($x['password']); ?></td>
    <td><?php echo $x['email']; ?></td>
    <td><?php echo $x['contact']; ?></td>
  </tr>
  <?php   }?>
  <tr>
    <td colspan="9"><span class="blink_me">Number of Record: <?php echo $numx; ?> </span></td>
    </tr>
</table>    
</div>
 
 
      

</body>
</html>
