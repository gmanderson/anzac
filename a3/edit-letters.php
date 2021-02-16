<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
  require_once("tools.php");
  
if (isset($_SESSION["user"])) {

top_module('Edit Letters');

echo '<img src="../../media/website-under-construction.png">';

bottom();
}else {
    // User got here by not clicking a logIO button, forward them "silently" to the home page.
  header("Location: index.php"); // Change to index
}


?>
