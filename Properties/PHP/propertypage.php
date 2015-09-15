<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate Javascript and stylesheets.
	-->
	<title>Properties - Listing</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>
		<!--
		The div and script for the map to be created within.
		-->
		<div id='map'></div>
		<script src="../Javascript/map.js"></script>
		
		<!--
		Gets the ID of the property to display from the URL, then queries the DP for the information.
		-->
		
		<?php
		$pid = $_GET['pid'];

		$result = $pdo->query("
		SELECT *
		FROM properties
		WHERE pid = '$pid'");
		
		/*
		*/
		
		foreach ($result as $row) {
	
			$pid = $row['pid'];
			$address = $row['address'];
			$suburb = $row['suburb'];
			$price = $row['price'];
			$inspection = $row['inspection'];
			$type = $row['type'];
			$vacant = $row['vacant'];
			$furnished = $row['furnished'];
			$primaryschool = $row['primaryschool'];
			$highschool = $row['highschool'];
			$about = $row['about'];
			$image = $row['image'];
			$eid = $row['eid'];

			
			echo "<h1>$address, $suburb</h1> <br> <img src='http://www.$image' alt='Property Photo' style='width:800px;height:450px;'/> <h2> $$price.00 </h2> Property ID: $pid<p> Inspection Times: <br> $inspection <p> Type of property: $type <br> Vacant: $vacant <br> Furnished: $furnished <br> Primary School within 10Km: $primaryschool <br> High School within 10Km: $highschool <p> $about <p> Responsible Employee ID: $eid<p>";
		}
	
		/*
		*/
		
		if (isset($_COOKIE['id'])) {
	    	$id = $_COOKIE['id'];
			$result = $pdo->query("
			SELECT user_type
			FROM users
			WHERE id = '$id'");

			foreach ($result as $row) {
				$type = $row["user_type"];
				 
				if ($user_type = 'staff'){
					printf ("<a href='editproperty.php?pid=$pid'>Edit this properties details<p></p></a>");
				} elseif ($user_type ='user'){
					printf ("Inspection Stuff");
				}
			}
		}
		else {
		printf ("<p>Log in to book an insepction time</p>");
		}
		
		?>
	</div>
	<?php include "../includes/footer.inc" ?>
	</div>
	</div>
</body>
</html>