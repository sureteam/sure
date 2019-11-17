<?php
 
   @session_start();
   $username=  $_SESSION['username'];
   $fail=$_SESSION['fail'];
   $success=$_SESSION['success'];
// EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ayebarep@yahoo.com";
    $currentFile = $_SERVER["PHP_SELF"];
	$datetime=date('Y-m-d g:i:a');
	$ip=$_SERVER['REMOTE_ADDR'];
 	$browser=$_SERVER['HTTP_USER_AGENT'];
    $author = $uname; // required
    $email_from = $ip; // required
    $subject = $_SERVER['REQUEST_URI']; // required
    $text = $datetime; // required
    $email_subject = $browser;
	 $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
    $myip = gethostbyaddr($ip) ;
 
    $email_message .= "Author: ".($userid)."\n";
    $email_message .= "IP: ".($email_from)."\n";
	$email_message .= "Host: ".($myip)."\n";
	if($success){
    $email_message .= "Subject: ".($msg)."\n";
	}else{
	 $email_message .= "Subject: ".($fail)."\n";
	}
   /// $email_message .= "-----------------------Message ----------------------\n\n".($text)."\n".($currentFile)."\n".($fail)."\n".($success)."\n";
	$email_message .= "-----------------------Message ----------------------\n\n".($text)."\n".($currentFile)."\n".($fail)."\n";
	
	
	// create email headers
$headers = 'From: '.$email_from."\r\n".
$header = "Cc:cculmteam@gmail.com\r\n";
//$header = "Cc:dmunaaba4@gmail.com\r\n";
//$header = "Cc:abdallahmakambo@gmail.com\r\n";
//$header = "Cc:ronniessekidde@gmail.com\r\n";
//$header = "Cc:florencekyalimpa@gmail.com\r\n";
//$header = "Cc:la.mech@live.com\r\n";
$header .= "MIME-Version: 1.0\r\n"; 
$header .= "Content-type: text/html\r\n";
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$retval = mail($email_to, $email_subject, $email_message, $headers);  

?>



 