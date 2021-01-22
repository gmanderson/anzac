<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This site records the letters home during WW1 from ANZAC Douglas Raymond Baker, from the time he left Gympie, Queensland, Australia.">
		<meta name="author" content="Ian Stuart Baker">

		<title>ANZAC Douglas Raymond Baker - Letters Home - Contact</title>
	
		<!-- Keep wireframe.css for debugging, add your css to style.css -->
		<link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
		<link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
		
		<script src='../wireframe.js'></script>
	</head>

	<body>
		<header>
			<h1>ANZAC Douglas Raymond Baker</h1>
			<h1>- Letters Home -</h1>
			<!-- Original image below sourced for educational purposes: https://www.sites.google.com/site/anzacdouglasraymondbaker/home. Photograph courtesy of : John Oxley Library, State Library of Queensland [Image number: 702692-19141024-s0023-0027]-->
			<img src="../../media/drbaker.jpg" alt="">
		</header>
		
		<nav>
			<ul>
				<li>
					<a href="./index.php">Home</a>
				</li>
				<li>
					<a href="./letters.php">Letters &amp; Post Cards</a>
				</li>
				<li>
					<a href="./links.php">Related Links</a>
				</li>
				<li>
					<a href="./contact.php" class="current-page">Contact </a>
				</li>
			</ul>
		</nav>
	
		<main>
			<h2>Contact</h2>
			<p>Do you have comments? Or wish to share stories? Please contact us using the form below.</p>
	
			<form action="https://titan.csit.rmit.edu.au/~e54061/wp/testcontact.php" method="post">
				<fieldset>
					<label for="name">Name</label>
					<input type="text" id="name" name="name" required>
					<br>
		
					<label for="email">Email</label>
					<input type="email" id="email" name="email">
					<br>
		
					<label for="mobile">Mobile</label>
					<input type="text" id="mobile" name="mobile" pattern="[0-9]{10}" placeholder="0412345678">
					<br>
					
					<label for="subject">Subject</label>
					<input type="text" id="subject" name="subject">
					<br>
		
					<label for="message">Message</label>
					<textarea name="message" id="message"></textarea>
					<br>
		
					<input type="checkbox" id="remember-me" name="remember-me">
					<label for="remember-me">Remember Me</label>
					
				</fieldset>
				<input type="submit" name="send" value="Send">
			</form>
		</main>
		
		<footer>
			  <div>&copy;
				<script>
				  document.write(new Date().getFullYear());
				</script>
			  Gerard Anderson s3318814. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>. <a href="https://github.com/s3318814/wp">GitHub Repository</a></div>
			  
			  <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
			  
			  <div>
				<button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button>
			  </div>
			</footer>
			
	</body>
</html>