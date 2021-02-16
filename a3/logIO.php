<?php

session_start();

define("USER_NAME", "IanBBB");
define("PASSWORD", "p4ssw0rd");

// User should only get here if a logIO button is clicked
  // if (isset($_POST["logIO"]) && $_POST["fname"] === $userName && $_POST["password"] === $password) {
  if (isset($_POST["logIO"])) {
  	// If user is currently logged in, log them out
	if (isset($_SESSION["user"])) {
	  unset($_SESSION["user"]);
	  
	  // User not logged in, make sure fname field is not blank.
	} else if (!empty($_POST["fname"]) && $_POST["fname"] === USER_NAME && $_POST["password"] === PASSWORD) {
		
		// Log the user in, make sure fname is clean.
	  $_SESSION["user"]["fname"] = htmlentities($_POST["fname"], ENT_QUOTES);
	}
	
	// Transfer user back to the referring page
	header("Location: edit-letters.php");
  } else {
  	// User got here by not clicking a logIO button, forward them "silently" to the home page.
	header("Location: index.php"); // Change to index
  }
  
?>