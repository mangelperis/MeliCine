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

<title>MeliCine | Panel de administración | Modificar Pelicula</title>
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
$_REQUEST['page'] = '1';
if ($_SESSION['usermaestro'] == '1'){
	menu(); //llamo menu + clock + welcome	
}
if ($_SESSION['usermaestro'] == '2'){
	menu_tq(); //llamo menu + clock + welcome	
}
?>
<div id="content">		
	<div id="marco">
<!-- OPCIONES -->
		<h3><hr/><img src="../imagenes/gestion.png" width="147" height="30" alt="GESTION BDD" /><hr/></h3>
		<br/>
<?php
//DISPLAY SEGUN CLICK DE ACCION
//ELIMINAR
if(isset($_POST['eliminar_peli'])){
	
	
	$records4 = $databaseConnection->prepare('DELETE FROM peliculas WHERE Titulo = :titulo');	
	$records4->bindParam(':titulo', $_POST['typeahead_titulo_pelicula']);
	$records4->execute();
	
	print('<p><center>La Película <strong>'.$_POST['typeahead_titulo_pelicula'].'</strong>  se ha eliminado correctamente.</center></p>');
	print('<center><a href="gestionbdd.php" class="button">Volver </a></center>');


	
}
//EDITAR
if(isset($_POST['editar_peli'])){
	
					$records4 = $databaseConnection->prepare('SELECT * FROM peliculas WHERE Titulo = :titulo');	
					$records4->bindParam(':titulo', $_POST['typeahead_titulo_pelicula']);
					$records4->execute();
					$results4 = $records4->fetch(PDO::FETCH_ASSOC);
					
					$records = $databaseConnection->prepare('SELECT * FROM generos');					
					$records->execute();
					$records1 = $databaseConnection->prepare('SELECT * FROM paises');					
					$records1->execute();					
	
		
print('	
	<h3>Modificar Pelicula </h3>
	<br/>
	<form action="gestionbdd.php" method="post" style="margin-left:55px;">
			Titulo:	<input type="text" name="titulo" value="'.$results4['Titulo'].'" style="width:370px;margin-right:30px;"  > 
			Género: <select name="genero">
		');
		while($results = $records->fetch(PDO::FETCH_ASSOC)){
			
			print('<option  value="'.$results['Codigo'].'">'.$results['Nombre'].'</option>' );
		}
						
						
print('						
					</select>
					<br/><br/>
			Pais:   <select name="pais" style="margin-right:40px;">
		');
		while($results1 = $records1->fetch(PDO::FETCH_ASSOC)){
			
			print('<option  value="'.$results1['Codigo'].'">'.$results1['Pais'].'</option> ');
		}
		
print('						
					</select>
			Duración:<input type="text" name="duracion" value="'.$results4['Duracion'].'" style="width:50px;"  >&nbsp;min
					<br/><br/>
			Director:<input type="text" name="director" value="'.$results4['Director'].'" style="width:300px;margin-right:40px;"   >
			Calificación:<select name="calificacion">
							<option selected value="Pendiente">Pendiente</option>
							<option  value="+7">+7</option>
							<option  value="+12">+12</option>
							<option  value="+16">+16</option>
							<option  value="+18">+18</option>
							<option  value="TP">TP</option>
					</select>
					<br/><br/>
			Reparto: <textarea  name="reparto"  style="width:600px;"  > '.$results4['Reparto'].'	</textarea>	
					<br/><br/>
			Sinopsis: <textarea  name="sinopsis"  style="width:600px;"  > '.$results4['Sinopsis'].'	</textarea>	
					<br/><br/>
			Trailer:<input type="text" name="trailer" value="'.$results4['Trailer'].'" style="width:300px;margin-right:10px;"  >
			Distribuidora:<input type="text" name="distribuidora" value="'.$results4['Distribuidora'].'" style="width:200px;"  >
					<br/><br/>
			Cartel:<input type="text" name="cartel" value="'.$results4['Cartel'].'" style="width:300px;margin-right:10px;"  >
			Fecha Estreno:<input type="text" name="fecha" value="'.$results4['Fecha estreno'].'"> (YYYY-MM-DD)
					<br/><br/>
			Estado:	<select name="estado">
						<option selected value="0">0 - Despublicado</option>
						<option  value="1">1 - Cartelera</option>
						<option  value="2">2 - Proximamente</option>
						
					</select>
					<span style="float:right;">
					<input type="submit" name="modificar_peli" value="Modificar" class="button">
					<input type="submit" value="Cancelar"  class="button">
					</span>	
	</form>	
		');
	}
?>					
	</div>
</div>
</body>
</html>