<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'id15715955_root';
	$pass = 'Rosesarered69**';
	$db = 'id15715955_groupe5';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
	

	$data1 = '';
	$data2 = '';
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
		<link rel="icon" href="img/logo.jpg"/>
		<link rel="stylesheet" href="css/style.css">
		<title>Evolution de League of Legends</title>
	</head>

	<body>
	    <div id="info">
            <button class="carte_button"><img src="img/info.svg" alt="Icone info"></button>
            <div class="carte">
              <p id="hide">Ce site a été réalisé à des fins pédagogiques dans le cadre du cursus Bachelor Web de l’école HETIC. Les contenus et données présentés n'ont pas fait l'objet d'une demande de droit d'utilisation. Ce site ne sera en aucun cas exploité à des fins commerciales.</p>
            </div>
        </div>
        <h1>
            <a href="index.html">League of Legends : Fail ou Clutch ?</a>
        </h1>
        <div id="button">
            <form action="index1.php">
                <button id="neonShadow" type="submit"><img src="img/Age.svg" alt="Icone tranche d'age"></button>
            </form>
            <form action="index2.php">
                <button id="neonShadow" type="submit"><img src="img/Map.svg" alt="Icone répartition dans le monde"></button>
            </form>
            <form action="index3.php">
                <button id="neonShadow" type="submit"><img src="img/Evol.svg" alt="Icone Évolution LoL"></button>
            </form>
        </div>
        <div id="text">
            <h3 class="titre">Tranche d'âge de la communauté (2020)</h3>
            <p>La communauté actuelle de League of Legends suit un certain âge, c'est pourquoi on peut dire qu'il y a beaucoup de fidèles au jeu qui jouent depuis plusieurs années déjà.
            </p>
        </div>
        <div class="container">
            <canvas id="chart" height="200px"></canvas>
        </div>
        <<hr>
        <footer>
            <div id="left">
                <h3 id="footer_title">Notre équipe</h3>
                <ul>
    				<li>Thomas Latour - Design / Front End / Data</li>
    				<li>Doriane Farau - Design / Front End / Data</li>
    				<li>Julie Cesana - Design / Front End / Gestion de Projet</li>
    				<li>Séverine Bourin - Design / Data / Gestion de Projet </li>
    				<li>Ibrahim Soma - Front End / Back End / Data </li>
    				<li>Abdulah Ouahabi - Back End / Front End</li>
    			</ul>   
            </div>
            <div id="right">
                <h3>Projet Scolaire Hetic 2021</h3>
            </div>
        </footer>

		<script>
			var ctx = document.getElementById("chart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [<?php echo $data1; ?>],
					datasets: [{
						label: 'Pourcentage de personnes jouant a LOL',
						data: [<?php echo $data2; ?>],
						backgroundColor: '#108AB4',
						barPercentage: 0.7,
					}],
				},
				options: {
                    plugins:{
                        legend:{
                            position: "bottom",
                            labels: {
                                font: {
                                    size: 12,
                                },
                                color: "white",
                                usePointStyle: true,
                                padding: 30
                            },
                        }
                    },
                    scales: {
						xAxes: {
							ticks: {
                                font: {
                                    size: 10,
                                },
                                color: "white",
                            }
						},
						yAxes: {
							ticks: {
                                font: {
                                    size: 10,
                                },
                                color: "white",
                            }
						}
					},
				}
		    });
		</script>
	</body>
</html>

