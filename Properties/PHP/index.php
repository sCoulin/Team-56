<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate CSS.
	-->
	<title>Properties - Home</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>
		<h1>Welcome!</h1>

		<?php
			/*
			Defines a function to display the titles of the table columns.
			*/
			
			function display_headers() {
				echo "
				<table> 
				<tr>
				<td>Image</td>
				<td class='Property ID'>Property ID</td>
				<td>Address</td>
				<td>Suburb</td>
				<td>Type</td>
				</table>
				<p>";
			}
			
			/*
			Creates a function to display the results in a table. 
			It takes in a query result, then loops through the result and defines varaibales.
			*/

			function display_results($result) {
				foreach ($result as $row) {
					$image = $row['image'];
					$pid = $row['pid'];
					
$address = $row['address'];

					$suburb = $row['suburb'];

					$type = $row['type'];

					echo "
						<tr>
						<td><img src='http://www.$image' alt='Property Photo' style='width:80px;height:45px;'/></td>
						<td class='Property ID'><a href='propertypage.php?pid=$pid'>$pid<p></p></a>
						</td>
						<td>$address</td>
						<td>$suburb</td>
						<td>$type</td>
						</tr>";
				}
			}
			
			/*
			Checks if the user is logged in through a cookie, and if so directs the user to go to search. 
			Otherwise it tells the un-logged in user to go and log in.
			*/
			if (isset($_COOKIE['id'])) {
			    $email = $_COOKIE['id'];
			    printf ("<p>Go to the search tab to look for available properties</p>");
			    
			    printf("<p>Your registered properties:</p>");
	
				display_headers();
	
				$result = $pdo->query("
				SELECT *
				FROM properties
				WHERE rid = '$id' OR eid ='$id'
				ORDER BY pid ASC");
				
				echo "<table>";	
				display_results($result);
				echo "</table>";
			    
			}
			else {
				printf ("<p>Log in to book inspections and view property management</p>");
			}
		?>
		<br>
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>