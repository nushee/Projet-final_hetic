<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'groupe5';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$data1 = '';
	$data2 = '';
	$data3 = '';
	$data4 = '';
	//query to get data from the table
	$sql = "SELECT * FROM `tranche_age`";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$data1 = $data1 . '"'. $row['age'].'",';
		$data2 = $data2 . '"'. $row['pourcentage'] .'",';
	}

	$data1 = trim($data1,",");
	$data2 = trim($data2,",");

?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
		<title>Evolution de League of Legends</title>
		<style type="text/css">			
			body{
				font-family: Arial;
			    	margin: 80px 100px 10px 100px;
			    	padding: 0;
			    	color: white;
			    	text-align: center;
			    	background: #555652;
			}

			.container {
				color: pink;
				background: yellow;
				border: #555652 1px solid;
				padding: 10px;
			}
		</style>

	</head>

	<body>
		<h1>Pourquoi le succès du jeu League of Légende a ralentit? Comment ont-ils finalement reconquis les joueurs?</h1>
		<div class="container">	
			<h3>Répartition des joueurs dans le monde</h3>
		</div>
	    	<div class="container">	
	    	<h1>Tranche d'âge de la communauté</h1>       
			<canvas id="chart" style="width: 100%; height: 65vh; background: yellow; border: 1px solid #555652; margin-top: 10px;"></canvas>
		</div>
		
		<script>
			var ctx = document.getElementById("chart").getContext('2d');
			var myChart = new Chart(ctx, {
			type: 'radar',
			data: {
			    labels: [<?php echo $data1; ?>],
			    datasets: 
			    [{
				label: 'Pourcentage de Personne jouant a LOL',
				data: [<?php echo $data2; ?>],
				backgroundColor: 'rgba(0,130,255)',
				borderWidth: 3	
			    },]
			},

			options: {
			    legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 50}}
			}
		    });
		</script>
	</body>
</html>
