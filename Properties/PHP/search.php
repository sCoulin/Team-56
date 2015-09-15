<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate CSS.
	-->
	<title>Properties - Search</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>

		<h2>Search Available Properties</h2>
		
		<!--
		Creates a form to send an inputted line of text to the search results file with the method GET.
		-->
	
		<form action="searchresults.php" method="get"> 
			Search by address:
			<br>
			<p>
			<input name="string" type="text" size="20"/>
			<input type="submit" name="submit" value="Search">
		</form>

		<!--
		-->

		<form action="searchresults.php" method="get"> 
			Search by suburb: 
			<br>
			<p>
			<select name="suburb"> 
				<?php
					include("../includes/connecttodb.inc");
		
					$result = $pdo->query("
					SELECT DISTINCT suburb
					FROM properties
					ORDER BY suburb ASC");
		
					foreach ($result as $row) {
		
				$suburb = $row['suburb'];
						printf ("<option value ='$suburb'>$suburb</option>");
					}	
				?>
			</select>
			<input type="submit" name="submit" value="Search">
		</form>
		
		<!--
		-->
		
		<form action="searchresults.php" method="get"> 
			Search by type: 
			<br>
			<p>
			<select name="type"> 
      		<?php
					include("../includes/connecttodb.inc");
		
					$result = $pdo->query("
					SELECT DISTINCT type
					FROM properties
					ORDER BY type ASC");
		
					foreach ($result as $row) {
		
				$type = $row['type'];
						printf ("<option value ='$type'>$type</option>");
					}	
				?>
			</select>
			<input type="submit" name="submit" value="Search">
		</form>
		
		<a href='searchresults.php?All'>View all available listings</a>
	</div>
	<?php include "../includes/footer.inc" ?>
	</div>
	</div>
</body>
</html>