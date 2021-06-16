<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'id15715955_root';
	$pass = 'Rosesarered69**';
	$db = 'id15715955_groupe5';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
	

	$data3 = '';
	$data4 = '';
	$data5 = '';
	$data6 = '';
	//query to get data from the table
	$sql = "SELECT * FROM `joueurs_par_region`";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$data3 = $data3 . '"'. $row['Serveurs'] .'",';
		$data4 = $data4 . '"'. $row['2010'] .'",';
		$data5 = $data5 . '"'. $row['2016'] .'",';
		$data6 = $data6 . '"'. $row['2020'] .'",';
		
	}


	$data3 = trim($data3,",");
	$data4 = trim($data4,",");
	$data5 = trim($data5,",");
	$data6 = trim($data6,",");

?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" href="img/logo.jpg"/>
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
	        <h3 class="titre">Répartition des joueurs dans le monde</h3>
            <p>La communauté se situe surtout en Amérique du Nord, en Europe de l'Ouest et en Corée du Sud, cependant son évolution montre que les nord-américains s'implique de moins en moins dans la communauté.
            </p>
	    </div>
        <div class="container">
            <canvas id="chart-horizontal" height="200px"></canvas>
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
			var ctx = document.getElementById("chart-horizontal").getContext('2d');
        	new Chart(ctx, {
				type: 'horizontalBar',
				data: {
					labels: [<?php echo $data3; ?>],
					datasets: [{
						label: '2010',
						backgroundColor: "#108AB4",
						data: [<?php echo $data4; ?>],
						}, {
						label: '2016',
						backgroundColor: "#5EC155",
						data: [<?php echo $data5; ?>],
						}, {
						label: '2020',
						backgroundColor: "#E1CE90",
						data: [<?php echo $data6; ?>],
					}],
				},
				options: {
                    legend:{
                        position: "right",
                        labels: {
                            fontColor: "white",
                            fontSize: 12,
                            usePointStyle: true,
                            padding: 30
                        }
                    },
					scales: {
						xAxes: [{
							stacked: true,
							gridLines: {
								display: false,
							},
							ticks: {
                                fontColor: "white",
                                fontSize: 10,
                            }
						}],
						yAxes: [{
							stacked: true,
							ticks: {
                                fontColor: "white",
                                fontSize: 10,
                                callback: function(t) {
                                  var maxLabelLength = 4;
                                  if (t.length > maxLabelLength) return t.substr(0, maxLabelLength) ;
                                  else return t;
                               }
                            }
						}]
					},
					tooltips: {
                        callbacks: {
                            title: function(t, d) {
                            return d.labels[t[0].index];
                            }
                        }
                    }
				}
			});
		</script>
	</body>
</html>