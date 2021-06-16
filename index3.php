<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'id15715955_root';
	$pass = 'Rosesarered69**';
	$db = 'id15715955_groupe5';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

    $data0 = '';
	$data1 = '';
	$data2 = '';
	$data3 = '';
	$data4 = '';
	$data5 = '';
	//query to get data from the table
	$sql = "SELECT * FROM `evolution` ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
	    $data0 = $data0 . '"'. $row['annee'].'",'; 
		$data1 = $data1 . '"'. $row['nombre'].'",';
		$data2 = $data2 . '"'. $row['evenement'] .'",';
		$data3 = $data3 . '"'. $row['champion'] .'",';
		$data4 = $data4 . '"'. $row['rework'] .'",';
		$data5 = $data5 . '"'. $row['telechargement'] .'",';
	}

    $data0 = trim($data0,",");
	$data1 = trim($data1,",");
	$data2 = trim($data2,",");
	$data3 = trim($data3,",");
	$data4 = trim($data4,",");
	$data5 = trim($data5,",");

?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" href="img/logo.jpg"/>
		<title>Évolution de LoL</title>
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
            <h3 class="titre">Le jeu et les joueurs : quelle évolution entre 2009 et 2020 ?</h3>
            <p>Alors qu'entre 2009 et 2017 tout semble bien fonctionner, augmenter et s'organiser, de 2017 à 2018 l'engouement semble s'arrêter et le jeu connait un énorme ralentissement. Ainsi, on peut voir que Riot met le paquet en 2018 en terme d'événements et de reworks pour satisfaire les joueurs, et la courbe semble bien repartie ! D'autre part, le nombre de champions sortis par an diminue peu à peu, car le nombre total actuel : 155 est déjà très élevé. Alors que, face à la concurrence mobile, Riot Games sort LoL mobile en 2020, la semaine de sa sortie, l'application compte déjà 3 fois plus de téléchargements que de joueurs sur LoL PC en 2010. Doucement mais sûrement, la communauté se renouvelle et le jeu se développe !
            </p>
        </div>
        <div class="container">
            <canvas id="chart" height="300px"></canvas>
        </div>
        <hr>
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
            var ctx = document.getElementById('chart').getContext('2d');
            new Chart(ctx, {
		        responsive: true,
                type: 'line',
                data: {
                    labels:[<?php echo $data0; ?>],
                    datasets: [{
                        label: "Nombre de joueurs en millions (à l'unité près)",
                        yAxisID: 'A',
                        borderColor: '#E1CE90',
                        backgroundColor: '#E1CE90',
                        data: [<?php echo $data1; ?>],
                        fill: false
                    }, {
                        label: "Nombre d'évenements",
                        yAxisID: 'B',
                        borderColor: '#5EC155',
                        backgroundColor: '#5EC155',
                        data: [<?php echo $data2; ?>],
                        fill: false
                    }, {
                        label: "Nombre de champions sortis",
                        yAxisID: 'C',
                        borderColor: '#108AB4',
                        backgroundColor: '#108AB4',
                        data: [<?php echo $data3; ?>],
                        fill: false
                    }, {
                        label: "Nombre de reworks",
                        yAxisID: 'D',
                        borderColor: '#BC9B55',
                        backgroundColor: '#BC9B55',
                        data: [<?php echo $data4; ?>],
                        fill: false
                    },{
                        label: "Téléchargements mobiles en millions (sortie 2020)",
                        yAxisID: 'E',
                        borderColor: '#6EECF6',
                        backgroundColor: '#6EECF6',
                        type: 'bar',
                        barPercentage: 0.1,
                        data: [<?php echo $data5; ?>],
                        fill: false,
                    }]
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
                                padding: 20,
                                usePointStyle: true,
                            },
                        }
                    },
        		    scales: {
            			C: {
            			    type: 'linear',
            			    display: true,
            			    position: 'left',
            			    ticks: {
                                font: {
                                    size: 10,
                                },
                                color: "#108AB4",
                            }
            			},
            			B: {
            			    type: 'linear',
            			    display: true,
            			    position: 'left',
            			    ticks: {
                                font: {
                                    size: 10,
                                },
                                color: "#5EC155",
                            }
            			},
            			A: {
            			    type: 'linear',
            			    display: true,
            			    position: 'left',
            			    ticks: {
                                font: {
                                    size: 10,
                                },
                                color: "#E1CE90",
                            }
            			},
            			D: {
            			    type: 'linear',
            			    display: true,
            			    position: 'right',
            			    ticks: {
                                font: {
                                    size: 10,
                                },
                                color: "#BC9B55",
                            }
            			},
            			E: {
            			    type: 'linear',
            			    display: true,
            			    position: 'right',
            			    ticks: {
                                font: {
                                    size: 10,
                                },
                                color: "#6EECF6",
                            }
            			},
            			xAxes: {
							ticks: {
                                font: {
                                    size: 10,
                                },
                                color: "white",
                            }
						},
        		    },
        		}
            });
        </script>
    </body>
</html>
