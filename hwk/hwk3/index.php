<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title></title>
		<style media="screen">
		  @import url("css/styles.css");
		</style>
	</head>
	<body>
		<h1>Buying a Home?</h1>
		<form action="conctacform.php" method="post">
			Enter your name:<br>
			<input type="text" name="name" placeholder="John Doe"><br>
			<br>
			Are you a first time buyer?<br>
			Yes: <input type="radio" name="first_time_buyer" value="Yes">
			No: <input type="radio" name="first_time_buyer" value="No"><br>
			<br>
			Choose a State
			<select class="" name="">
				<option disabled selected value> -- select an option</option>
				<option value="CA">California</option>
				<option value="TX">Texas</option>
				<option value="FL">Florida</option>
				<option value="NY">New York</option>
			</select>
			<br>
			<br>
			How did you hear about us? <br>
			<textarea name="comments" rows="4" cols="40"></textarea><br>
			If you want to create an account, please enter a username and a password.<br>
			<input type="text" name="username" placeholder="username"><br>
			<input type="password" name="pwd1" placeholder="Password"><br>
			<input type="password" name="pwd2" placeholder="Re-enter Password"><br>
			<input type="submit" name="submit">

		</form>
	</body>
</html>
