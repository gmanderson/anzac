<?php
  session_start();

// Put your PHP functions and modules here
function top_module($pageTitle){
  $title = <<<"OUTPUT"
  <!DOCTYPE html>
  <html lang='en'>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="This site records the letters home during WW1 from ANZAC Douglas Raymond Baker, from the time he left Gympie, Queensland, Australia.">
  <meta name="author" content="Ian Stuart Baker">
  <title>$pageTitle</title>
OUTPUT;
  echo $title;
}

function debug(){
  echo "<pre>POST Output​:";
  print_r($_POST);
  echo "</pre>";
  
  echo "<pre>​GET Output:";
  print_r($_GET);
  echo "</pre>";
  
  echo "<pre>​SESSION Output:";
  print_r($_SESSION);
  echo "</pre>";
}

?>
