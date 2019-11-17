<div class="describe tablesbr"> 
<div class="head"> District View / Edit</div>


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
 <th>Country</th>
 <th> District Name </th>

</tr>
</thead>
<?php
$forms='action,icon,t';
$item='District';
$limit=20;
$query="select * from tbl_district order by  name asc";

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
$branchid=$rows['country'];
$catname=$rows['name'];
$gp=mysqli_query($mysqli, "select * from tbl_country where id='$branchid'");
$rowx=mysqli_fetch_assoc($gp);
$branchname=$rowx['name'];
?>
<tbody>
<tr>
<td bgcolor="<?php echo $row_color;?>" width="10"> <input name="count[]" type="checkbox" value="<?php echo $catid;?>"> </td>
<td bgcolor="<?php echo $row_color;?>"><?php echo $branchname;?></td>
<td bgcolor="<?php echo $row_color;?>"> <?php echo $catname;?> </td>

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
<input name="delete" type="submit" value="Delete Selected" class="clearbutton"  >
<input type="submit" value="Refresh"  onclick="window.location='admin.php?action=page&icon=departview&t=viewdepartment';" class="refreshbutton"/>  
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

echo "<div class=warning>  Check atleast a district you want to change. </div>";

}//close count<1
else
{
echo "<br><br>";
?>

<form action="" method="post">
  <table width="100%" class="update">
  <thead>
    <tr>
      <th> ID </th>
      <th>Country</th>
      <th>District Name</th>
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
$g="select * from tbl_district where  id='$value'";
$gr=mysqli_query($mysqli, $g) or die(mysqli_error());
$fa=mysqli_fetch_assoc($gr);
$catname=$fa['name'];
$branchid=$fa['country'];
$gp=mysqli_query($mysqli, "select * from tbl_country where id='$branchid'");
$rowx=mysqli_fetch_assoc($gp);
$branchname=$rowx['name'];
?>
<tbody>
    <tr>
      <td bgcolor="<?php echo $row_color;?>"><input type="text" name="code[]" id="code[]" value="<?php echo $value;?>"  readonly="readonly"
      class="ids" /></td>
      <td bgcolor="<?php echo $row_color;?>"> <?php
$q = "select * from tbl_country where  id <>'$branchid'";
$r = mysqli_query($mysqli, $q);
$display = "<select name=branchid[] class=select>";
$display.="<option value=$branchid selected=selected class=eselect>$branchname</option>";
$display.="<option value=0> </option>";

while($row=mysqli_fetch_assoc($r)){
$display.="<option value=$row[id]> $row[name] </option>";
}
echo $display."</select>";

 ?></td>
      <td bgcolor="<?php echo $row_color;?>"><input name="name[]"  id="name[]" type="text" value="<?php echo $catname;?>" class="textbox" required="required" style="text-transform:capitalize;">      </td>    
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
<input type="submit" value="Cancel"  onclick="window.location='admin.php?action=page&icon=distview&t=Districts';" class="clearbutton"/>     
 
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
$catname=$_POST['name'];
$branchid=$_POST['branchid'];
foreach($code as $name=>$codeno){
$id=$codeno;
$district = mysqli_real_escape_string($mysqli,ucwords($catname[$name]));
$chk=mysqli_query($mysqli, "select * from tbl_district where name='$district' and  country='$branchid[$name]'  ");$nrow=mysqli_num_rows($chk); 
/*if($nrow){ 
echo " <div class=error>District Name already exists!</div>";
echo "<script language=javascript>alert('District Name already exists!')</script>";
}else{*/
$query = "update tbl_district set   country= '$branchid[$name]', name='$district' where id='$id'"; 
$result=mysqli_query($mysqli, $query) or die(mysqli_error());
echo $item="<div class=success> District Succussfullly Done <font color=red>".strtoupper($catname[$name])."</font></div>";
}
//}//------------
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
$g="select * from tbl_district where  id='$value'";
$gr=mysqli_query($mysqli, $g) or die(mysqli_error());
$gshow=mysqli_fetch_assoc($gr);
$gname=$gshow['name'];
$gno=$gshow['id'];
echo "<div class=error>";
?>
<input name="countnos[]" type="hidden" value="<?php echo $value;?>">
<?php
echo "Are  you Sure you want to Delete id ( ".$value ." ), "." District Name ( ". $gname ." )<br>";
echo "</div>";

}

?>
<h4 class="sets"> 

       
      <input name="do" type="submit" value="YES" class="delbutton" />
     &nbsp;|| &nbsp;
      <a href="admin.php?action=page&icon=distview&t=viewDistricts" class="currentx">
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
include("deletedist.php");
}//close do button
?>

