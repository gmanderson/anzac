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
  // Unsure why flock needs the lock argument in ''
  if( ($fp = fopen($filename, "r")) && (flock($fp, 'LOCK_EX')) !== false ){
    echo 'success';
    
    $headings = fgetcsv($fp, 0, "\t");
    while( ($aLineOfCells = fgetcsv($fp, 0, "\t")) !== false ){
      $records[] = $aLineOfCells;
    }
  flock($fp, LOCK_UN);
  fclose($fp);
  echo "<p>{$headings[0]}</p>";
  echo "<p>{$records[0][0]}</p>";
  }else{
    echo "file unavailable";
  }
  // if($fp = fopen($filename, "r")){
  //   echo 'file opened';
  // };
  // if(flock($fp, LOCK_SH) !== false){
  //   echo 'success';
  //   
  //   $headings = fgetcsv($fp, 0, "\t");
  //   while( ($aLineOfCells = fgetcsv($fp, 0, "\t")) !== false ){
  //     $records[] = $aLineOfCells;
  //   }
  // flock($fp, LOCK_UN);
  // fclose($fp);
  // echo "<p>{$headings[0]}</p>";
  // echo "<p>{$records[0][0]}</p>";
  // }else{
  //   echo "file not locked";
  // }

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
