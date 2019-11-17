 
<script type="text/javascript">
function AllowAlphabet(){
               if (!pdt.cname.value.match(/^[a-zA-Z ]+$/) && pdt.cname.value !="")
               {
                    pdt.cname.value="";
                    pdt.cname.focus(); 
                    alert("Please Enter only alphabets in text");
               }
}  
    
</script>
<script type='text/javascript'> 
function submitForm(){ 
  // Call submit() method on <form id='myform'>
  document.getElementById('myform').submit(); 
} 
</script>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Customer Data</title>
</head>

<body>
<form id="myform" name="myform" method="post" action="">
  <table width="100%" >
    <tr>
      <td colspan="2"><div class="head">Add New Flag <img src="images/red-flag.gif" width="16" height="16" /></div></td>
    </tr>
    <tr>
      <td colspan="2">    
	  <br />
	  <table width="100%">
	  <tr>
      <td class="tdy">Registered Agency: </td>
      <td><?php $prop=mysqli_query($mysqli, "select * from tbl_agency where  id ='".$agency."' "); while($pt=mysqli_fetch_array($prop)){?>
        <input name="orgn" type="radio" value="<?php echo $pt['id']; ?>" checked="checked" />
        <?php echo $pt['name']; ?>
        <?php } ?></td>
    </tr>
    <tr>
      <td colspan="2" class="td2">	   </td>
      </tr>
    <tr bgcolor="#EAF4F7">
      <td colspan="2" ><table width="100%">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td> <select name="attribute" id="attribute"  class="select"  onchange='submitForm();' >
	          <option value="0">Select search criteria</option>
	          <?php
	  
	 $users=mysqli_query($mysqli, "select * from tbl_entities   "); while($ux=mysqli_fetch_array($users)){?>
	          <option value="<?php echo $ux['id']; ?>"> <?php echo $ux['name']; ?></option>
	          <?php 
	 } 
	  ?>
	          </select></td>
          <td><input name="go" type="submit" value="GO" class="searchclass" /></td>
        </tr>


        <tr>
          <td colspan="2">
		  <?php
		   if(isset($_POST['go'])) 
      { 
	  $orgn=mysqli_real_escape_string($mysqli,$_POST['attribute']);
	   $users=mysqli_query($mysqli, "select * from tbl_entities where id='$orgn' "); $cn=mysqli_fetch_array($users);
	    $ename=$cn['name'];
	if ($ename=="Individual"){?>
	<textarea name="comment" size="5" class="textarea_1" id="comment"  placeholder="Enter flag Comment" >
	1.Enter Individual name
	
	2.Enter Gender
	
	3.Enter Nationality
		 
		  </textarea>
	 
	
	<?php }elseif($ename=="Vehicle"){?>
	<textarea name="comment" size="5" class="textarea_1" id="comment"  placeholder="Enter flag Comment" >
	1.Enter Vehicle make
	
	2.Enter Vehicle model
		 
		  </textarea>
	<?php }elseif($ename=="Location"){ ?>
		<textarea name="comment" size="5" class="textarea_1" id="comment"  placeholder="Enter flag Comment" >
	1.Enter Location name
	
	2.Enter Location coordinates
		 
		  </textarea>
	<?php }elseif($ename=="Exhibit"){ ?>
	<textarea name="comment" size="5" class="textarea_1" id="comment"  placeholder="Enter flag Comment" >
	1.Enter Exhibit number
	
	2.Enter Exhibit Description
		 
		  </textarea>
	<?php }
	?>
	
	
	<?php
	}
	  ?>
		  
 
		  
		  		  <input name="entityid" type="hidden" id="entityid" value="<?php echo $orgn; ?>"/></td>
          </tr>
        <tr>
          <td width="50%">&nbsp;</td>
          <td width="50%"><input name="secretcode" type="hidden" id="id" value="<?php echo $ucode; ?>" />
            <input name="code" type="hidden" id="code" value="<?php echo $code; ?>" />
            <input name="username" type="hidden" id="username" value="<?php echo $username; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><input name="Send" type="submit" id="Send" value="Add Flag " class="buttonclass" />
              <input type="reset" name="Reset" value="Clear"class="clearbutton" />
              <input name="submit" type="submit" class="refreshbutton"  onclick="window.location='clerk.php?action=page&amp;icon=addcase&amp;t=CaseDetails';" value="Refresh"/>          </td>
        </tr>
      </table></td>
      </tr>
    <tr>
      <td colspan="2" class="td2"><?php
	  //--------------------- check for permission------------------------------
  /*
$perm=mysqli_query($mysqli,"select * from userassigned where  userid = '".$username."' ");while($pr=mysqli_fetch_array($perm)){
   $roleid=$pr['roleid']; 
$rol=mysqli_query($mysqli, "select * from privileges where id='$roleid' ");  $ru=mysqli_fetch_array($rol);
echo $rolename=$ru['role'];
  }
    
  if($rolename=='ADD FLAG'){
  //-------------Permission------------------------------
 }else{
  echo "<script language=javascript>alert('Sorry. You do not have permission to add flag. Contact System Administrator!')</script>";
  //echo "<meta http-equiv=Refresh content=1;url=api.php?action=page&icon=flag&t=InquiryDetails>";
 // exit();
 } 
 */
