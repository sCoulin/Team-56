<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate CSS.
	-->
	<title>Properties - Register</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>

		<h2>Register</h2>
		Enter your information for your user account
		<p>
		<!--
		Creates the form and various inputs to be posted to the registersuccess.php file to be added to the database. Minor HTML5 valdiation checking on some inputs.
		-->
		<form name='register' action='registersuccess.php' method='POST'>
			ID: <input name="id" type="text" size="6"/>
			<p>
			First Name: <input name="first_name" type="text" size="20"/>
			<p>
			Last Name: <input name="last_name" type="text" size="20"/>
			<p>
			Password: <input name="password" type="text"  size="10"/>
			<p>
			Confirm Password: <input name="password" type="text"  size="10"/>
			<p>
			Gender: <input name="gender" type="radio"  value="Male"/> Male <input name="gender" type="radio"  value="Female"/>Female
			<p>
			<input name="submit" type="submit" value="submit"/>
			<input name="reset" type="reset" value="reset"/>
		</form>
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>