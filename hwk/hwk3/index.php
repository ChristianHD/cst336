<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Home Advisor</title>
		<style media="screen">
		  @import url("css/styles.css");
		</style>
	</head>
	<body>
		<h1>First-Time Home Buyer Advisor</h1>
		<p>This website will help you decide where to buy your next house based on the information you provide below.</p>
		<form action="conctacform.php" method="post">
			<label for="">Please enter your personal information</label><br>
			<input type="text" name="firstname" placeholder="Your Name.."><br>
			<input type="text" name="lastname" placeholder="Your last name.."><br>
			<input type="text" name="email" placeholder="Your e-mail.."><br>
			<br>			
			<label for="first_time_buyer">Are you a first time buyer?</label><br>
			Yes: <input type="radio" name="first_time_buyer" value="Yes">
			No: <input type="radio" name="first_time_buyer" value="No"><br>
			<br>
			<label for="">Have you been pre-qualified for a mortgage?</label><br>
			Yes: <input type="radio" name="approved" value="Yes">
			No: <input type="radio" name="approved" value="No"><br>
			<br>
			<label for="">Choose a state where you like to live</label><br>
			<select class="" name="">
				<option disabled selected value> -- select an option</option>
				<option value="CA">California</option>
				<option value="TX">Texas</option>
				<option value="FL">Florida</option>
				<option value="NY">New York</option>
				<option value="OR">Oregon</option>				
			</select>
			<br>
			<br>
			How did you hear about us? <br>
			<textarea name="comments" rows="4" cols="40"></textarea><br>
			<br>
			If you want to create an account, please enter a username and a password.<br>
			<input type="text" name="username" placeholder="username"><br>
			<input type="password" name="pwd1" placeholder="Password"><br>
			<input type="password" name="pwd2" placeholder="Re-enter Password"><br>
			<input type="submit" name="submit">

		</form>
	</body>
</html>
