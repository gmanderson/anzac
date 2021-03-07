<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  require_once("tools.php");
  require_once("post-validation.php");
  
  top_module("ANZAC Douglas Raymond Baker - Letters Home - Contact");
  

$content = <<<"OUTPUT"
	<main>
		<h2>Contact</h2>
		<p>Do you have comments? Or wish to share stories? Please contact us using the form below.</p>
			
		<form id="contact" method="post" autocomplete="off" action="contact.php">
			<fieldset>
				$successMessage
				<label for="name">Name</label>
				<input type="text" id="name" name="name" placeholder="Ian Baker" pattern="[A-Za-z .\-']+" title="May consist of letters and limited punctuation (-, ., and ')" required value=$firstName>$firstnameError
				<br>
	
				<label for="email">Email</label>
				<input type="email" id="email" name="email" placeholder="ian@baker.com.au" required value=$email>$emailError
				<br>
	
				<label for="mobile">Mobile</label>
				<input type="text" id="mobile" name="mobile" placeholder="0412345678" pattern="(\(04\)|04|\+614)( ?\d){8}" title="Must be an Australian mobile number" value=$mobile>$mobileError
				<br>
				
				<label for="subject">Subject</label>
				<input type="text" id="subject" name="subject" placeholder="Subject" required value=$subject>
				<br>
	
				<label for="message">Message</label>
				<textarea name="message" id="message" placeholder="Type your message here" required>$message</textarea>
				<br>
	
				<input type="checkbox" id="remember-me" name="remember-me">
				<label for="remember-me">Remember Me</label>
				
				<br>
				<input type='checkbox' id="disable-validation" onclick="document.querySelector('#contact').noValidate = this.checked;">
				<label for="disable-validation">Disable Client Side Validation</label>
			</fieldset>
			
			<input type="submit" name="send" value="Send">
			
		</form>
	</main>
OUTPUT;
echo $content;

bottom();

?>