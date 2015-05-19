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


//ENVIOS FORM SEGÚN QUE BOTON PULSAS + QUERYS SQL
//DESPUBLICAR DE CARTELERA
if(isset($_POST['desp_cartelera'])){
	if (is_array($_POST['CodigoPeli'])) {
			$selected = '';
			$num_pelis = count($_POST['CodigoPeli']);
			$current = 0;
			foreach ($_POST['CodigoPeli'] as $key => $value) {
				if ($current != $num_pelis-1){
					//$selected .= $value.', ';
					$records = $databaseConnection->prepare('UPDATE peliculas SET Estado=0 WHERE Codigo = :codigo');
					$records->bindParam(':codigo', $value);
					$records->execute();
				}else{
					//$selected .= $value.'.';
					$records = $databaseConnection->prepare('UPDATE peliculas SET Estado=0 WHERE Codigo = :codigo');
					$records->bindParam(':codigo', $value);
					$records->execute();
				}
				$current++;
			}
		}
		else {
			echo "<script type='text/javascript'>alert('Debes seleccionar al menos una pelicula');</script>";
		}		
}


//AÑADIR A CARTELERA SEGUN EL TITULO BUSCADO
if(isset($_POST['añadir_cartelera'])){
		//ACCIONES
			$records = $databaseConnection->prepare('UPDATE peliculas SET Estado=1 WHERE Titulo = :titulo');
			$records->bindParam(':titulo', $_POST['typeahead_añadir_cartelera']);
			$records->execute();		
	}

//AÑADIR A PROXIMAMENTE SEGUN EL TITULO BUSCADO
if(isset($_POST['añadir_proximamente'])){
		//ACCIONES
			$records = $databaseConnection->prepare('UPDATE peliculas SET Estado=2 WHERE Titulo = :titulo');
			$records->bindParam(':titulo', $_POST['typeahead_añadir_proximamente']);
			$records->execute();		
	}
//DESPUBLICAR DE PASES
if(isset($_POST['desp_pases'])){
	if (is_array($_POST['NumPase'])) {
			$selected = '';
			$num_pelis = count($_POST['NumPase']);
			$current = 0;
			foreach ($_POST['NumPase'] as $key => $value) {
				if ($current != $num_pelis-1){
					$records = $databaseConnection->prepare('DELETE FROM pases WHERE NumPase = :pase');
					$records->bindParam(':pase', $value);
					$records->execute();
				}else{
					$records = $databaseConnection->prepare('DELETE FROM pases WHERE NumPase = :pase');
					$records->bindParam(':pase', $value);
					$records->execute();
				}
				$current++;
			}
		}
		else {
			echo "<script type='text/javascript'>alert('Debes seleccionar al menos un pase');</script>";
		}		
}
//TRUNCATE TABLA PASES (VACIAR TABLA)
if(isset($_POST['truncate'])){
	
			$records = $databaseConnection->prepare('TRUNCATE pases');			
			$records->execute();
}	
//AÑADIR A TAQUILLA CON BUSCADOR
if(isset($_POST['añadir_taquilla']) ){
	if($_POST['typeahead_añadir_taquilla_titulo'] == ''){
		echo "titulo vacio";
		
	}else {
		
		if($_POST['typeahead_añadir_taquilla_sala'] == ''){
			echo "sala empty";
		
		}else {
		
			if ($_POST['typeahead_añadir_taquilla_sesion'] == ''){	
				echo "falta sesion";
			}else{
					//ACCIONES (LOS CAMPOS NO ESTAN VACIOS)
					//CONSULTA PARA SACAR EL CODIGO DE LA PELICULA (POR TITULO)
					$records = $databaseConnection->prepare('SELECT Codigo FROM peliculas WHERE Titulo = :titulo ');
					$records->bindParam(':titulo', $_POST['typeahead_añadir_taquilla_titulo']);
					$records->execute();
					$results = $records->fetch(PDO::FETCH_ASSOC);
					//CONSULTA PARA SACAR NUMSESION DE LA SESION (POR HORAINI)
					$records1 = $databaseConnection->prepare('SELECT NumSesion FROM sesiones WHERE HoraIni = :hora ');
					$records1->bindParam(':hora', $_POST['typeahead_añadir_taquilla_sesion']);
					$records1->execute();
					$results1 = $records1->fetch(PDO::FETCH_ASSOC);
					
					//CONSULTA DE INSERCION					
					try{
						$records = $databaseConnection->prepare('INSERT INTO pases (NumPase,NumSala, NumSesion, DiaPase, Vendidas, CodigoPeli) VALUES (NULL, :numsala, :numsesion, "2015-05-26", 0,:codigo);');
						$records->bindParam(':numsala', $_POST['typeahead_añadir_taquilla_sala']);
						$records->bindParam(':numsesion', $results1['NumSesion']);
						$records->bindParam(':codigo', $results['Codigo']);
						$records->execute();
					}catch (MySQLException $e) {
						// other mysql exception (not duplicate key entry)
						$e->getMessage();
					}
		
			}
		}
	}	
	
}
 ?>
