<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Assignment 2</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    
    <script src='../wireframe.js'></script>
  </head>

  <body>

    <header>
      <h1>ANZAC Douglas Raymond Baker</h1>
      <h1>Letters Home</h1>
      <!-- Original image below sourced for educational purposes: https://www.sites.google.com/site/anzacdouglasraymondbaker/home. Photograph courtesy of : John Oxley Library, State Library of Queensland [Image number: 702692-19141024-s0023-0027]-->
        <img src="../../media/drbaker.jpg" alt="">
    </header>

    <nav>
      <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./letters.php">Letters &amp; Post Cards</a></li>
        <li><a href="./links.php" class="current-page">Related Links</a></li>
        <li><a href="./contact.php">Contact </a></li>

      </ul>
    </nav>

    <main>
 
 <h2>Related Links</h2>
 <a href="https://www.aif.adfa.edu.au/showPerson?pid=11163">Douglas Raymond BAKERs summary of service record in the AIF Project</a>
 <a href="https://recordsearch.naa.gov.au/SearchNRetrieve/Interface/ViewImage.aspx?B=3009496&S=1">His complete original service record (Note: this is 20 pages long.)</a>
 <a href="https://www.google.com.au/search?hl=en&site=imghp&tbm=isch&source=hp&biw=1920&bih=982&q=Omrah&oq=Omrah&gs_l=img.12...5422.5422.0.6592.1.1.0.0.0.0.212.212.2-1.1.0.msedr...0...1ac.1.62.img..1.0.0.xuc9Jh0uuzM#imgdii=_&imgrc=_XfTmb11-JZqDM%253A%3BrsnzwSFIEHttOM%3Bhttp%253A%252F%252Fwww.nationalanzaccentre.com.au%252Fsites%252Fdefault%252Ffiles%252Fstyles%252Fcharacter_bite_images%252Fpublic%252Fships%252FH02223--2-.jpg%253Fitok%253Dp6xYoFZI%3Bhttp%253A%252F%252Fwww.nationalanzaccentre.com.au%252Fstory%252Frobert-george-hamilton%3B1363%3B1000">Picture of the 9th Battalion, AIF, boarding the Omrah, Brisbane,</a>
 <a href="https://www.awm.gov.au/sites/default/files/images/collection/items/ACCNUM_LARGE/RCDIG1067548/RCDIG1067548--337-.JPG">Embarkation Roll - Australian War Memorial</a>
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Gerard Anderson s3318814. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>. <a href="https://github.com/s3318814/wp">GitHub Repository</a></div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
