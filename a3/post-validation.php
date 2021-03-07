<?php

  session_start();
  
  $firstname = '';
  $firstnameError = '';
  $email = '';
  $emailError = '';
  $mobile = '';
  $mobileError = '';
  
  $errorFound = false;
    
    
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Put your POST data processing and validation code here
    if(empty($_POST["name"])){
      $errorFound = true;
      $firstnameError = "<br>Field may not be blank";
    }elseif(preg_match("/[^A-Za-z .\-']+/", $_POST["name"])){
      $errorFound = true;
      $firstnameError = "<br>Only letters and limited punctuation (-, ., and ') allowed";
    }
    
    if(empty($_POST["email"])){
      $errorFound = true;
      $emailError = "<br>Field may not be blank";
    }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
      $emailError = '<br>Did you mean to type this?';
      $errorFound = true;
    }
    
    // Email is always sanitised 
    $cleanEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    // If field is not blank
    if($_POST["mobile"] != ""){
      if(!preg_match("/^(\(04\)|04|\+614)( ?\d){8}/", $_POST["mobile"])){
        $errorFound = true;
        $mobileError = "<br>Must be an Australian mobile number";
      }
    }
    
    if(empty($_POST["subject"])){
      $subjectError = "<br>Field may not be blank";
      $errorFound = true;
    }
    
    if(empty($_POST["message"])){
      $messageError = "<br>Field may not be blank";
      $errorFound = true;
    }
  
    // Remove non-printable characters
    $cleanSubject = preg_replace('/[^\n[:print:]]/','',$_POST["subject"]);
    $cleanMessage = preg_replace('/[^\n[:print:]]/','',$_POST["message"]);
    
    // Convert html to text to prevent HTML injection
    $cleanSubject = htmlentities($cleanSubject);
    $cleanMessage = htmlentities($cleanMessage);
    
    // If any piece of POST data fails then all are written back to form fields
    if($errorFound == true){
        $firstName = $_POST["name"];
        $email = $cleanEmail;
        $mobile = $_POST["mobile"];
        $subject = $cleanSubject;
        $message = $cleanMessage;
      }
    
    // 
    if($errorFound == false){
      $successMessage = '<p>Your message has been sent</p>';
      writeCSV();
    }else{
      $successMessage = '<p>Please correct the errors</p>';
    }

    
  }
  
  // WRITES FORM DATA TO TEXT FILE
  function writeCSV(){
    $cells = [$_POST["name"], $_POST["email"], $_POST["mobile"], $_POST["subject"], $_POST["message"]];
    if (($fp = fopen("./mail.txt", a)) && flock($fp, LOCK_EX) !== false){
      fputcsv($fp, $cells, "\t");
      flock($fp, LOCK_UN);
      fclose($fp);
    }
  }
  
?>