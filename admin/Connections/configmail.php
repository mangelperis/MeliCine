<?php 
require_once('PHPMailer/class.phpmailer.php');
function EnviarEmail($para,$paranombre,$asunto,$cont,$de='secretaria@cafbal.com',$denombre='cafbal.com') {
  try {
	$mail= new PHPMailer(true);
	$ok = true;
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "mail.cafbal.com"; // SMTP server
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	// 1 = errors and messages
	// 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPDebug  = 0;
	
	$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "secretaria@cafbal.com"; // SMTP account username
	$mail->Password   = "pGKAK9z0Ppt989";        // SMTP account password
	$mail->CharSet	  = "utf-8";


	
		$mail->From = $de;
		$mail->FromName= $denombre;
		$mail->Subject    = $asunto;
		$mail->AltBody    = "Para ver el mensaje utilice un cliente de correo compatible con HTML"; // optional, comment out and test
		$mail->MsgHTML($cont);
		$mail->AddAddress($para,$paranombre);
		$mail->Send();
	} catch (phpmailerException $e) {
		$ok = false;
	} catch (Exception $e) {
		$ok = false;
	}

	return $ok;
}
?>