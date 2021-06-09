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
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>Accelerometer data</title>
	</head>

	<body>	   
	    <div class="container">	
	    <h1>Evolution de League of Legends</h1>       
			<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020],
		            datasets: 
		            [{
		                label: 'Nombre de joueures',
						yAxesID: 'A',
		                data: [<?php echo $data1; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            },

		            {
		            	label: 'Evenements',
						yAxesID: 'B',
		                data: [<?php echo $data2; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(0,130,255)',
		                borderWidth: 3	
		            },

					{
		            	label: 'Champions sorties',
						yAxesID: 'D',
		                data: [<?php echo $data3; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(0,255,0)',
		                borderWidth: 3	
		            },

					{
		            	label: 'Reworks effectués',
						yAxesID: 'C',
		                data: [<?php echo $data4; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(0,255,90)',
		                borderWidth: 3	
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips: {mode: 'nearest'},scales: {yAxes: [{id: 'A',type: 'linear',position: 'left',ticks: {fontColor: '#ffbaa2',}}, {id: 'B',type: 'linear',position: 'right',ticks: {fontColor: '#91cf96'}}, {id: 'C',type: 'linear',position: 'right',ticks: {fontColor: '#c881d2',}}]},
					point: {
                		radius: 5,
                		borderWidth: 2,
                		pointStyle: 'circle'
           				},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        }
		    });
			</script>
	    </div>
	    
	</body>
</html>