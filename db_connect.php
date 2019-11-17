<?php

define("HOST", "localhost"); // The host you want to connect to.
define("USER", "alyshost_sure"); // The database username.
define("PASSWORD", "sure123$%^Te"); // The database password. 
define("DATABASE", "alyshost_sure"); // The database name.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.
function dbSafe( $value ) {
return '"' . mysqli_real_escape_string($mysqli, $value ) . '"';
} 
?>
