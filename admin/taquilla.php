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
menu(); //llamo menu
?>
<div id="welcome">
	<div class="marco">
		<p>Bienvenido,<br/><br/> <span>$USER</span> </p><img  src="images/logo.png"/>
	</div>
</div>

<div id="content">		
		<div id="marco">
			<table class="taquilla" cellpadding="0" cellspacing="0"> 
				<tr class="header">
					<th>Cartel</th>
					<th>Titulo</th>
					<th>Calificación</th>
					<th>Sesión</th>
					<th>Sala</th>
					<th></th>
				</tr>
					<tr>
						<td>
							<img style="margin-top:3px;" src="../files/losvengadores.jpg"   alt="Cartel película" width="130" height="186" border="0" />
						</td>
						<td class="titulo">
							<strong>LOS VENGADORES: LA ERA DE ULTRÓN</strong> 
						</td>
						<td>
							TP
						</td>
						<td>
							22:00
						</td>
						<td>
							SALA 1
						</td>
						<td>
							<center>
							<div class="button-holder"><a class="button" href="">Generar entrada</a>
								<select>
									 <option selected value="1">1</option>
									 <option value="2">2</option>
									 <option value="3">3</option>
									 <option value="4">4</option>
									 <option value="5">5</option>
								</select>
							</div>	
							<hr style="width:85%"/>
							<p><strong>AFORO DISPONIBLE:</strong> 10 / 50</p>
							<progress  value="10" max="50"></progress>
							</center>
						</td>				
					</tr>
				<tr>
				</tr>	
				<!-- SEPARADOR --> 
									<tr>
						<td>
							<img style="margin-top:3px;" src="../files/sweethome.jpg"   alt="Cartel película" width="130" height="186" border="0" />
						</td>
						<td class="titulo">
							<strong>SWEET HOME</strong> 
						</td>
						<td>
							+18
						</td>
						<td>
							20:00
						</td>
						<td>
							SALA 2
						</td>
						<td>
							<center>
							<div class="button-holder"><a class="button" href="">Generar entrada</a>
								<select>
									 <option selected value="1">1</option>
									 <option value="2">2</option>
									 <option value="3">3</option>
									 <option value="4">4</option>
									 <option value="5">5</option>
								</select>
							</div>	
							<hr style="width:85%"/>
							<p><strong>AFORO DISPONIBLE:</strong> 45 / 50</p>
							<progress  value="45" max="50"></progress>
							</center>
						</td>				
					</tr>
								
				
			
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