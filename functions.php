<?php
//include('Connections/connection.php');
function sec_session_start() {
        $session_name = 'sec_session_id'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
        $cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        @session_start(); // Start the php session
        session_regenerate_id(true); // regenerated the session, delete the old one.     
}

function login($email, $password, $mysqli) {
   // Using prepared Statements means that SQL injection is not possible. 
   if ($stmt = $mysqli->prepare("SELECT id, usertype, username, password, salt,branchid,agencyid,contact FROM users WHERE  username = ? LIMIT 1")) {
      $stmt->bind_param('s', $email); // Bind "$email" to parameter.
      $stmt->execute(); // Execute the prepared query.
      $stmt->store_result();
      $stmt->bind_result($user_id, $usertype, $username, $db_password, $salt, $branch, $agency, $contact); // get variables from result.
      $stmt->fetch();

  //===================================================================================================================
      //$password = hash('sha512', $password.$salt); // hash the password with the unique salt.
	  $hashedPassword = sha1( $password . $salt );
 //===================================================================================================================
      if($stmt->num_rows == 1) { // If the user exists
         // We check if the account is locked from too many login attempts
         if(checkbrute($user_id, $mysqli) == true) { 
            // Account is locked
            // Send an email to user saying their account is locked
            return false;
         } else {
         if($db_password == $hashedPassword) { // Check if the password in the database matches the password the user submitted. 
            // Password is correct!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 		     	
               $user_id = preg_replace("/[^0-9]+/", "", $user_id); // XSS protection as we might print this value
               $_SESSION['user_id'] = $user_id; 
               $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
               $_SESSION['username'] = $username;
			   $_SESSION['utype'] = $usertype;
			   $_SESSION['branchid'] = $branch;
             //  $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
			   $_SESSION['login_string'] = sha1($hashedPassword.$user_browser);
               // Login successful.
               return true;    
         } else {
            // Password is not correct
            // We record this attempt in the database
            $now = time();
			$time = date('g:i:s');
            $mysqli->query("INSERT INTO login_attempts (user_id, time, extime) VALUES ('$user_id', '$now', '$time')");
            return false;
         }
      }
      } else {
         // No user exists. 
         return false;
      }  
   }
}


function checkbrute($user_id, $mysqli) {
   // Get timestamp of current time
   $now = time();
   // All login attempts are counted from the past 2 hours. 
   $valid_attempts = $now - (2 * 60 * 60); 
 
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) { 
      $stmt->bind_param('i', $user_id); 
      // Execute the prepared query.
      $stmt->execute();
      $stmt->store_result();
      // If there has been more than 5 failed logins
      if($stmt->num_rows > 4) {
	  // blocked update table
         return true;
      } else {
         return false;
      }
   }
}


function login_check($mysqli) {
   // Check if all session variables are set
   if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
      $user_id = $_SESSION['user_id'];
      $login_string = $_SESSION['login_string'];
      $username = $_SESSION['username'];
 
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
	 $query = 'SELECT password FROM users WHERE username = "'.$username.'"'; // . dbSafe( $userName )
	 $result = mysqli_query($mysqli, $query);
	 $row = mysqli_fetch_array( $result );
     $storedPassword = $row['password'];
	 
	 if(mysqli_num_rows($result) == 1) { // If the user exists
	 $login_check = sha1($storedPassword.$user_browser);
 	 if($login_check == $login_string) {
              // Logged In!!!!
               return true;
           } else {
              // Not logged in
              return false;
           }
	  } else {
              // Not logged in
              return false;
           }
  
   } else {
     // Not logged in
     return false;
   }
}




?>
