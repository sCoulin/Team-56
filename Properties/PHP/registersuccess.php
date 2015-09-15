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

		<h2>Registration successful</h2>
		<!--
		Defines variables from the POST information from the previous form, and then runs a query to insert the users information into the users table. 
		It then displays the registered information to the user.
		-->
		<?php
			include("../includes/connecttodb.inc");

			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$id = $_POST['id'];
			$password = $_POST['password'];
			$gender = $_POST['gender'];

			$result = $pdo->query("
			INSERT INTO users
			SET id='$id', first_name='$first_name', password='$password', last_name='$last_name', gender='$gender', user_type='user'");

			printf('%s <br> %s <br> %s <br> %s <br> %s <br> User', $id, $password, $first_name, $last_name, $gender);
		?>
		<!--
		Creates a hyperlink for the user to log in with their new account.
		-->
		<p>
		<a href='Login.php'>Login with New User</a>
		<p>
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>