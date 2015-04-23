<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es_admin.php');
?>

<title>MeliCine | Panel de administración</title>
<meta name=keywords content=""/>
<meta name=description content=""/>
</head>   
<body class="admin">
<?php 
include ('menu.php');
$_REQUEST['page'] = '0';
menu(); //llamo menu
?>
<div id="welcome">
	<div class="marco">
		<p>Bienvenido,<br/><br/> <span>$USER</span> </p><img  src="images/logo.png"/>
	</div>
</div>
<div id="content">		
		<div id="marco">
		<p>Hola mundo</p>	
		<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	
		<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	
		<br/><br/><br/><br/><br/>
		<p>Hola mundo</p>	
		<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	<p>Hola mundo</p>	
		</div>
</div>	
	


<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- JavaScript Includes CLOCK-->
		<script src="clock/js/jquery.min.js"></script>
		<script src="clock/js/moment.js"></script>
		<script src="clock/js/script.js"></script>
</body>
</html>