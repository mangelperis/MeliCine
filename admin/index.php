<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es.php');
?>
<title>MeliCine | Salas de cine en l'Horta Nord</title>
<meta name=keywords content=""/>
<meta name=description content=""/>


<script type="text/javascript">
function MM_openBrWindow(theURL,winName) { 
w=590;
h=332;
t = (screen.availHeight - h - 100)/2  ;
l = (screen.availWidth - w)  /2;
  window.open(theURL,winName,'resizable=0,left='+l+',top='+t+',width='+w+',height='+h+'');
}

</script>
</head>   
<body class="login">
<?php 
//include('funciones.php');  
//menu_index_es();
?>  
<div id="login">
		<h1><a href="#" title="MeliCine" tabindex="-1"></a></h1>
<form name="loginform" id="loginform" action="#" method="post">
	<p>
		<label for="user_login">Usuario<br />
		<input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
	</p>
	<p>
		<label for="user_pass">Contraseña<br />
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
	</p>
	
	<!--<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  />&nbsp;&nbsp;Recuérdame </label></p>-->
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Acceder" />
	
	</p>
</form>

	<p id="backtoblog"><a href="#" onclick="MM_openBrWindow('recuperarclave.php','')" title="Recuperar contraseña perdida">  ¿Has perdido tu contraseña?</a></p>
	<p id="backtoblog"><a href="#" title="Volver atrás">« Volver a MeliCine</a></p>
	

</div>
<div style="margin-bottom:5px;"> </div>
</body>
</html>