//-------------Permission------------------------------
 
	    //--------------------- check for permission------------------------------
if(isset($_POST['Send'])){

$obj = new suspects();
$agencyid=$agency;

$secretcode=mysqli_real_escape_string($mysqli,$_POST['secretcode']);
$flagdate=date('Y-m-d');
$time = date('g:i:s');
$comment=mysqli_real_escape_string($mysqli,$_POST['comment']);
$userid = mysqli_real_escape_string($mysqli,$_POST['username']);
$uid=mysqli_real_escape_string($mysqli,$_POST['code']);
$entityid=mysqli_real_escape_string($mysqli,$_POST['entityid']);
$agen=mysqli_query($mysqli, "select name from tbl_agency where id='".$agency."' "); $at=mysqli_fetch_array($agen);

$msg = "A new flag has been created from $at[name]. Please check with the app!";
if(!$entityid){
 echo " <div class=warning>Attribute value must be selected!</div>";
}elseif(!$comment){
 echo " <div class=warning>Comment value must be entered!</div>";
}else{
$obj->addAttribute($secretcode,$flagdate,$entityid,$comment,$time,$userid,$agency, $mysqli);
$obj->addgencaseid($uid, $mysqli);
$obj->addflag($secretcode,$flagdate,$d_days,$time, $mysqli);
echo " <div class=success>New Flag has been raised!</div>";
echo "<meta http-equiv=Refresh content=1;url=api.php?action=page&icon=flag&t=InquiryDetails>";	 
include('admin/alert.php');
}
}
//-----------------------------------------------------------------

 

	  ?></td>
      </tr>
	  </table>
	  
	     
	  </td>
    </tr>
   

    <tr>
      <td colspan="2"><table class="view">
        <thead>
          <tr>
            <th colspan="0" > </th>
            <th>&nbsp;</th>
            <th> Flagno </th>
            <th>FlagDate</th>
            <th>FlaggedInformation </th>
            <th>Details</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
		<tbody>
        <?php
$forms='action,icon,t';
$item='Flags';
$limit=20;
$query="select * from tbl_flag where agencyid='".$agency."' order by id asc ";
$result=mysqli_query($mysqli, $query);
$num=mysqli_num_rows($result);
while($rows=mysqli_fetch_assoc($result))
{
 
$catid=$rows['id'];
 $flagno=$rows['flagno'];
$flagdate=$rows['flagdate'];
$comment=$rows['comment'];
$flagtime=$rows['flagtime'];
$creator=$rows['sessionuser'];

$qry="select * from tbl_flagcase where flagno = '".$flagno."' "; 
$rlt=mysqli_query($mysqli, $qry);
$num=mysqli_num_rows($rlt);
$rws=mysqli_fetch_assoc($rlt);
 
$start = $rws['startdate'];
$end = $rws['enddate'];
?>
        
          <tr>
            <td bgcolor="<?php echo $row_color;?>" width="10"><input name="count[]" type="checkbox" value="<?php echo $catid;?>" />            </td>
            <td bgcolor="<?php echo $row_color;?>"><?php 
			$flag=mysqli_query($mysqli, "select * from tbl_flagcase where flagno='".$flagno."'  ");$fx=mysqli_num_rows($flag);
			  if($fx){ ?>
                <a href="#" onClick="ajaxwin=dhtmlwindow.open('ajaxbox', 'ajax', 'api/<?php echo "vflag.php?id=$catid&&flagno=$flagno";  ?>', '<?php echo "FLAGGING INFORMATION ";  ?>', 'width=400px,height=200px,center=1px,top=200px,resize=0,scrolling=1'); return false"><img src="images/red-flag.gif" width="16" height="16" /></a>
              <?php  }  ?> </td>
            <td bgcolor="<?php echo $row_color;?>"><?php echo $flagno;?></td>
            <td bgcolor="<?php echo $row_color;?>"><?php echo $flagdate;?></td>
            <td bgcolor="<?php echo $row_color;?>"><textarea name="" cols="" rows="" class="textarea_2" readonly><?php echo $comment; ?></textarea></td>
            <td bgcolor="<?php echo $row_color;?>"><?php echo $flagtime;?></td>
            <td bgcolor="<?php echo $row_color;?>"><?php 
 
if($creator==$username && $end!=$today){ ?> 
			<a href="#" onClick="ajaxwin=dhtmlwindow.open('ajaxbox', 'ajax', 'api/<?php echo "dflag.php?id=$catid&&flagno=$flagno";  ?>', '<?php echo "FLAGGING INFORMATION ";  ?>', 'width=300px,height=200px,center=1px,top=200px,resize=0,scrolling=1'); return false"><img src="images/b_drop.png" width="16" height="16" title="Click to terminate flag!" onClick="return confirm('Are you sure you want to termnate the flag?')"/></a><?php } ?>
			</td>
          </tr>
          <?php }//loop ?>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>  
	  
	  </td>
      <td>&nbsp;</td>
    </tr>
   
  </table>
</form>

</body>
</html>
