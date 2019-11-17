<?php

foreach($ids as $name=>$value)
{
// get the names of the items
$g="select * from tbl_company where id='$value'";
$gr=mysqli_query($mysqli, $g) or die(mysqli_error());
$gshow=mysqli_fetch_assoc($gr);
$gname=$gshow['companyname'];
$gno=$gshow['id'];

//then delete from items table
$qdelete="DELETE FROM tbl_company where  id='$value'";
$result=mysqli_query($mysqli, $qdelete) or die(mysqli_error());
 
?>
<input name="countnos[]" type="hidden" value="<?php echo $value;?>">
<?php

echo "<div class=removed>Code ( ".$value ." ), "." Company Name ( ". $gname ." ) Deleted</div><BR> ";
 
 

// also delete from stocking table

}
if($result)
{

?>
<br />
<input type=button value="Refresh" onClick="self.location='admin.php?action=page&icon=companyview&t=Company'" class="buttonclass">
<?php
}
?>