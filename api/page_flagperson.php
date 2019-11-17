 
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

 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Customer Data</title>
</head>

<body>
<form id="pdt" name="pdt" method="post" action="">
  <table width="100%" >
    <tr>
      <td colspan="2"><div class="head">Add New Flag <img src="images/flg.png" width="16" height="16" /></div></td>
    </tr>
    <tr>
      <td colspan="2">    
	  <br />
	  <table width="100%">
	  <tr>
      <td class="td2">Registered Agency: </td>
      <td> 
     <?php $prop=mysqli_query($mysqli, "select * from tbl_agency where  id ='".$agency."' "); while($pt=mysqli_fetch_array($prop)){?>   
	 <input name="orgn" type="radio" value="<?php echo $pt['id']; ?>" checked="checked"  />  
	 <?php echo $pt['name']; ?>
     <?php } ?></td>
    </tr>
    <tr>
      <td colspan="2" class="td2">	   </td>
      </tr>
    <tr bgcolor="#EAF4F7">
      <td colspan="2" ><table width="100%">
        <tr>
          <td><input name="fname" type="text" id="fname" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off" required="required" placeholder="Enter suspect firstname"/></td>
          <td><input name="mname" type="text" id="mname" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off" placeholder="Enter suspect middlename"/></td>
        </tr>
        <tr>
          <td><input name="sname" type="text" id="sname" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off" required="required" placeholder="Enter suspect surname"/></td>
          <td><select name="gender" id="gender" class="select" required="required">
            <option value="0">Select Gender</option>
            <option value="0">-----------------------</option>
            <?php 
$table="tbl_gender";
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
          </select></td>
        </tr>
        <tr>
          <td><input name="dob" type="text" id="dob" value="" class="tcal" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off"   placeholder="Select Dob"  /></td>
          <td><input name="residence" type="text" id="residence" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off"   placeholder="Enter suspect residence"  /></td>
        </tr>
        <tr>
          <td width="50%"><input name="contak" type="text" id="contak" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off"   placeholder="Enter suspect contact"/></td>
          <td width="50%"><input name="nationality" type="text" id="nationality" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off"   placeholder="Enter suspect Nationality" required="required"/></td>
        </tr>
        <tr>
          <td><input name="nid" type="text" class="textbox" id="nid" onkeypress="myFunction(this.id)" onkeyup="AllowAlphabet()" value="" maxlength="14" autocomplete="off"   placeholder="Enter suspect NationalID" style="text-transform:uppercase;"/></td>
          <td><input name="passport" type="text" id="passport" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off"   placeholder="Enter suspect Passport#"/></td>
        </tr>
        <tr>
          <td><input name="occup" type="text" id="occup" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off"   placeholder="Enter suspect Occupation"/></td>
          <td><select name="districtid" id="districtid" class="select" required="required">
            <option value="0">Select District</option>
            <option value="0">-----------------------</option>
            <?php 
$table="tbl_district";
$test_query = "select * from $table order by name asc";
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
          </select></td>
        </tr>
        <tr>
          <td><input name="nok" type="text" id="nok" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off"   placeholder="Enter suspect next of kin"/></td>
          <td><input name="ncontact" type="text" id="ncontact" value="" class="textbox" onkeyup="AllowAlphabet()" onkeypress="myFunction(this.id)" autocomplete="off"   placeholder="Enter suspect nok contact"/></td>
        </tr>
        <tr>
          <td><select name="statusid" id="statusid" class="select" required="required">
            <option value="0">Select Status</option>
            <option value="0">-----------------------</option>
            <?php 
$table="tbl_status";
$test_query = "select * from $table order by name asc";
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
          </select></td>
          <td><span class="td2">
            <select name="offenceid" id="offenceid" class="select"  >
              <option value="0">Select Incident</option>
              <option value="0">-----------------------</option>
              <?php 
$table="tbl_offence";
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
          </span></td>
        </tr>


        <tr>
          <td colspan="2"><textarea name="comment" size="5" class="textbox" id="comment"  placeholder="Enter flag Comment" ></textarea></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="secretcode" type="hidden" id="id" value="<?php echo $ucode; ?>" />
            <input name="code" type="hidden" id="code" value="<?php echo $code; ?>" />
            <input name="username" type="hidden" id="username" value="<?php echo $username; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><input name="Send" type="submit" id="Send" value="Flag Person" class="buttonclass" />
              <input type="reset" name="Reset" value="Clear"class="clearbutton" />
              <input name="submit" type="submit" class="refreshbutton"  onclick="window.location='clerk.php?action=page&amp;icon=addcase&amp;t=CaseDetails';" value="Refresh"/>          </td>
        </tr>
      </table></td>
      </tr>
    <tr>
      <td colspan="2" class="td2"><?php
