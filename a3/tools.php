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
  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
<link id='stylecss' type="text/css" rel="stylesheet" href='style.css?t=<?= filemtime("style.css"); ?>'>
  <script src='../wireframe.js'></script>
</head>

<body>
<header>
  <h1>ANZAC Douglas Raymond Baker</h1>
  <h1>- Letters Home -</h1>
  <!-- Original image below sourced for educational purposes: https://www.sites.google.com/site/anzacdouglasraymondbaker/home. Photograph courtesy of : John Oxley Library, State Library of Queensland [Image number: 702692-19141024-s0023-0027]-->
  <img src="../../media/drbaker.jpg" alt="Portrait of Douglas Raymond Baker in army uniform">
</header>

<nav>
<ul>
  <li>
    <a href="./index.php" class="current-page">Home</a>
  </li>
  <li>
    <a href="./letters.php">Letters &amp; Post Cards</a>
  </li>
  <li>
    <a href="./links.php">Related Links</a>
  </li>
  <li>
    <a href="./contact.php">Contact </a>
  </li>
</ul>
</nav>

OUTPUT;
  echo $title;
}

function bottom(){
  $lastModified = date ("Y F d  H:i", filemtime($_SERVER["SCRIPT_FILENAME"]));
  
  $html = <<<"OUTPUT"
  
  <footer>
  <div>&copy;
    <script>
      document.write(new Date().getFullYear());
    </script>

  Gerard Anderson s3318814. Last modified $lastModified. <a href="https://github.com/s3318814/wp">GitHub Repository</a></div>
        
  <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      
  <div>
  <button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button>
</div>
</footer>
</body>
<script src='script.js?t=<?= filemtime("script.js"); ?>'>
</script>
</html>
OUTPUT;
echo $html;

}

function loadDocuments($filename){
  
  if( ($fp = fopen($filename, "r")) !== false ){
    echo 'file open';
    if(flock($fp, LOCK_SH) !== false){   
      echo 'share lock on';
      $headings = fgetcsv($fp, 0, "\t");
      while( ($aLineOfCells = fgetcsv($fp, 0, "\t")) !== false ){
        $records[] = $aLineOfCells;
      }
    
      // Reassemble headings as keys in new associative array
      $arrLengthOuter = count($records);
      $arrLengthInner = count($records[0]);
      
      for($i = 0; $i<$arrLengthOuter; $i++){
        for($j = 0; $j<$arrLengthInner; $j++){
          $associativeRecords[$i][$headings[$j]] = $records[$i][$j];
        }
      }
  
      flock($fp, LOCK_UN);
      fclose($fp);
      
      echo '<pre>';
      print_r($associativeRecords);
      echo '</pre>';
    
      return $associativeRecords;
    }else{
    echo 'share file returned false';
    }
  }else{
    echo "file unavailable";
  }
  
  // THIS LINE FAILS// if( ($fp = fopen($filename, "r")) && (flock($fp, LOCK_SH)) !== false ){
    
//     THIS CODE WORKS WITHOUT FLOCK
//     if( ($fp = fopen($filename, "r")) !== false ){    
//       $headings = fgetcsv($fp, 0, "\t");
//       while( ($aLineOfCells = fgetcsv($fp, 0, "\t")) !== false ){
//         $records[] = $aLineOfCells;
//       }
//     
//     // Reassemble headings as keys in new associative array
//     $arrLengthOuter = count($records);
//     $arrLengthInner = count($records[0]);
//     
//     for($i = 0; $i<$arrLengthOuter; $i++){
//       for($j = 0; $j<$arrLengthInner; $j++){
//         $associativeRecords[$i][$headings[$j]] = $records[$i][$j];
//       }
//     }
// 
//     flock($fp, LOCK_UN);
//     fclose($fp);
//     
//     echo '<pre>';
//     print_r($associativeRecords);
//     echo '</pre>';
//   
//     return $associativeRecords;
//   
//     }else{
//       echo "file unavailable";
//     }
}

// DO I NEED MORE THAN ONE FUNCTION? THERE IS THE OTHER DATE ON THE POSTCARD
function convertDate($associativeRecords, $i){
  $dateToConvert = date_create($associativeRecords[$i]['DateStart']);
  return date_format($dateToConvert, "jS F Y");
}

function getYear($associativeRecords, $i){
  $dateToConvert = date_create($associativeRecords[$i]['DateStart']);
  return date_format($dateToConvert, "Y");
}


function displayCorrespondence($associativeRecords){
  $arrLength = count($associativeRecords);
  for($i = 0; $i<=$arrLength; $i++){
    
      if($associativeRecords[$i]['Type'] === 'Postcard'){
        $documentType = 'post-card';
      }else{
        $documentType = 'letter';
      }
      
    // $convertedDate = convertDate($associativeRecords, $i);
    
    //THIS DETERMINES ARTICLES AND ARTICLE HEADINGS. HELPS WITH NAVIGATION TO YEAR. NEED TO PROCESS YEAR OUT OF ARRAY
    if($i == 0){
      echo '<article id="';
      echo getYear($associativeRecords, $i);
      echo '">';
      echo '<h3>';
      echo getYear($associativeRecords, $i);
      echo '</h3>';
      echo '<ol>';
    }elseif (getYear($associativeRecords, $i) !== getYear($associativeRecords, ($i-1))){
      echo '</ol>';
      echo '</article>';
      echo '<article id="';
      echo getYear($associativeRecords, $i);
      echo '">';
      echo '<h3>';
      echo getYear($associativeRecords, $i);
      echo '</h3>';
      echo '<ol>';
    }
    
    echo '<li>'.$associativeRecords[$i]['Type'].' '.convertDate($associativeRecords, $i);
    
    echo '<div class="'.$documentType.' correspondence">';
    
      echo '<div class="front">';
      echo '<img src="../../media/anzac-cove.jpg" alt="">';
      echo '</div>';
    
      echo '<div class="back">';
        echo '<p>'.$associativeRecords[$i]['DateStart'].'</p>';
        echo '<p>'.$associativeRecords[$i]['Content'].'</p>';
        echo '<p>---oooOooo---</p>';
      echo '</div>';     
    echo '</div>';
  echo '</li>';
  
  if(($i+1) === count($associativeRecords)){
    echo '</ol>';
    echo '</article id="end">';
  }
  
  }
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
