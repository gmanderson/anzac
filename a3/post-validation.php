<?php

  $firstname = '';
  $firstnameError = '';
  $mobile = '';
  $emailError = '';
  $errorFound = false;
  
  $email = $_POST["email"];
  $name = $_POST["name"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Put your POST data processing and validation code here....name doesn't work properly
    if(!(preg_match("/[A-Za-z\.\-']+/", $_POST["name"]))){
      $firstName = $name;
      $errorFound = true;
    }
  
  if(!preg_match("/^(\(04\)|04|\+614)( ?\d){8}/", $_POST["mobile"])){
    $mobile = $_POST["mobile"];
    $errorFound = true;
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $emailError = 'did you mean to type this?';
    $errorFound = true;

  }

  $stuff = htmlentities($_POST["message"]);
  echo $stuff;
  $_POST["message"] = $stuff;
  
  $cleanSubject = preg_replace('/[^\n[:print:]]/','',$subject);
  $cleanMessage = preg_replace('/[^\n[:print:]]/','',$message);
  
  if($errorFound == false){
    writeCSV();
  }
  
}


// PROCESS STRAIGHT AFTER FORM VALID
function writeCSV(){
  $cells = [$_POST["name"], $_POST["email"], $_POST["mobile"], $_POST["subject"], $_POST["message"]];
  if (($fp = fopen("./mail.txt", a)) && flock($fp, LOCK_EX) !== false){
    fputcsv($fp, $cells, "\t");
    flock($fp, LOCK_UN);
    fclose($fp);
  }
}
?>