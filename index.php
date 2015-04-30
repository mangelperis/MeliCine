<?php

	require_once('admin/Connections/conexion.php');
		//DEFINO EL FILTRO DEL CAMPO ESTADO
		$estado = 1;
			$records = $databaseConnection->prepare('SELECT Codigo,Titulo,Cartel FROM  peliculas WHERE estado = :estado');
			$records->bindParam(':estado', $estado);
			$records->execute();
			//$results = $records->fetch(PDO::FETCH_ASSOC);
						
			$records2 = $databaseConnection->prepare('SELECT Codigo,Titulo,Cartel FROM  peliculas WHERE estado = :estado');
			$records2->bindParam(':estado', $estado);
			$records2->execute();
			//$results = $records2->fetch(PDO::FETCH_ASSOC);	
?>  
<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es.php');
?>
<link rel=stylesheet type="text/css" href="css/carousel.css"/>
<title>MeliCine | Salas de cine en l'Horta Nord</title>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jquery.velocity.min.js"></script>
<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
<script src="js/bgcarousel.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
var firstbgcarousel=new bgCarousel({
	wrapperid: 'mybgcarousel', //ID of blank DIV on page to house carousel
	imagearray: [
		['files/madmax.jpg', '<div style="width:860; height:370, margin-top:0px"><a href="#"><img src="imagenes/otros/transp.gif"  class="noborde enlace"></a></div>'], //["image_path", "optional description"]
		['files/jurassicworld.jpg', '<div style="width:860; height:370, margin-top:0px"><a href="#"><img src="imagenes/otros/transp.gif"  class="noborde enlace"></a></div>'],
		['files/ted2.jpg', '<div style="width:860; height:370, margin-top:0px"><a href="#"><img src="imagenes/otros/transp.gif"  class="noborde enlace"></a></div>'] //<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:3000, cycles:3, stoponclick:false, pauseonmouseover:true},
	navbuttons: ['imagenes/otros/left_.png', 'imagenes/otros/right_.png', 'imagenes/otros/up.gif', 'imagenes/otros/down.gif'], // path to nav images
	activeslideclass: 'selectedslide', // CSS class that gets added to currently shown DIV slide
	orientation: 'h', //Valid values: "h" or "v"
	persist: true, //remember last viewed slide and recall within same session?
	slideduration: 500 //transition duration (milliseconds)
})
-->
</script>
<script language="javascript">
<!--
function MostrarFecha()
   {
   var nombres_dias = new Array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado")
   var nombres_meses = new Array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "sept.", "octubre", "noviembre", "diciembre")

   var fecha_actual = new Date()

   dia_mes = fecha_actual.getDate() //dia del mes
   dia_semana = fecha_actual.getDay() //dia de la semana
   mes = fecha_actual.getMonth()
   anio = fecha_actual.getFullYear()
   
   //escribe en pagina
   document.write("<span class='fecha'>"+"  "+dia_mes + " de " + nombres_meses[mes] + " de " + anio+ " "+"</span>")
   }
-->
</script>
</head>   
<body >
<?php 
include('funciones.php');  
 
head(); //llamo logo + social
$_REQUEST['page'] = '1';
menu(); //llamo menu
slider(); //llamo carousel
 ?>	
<div id="calificacion">
	<div id="fecha" style="margin-top:3px;"><script language="JavaScript">MostrarFecha()</script></div>
	<div id="logo_cart" style="margin-left:10px; "><img src="imagenes/la_cartelera.png" width="147" height="30" alt=" " /></div>
	<br />
	<hr align="left" width="720" style="margin-top:13px"/>
</div>
<div id="principal">
		<table width="720" border="0" cellspacing="0" cellpadding="0" class="pelis" style="margin-left:60px">
			<tr>
<?php

		while( $results = $records->fetch(PDO::FETCH_ASSOC) ){
			print('
			  <td width="144" height="186" align="left">
				<a href="pelicula.php?id='.$results['Codigo'].'">
				');
				if(is_file('imagenes/pelis/'.$results['Cartel'])){				
					print('	<img src="imagenes/pelis/'.$results['Cartel'].'" alt="Cartel '.$results['Titulo'].'" width="130" height="186" border="0" /> ');
				}else{
					print('	<img src="imagenes/pelis/no_disponible.jpg" alt="Cartel no disponible" width="130" height="186" border="0" /> ');
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
			  <td height="60" align="left" valign="top" >
				<div style="margin-right:10px">
				'.strtoupper($results['Titulo']).'
				</div>
			</td>
			
			');			
		}
?>						  
			</tr>
		</table>	
</div>
<?php footer();?>	
