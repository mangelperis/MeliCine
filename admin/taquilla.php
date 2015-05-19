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
/*if($_SESSION['usermaestro'] == 2)
{
	$_SESSION['session'] = '403' ;
	header('Location: index.php'); 
	exit();	
}*/
//CONEXION A BDD Y CONSULTAS 
require_once('Connections/conexion.php');

$hoy = date("Y-m-d");     
$hoy = '2015-05-26';  
												
			$records = $databaseConnection->prepare('SELECT * FROM pases INNER JOIN sesiones on pases.NumSesion = sesiones.NumSesion 
													INNER JOIN salas on pases.NumSala = salas.NumSala INNER JOIN peliculas on pases.CodigoPeli = peliculas.Codigo 
													WHERE (Estado = 1 OR Estado = 2) AND DiaPase = :fechahoy ORDER BY Titulo ASC, HoraIni ASC');
			$records->bindParam(':fechahoy', $hoy);
			$records->execute();
			//$results = $records->fetch(PDO::FETCH_ASSOC);

 ?>
<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es_admin.php');
?>

<title>MeliCine | Panel de administración | Taquilla</title>
<meta name=keywords content=""/>
<meta name=description content=""/>
</head>   
<body class="admin">
<?php 
include ('menu.php');
$_REQUEST['page'] = '4';
if ($_SESSION['usermaestro'] == '1'){
	menu(); //llamo menu + clock + welcome	
}
if ($_SESSION['usermaestro'] == '2'){
	menu_tq(); //llamo menu + clock + welcome	
}
?>
<script>
//REFRESCAR PAGINA + UPDATE DE CONTADOR DE VENTAS
 function disponibilidad(){
	   setTimeout(function(){
                         window.location.reload(true);
                    }, 1500);  	 
 }

</script>
<div id="content">		
		<div id="marco">
			<table class="taquilla" cellpadding="0" cellspacing="0"> 
				<tr class="header">
					<th>Cartel</th>
					<th>Titulo</th>
					<th>Calificación</th>
					<th>Sesión</th>
					<th>Duración</th>
					<th>Sala</th>
					<th></th>
				</tr>
<?php
	while( $results = $records->fetch(PDO::FETCH_ASSOC) ){
		$cartel = $results[Cartel];
		$titulo = strtoupper($results[Titulo]);
		$calif = $results[Calificacion];
		$sesion = date("H:i", strtotime($results[HoraIni]));
		$duracion = $results[Duracion];
		$numsala = $results[NumSala];
		$disp = (intval($results[Butacas]) - intval($results[Vendidas]));
		$aforototal = $results[Butacas];
		
		
		
		print('
					<tr>
						<td>
							<img style="margin-top:3px;" src="../imagenes/pelis/'.$cartel.'"   alt="Cartel '.$titulo.'" width="91" height="131" border="0" />
						</td>
						<td class="titulo">
							<strong>'.$titulo.'</strong> 
						</td>
						<td>
							'.$calif.'
						</td>
						<td>
							'.$sesion.'
						</td>
						<td>
							'.$duracion.' min
						</td>
						<td>
							<strong>SALA <br/><span style="color:red;">'.$numsala.'</span> </strong>
						</td>
						<td>
						');						
							
			if($disp > 0 ){
								print ('
						<center>
							<div class="button-holder">
							<form  method="post" target="_blank" action="entradas/entradas.php">								
								<input class="button" type="submit"  value="Generar entrada"  onclick="javascript:disponibilidad();"/>
									<select name="cantidad">
										<option selected value="1">1</option>
									');
									if($disp >= 5){
										for ($i = 2;  $i <= 5; $i++){
											print('
												<option  value="'.$i.'">'.$i.'</option>
											');											
										}										
									}else{
										for ($i = 2;  $i <= $disp; $i++){
											print('
												<option  value="'.$i.'">'.$i.'</option>
											');									
										}
									}									
										 
									
							print('		 
									</select>
									<input type="hidden" name="numsesion" value="'.$results[NumSesion].'"/> 
									<input type="hidden" name="sala" value="'.$results[NumSala].'"/> 
								</form>
							</div>	
							<hr style="width:85%"/>
							<p><strong>AFORO DISPONIBLE:</strong> '.$disp.' / '.$aforototal.'</p>
							<progress  value="'.$disp.'" max="'.$aforototal.'"></progress>
							</center>						
								
								');
				/* NO QUEDAN LOCALIDADES */
							}else{
								print('
								<center>							
									<p><strong>AFORO DISPONIBLE:</strong> <span style="color:red;font-weight:bold;">'.$disp.'</span> / '.$aforototal.'</p>
									<progress  value="'.$disp.'" max="'.$aforototal.'"></progress>
								</center>				
								
								');
							}
								
								
							print('	

						</td>				
					</tr>	
				<!-- SEPARADOR --> 			
		
		');
		
	
	
	}
?>				
			</table>
		</div>
</div>	

<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- JavaScript Includes CLOCK-->
		<script src="clock/js/jquery.min.js"></script>
		<script src="clock/js/moment.js"></script>
		<script src="clock/js/script.js"></script>
</body>
</html>