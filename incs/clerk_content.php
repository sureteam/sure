
<?php
error_reporting(0);
$action=$_GET['action'];// the page before underscore
$icon=$_GET['icon']; // page after 
$t=$_GET['t']; // title of the page

if($action!='')
{

$page='clerk/'.$action.'_'.$icon.'.php';

if(file_exists($page))
{

include($page);

}



else
{
include("incs/error.php");
}

}
else
{



include("incs/clerk_home.php");


}


?>
