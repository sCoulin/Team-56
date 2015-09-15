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
			$rid = $row['rid'];

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
					PRINTF ("
						<h2>Edit Property details below</h2> 
        
   						<form name='edit' action='editsuccess.php' method='POST'>
						<p>
						Property ID: <input name='pid' type='text' size='6' value='$pid'/><P/>
						Address: <input name='address' type='text' size='30' value='$address'/><P/>
						Suburb: <input name='suburb' type='text' size='40' value='$suburb'/><P/>
						Price: <input name='price' type='text' size='7' value='$price'/><P/>
						Inspection Times: <input name='inspection' type='text' size='60' value='$inspection'/><P/>
						Type: <input name='type' type='text' size='10' value='$type'/><P/>
						Vacant: <input type='radio' name='vacant' value='Y' /> Yes 
								<input type='radio' name='vacant' value='N' /> No <p>
						Renter ID: <input name='rid' type='text' size='6' value='$rid'/><P/>
						
						<input name='submit' type='submit' value='submit'/>
      					<input name='reset' type='reset' value='reset'/>
         
   						</form>
					");
				} elseif ($user_type ='user'){
					printf ("Error");
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