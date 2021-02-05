<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  require_once("tools.php");

  top_module("ANZAC Douglas Raymond Baker - Letters Home - Home");
  
  if($fp = fopen("./test.txt", "r")){
    echo 'file opened<br>';
  };
  
  if(flock($fp, LOCK_EX)){
    echo 'locked';
  }
  
  if(flock($fp, LOCK_UN)){
    echo 'unlocked';
  }
  

  
  if(($fp = fopen("./test.txt", "r")) && flock($fp, LOCK_SH) !== false){
    $headings = fgetcsv($fp, 0, "\t");
    while(($aLineOfCells = fgetcsv($fp, 0, "\t")) !== false){
      $records[] = $aLineOfCells;
      flock($fp, LOCK_UN);
      fclose($fp);
      echo "<p>{$headings[3]}</p>";
      echo "<p>{$records[0][0]}</p>";
    }
  }

?>