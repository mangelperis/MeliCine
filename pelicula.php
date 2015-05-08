<?php

	require_once('admin/Connections/conexion.php');
		//DEFINO EL FILTRO POR CODIGO PELICULA
		$Codigo = $_REQUEST['id'];

			$records = $databaseConnection->prepare('SELECT *  FROM peliculas INNER JOIN generos on peliculas.genero = generos.codigo
													INNER JOIN paises on peliculas.pais = paises.codigo WHERE (Estado = 1 OR Estado = 2) AND peliculas.Codigo = :Codigo ');
			$records->bindParam(':Codigo', $Codigo);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			
?> 
<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es.php');
?>
<title>MeliCine | Detalles de <?php echo $results['Titulo'];?></title>

<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'><!--  FUENTE DEL TITULO DE LA PELI --> 
</head>   
<body >
<?php 
include('funciones.php');
	head(); //llamo logo + social
	$_REQUEST['page'] = '-1'; 
	menu(); //llamo menu
?>	
<div id="detalle">	
	<div id="logo_cart" style="margin-left:10px; ">
		<!-- TITULO PELI --> 
		<p class="tit_detalle"><strong><?php echo strtoupper($results['Titulo']);?> </strong></p>
    </div>   
	    <div id="menu1" style="margin-top:35px;margin-left:110px">
<?php
	//SI El CAMPO TRAILER NO ESTA VACIO MUESTRO ENLACE AL TRAILER
	if ($results['Trailer'] != '' ){
		print('
			<a  title="Ver tráiler en YouTube" target="_blank" href="'.$results['Trailer'].'" >
			<img src="imagenes/trailer.png" alt="Ver Trailer" width="80" height="25" border="0" align="absmiddle" /></a>
		');
	}
?>			
		</div>    
	<br />
	<hr align="left" width="860" style="margin-top:40px"/>
</div>
<div id="principal_pelicula">
	<div id="detalle_pelicula">
<?php
				print('
					<table class="pelicula" cellpadding="2" cellspacing="0"> 
						<tr>
							<!-- CARTEL -->
							<td rowspan="6" style="border:none;width:220px;" >
							');
			//COMPROBAR QUE EXISTE EL .JPG DEL CARTEL EN EL SERVIDOR, SI NO MOSTRAR 'NO DISPONIBLE'			
			if(is_file('imagenes/pelis/'.$results['Cartel'])){				
				print('	<img style="margin-top:3px;" src="imagenes/pelis/'.$results['Cartel'].'" width="150" height="210"  alt="Cartel '.$results['Titulo'].'"  border="0" /></td> ');
			}else{
				print('	<img style="margin-top:3px;" src="imagenes/pelis/no_disponible.jpg" width="150" height="210"  alt="Cartel no disponible"  border="0" /></td> ');
			}	  
				print('				
							<th><span class="letralogo">Género</span></th>
							<th><span class="letralogo">Nacionalidad</span></th>					
						</tr>
								<tr>	
									<!-- GÉNERO -->
									<td >'.$results['Nombre'].'</td>
									<!-- NACIONALIDAD -->
									<td>'.$results['Pais'].'</td>
								</tr>
						<tr>
							<th><span class="letralogo">Duración</span></th>
							<th><span class="letralogo">Director</span></th>						
						</tr>
								<tr>
									<!-- DURACION -->
									<td>'.$results['Duracion'].' min</td>
									<!-- DIRECTOR --> 
									<td>'.$results['Director'].'</td>								
								</tr>
						<tr>
							<th><span class="letralogo">Calificación</span></th>
							<th><span class="letralogo">Distribuidora</span></th>
						</tr>
								<tr>
									<!-- CALIFICACION -->
									<td>'.$results['Calificacion'].'</td>
									<!-- DISTRIBUIDORA -->
									<td>'.$results['Distribuidora'].'</td>						
								</tr>
						<tr>
							<th colspan="3"><span class="letralogo">Reparto</span></th>
						</tr>
								<tr>
									<!-- REPARTO -->
									<td colspan="3">'.$results['Reparto'].'</td>
								</tr>					
						<tr>
							<th colspan="3"><span class="letralogo">Sinopsis</span></th>											
						</tr>
								<tr>	
									<!-- SINOPSIS -->
									<td colspan="3"> 
										'.$results['Sinopsis'].'
									</td>					
								</tr>
				');
		if($results['Fecha estreno'] != NULL){
				/***** CONVERTIR FECHAS A ESPAÑOL ***********/
					$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
					$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					$fecha = strtotime($results['Fecha estreno']); 
					 
					//echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
					//Salida: Viernes 24 de Febrero del 2012
					//date('d M, Y',strtotime($results['Fecha estreno']))
					//Salida: 29 May, 2015
				/******************************************/				
				print('
						<tr>
							<th colspan="3"><span class="letralogo">Fecha de estreno</span></th>											
						</tr>
								<tr>	
									<!-- FECHA ESTRENO -->
									<td colspan="3"> 
										'.$dias[date('w',$fecha)]." ".date('d',$fecha)." de ".$meses[date('n',$fecha)-1]. " del ".date('Y',$fecha).'
									</td>					
								</tr>');				
			}				
			print('					
					</table>
				');		
?>		
	</div>
</div>
<?php footer();?>	