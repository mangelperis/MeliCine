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
			<h3>Resumen de ventas de entradas a la semana</h3>
			<canvas id="canvas" width="400" height="100"></canvas>
			<h3>Entradas generadas por película hoy</h3>
			<center><canvas id="chart-area" width="300" height="300"/></center>				
		</div>		
</div>	
<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO","DOMINGO"],
			datasets : [
				
				{
					label: "Entradas vendidas",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]
		}

	
		var pieData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Green"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				}
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