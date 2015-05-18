<?php

//creamos la sesion
if (!isset($_SESSION)) { 
  session_start();
}
//validamos si se ha hecho o no el inicio de sesion correctamente

//si no se ha hecho la sesion volvemos al login form
if(!isset($_SESSION['username'])) 
{		
	$_SESSION['session'] = false ;
	header('Location: index.php'); 
	exit();
}
	
 ?>
<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es_admin.php');
?>

<title>MeliCine | Panel de administración</title>
<meta name=keywords content=""/>
<meta name=description content=""/>
<script src="js/Chart.js"></script>

</head>   
<body class="admin">
<?php 
include ('menu.php');
$_REQUEST['page'] = '0';
if ($_SESSION['usermaestro'] == '1'){
	menu(); //llamo menu + clock + welcome	
}
if ($_SESSION['usermaestro'] == '2'){
	menu_tq(); //llamo menu + clock + welcome	
}

?>
<div id="content">		
		<div id="marco">
			<h3>Entradas vendidas por sesión hoy</h3>
			<canvas id="canvas" width="400" height="100"></canvas>
			<h3>Entradas vendidas por película hoy</h3>
			<center><canvas id="chart-area" width="300" height="300"/></center>				
		</div>		
</div>	
<?php
// VALORES PARA LOS GRAFICOS 
	require_once('Connections/conexion.php');
		$hoy = date("Y-m-d");     
		$hoy = '2015-05-08';  
	//POR SESION 
			$records1 = $databaseConnection->prepare('SELECT HoraIni, SUM(Vendidas) as Vendidas, sesiones.NumSesion as NS FROM pases INNER JOIN sesiones on pases.NumSesion = sesiones.NumSesion WHERE DiaPase = :hoy GROUP BY HoraIni ORDER BY HoraIni ASC');
			$records1->bindParam(':hoy',$hoy);
			$records1->execute();
		
	// POR PELICULA
			$records = $databaseConnection->prepare('SELECT Titulo, SUM(Vendidas) as Vendidas FROM pases INNER JOIN peliculas on pases.CodigoPeli = peliculas.Codigo WHERE DiaPase = :hoy GROUP BY Titulo ');
			$records->bindParam(':hoy',$hoy);
			$records->execute();
			//$results = $records->fetch(PDO::FETCH_ASSOC);
?>
<script>
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
		
		// ETIQUETAS + STRING DE DATOS (VALORES)
		<?php
		print ('labels : [');
		$string_data = 'data : [';
			while( $results1 = $records1->fetch(PDO::FETCH_ASSOC) ){
				echo ('"'.date("H:i", strtotime($results1[HoraIni])).' ",');	
				$string_data .= $results1[Vendidas].',';
			}
		print('],');
		$string_data .= ']';
		?>			
		/*****************/
						datasets : [
				
				{
					label: "Entradas vendidas",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					
					<?php print $string_data; ?>
					
				}
			
	
			]
		}

	
		var pieData = [		
<?php
		while( $results = $records->fetch(PDO::FETCH_ASSOC) ){
			echo ('
					{				
						value:'.json_encode($results[Vendidas]).',
						color: getRandomColor(),
						highlight: getRandomColor(),
						label:"'.substr($results[Titulo],0,26).'"
					},
					');				
		}	
?>
			];
			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);
				
				var ctx2 = document.getElementById("canvas").getContext("2d");	    
				window.myLine = new Chart(ctx2).Line(lineChartData, {
				responsive: true
			
				});
			};	
				
		
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- JavaScript Includes CLOCK-->
		<script src="clock/js/jquery.min.js"></script>
		<script src="clock/js/moment.js"></script>
		<script src="clock/js/script.js"></script>
		
</body>
</html>