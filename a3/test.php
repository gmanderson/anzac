<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  require_once("tools.php");

  top_module("ANZAC Douglas Raymond Baker - Letters Home - Home");
  
  session_start();
  


  
// $logOutForm = <<<"OUTPUT"
// <form action="logIO.php" method="post">
// <span>Logged in as {$_SESSION["user"]["fname"]}</span>
// <button name=logIO>Log Out</button>
// </form>
// OUTPUT;
//   echo $logOutForm; 
//   
//   } else {
//     $logInForm = <<<"OUTPUT"
//     <form action="logIO.php" method="post">
//     <label>Sign in as</label>
//     <input type=text name=fname>
//     <button name=logIO>Log In</button>
//   </form>
// OUTPUT;
//   
//   echo $logInForm;
//   }


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


echo "<p>The contents of the directory $dir are:</p>";
exec("ls ./", $output);
echo '<pre>';
print_r($output);
echo '</pre>';
?>