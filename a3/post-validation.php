<?php

$firstname = '';
$firstnameError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Put your POST data processing and validation code here
  
  $email = $_POST["email"];
  $name = $_POST["name"];
  $mobile = $_POST["mobile"];
  
  if(preg_match("/[A-Za-z\.\-']+/", $name)){
    echo "NAME: TRUE";
  }
  
  if(preg_match("/^(\(04\)|04|\+614)( ?\d){8}/", $mobile)){
    echo "MOBILE: TRUE";
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    echo 'did you mean to type this?';
    echo $cleanEmail;
    $_POST["email"] = $cleanEmail;
  }

  $stuff = htmlentities($_POST["message"]);
  echo $stuff;
  $_POST["message"] = $stuff;
  
print_r($_POST);
}

?>