<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es_admin.php');
?>

<title>MeliCine | Panel de administración | Cartelera</title>
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
				<!-- SESION  -->
			<script>
			$(document).ready(function(){
			$('input.typeahead_sesion').typeahead({
				name: 'typeahead_sesion',
				remote:'search.php?hora=%QUERY',
				limit : 10
			});
		});
			</script>
	
</head>   
<body class="admin">
<?php 
include ('menu.php');
$_REQUEST['page'] = '3';
if ($_SESSION['usermaestro'] == '1'){
	menu(); //llamo menu + clock + welcome	
}
if ($_SESSION['usermaestro'] == '2'){
	menu_tq(); //llamo menu + clock + welcome	
}
?>

<div id="content">		
	<div id="marco">
<!-- PROXIMAMENTE -->		
		<h3><hr/><img src="../imagenes/proximamente.png" width="147" height="30" alt="PRÓXIMAMENTE" /><hr/></h3>
			<form name="proximamente" id="proximamente"  method="post" action="cartelera.php">
				<table width="720" border="0" cellspacing="0" cellpadding="0" class="pelis" style="margin-left:60px">
			<tr>
<?php
		$estado = 2;
			$records = $databaseConnection->prepare('SELECT * FROM  peliculas WHERE estado = :estado ORDER BY `Fecha estreno` ASC');
			$records->bindParam(':estado', $estado);
			$records->execute();
									
			$records2 = $databaseConnection->prepare('SELECT * FROM  peliculas WHERE estado = :estado ORDER BY `Fecha estreno` ASC');
			$records2->bindParam(':estado', $estado);
			$records2->execute();
						
			$records3 = $databaseConnection->prepare('SELECT * FROM  peliculas WHERE estado = :estado ORDER BY `Fecha estreno` ASC');
			$records3->bindParam(':estado', $estado);
			$records3->execute();
		
		while( $results = $records->fetch(PDO::FETCH_ASSOC) ){
			print('
			  <td width="104" height="146" align="center">
				<a href="../pelicula.php?id='.$results['Codigo'].'" target="_blank">
				');
				if(is_file('../imagenes/pelis/'.$results['Cartel'])){				
					print('	<img src="../imagenes/pelis/'.$results['Cartel'].'" alt="Cartel '.$results['Titulo'].'" width="91" height="131" border="0" /> ');
				}else{
					print('	<img src="../imagenes/pelis/no_disponible.jpg" alt="Cartel no disponible" width="91" height="131" border="0" /> ');
				}								
			print('	
				</a>
			  </td>
			
			');
						
		}
?>			 
			</tr>
			<tr>
<?php
	
		while( $results = $records3->fetch(PDO::FETCH_ASSOC) ){
				/***** CONVERTIR FECHAS A ESPAÑOL ***********/
					$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
					$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					$fecha = strtotime($results['Fecha estreno']); 
					 
				/******************************************/	
			print('
			  <td height="60" align="center" valign="top" >
				<div style="margin-right:0px;font-style:italic;font-size:13px;">
				'.date('d',$fecha)." de ".$meses[date('n',$fecha)-1].'
				</div>
			</td>
			
			');			
		}
?>	
			</tr>
			<tr>
<?php
		
		while( $results = $records2->fetch(PDO::FETCH_ASSOC) ){
			print('
			  <td height="60" align="center" valign="top" >
				<div style="margin-right:10px"><strong>
				'.strtoupper($results['Titulo']).'</strong>
				<br/>
				<input type="checkbox"  value="'.$results['Codigo'].'" name="CodigoPeli[]" /> 
				</div>
			</td>
			
			');			
		}
?>						  
			</tr>
		
		</table><br/>
		<center><input type="submit" name='desp_cartelera'  class="button" value="Despublicar selecc." />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"  class="button" value="Borrar" /></center>

		</form>
		<br/>
	
	<form name="añadir" id="añadir"  method="post" action="cartelera.php" >
		<p style="text-align:center;">
		<input style="width:300px;text-align:left !important;" type="text" name="typeahead_añadir_proximamente" class="typeahead" autocomplete="off" spellcheck="false" placeholder="Buscar por Titulo ...">
	    <img style="vertical-align:middle;" src="images/buscar.png" width="16" height="16" border="0" /> &nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name='añadir_proximamente'  class="button" value="Añadir a Proximamente" />
		</p>
	</form>	
<!-- FIN Proximamente -->
<!-- CARTELERA -->
		<h3> <img src="../imagenes/la_cartelera.png" width="147" height="30" alt="LA CARTELERA" /><hr/></h3>
	<form name="cartelera" id="cartelera"  method="post" action="cartelera.php">
		<table width="720" border="0" cellspacing="0" cellpadding="0" class="pelis" style="margin-left:60px">
			<tr>
<?php
		$estado = 1;
			$records = $databaseConnection->prepare('SELECT Codigo,Titulo,Cartel FROM  peliculas WHERE estado = :estado ORDER BY Titulo ASC');
			$records->bindParam(':estado', $estado);
			$records->execute();
			$cuenta = $records->rowCount();
					
			$records2 = $databaseConnection->prepare('SELECT Codigo,Titulo,Cartel FROM  peliculas WHERE estado = :estado ORDER BY Titulo ASC');
			$records2->bindParam(':estado', $estado);
			$records2->execute();

		while( $results = $records->fetch(PDO::FETCH_ASSOC) ){
			print('
			  <td width="104" height="146" align="center">
				<a href="../pelicula.php?id='.$results['Codigo'].'" target="_blank">
				');
				if(is_file('../imagenes/pelis/'.$results['Cartel'])){				
					print('	<img src="../imagenes/pelis/'.$results['Cartel'].'" alt="Cartel '.$results['Titulo'].'" width="91" height="131" border="0" /> ');
				}else{
					print('	<img src="../imagenes/pelis/no_disponible.jpg" alt="Cartel no disponible" width="91" height="131" border="0" /> ');
				}								
			print('	
				</a>
			  </td>
			
			');
						
		}
?>			 
			</tr>
			<tr>
<?php	
		while( $results = $records2->fetch(PDO::FETCH_ASSOC) ){
			print('
			  <td height="60" align="center" valign="top" >
				<div style="margin-right:10px"><strong>
				'.strtoupper($results['Titulo']).'</strong>
					<br/>
					<input type="checkbox"  value="'.$results['Codigo'].'" name="CodigoPeli[]" /> 
				</div>
			</td>
			
			');			
		}
?>						  
			</tr>

		</table><br/>
		
		<center><input type="submit" name='desp_cartelera'  class="button" value="Despublicar selecc." />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"  class="button" value="Borrar" /></center>
	</form>
	
	<br/>
	
	<form name="añadir" id="añadir"  method="post" action="cartelera.php" >
		<p style="text-align:center;">
		<input style="width:300px;text-align:left !important;" type="text" name="typeahead_añadir_cartelera" class="typeahead" autocomplete="off" spellcheck="false" placeholder="Buscar por Titulo ...">
	    <img style="vertical-align:middle;" src="images/buscar.png" width="16" height="16" border="0" /> &nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name='añadir_cartelera'  class="button" value="Añadir a Cartelera" />
		</p>
	</form>		
<!-- FIN CARTELERA -->	
<!-- TAQUILLA -->		
		<h3><hr/><img src="../imagenes/taquilla.png" width="100" height="25" alt="TAQUILLA" /><hr/></h3>
			<form name="proximamente" id="proximamente"  method="post" action="cartelera.php">
				<table width="720" border="0" cellspacing="0" cellpadding="0" class="pelis" style="margin-left:60px">
			<tr>
<?php
$hoy = date("Y-m-d");     
$hoy = '2015-05-26';  
												
			$records = $databaseConnection->prepare('SELECT * FROM pases INNER JOIN sesiones on pases.NumSesion = sesiones.NumSesion 
													INNER JOIN salas on pases.NumSala = salas.NumSala INNER JOIN peliculas on pases.CodigoPeli = peliculas.Codigo 
													WHERE (Estado = 1 OR Estado = 2) AND DiaPase = :fechahoy ORDER BY Titulo ASC, HoraIni ASC');
			$records->bindParam(':fechahoy', $hoy);
			$records->execute();
			
			$records2 = $databaseConnection->prepare('SELECT * FROM pases INNER JOIN sesiones on pases.NumSesion = sesiones.NumSesion 
													INNER JOIN salas on pases.NumSala = salas.NumSala INNER JOIN peliculas on pases.CodigoPeli = peliculas.Codigo 
													WHERE (Estado = 1 OR Estado = 2) AND DiaPase = :fechahoy ORDER BY Titulo ASC, HoraIni ASC');
			$records2->bindParam(':fechahoy', $hoy);
			$records2->execute();
			
			$records3 = $databaseConnection->prepare('SELECT * FROM pases INNER JOIN sesiones on pases.NumSesion = sesiones.NumSesion 
													INNER JOIN salas on pases.NumSala = salas.NumSala INNER JOIN peliculas on pases.CodigoPeli = peliculas.Codigo 
													WHERE (Estado = 1 OR Estado = 2) AND DiaPase = :fechahoy ORDER BY Titulo ASC, HoraIni ASC');
			$records3->bindParam(':fechahoy', $hoy);
			$records3->execute();
		
		while( $results = $records->fetch(PDO::FETCH_ASSOC) ){
			print('
			  <td width="104" height="146" align="center">
				<a href="../pelicula.php?id='.$results['Codigo'].'" target="_blank">
				');
				if(is_file('../imagenes/pelis/'.$results['Cartel'])){				
					print('	<img src="../imagenes/pelis/'.$results['Cartel'].'" alt="Cartel '.$results['Titulo'].'" width="91" height="131" border="0" /> ');
				}else{
					print('	<img src="../imagenes/pelis/no_disponible.jpg" alt="Cartel no disponible" width="91" height="131" border="0" /> ');
				}								
			print('	
				</a>
			  </td>
			
			');
						
		}
?>			 
			</tr>
			<tr>

<?php
		
		while( $results = $records2->fetch(PDO::FETCH_ASSOC) ){
			print('
			  <td height="60" align="center" valign="top" >
				<div style="margin-right:10px"><strong>
				'.strtoupper($results['Titulo']).'</strong>
				 
				</div>
			</td>
			
			');			
		}
?>						  
			</tr>
			<tr>

<?php
		
		while( $results = $records3->fetch(PDO::FETCH_ASSOC) ){
			print('
			  <td height="60" align="center" valign="top" >
				<div style="margin-right:10px"><strong>
				SALA <span style="color:red;">'.strtoupper($results['NumSala']).'</span> | '.date("H:i", strtotime($results[HoraIni])).'</strong>
				<br/>
				<input type="checkbox"  value="'.$results['NumPase'].'" name="NumPase[]" /> 							
				</div>
			</td>
			
			');			
		}
?>						  
			</tr>
		
		</table><br/>
		<center><input type="submit" name='desp_pases'  class="button" value="ELIMINAR selecc." />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"  class="button" value="Borrar" />&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name='truncate'  class="button" value="TRUNCATE (Borrar todo)" /></center>

		</form>
		<br/>
	
	<form name="pases" id="pases"  method="post" action="cartelera.php" >
		<p style="text-align:center;">
		<input style="width:300px;text-align:left !important;" type="text" name="typeahead_añadir_taquilla_titulo" class="typeahead" autocomplete="off" spellcheck="false" placeholder="Buscar por Titulo ...">
	    <img style="vertical-align:middle;" src="images/buscar.png" width="16" height="16" border="0" /> &nbsp;&nbsp;&nbsp;&nbsp;
		
		</p>
		<p style="text-align:center;">
		<input style="width:300px;text-align:left !important;" type="text" name="typeahead_añadir_taquilla_sala" class="typeahead_sala" autocomplete="off" spellcheck="false" placeholder="Sala ...">
	    <img style="vertical-align:middle;" src="images/buscar.png" width="16" height="16" border="0" /> &nbsp;&nbsp;&nbsp;&nbsp;
		
		</p>
		<p style="text-align:center;">
		<input style="width:300px;text-align:left !important;" type="text" name="typeahead_añadir_taquilla_sesion" class="typeahead_sesion" autocomplete="off" spellcheck="false" placeholder="Sesión ...">
	    <img style="vertical-align:middle;" src="images/buscar.png" width="16" height="16" border="0" /> &nbsp;&nbsp;&nbsp;&nbsp;
		
		</p>
		<center><input type="submit" name='añadir_taquilla'  class="button" value="Añadir a Taquilla" /></center>
	</form>	
<!-- FIN Proximamente -->


			
	</div>
</div>
</body>
</html>