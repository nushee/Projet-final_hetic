<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "Trackmania12";
	$dbname = "groupe5";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$conn->query($query);
	mysqli_close($conn);
?>