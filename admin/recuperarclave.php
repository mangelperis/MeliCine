<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zona privada | Recuperar contraseña</title>
<link href="css/pass-recover.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p>&nbsp;</p>
  <?  
  
  $recuperar=$_POST["recuperar"];
if ($recuperar==1) {
	if ($_POST['action'] == "checkdata") {
            if ($_SESSION['tmptxt'] == $_POST['tmptxt']) { 
	$recuperar=0;
	require_once('Connections/melicine.php');
	mysql_query("SET NAMES UTF8");
	mysql_select_db("$database_melicine",$melicine);

	$email=$_POST["email"];
	$sql="select * from usuarios where email='".mysql_real_escape_string($email)."'";
	$consulta=mysql_query($sql,$melicine);
	$totalrows_con=mysql_num_rows($consulta);
	$row=mysql_fetch_assoc($consulta);
	if ($totalrows_con>0) { 
	include_once("Connections/configmail.php");
	$subject="Recuperacion de los datos de acceso";
	$body="Se ha enviado este mensaje porque se ha realizado una peticion de recuperacion de clave en la web www.melicine.com.<br><br><strong>Usuario:</strong> ".$row['usuario']."<br><strong>Clave:</strong> " .$row['password'];
	      if (EnviarEmail($row['email'], $row['email'], $subject,$body)) { ?>
<p>&nbsp;</p><p>&nbsp;</p>
		<p class="texto" align="center">El usuario y el password se han enviado correctamente.<br>Compruebe su correo</p>
          <?	 } else{ ?>
		<p class="texto" align="center">&nbsp;</p>
		<p class="texto" align="center">&nbsp;</p>
		<p class="texto" align="center">&nbsp;</p>
		<p class="texto" align="center">&nbsp;</p>
		<p class="texto" align="center">Ha ocurrido un error. <a href="javascript:history.back()">Vuelva a enviar el formulario.</a></p>
<?php 	 }	
	
	} else { ?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">
	
No existe el email en nuestra base de datos.<br />Si no lo recuerda póngase en contacto con el administrador<br />
 <a href="javascript:history.back()">Volver al formulario.</a></p>

  <?


}} else { ?>
<p align="center" class="centrado">El código introducido no es válido  <br/><br/><a href="javascript:history.back()">Volver al formulario.</a>          </p>

            
              <? }
      }

 } else {

?>

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
				<span class="verde-chic"><strong>C&oacute;digo seguridad:</strong></span>
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

<? } ?>
</body>
</html>
