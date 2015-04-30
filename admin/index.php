<?php
	if (!isset($_SESSION)) { 
		session_start();
	}	
	require_once('Connections/conexion.php');

	if(isset($_POST['submit'])){
		$errMsg = '';
		//username and password sent from Form
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($username == '')
			$errMsg .= 'Debes introducir tu Usuario<br>';
		
		if($password == '')
			$errMsg .= 'Debes introducir tu Password<br>';
		
//NOTE: password_verify() required PHP version >=5.5. So use another hashing if your server don’t have PHP version 5.5 or greter.		
		if($errMsg == ''){
			$records = $databaseConnection->prepare('SELECT ID,usuario,password,nombre,usermaestro FROM  usuarios WHERE usuario = :username');
			$records->bindParam(':username', $username);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			if(count($results) > 0 && password_verify($password, $results['password'])){
				$_SESSION['username'] = $results['nombre'];
				$_SESSION['usermaestro'] = $results['usermaestro'];
				header('location:panel.php'); 
				exit;
			}else{
				$errMsg .= 'El usuario y/o password no existen<br>';
			}
		}
	}
	/*else{
		print 'No va';
	}*/

//PARA MOSTRAR QUE SE INICIE SESION SI SE INTENTA  A ACCERDER POR URL 
if(!isset($_SESSION['session'])){	
	$errMsg .= 'Inicia sesión para continuar. <br/>';	
}

//SI NO SE TIENE PERMISOS PARA VISUALIZAR UNA PAGINA, POR EJEMPLO UN EMP.TAQUILLA NO DEBE PODER GESTIONAR LA BDD	
if($_SESSION['session'] == '403'){	
		$errMsg .= 'Acceso denegado a esta pagina. Vuelve a iniciar sesión. <br/>';	
		//Vaciar sesión
		$_SESSION = array();
		//Destruir Sesión
		session_destroy();
}	
?>  
<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es.php');
?>
<title>MeliCine | Salas de cine en l'Horta Nord</title>
<meta name=keywords content="admin panel"/>
<meta name=description content="Login al panel de administración. Si tiene problemas, comunique con su administrador a mangelperis@gmail.com"/>


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

<div id="login">
		<h1><a title="MeliCine" tabindex="-1"></a></h1>
		
<?php
	 if(isset($errMsg)){
		echo '<div style="color:#FF0000;text-align:center;font-size:12px;">'.$errMsg.'</div>';
	 }
 ?>
	<form name="loginform" id="loginform" action="" method="post">
		<p>
			<label for="user_login">Usuario<br />
			<input type="text" name="username" id="user_login" class="input" value="" size="20" /></label>
		</p>
		<p>
			<label for="user_pass">Contraseña<br />
			<input type="password" name="password" id="user_pass" class="input" value="" size="20" /></label>
		</p>
		
		<!--<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  />&nbsp;&nbsp;Recuérdame </label></p>-->
		<p class="submit">
			<input type="submit" name='submit' id="wp-submit" class="button-primary" value="Acceder" />
		
		</p>
	</form>

	<p id="backtoblog"><a href="#" onclick="MM_openBrWindow('recuperarclave.php','')" title="Recuperar contraseña perdida">  ¿Has perdido tu contraseña?</a></p>
	<p id="backtoblog"><a href="../" title="Volver atrás">« Volver a MeliCine</a></p>
	

</div>
<div style="margin-bottom:5px;"> </div>
</body>
</html>