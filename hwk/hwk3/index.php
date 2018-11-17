<?php

	function displayRecommendation(){
		// Checks whether the user has submitted the form
		if(isset($_GET['submit'])){
			echo "<hr>";
			echo "<div class='outputText'>";
			if(!empty($_GET['firstname'])){
				echo "<p>Hi " . $_GET['firstname'] . " here is our advise:<br><br>";	
			}
			if(!empty($_GET['first_time_buyer'])){
				if($_GET['first_time_buyer']=="Yes"){
					echo "Great news!  Since you're a first-time buyer there are
					government-backed programs such a FHA loan from the Deparment of 
					Housing and Urban Development.  These FHA loans are ideal for first-
					time buyers because don't require great credit score and the down-
					payment can be as low as 3%.<br><br>";
				} else {
					echo "Since you're not a first-time buyer, the requirements to get
					a loan are more strict.  You need to get a loan from a private bank
					and the down-payment is about 20% of the price of the house<br><br>";
				}
			}
			if(!empty($_GET['approved'])){
				if($_GET['approved']=="Yes"){
					echo "Since you have already been approved for a home loan,
					can now start looking for your dream house.  By now you should
					know the amount you qualifid for<br><br>";
				} else {
					echo "The very first step in buying a house is getting pre-approved.
					Once you are approved, you will know the amount, you can start looking
					your dream house, otherwise, realtors won't be willing to work with you.
					Thus, we recommend to get pre-approved.<br><br>";
				}
			}
			
			if(!empty($_GET['state'])){
				switch($_GET['state']){
					case "CA": echo "California is a great place to call home.  The 
				    	             weather is nice all year long<br><br>";
						break;
					case "TX": echo "The lone-star state is a great place to call home.  The 
				    	             weather is nice all year long<br><br>";
						break;
					case "FL": echo "Florida beaches are some of the best in the world,
					                 however, hurricanes give Florida a bad reputation<br><br>";
						break;
					case "NY": echo "New York is a state that vibrates with life<br><br>";
						break;
					case "OR": echo "The northwest can be rainy.  If you enjoy rain, then Oregon
					                 is the place to move to.<br><br>";
						break;					
				}
			}		
			
			if(!empty($_GET['username']) && !empty($_GET['password1']) && !empty($_GET['password2'])){
				echo "User account " . $_GET['username'] . " has been created!";
			}
			
			echo "</div>";
			echo "<hr>";
		}
	}
?>

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
		<p>This website will advise the steps to take in order to buy your dream house.</p>
		<form>
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
			<select class="" name="state">
				<option disabled selected value> -- select an option</option>
				<option value="CA">California</option>
				<option value="TX">Texas</option>
				<option value="FL">Florida</option>
				<option value="NY">New York</option>
				<option value="OR">Oregon</option>				
			</select>
			<br>
			<br>
			<label>If you want to create an account, please enter a username and a password</label><br>
			<input type="text" name="username" placeholder="username"><br>
			<input type="password" name="password1" placeholder="Password"><br>
			<input type="password" name="password2" placeholder="Re-enter Password"><br>
			<br>
			<label>How did you hear about us?</label><br>
			<textarea name="comments" rows="3" cols="40"></textarea><br>
			<?= displayRecommendation() ?>
			<input type="submit" value="Submit" name="submit">
		</form>
	</body>
</html>
