<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>
</head>
<body>
	<form action="https://titan.csit.rmit.edu.au/~e54061/wp/testcontact.php" method="post">
		<fieldset>
			<legend>Contact Us</legend>
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
		
		<textarea name="message" id="message" cols="30" rows="10"></textarea>
		<br>
		<input type="checkbox" id="remember-me" name="remember-me"><label for="remember-me">Remember Me</label>
		</fieldset>
		<input type="submit" name="send" value="Send">
	</form>
</body>
</html>