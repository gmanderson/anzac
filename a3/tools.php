<?php
  
  session_start();

  function top_module($pageTitle){
    
    // Adds class to current page for highlighting 
    switch($_SERVER['SCRIPT_NAME']){
      case "/wp/a3/index.php":
        $index_current = 'class="current-page"';
        break;
      case "/wp/a3/letters.php":
        $letters_current = 'class="current-page"';
        break;
      case "/wp/a3/links.php":
        $links_current = 'class="current-page"';
        break;
      case "/wp/a3/contact.php":
        $contact_current = 'class="current-page"';
        break; 
      case "/wp/a3/edit-letters.php":
        $edit_current = 'class="current-page"';
        break; 
      default:
        break; 
    }
  
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

OUTPUT;
echo $title;

if (isset($_SESSION["user"])) {
  $logged = '
    Logged in as '.$_SESSION["user"]["fname"].'
    <button name=logIO>Log Out</button>
    <a href="./edit-letters.php" '.$edit_current.'>Edit Letters</a>';
  } else {
    $logged = '
    <label>Sign in as</label>
    <input type=text name=fname>
    <label> Password </label>
    <input type=password name=password>
    <button name=logIO>Log In</button>';
}

$nav = <<<"OUTPUT"
<nav id="login">
  <form action="logIO.php" method="post" autocomplete="off">
  $logged
  </form>
</nav>

<nav>
  <ul>
    <li>
      <a href="./index.php" $index_current>Home</a>
    </li>
    <li>
      <a href="./letters.php" $letters_current>Letters &amp; Post Cards</a>
    </li>
    <li>
      <a href="./links.php" $links_current>Related Links</a>
    </li>
    <li>
      <a href="./contact.php" $contact_current>Contact </a>
    </li>
  </ul>
</nav>

OUTPUT;
echo $nav;
  
}


function bottom(){
  
  $lastModified = date ("Y F d  H:i", filemtime($_SERVER["SCRIPT_FILENAME"]));
  
  $html = <<<"OUTPUT"
  
  <footer>
    <div>
      &copy;
      
      <script>
        document.write(new Date().getFullYear());
      </script>
  
      Gerard Anderson s3318814. Last modified $lastModified. <a href="https://github.com/s3318814/wp">GitHub Repository</a>
    </div>
        
      <div>
        Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.
      </div>
      
      <div>
        <button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button>
      </div>
    </footer>
  </body>
  <script src='script.js?t=<?= filemtime("script.js"); ?>'>
</html>
OUTPUT;
echo $html;

}

function loadDocuments($filename){
  
  if( ($fp = fopen($filename, "r")) !== false ){
    // if(flock($fp, LOCK_SH) !== false){  NOT WORKING AS PER DISCUSSION WITH TREVOR
      $headings = fgetcsv($fp, 0, "\t");
      while( ($aLineOfCells = fgetcsv($fp, 0, "\t")) !== false ){
        $records[] = $aLineOfCells;
      }
    
      // Reassemble headings as keys in new associative array   
      for($i = 0; $i<count($records); $i++){
        for($j = 0; $j<count($records[0]); $j++){
          $associativeRecords[$i][$headings[$j]] = $records[$i][$j];
        }
      }
  
      flock($fp, LOCK_UN);
      fclose($fp);
    
      return $associativeRecords;
    // }else{
    // echo 'share file returned false';
    // }
  }else{
    echo "file unavailable";
  }
  
}

// CONVERTS DATE TO READABALE TEXT-BASED
function convertDate($associativeRecords, $i){
  $dateToConvert = date_create($associativeRecords[$i]['DateStart']);
  return date_format($dateToConvert, "jS F Y");
}

// PULLS YEAR FROM DATE
function getYear($associativeRecords, $i){
  $dateToConvert = date_create($associativeRecords[$i]['DateStart']);
  return date_format($dateToConvert, "Y");
}

// CONVERTS DATE INTO MONTH (WORD)
function getMonth($associativeRecords, $i){
  $dateToConvert = date_create($associativeRecords[$i]['DateStart']);
  return date_format($dateToConvert, "F");
}

// CREATES ARRAY OF IMAGES FOR POSTCARDS AND RETURNS ONE IN LOOP
function selectPostcardImage($i){
  /* Original images below sourced for educational purposes: https://www.iwm.org.uk/history/15-photos-of-the-anzacs-at-gallipoli. */
  $postcardImages[0] = "../../media/anzac-cove.jpg";
  $postcardImages[1] = "../../media/road-making-party.jpg"; 
  $postcardImages[2] = "../../media/dug-outs-at-gaba-tepe.jpg";
  
  return $postcardImages[($i%count($postcardImages))];
}

// DISPLAYS ARRAY ON AS POSTCARDS AND LETTERS
function displayCorrespondence($associativeRecords){
  $arrLength = count($associativeRecords);
  for($i = 0; $i<$arrLength; $i++){
    
    if($associativeRecords[$i]['Type'] === 'Postcard'){
      $documentType = 'post-card';
    }else{
      $documentType = 'letter';
    }
    
    //DETERMINES ARTICLES AND ARTICLE HEADINGS. HELPS WITH NAVIGATION TO YEAR. ALSO DETERMINES IF SHOULD END PREVIOUS LIST
    if($i == 0 || getYear($associativeRecords, $i) !== getYear($associativeRecords, ($i-1))){
      
      if(getYear($associativeRecords, $i) !== getYear($associativeRecords, ($i-1))){
        echo '</ol>';
        echo '</article>';
      }
      echo '<article id="'.getYear($associativeRecords, $i).'">';
      echo '<h3>'.getYear($associativeRecords, $i).'</h3>';
    }
      
    if($i == 0 || getMonth($associativeRecords, $i) !== getMonth($associativeRecords, ($i-1))){
      echo '<section>';
      echo '<h4>'.getMonth($associativeRecords, $i).'</h4>';
    }
      
    if($i == 0 || getYear($associativeRecords, $i) !== getYear($associativeRecords, ($i-1))){
      echo '<ol>';
    }
      
    echo '<li>'.$associativeRecords[$i]['Type'].' '.convertDate($associativeRecords, $i);
      
    echo '<div class="'.$documentType.' correspondence">';
      
    echo '<div class="front">';
    if ($associativeRecords[$i]['Type'] === 'Postcard'){
      /* Original image below sourced for educational purposes: https://www.iwm.org.uk/history/15-photos-of-the-anzacs-at-gallipoli. */
      echo '<img src='.selectPostcardImage($i).' alt="">';
    }else{
      /* Original image below sourced for educational purposes: https://www.freeimages.com/photo/old-envelope-1-1157389 */
      echo '<img src="../../media/old-envelope-1-1157389.jpg" alt="">';
    }
    echo '</div>';
      
    echo '<div class="back">
          <p>'.convertDate($associativeRecords, $i).'</p>
          <p>'.$associativeRecords[$i]['Content'].'</p>
          <p>---oooOooo---</p>
        </div>     
      </div>
    </li>';
    
    if(($i+1) === count($associativeRecords)){
      echo '</ol>';
      if(getMonth($associativeRecords, $i) !== getMonth($associativeRecords, ($i-1))){
        echo '</section>';
      }
      echo '</article>';
    }
  
  }
}

?>
