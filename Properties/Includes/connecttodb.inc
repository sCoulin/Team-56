<?php
	//try to connect to database and if there are any errors redirect to error page
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=listings', 'n9217126', 'Kaede');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		header("Location: http://{$_SERVER['HTTP_HOST']}/errorPage.php");
	}
?>