if(isset($_POST['Send'])){

$obj = new suspects();
$agencyid=$agency;

$secretcode=mysqli_real_escape_string($mysqli,$_POST['secretcode']);
$flagdate=date('Y-m-d');
$fname=mysqli_real_escape_string($mysqli,$_POST['fname']); //ucfirst
$mname=mysqli_real_escape_string($mysqli,$_POST['mname']);
$sname=mysqli_real_escape_string($mysqli,ucwords($_POST['sname']));
$gender=mysqli_real_escape_string($mysqli,$_POST['gender']);
$offenceid=mysqli_real_escape_string($mysqli,$_POST['offenceid']);
$districtid=mysqli_real_escape_string($mysqli,$_POST['districtid']);
$statusid=mysqli_real_escape_string($mysqli,$_POST['statusid']);
$comment=mysqli_real_escape_string($mysqli,$_POST['comment']);
$dob=mysqli_real_escape_string($mysqli,$_POST['dob']);
$residence=mysqli_real_escape_string($mysqli,$_POST['residence']);
$contak=mysqli_real_escape_string($mysqli,$_POST['contak']);
$nid=mysqli_real_escape_string($mysqli,$_POST['nid']);
$nationality=mysqli_real_escape_string($mysqli,$_POST['nationality']);
$passport=mysqli_real_escape_string($mysqli,$_POST['passport']);
$occup=mysqli_real_escape_string($mysqli,$_POST['occup']);
$nok=mysqli_real_escape_string($mysqli,$_POST['nok']);
$ncontact=mysqli_real_escape_string($mysqli,$_POST['ncontact']);
$time = date('g:i:s');

$userid = mysqli_real_escape_string($mysqli,$_POST['username']);
$uid=mysqli_real_escape_string($mysqli,$_POST['code']);
 
if(!$fname){
 echo " <div class=warning>FirstName value must be entered!</div>";
}elseif(!$sname){
 echo " <div class=warning>Surname value must be entered!</div>";
}elseif(!$secretcode){
echo " <div class=warning>FlagNo value must be entered!</div>";
}elseif(!$gender){
echo " <div class=warning>Incident value must be selected!</div>";
}else{
$obj->addsuspect($secretcode,$flagdate,$fname,$mname,$sname,$gender,$offenceid,$distid,$status,$comment,$dob,$residence,$contak,$nid,$nationality,$passport,$occup,$nok,$ncontact,$time,$userid, $mysqli);
//mysqli_query("INSERT INTO tbl_suspect (flagno,flagdate,fname,mname,sname,gender,offenceid,districtid,statusid,comment,dob,residence,contact,nid,nationality,passport,occupation,nok,ncontact,rtime,sessionuser)VALUES('$secretcode','$flagdate','$fname','$mname','$sname','$gender','$offenceid','$districtid','$statusid','$comment','$dob','$residence','$contak','$nid','$nationality','$passport','$occupation','$nok','$ncontact','$time','$userid')")  or die(mysqli_error());
$obj->addgencaseid($uid, $mysqli);
$obj->addflag($secretcode,$flagdate,$d_days,$time, $mysqli);
echo " <div class=success>New Flag has been raised!</div>";
echo "<meta http-equiv=Refresh content=1;url=api.php?action=page&icon=flagperson&t=InquiryDetails>";	 
 
//$sql="INSERT INTO tbl_suspect (flagno,flagdate,fname,mname,sname,gender,offenceid,districtid,statusid,comment,dob,residence,contact,nid,nationality,passport,occupation,nok,ncontact,rtime,sessionuser)VALUES('$secretcode','$flagdate','$fname','$mname','$sname','$gender','$offenceid','$districtid','$statusid','$comment','$dob','$residence','$contak','$nid','$nationality','$passport','$occupation','$nok','$ncontact','$time','$userid')";
//echo $sql;

}
}//-------

//-------------get days------------------------------
 
//-------------get days------------------------------
	  ?></td>
      </tr>
	  </table>
	  
	     
	  </td>
    </tr>
   

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
   
  </table>
</form>

</body>
</html>
