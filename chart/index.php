<?php
	/* Database connection settings */
	$host = '127.0.0.1';
	$user = 'root';
	$pass = 'Trackmania12';
	$db = 'groupe5';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$data1 = '';
	$data2 = '';
	$data3 = '';
	$data4 = '';
	//query to get data from the table
	$sql = "SELECT * FROM `evolution` ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$data1 = $data1 . '"'. $row['nombre'].'",';
		$data2 = $data2 . '"'. $row['evenement'] .'",';
		$data3 = $data3 . '"'. $row['champion'] .'",';
		$data4 = $data4 . '"'. $row['rework'] .'",';
	}

	$data1 = trim($data1,",");
	$data2 = trim($data2,",");
	$data3 = trim($data3,",");
	$data4 = trim($data4,",");

?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
		<title>Évolution de LoL</title>
	</head>

	<body>
		<h1>Pourquoi le succès du jeu League of Légende a ralentit? Comment ont-ils finalement reconquis les joueurs?</h1>
		<div class="container">	
	    		<h1>Évolution des joueurs et des moyens mis en place</h1>       
            		<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
            	</div>
		
	    <script>
            var ctx = document.getElementById('chart').getContext('2d');
            new Chart(ctx, {
		responsive: true,
                type: 'line',
                data: {
                    labels:[2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020],
                    datasets: [{
                    label: "Nombre de joueurs",
                    yAxisID: 'A',
                    borderColor: '#ffbaa2',
                    backgroundColor: 'white',
                    data: [<?php echo $data1; ?>],
                    fill: false
                    }, {
                    label: "Nombre d'évenements",
                    yAxisID: 'B',
                    borderColor: '#91cf96',
                    backgroundColor: 'white',
                    data: [<?php echo $data2; ?>],
                    fill: false
                    }, {
                    label: "Nombre de champions sortis",
                    yAxisID: 'C',
                    borderColor: '#c881d2',
                    backgroundColor: 'white',
                    data: [<?php echo $data3; ?>],
                    fill: false
                    }, {
                    label: "Nombre de rework",
                    yAxisID: 'D',
                    borderColor: '#c881d8',
                    backgroundColor: 'white',
                    data: [<?php echo $data4; ?>],
                    fill: false
                    }]
                },
                options: {
		    scales: {
			C: {
			    type: 'linear',
			    display: true,
			    position: 'left',
			},
			B: {
			    type: 'linear',
			    display: true,
			    position: 'left',
			},
			A: {
			    type: 'linear',
			    display: true,
			    position: 'left',
			},
			D: {
			    type: 'linear',
			    display: true,
			    position: 'right',
			},
			E: {
			    type: 'linear',
			    display: true,
			    position: 'right',
			},
		    },
		}
            });
        </script>
    </body>
</html>
