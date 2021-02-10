<?php

session_start();

$userName = 'IanBBB';
$password = 'p4ssw0rd';

// User should only get here if a logIO button is clicked
  if (isset($_POST["logIO"])) {
  	// If user is currently logged in, log them out
	if (isset($_SESSION["user"])) {
	  unset($_SESSION["user"]);
	  
	  // User not logged in, make sure fname field is not blank.
	} else if (!empty($_POST["fname"])) {
		
		// Log the user in, make sure fname is clean.
	  $_SESSION["user"]["fname"] = htmlentities($_POST["fname"], ENT_QUOTES);
	}
	
	// Transfer user back to the referring page
	header("Location: ".$_SERVER["HTTP_REFERER"]);
  } else {
  	// User got here by not clicking a logIO button, forward them "silently" to the home page.
	  echo $_POST["logIO"];
	  echo 'did not work';
	// header("Location: links.php");
  }
  
?>