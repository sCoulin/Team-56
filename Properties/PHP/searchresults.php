<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate Javascript and stylesheets.
	-->
	<title>Properties - Search</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../CSS/formatting.css"/>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script src="../CSS/map.js"></script>
</head>
<body>
	<?php include "../includes/navigation.inc" ?>
	
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>

		<!--
		The div and script for the map to be created within.
		-->
		<div id='map'></div>
		<script src="../Javascript/map.js"></script>
		
		<?php
			include("../includes/connecttodb.inc");
			
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
			*/

			if(isset($_GET['string'])) {
				$string = $_GET['string'];

				printf("<h2>Search Results for %s </h2>", $string);

				display_headers();

				$result = $pdo->query("
				SELECT *
				FROM properties
				WHERE address LIKE '%$string%' AND vacant ='Y'
				ORDER BY pid ASC");
				
				echo "<table>";
				display_results($result);
				echo "</table>";
			}
			
			if(isset($_GET['All'])) {

				printf("<h2>All available vacant listings</h2>");

				display_headers();

				$result = $pdo->query("
				SELECT *
				FROM properties
				WHERE vacant ='Y'
				ORDER BY pid ASC");
				
				echo "<table>";
				display_results($result);
				echo "</table>";
			}
			
			/*
			*/

			if(isset($_GET['suburb'])) {
				$suburb = $_GET['suburb'];

				printf("<h2>Search Results for %s </h2>", $suburb);

				display_headers();

				$result = $pdo->query("
				SELECT *
				FROM properties
				WHERE suburb = '$suburb' AND vacant ='Y'
				ORDER BY pid ASC");
				
				echo "<table>";
				display_results($result);
				echo "</table>";
			}

			/*
			*/
	
			if(isset($_GET['type'])) {
				$type = $_GET['type'];

				printf("<h2>Search Results for %s Type</h2>", $type);
	
				display_headers();
	
				$result = $pdo->query("
				SELECT *
				FROM properties
				WHERE type = '$type' AND vacant ='Y'
				ORDER BY pid ASC");
				
				echo "<table>";	
				display_results($result);
				echo "</table>";
			}
		?>
		
		<p>
		<a href="search.php">Try another search</a>

	</div>
	<?php include "../includes/footer.inc" ?>
	</div>
	</div>
</body>
</html>