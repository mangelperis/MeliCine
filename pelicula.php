<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es.php');
?>
<title>MeliCine | Detalles de la película</title>

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
		<p class="tit_detalle"><strong>LOS VENGADORES: LA ERA DE ULTRÓN </strong></p>
    </div>   
	    <div id="menu1" style="margin-top:35px;margin-left:110px">
			<a  title="Ver tráiler en YouTube" target="_blank" href="https://www.youtube.com/">
			<img src="imagenes/trailer.png" alt="Ver Trailer" width="80" height="25" border="0" align="absmiddle" /></a>
		</div>    
	<br />
	<hr align="left" width="860" style="margin-top:40px"/>
</div>
<div id="principal_pelicula">
	<div id="detalle_pelicula">
		<table class="pelicula" cellpadding="2" cellspacing="0"> 
			<tr>
				<!-- CARTEL -->
				<td rowspan="6" style="border:none;width:220px;" >
					<img style="margin-top:3px;" src="files/losvengadores.jpg" width="150" height="210"  alt="Cartel película"  border="0" /></td>
				<th><span class="letralogo">Género</span></th>
				<th><span class="letralogo">Nacionalidad</span></th>					
			</tr>
					<tr>	
						<!-- GÉNERO -->
						<td >Acción</td>
						<!-- NACIONALIDAD -->
						<td>EEUU</td>
					</tr>
			<tr>
				<th><span class="letralogo">Duración</span></th>
				<th><span class="letralogo">Director</span></th>						
			</tr>
					<tr>
						<!-- DURACION -->
						<td> 180 min</td>
						<!-- DIRECTOR --> 
						<td>JJ Abrams</td>								
					</tr>
			<tr>
				<th><span class="letralogo">Calificación</span></th>
				<th><span class="letralogo">Distribuidora</span></th>
			</tr>
					<tr>
						<!-- CALIFICACION -->
						<td>+7	</td>
						<!-- DISTRIBUIDORA -->
						<td>Warner Bros	</td>						
					</tr>
			<tr>
				<th colspan="3"><span class="letralogo">Reparto</span></th>
			</tr>
					<tr>
						<!-- REPARTO -->
						<td colspan="3">Lily James, Cate Blanchett, Helena Bonham Carter, Richard Madden, Holliday Grainger, Sophie McShera, Eloise Webb, Derek Jacobi, Hayley Atwell, Stellan Skarsgård, Leila Wong, Ben Chaplin</td>
					</tr>					
			<tr>
				<th colspan="3"><span class="letralogo">Sinopsis</span></th>											
			</tr>
					<tr>	
						<!-- SINOPSIS -->
						<td colspan="3"> 
							"Disney Junior Party" consiste en la proyección de 3 episodios, "La Princesa Sofía", "La Casa de Mickey Mouse" y "Doctora Juguetes".
							 Mickey será el invitado especial e interpretará el papel de anfitrión,
							entreteniendo a los niños entre los episodios, presentando juegos y canciones con los personajes. 
						</td>					
					</tr>
		</table>
	</div>
</div>
<?php footer();?>	