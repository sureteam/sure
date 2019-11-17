<div class="describe tablesbr"> 
<div class="head"> Conservation Area View / Edit</div>


</div>
<br />
<div class="buttons">
 
     </div>
     <br>
     <form action="" method="post">
     <table class="view">
	 <thead>
<tr>
 <th colspan="0" >  </th> 
 <th> Country </th>
   <th>Conservation Area </th>
    <th>District </th>
   <th>Address</th>
   <th>Contact</th>
   <th>Email</th>
</tr>
</thead>
<?php
$forms='action,icon,t';
$item='Organization';
$limit=20;
$query="select * from tbl_branch order by  id asc";

//$result=pagination_top($query,$limit);
$result=mysqli_query($mysqli, $query);
?>
 

<?php

$num=mysqli_num_rows($result);
$color2='#E5E5E5';
$color1='#F5F5F5';
$count=1;
$counts=0;

while($rows=mysqli_fetch_assoc($result))
{
$row_color=($counts % 2)? $color1:$color2;

$catid=$rows['id'];
$compname=$rows['companyid'];
$catname=$rows['branchname'];
$address=$rows['address']; 
$contact=$rows['contact']; 
$email=$rows['email'];
$district=$rows['districtid'];
$gp=mysqli_query($mysqli, "select * from tbl_country where id='$compname'");
$rowx=mysqli_fetch_assoc($gp);
$companyname=$rowx['name'];
$dt=mysqli_query($mysqli, "select * from tbl_district where id='$district'");
$rowd=mysqli_fetch_assoc($dt);
?>
<tbody>
<tr>
<td bgcolor="<?php echo $row_color;?>" width="10"> <input name="count[]" type="checkbox" value="<?php echo $catid;?>"></td>
<td bgcolor="<?php echo $row_color;?>"> <?php echo $companyname;?> </td>
<td bgcolor="<?php echo $row_color;?>"><?php echo $catname;?></td>
<td bgcolor="<?php echo $row_color;?>"><?php echo $rowd['name'];?></td>
<td bgcolor="<?php echo $row_color;?>"><?php echo $address;?></td>
<td bgcolor="<?php echo $row_color;?>"><?php echo $contact;?></td>
<td bgcolor="<?php echo $row_color;?>"><?php echo $email;?></td>
</tr>
<?php
$count++;
$counts++;

}
?>
</tbody>
</table>

<br />
<div class="buttons"> 
<input name="Edit" type="submit" value="Edit Selected" class="buttonclass"/>
<input name="delete" type="submit" value="Delete Selected" class="clearbutton" />
<input type="submit" value="Refresh"  onclick="window.location='admin.php?action=page&icon=branchview&t=branchviews';" class="refreshbutton"/>  
 </div>
</form>


<div> <?php
//pagination_links($query,$limit,$item,$forms);
?> </div>



<div> </div>
<form action="" method="POST">
<?php
if(isset($_POST['Edit']))
{
$id=$_POST['count'];
if($_POST['count']==''){

echo "<div class=warning>  Check atleast a conservation area you want to change. </div>";

}//close count<1
else
{
echo "<br><br>";
?>

<form action="" method="post">
  <table width="100%" class="update">
  <thead>
    <tr >
      <th> ID </th>
      <th>Organization </th>
      <th>CA  </th>
      <th>Contact</th>
      <th>&nbsp;</th>
    </tr>
</thead>
<?php
foreach($id as $name=>$value)
{
$color1='#FFFFFF';
$color2='#EAEFC9';
$count=1;
$counts=0;

$row_color=($counts % 2)? $color1:$color2;

// get the names of the items
$g="select * from tbl_branch where  id='$value'";
$gr=mysqli_query($mysqli, $g) or die(mysqli_error());
$fa=mysqli_fetch_assoc($gr);

$compname=$fa['companyid'];
$catname=$fa['branchname'];
$address=$fa['address']; 
$contact=$fa['contact']; 
$email=$fa['email'];
$districtid=$fa['districtid'];
$gp=mysqli_query($mysqli, "select * from tbl_country where id='$compname'");
$rowx=mysqli_fetch_assoc($gp);
$companyname=$rowx['name'];
$dp=mysqli_query($mysqli, "select * from tbl_district where id='$districtid'");
$rowd=mysqli_fetch_assoc($dp);
$distname=$rowd['name'];
?>
<tbody>
    <tr>
      <td bgcolor="<?php echo $row_color;?>"><input type="text" name="code[]" id="code[]" value="<?php echo $value;?>"  readonly="readonly"
      class="ids" /></td>
    <td bgcolor="<?php echo $row_color;?>"><?php
$q = "select * from tbl_country where  id <>'$compname'";
$r = mysqli_query($mysqli, $q);
$display = "<select name=compname[] class=select>";
$display.="<option value=$compname selected=selected class=eselect>$companyname</option>";
$display.="<option value=0> </option>";

while($row=mysqli_fetch_assoc($r)){
$display.="<option value=$row[id]> $row[name] </option>";
}
echo $display."</select>";

 ?>      </td>    
     <td bgcolor="<?php echo $row_color;?>"><input name="catname[]"  id="catname[]" type="text" value="<?php echo $catname;?>" class="textbox" required="required" style="text-transform:uppercase"></td>
     <td bgcolor="<?php echo $row_color;?>"><input name="contact[]" type="text" class="textbox"  id="contact[]" value="<?php echo $contact;?>" maxlength="10" required="required"></td>
     <td bgcolor="<?php echo $row_color;?>">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="<?php echo $row_color;?>">District</td>
      <td bgcolor="<?php echo $row_color;?>">&nbsp;</td>
      <td bgcolor="<?php echo $row_color;?>">Address</td>
      <td bgcolor="<?php echo $row_color;?>">Email</td>
      <td bgcolor="<?php echo $row_color;?>">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="<?php echo $row_color;?>"><?php
$q = "select * from tbl_district where  id <>'$districtid'";
$r = mysqli_query($mysqli, $q);
$display = "<select name=distname[] class=select>";
$display.="<option value=$districtid selected=selected class=select>$distname</option>";
$display.="<option value=0> </option>";

while($row=mysqli_fetch_assoc($r)){
$display.="<option value=$row[id]> $row[name] </option>";
}
echo $display."</select>";

 ?></td>
      <td bgcolor="<?php echo $row_color;?>">&nbsp;</td>
      <td bgcolor="<?php echo $row_color;?>"><input name="address[]"  id="address[]" type="text" value="<?php echo $address;?>" class="textbox" required="required" /></td>
      <td bgcolor="<?php echo $row_color;?>"><input name="email[]"  id="email[]" type="text" value="<?php echo $email;?>" class="textbox" required="required" /></td>
      <td bgcolor="<?php echo $row_color;?>">&nbsp;</td>
    </tr>
    </tbody>
    <?php
    }//for each
	$count++;
$counts++;

?>
  </table> 

<br />

<div class="buttons">  <input name="update" type="submit" value="Edit All" class="buttonclass" onClick="javascript:return confirm('Click [ OK ] to complete editing process!');"/> 
<input type="submit" value="Cancel"  onclick="window.location='admin.php?action=page&icon=branchview&t=branchviews';" class="clearbutton"/> 
</div>
  <?php
}// else


}//main

