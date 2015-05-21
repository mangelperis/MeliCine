<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zona privada | Generar nueva contraseña</title>
<link href="css/pass-recover.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p>&nbsp;</p>
<?php   
$recuperar=$_POST["recuperar"];

if ($recuperar == 1)
{ //CHECK ACTION DEL INPUT HIDDEN DEL FORMULARIO
	if ($_POST['action'] == "checkdata")
	{ 
		//CHECK CAPTCHA.php (randomText(8))
        if ($_SESSION['tmptxt'] == $_POST['tmptxt'])
		{
				$recuperar=0;
				//FUNCION DE CONECTAR
				require_once('Connections/conexion.php');
									
				$email=$_POST["email"];
								
			$sql = $databaseConnection->prepare('SELECT * FROM usuarios WHERE email = :email');
			$sql-> bindParam(':email', $email);
			$sql-> execute();
			$results = $sql->fetch(PDO::FETCH_ASSOC);
			if(count($results) > 1){
				include_once("Connections/configmail.php");
				//GENERAR UN NUEVO PASSWORD, se almacena en la variable $pw y se lo envío al usuario
				require_once('password_generator.php');					
								
					//CONTENIDO DEL MAIL
					$subject="Recuperacion de los datos de acceso";
					$body="Se ha enviado este mensaje porque se ha realizado una <strong>peticion de recuperacion de clave</strong> en la web www.melicine.com.<br/><br/>
					Se ha generado una nueva contraseña:<br/>
					<strong>Usuario:</strong> ".$results['usuario']."<br><strong>Nueva Clave:</strong> " .$pw;//DECRYPT PASSWORD ANTES!! <- NO SE PUEDE!
				// 1ºParametro es el destinatario , deberia ser $result['email']
				if(EnviarEmail('tuemail@domain.com', $result['email'], $subject, $body)){
					//ENVIO CORRECTO
					print('
						<p>&nbsp;</p><p>&nbsp;</p>
						<p class="texto" align="center" style=" color:#db331c;">El usuario y el password se han enviado correctamente.<br>Compruebe su correo</p>
						 ');
						 //AHORA ACTUALIZO EL PASSWORD EN LA BDD
						 			$sql = $databaseConnection->prepare('UPDATE usuarios SET password=? WHERE ID=?');
									//ENCRIPTO CON FUNCION CRYPT() la variable $pw
									$sql-> execute(array(crypt($pw),$results['ID']));
					
				}else{  //ERROR EN EL ENVIO (PHPMAILER)
						print('
						<p class="texto" align="center">&nbsp;</p>
						<p class="texto" align="center">&nbsp;</p>
						<p class="texto" align="center">&nbsp;</p>
						<p class="texto" align="center">&nbsp;</p>
						<p class="texto" align="center" style=" color:#db331c;">Ha ocurrido un error. <a href="recuperarclave.php">Vuelva a enviar el formulario.</a></p>
						');
				}
						
			}else{
				//EL EMAIL NO EXISTE EN LA BDD
				print ('
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p align="center">						
						No existe el email en nuestra base de datos.<br />Si no lo recuerda póngase en contacto con el administrador<br />
					<a href="recuperarclave.php">Volver al formulario.</a></p>
					 ');
			}			
		}else{ 
		//ERROR EN LA INTRODUCCION DEL CAPTCHA
			print ('
				<p align="center" class="centrado">El código introducido no es válido  <br/><br/><a href="recuperarclave.php">Volver al formulario.</a></p>
			');
		}
	}		
}else{
	//INICIO
			print ('
				<p>&nbsp;</p>
				<p>&nbsp;</p>

				<form id="form1" name="form1" method="post" action="">
				  <table align="center">
					  <tr>
						  <td>
							  <div align="center">
								  <p align="center">Introduzca el e-mail de su cuenta:</p>
								  <input name="email" type="text" id="email" size="40" />		  
							  </div>
						  </td>
					  </tr>
					  <tr>
							<td height="">
								<div align="center">
									<span class="verde-chic"><strong>Código seguridad:</strong></span>
									   <input name="tmptxt" size="8" />
										<span class="precio"><input name="action" type="hidden" value="checkdata" /></span>
										<br />
										 <img  style="padding-top:10px;" src="captcha/captcha.php" />
								</div>
							</td>
					  </tr>
					  <tr>
						<td height="25">
							<center><input type="submit" name="button" id="button" value="Enviar" /></center>
							<input name="recuperar" type="hidden" id="recuperar" value="1" />
						</td>
					  </tr>	  
				  </table>
				</form>
			');
}		
	


?> 
</body>
</html>
