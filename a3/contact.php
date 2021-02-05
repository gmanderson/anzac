<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  require_once("tools.php");
  
  top_module("ANZAC Douglas Raymond Baker - Letters Home - Contact");
 ?>

		<main>
			<h2>Contact</h2>
			<p>Do you have comments? Or wish to share stories? Please contact us using the form below.</p>
	
			<!-- <form action="https://titan.csit.rmit.edu.au/~e54061/wp/testcontact.php" method="post"> -->
			<form method="post">
				<fieldset>
					<label for="name">Name</label>
					<input type="text" id="name" name="name" placeholder="Ian Baker" required>
					<br>
		
					<label for="email">Email</label>
					<input type="email" id="email" name="email" placeholder="ian@baker.com.au" required>
					<br>
		
					<label for="mobile">Mobile</label>
					<input type="text" id="mobile" name="mobile" placeholder="0412345678">
					<br>
					
					<label for="subject">Subject</label>
					<input type="text" id="subject" name="subject" placeholder="Subject">
					<br>
		
					<label for="message">Message</label>
					<textarea name="message" id="message" placeholder="Type your message here" required></textarea>
					<br>
		
					<input type="checkbox" id="remember-me" name="remember-me">
					<label for="remember-me">Remember Me</label>
					
				</fieldset>
				<input type="submit" name="send" value="Send">
			</form>
			
			<?php
			debug();
			?>
		
		</main>
		
<?php

bottom();

?>