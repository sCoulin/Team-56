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
		
		<?php
			include("../includes/connecttodb.inc");
			
			$pid = $_POST['pid'];
			$address = $_POST['address'];
			$suburb = $_POST['suburb'];
			$price = $_POST['price'];
			$inspection = $_POST['inspection'];
			$type = $_POST['type'];
			$vacant = $_POST['vacant'];
			$rid = $_POST['rid'];
			
			$result = $pdo->query("
			UPDATE properties
			SET pid='$pid', address='$address', suburb='$suburb', price='$price', inspection='$inspection', type='$type', vacant='$vacant', rid='$rid'
			WHERE pid = '$pid'");

			printf("<h1>Edit Success!");
		?>
	</div>
	<?php include "../includes/footer.inc" ?>
	</div>
	</div>
</body>
</html>