?>

</form>





<?php
//then make an update
if(isset($_POST['update'])){

$code=$_POST['code'];
$compname=$_POST['compname'];
$catname=$_POST['catname'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$email=$_POST['email'];
 $distname=$_POST['distname'];

foreach($code as $name=>$codeno){
$id=$codeno;
if(!$catname[$name]){
echo " <div class=warning>Name value must be entered!</div>";
}elseif(!$address[$name]){
echo " <div class=warning>Address value must be entered!</div>";
}elseif(!$contact[$name]){
echo " <div class=warning>Contact value must be entered!</div>";
}elseif(!$email[$name]){
echo " <div class=warning>Email value must be entered!</div>";
}elseif(!$distname[$name]){
echo " <div class=warning>District value must be selected!</div>";
}else{
$bran=strtoupper($catname[$name]);
$addr=ucwords($address[$name]);
$em=strtolower($email[$name]);

$query = "update tbl_branch set   companyid='$compname[$name]', branchname='$bran', address='$addr', contact='$contact[$name]', email='$em', districtid='$distname[$name]' where id='$id'";
$result=mysqli_query($mysqli, $query) or die(mysqli_error());
echo $item="<div class=success> Conservation Area Succussfullly Done <font color=red>".strtoupper($catname[$name])."</font></div>";
}
}
echo "<meta http-equiv=Refresh content=1;>";

}//close loop

?>
</form>

<?php
if(isset($_POST['delete'])){

if($_POST['count']==''){
echo "<div class=wraps>";
echo "<div class=error>Check atleast One Checkbox Before you Delete. </div>";
echo "</div>";
}//close count<1
else
{

?>
<div class="buttons">
<form action="" method="post">

<?php
$id=$_POST['count'];
//register them in a session
$_SESSION['itemid']=$id;
echo "<div class=wraps>";
foreach($id as $name=>$value)
{
// get the names of the items
$g="select * from tbl_branch where  id='$value'";
$gr=mysqli_query($mysqli, $g) or die(mysqli_error());
$gshow=mysqli_fetch_assoc($gr);
$gname=$gshow['branchname'];
$gno=$gshow['id'];
echo "<div class=error>";
?>
<input name="countnos[]" type="hidden" value="<?php echo $value;?>">
<?php
echo "Are  you Sure you want to Delete id ( ".$value ." ), "." CA ( ". $gname ." )<br>";
echo "</div>";

}
 
?>
<h4 class="sets"> 

       
      <input name="do" type="submit" value="YES" class="delbutton" />
     &nbsp;|| &nbsp;
      <a href="admin.php?action=page&icon=branchview&t=viewbranches" class="currentx">
      NO </a>
     
  </h4>
 
 </form>
  </div>    

<?php
}//close if
}//close main if
?>

<?php
if(isset($_POST['do'])){
 $ids=$_POST['countnos'];
include("deletebranch.php");
}//close do button
?>

