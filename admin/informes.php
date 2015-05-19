<?php
//creamos la sesion
if (!isset($_SESSION)) { 
  session_start();
}
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion volvemos al login form
if(!isset($_SESSION['username'])) 
{  
  header('Location: index.php'); 
  exit();
}

//VOY A SIMULAR QUE DENIEGO EL ACCESO AL GRUPO Taquilla a este archivo/*
if($_SESSION['usermaestro'] == 2)
{
	$_SESSION['session'] = '403' ;
	header('Location: index.php'); 
	exit();	
}
//CONEXION A BDD Y CONSULTAS 
require_once('Connections/conexion.php');

 ?>
<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es_admin.php');
?>

<title>MeliCine | Panel de administración | Informes</title>
<meta name=keywords content=""/>
<meta name=description content=""/>
<!-- JavaScript Includes CLOCK-->
		<script src="js/1.11.1/jquery.min.js"></script>
		<script src="clock/js/moment.js"></script>
		<script src="clock/js/script.js"></script>	
</head>   
<body class="admin">
<?php 
include ('menu.php');
$_REQUEST['page'] = '2';
if ($_SESSION['usermaestro'] == '1'){
	menu(); //llamo menu + clock + welcome	
}
if ($_SESSION['usermaestro'] == '2'){
	menu_tq(); //llamo menu + clock + welcome	
}
?>
<div id="content">		
	<div id="marco">
		<h3><hr/><img src="../imagenes/informes.png" width="147" height="50" alt="INFORMES" /><hr/></h3><br/>
<?php

/**************************/
$hoy = date("Y-m-d");     
$hoy = '2015-05-26';  
/********CONSULTAS*********************/
	// LINEA 1, 2(€)
			$records = $databaseConnection->prepare('SELECT SUM(Vendidas) as Vendidas FROM pases WHERE `DiaPase` = :hoy ');
			$records->bindParam(':hoy',$hoy);
			$records->execute();
			$total_ventas_hoy = $records->fetch(PDO::FETCH_ASSOC);
			$euros_hoy = 6.50 * intval($total_ventas_hoy[Vendidas]);
	// LINEA 3
			$records = $databaseConnection->prepare('SELECT SUM(Vendidas) as Vendidas FROM `pases` ');	
			$records->execute();
			$total_espectadores = $records->fetch(PDO::FETCH_ASSOC);
					
	// LINEA 4	
			$records = $databaseConnection->prepare('SELECT SUM(Vendidas) as Vendidas, DiaPase FROM `pases` GROUP BY `DiaPase` LIMIT 0,1');
			$records->bindParam(':hoy',$hoy);
			$records->execute();
			$mayor_afluencia = $records->fetch(PDO::FETCH_ASSOC);
			$mayor_afluencia_fecha = strtotime($mayor_afluencia[DiaPase]);
	// LINEA 5,7
			$records = $databaseConnection->prepare('SELECT Titulo, SUM(Vendidas) as Vendidas FROM pases INNER JOIN peliculas on pases.CodigoPeli = peliculas.Codigo WHERE DiaPase = :hoy GROUP BY Titulo ORDER BY Vendidas DESC');
			$records->bindParam(':hoy',$hoy);
			$records->execute();
			$peli_max_taquillera = $records->fetch(PDO::FETCH_ASSOC);			
	// LINEA 6
			$records = $databaseConnection->prepare('SELECT HoraIni, SUM(Vendidas) as Vendidas, sesiones.NumSesion as NS FROM pases INNER JOIN sesiones on pases.NumSesion = sesiones.NumSesion WHERE DiaPase = :hoy GROUP BY HoraIni ORDER BY Vendidas DESC LIMIT 0,1');
			$records->bindParam(':hoy',$hoy);
			$records->execute();
			$sesion_max_vendidas = $records->fetch(PDO::FETCH_ASSOC);
	// LINEA 7
			$records = $databaseConnection->prepare('SELECT Titulo, SUM(Vendidas) as Vendidas FROM pases INNER JOIN peliculas on pases.CodigoPeli = peliculas.Codigo WHERE DiaPase = :hoy GROUP BY Titulo ORDER BY Vendidas ASC');
			$records->bindParam(':hoy',$hoy);
			$records->execute();
			$peli_min_taquillera = $records->fetch(PDO::FETCH_ASSOC);			
		



/*************************/
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$fecha = strtotime($hoy);
/*************************/
																			
	print('<p style="margin-left:30px;text-decoration:underline;"><strong> '.$dias[date('w',$fecha)].", ".date('d',$fecha)." de ".$meses[date('n',$fecha)-1]. " del ".date('Y',$fecha).'</strong></p>');
	print('<center><h3><u>Ventas & Facturación</u></h3></center>');
	print('<span class="ca-icon" style="margin:0px;">&#117;</span><p style="margin-left:100px;">La cantidad de entradas vendidas hoy es de <strong>'.$total_ventas_hoy[Vendidas].'</strong> .<br/><br/>');
	print('Esto supone (teniendo en cuenta un PVP de las entradas de <strong>6,50 €</strong>) unos ingresos por ventas de <strong>'.$euros_hoy.'</strong> €.</p>');

	
    print('<center><h3><u>Estadísticas</u></h3></center>');
	print('<span class="ca-icon" style="margin:0px;">&#81;</span><p style="margin-left:100px;">El número total de espectadores que ha tenido el cine es de <strong>'.$total_espectadores[Vendidas].'</strong>.<br/><br/>');
	print('El día con mayor afluencia fue el <strong>'.$dias[date('w',$mayor_afluencia_fecha)].", ".date('d',$mayor_afluencia_fecha)." de ".$meses[date('n',$mayor_afluencia_fecha)-1]. " del ".date('Y',$mayor_afluencia_fecha).'</strong> con un total de <strong>'.$mayor_afluencia[Vendidas].'</strong> espectadores.</p>');
	
	print('<center><h3><u>Películas</u></h3></center>');
	print('<span class="ca-icon" style="margin:0px;">&#35;</span><p style="margin-left:100px;">La película MÁS taquillera hoy es <strong>'.$peli_max_taquillera[Titulo].'</strong> con <strong>'.$peli_max_taquillera[Vendidas].'</strong> entradas vendidas.<br/><br/>');
	print('La sesión con más afluencia en el día de hoy es la de las <strong>'.date("H:i", strtotime($sesion_max_vendidas[HoraIni])).'</strong> con <strong>'.$sesion_max_vendidas[Vendidas].' </strong> espectadores en total. <br/></br>');
	print('La película MENOS taquillera en el día de hoy es <strong>'.$peli_min_taquillera[Titulo].'</strong> con <strong>'.$peli_min_taquillera[Vendidas].'</strong> espectadores.</p>');
?>			
	</div>
</div>
</body>
</html>