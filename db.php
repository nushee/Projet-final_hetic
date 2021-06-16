<?php
	$servername = "localhost";
	$username = "id15715955_root";
	$password = "Rosesarered69";
	$dbname = "id15715955_groupe5";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$conn->query($query);
	mysqli_close($conn);
?>