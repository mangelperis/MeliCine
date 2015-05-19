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

if(isset($_POST['añadir_peli'])){
	$nocartel = 'no_disponible.jpg';
			$records = $databaseConnection->prepare('INSERT INTO peliculas (Codigo, Titulo, Genero, Pais, Duracion, Director, Reparto, Sinopsis, Calificacion, Trailer, Distribuidora, Estado, Cartel, `Fecha estreno`) 
									VALUES (NULL, :titulo, :genero, :pais, :duracion, :director, :reparto, :sinopsis, :calificacion, :trailer, :distribuidora, :estado, :cartel, :fecha)');
			$records->bindParam(':titulo', $_POST['titulo']);
			$records->bindParam(':genero', $_POST['genero']);
			$records->bindParam(':pais', $_POST['pais']);
			$records->bindParam(':duracion', $_POST['duracion']);
			$records->bindParam(':director', $_POST['director']);
			$records->bindParam(':reparto', $_POST['reparto']);
			$records->bindParam(':sinopsis', $_POST['sinopsis']);
			$records->bindParam(':calificacion', $_POST['calificacion']);
			$records->bindParam(':trailer', $_POST['trailer']);
			$records->bindParam(':distribuidora', $_POST['distribuidora']);
			$records->bindParam(':estado', $_POST['estado']);
			if($_POST['cartel'] == ''){
				$records->bindParam(':cartel', $nocartel);				
			}else{
				$records->bindParam(':cartel', $_POST['cartel']);
			}
			$records->bindParam(':fecha', $_POST['fecha']);
			$records->execute();
			
	
	echo "<script type='text/javascript'>alert('Pelicula añadida');</script>";
}
if(isset($_POST['modificar_peli'])){
	
	
	echo "<script type='text/javascript'>alert('Pelicula modificada');</script>";
}
if(isset($_POST['eliminar_peli'])){
	echo "<script type='text/javascript'>alert('Pelicula eliminada');</script>";
}


 ?>
<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es_admin.php');
?>

<title>MeliCine | Panel de administración | Gestion BDD</title>
<meta name=keywords content=""/>
<meta name=description content=""/>
<!-- JavaScript Includes CLOCK-->
		<script src="js/1.11.1/jquery.min.js"></script>
		<script src="clock/js/moment.js"></script>
		<script src="clock/js/script.js"></script>
<!-- TIPEAHEADS -->		
    <script src="js/typeahead.min.js"></script>
	<!-- TITULO PELI -->
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
			<!-- NUM SALA-->
		<script>
		$(document).ready(function(){
		$('input.typeahead_sala').typeahead({
			name: 'typeahead_sala',
			remote:'search.php?num=%QUERY',
			limit : 10
		});
	});
		</script>
		
	
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
		<form  method="post" action="gestionbdd.php" >
			<p style="text-align:center;"> Selecciona la acción deseada: <br/>
			
			<input type="submit" name='añadir'  class="button" value="Añadir " />
			<input type="submit" name='modificar'  class="button" value="Modificar" />
			<input type="submit" name='eliminar'  class="button" value="Eliminar" />
			</p>
		</form>	
		<br/>
<?php
//DISPLAY SEGUN CLICK DE ACCION
//AÑADIR 
if(isset($_POST['añadir'])){
					$records = $databaseConnection->prepare('SELECT * FROM generos');					
					$records->execute();
					$records1 = $databaseConnection->prepare('SELECT * FROM paises');					
					$records1->execute();
					
	
		//ACCIONES (HTML)
print('	
	<h3>Añadir película </h3>
	<br/>
	<form action="gestionbdd.php" method="post" style="margin-left:55px;">
			Titulo:	<input type="text" name="titulo" value="" style="width:370px;margin-right:30px;"  > 
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
			Duración:<input type="text" name="duracion" value="" style="width:50px;"  >&nbsp;min
					<br/><br/>
			Director:<input type="text" name="director" value="" style="width:300px;margin-right:40px;"   >
			Calificación:<select name="calificacion">
							<option selected value="Pendiente">Pendiente</option>
							<option  value="+7">+7</option>
							<option  value="+12">+12</option>
							<option  value="+16">+16</option>
							<option  value="+18">+18</option>
							<option  value="TP">TP</option>
					</select>
					<br/><br/>
			Reparto: <textarea  name="reparto" value="" style="width:600px;"  > 	</textarea>	
					<br/><br/>
			Sinopsis: <textarea  name="sinopsis" value="" style="width:600px;"  > 	</textarea>	
					<br/><br/>
			Trailer:<input type="text" name="trailer" value="" style="width:300px;margin-right:10px;"  >
			Distribuidora:<input type="text" name="distribuidora" value="" style="width:200px;"  >
					<br/><br/>
			Cartel:<input type="text" name="cartel" value="" style="width:300px;margin-right:10px;"  >
			Fecha Estreno:<input type="text" name="fecha"> (YYYY-MM-DD)
					<br/><br/>
			Estado:	<select name="estado">
						<option selected value="0">0 - Despublicado</option>
						<option  value="1">1 - Cartelera</option>
						<option  value="2">2 - Proximamente</option>
						
					</select>
					<span style="float:right;">
					<input type="submit" name="añadir_peli" value="Añadir" class="button">
					<input type="reset" value="Borrar"  class="button">
					</span>	
	</form>
	
		
<!-- FIN AÑADIR -->		
		');
	}
	
//MODIFICAR
if(isset($_POST['modificar'])){
		//ACCIONES
			echo "<h3>Buscar película a modificar </h3><br/>";
			
			print('
					<form   method="post" action="gestionbdd_modificar.php" >
						<p style="text-align:center;">
						<input style="width:300px;text-align:left !important;" type="text" name="typeahead_titulo_pelicula" class="typeahead" autocomplete="off" spellcheck="false" placeholder="Buscar por Titulo ...">
						<img style="vertical-align:middle;" src="images/buscar.png" width="16" height="16" border="0" /> &nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="editar_peli"  class="button" value="Editar Info" />
						</p>
					</form>				
			');
	}
	
//ELIMINAR
if(isset($_POST['eliminar'])){
		//ACCIONES
			echo "<h3>Buscar película a eliminar </h3><br/>";
			
			print('
					<form   method="post" action="gestionbdd_modificar.php" >
						<p style="text-align:center;">
						<input style="width:300px;text-align:left !important;" type="text" name="typeahead_titulo_pelicula" class="typeahead" autocomplete="off" spellcheck="false" placeholder="Buscar por Titulo ...">
						<img style="vertical-align:middle;" src="images/buscar.png" width="16" height="16" border="0" /> &nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="eliminar_peli"  class="button" value="Eliminar Peli" />
						</p>
					</form>				
			');
	}


?>		

		

			
	</div>
</div>
</body>
</html>