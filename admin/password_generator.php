<?php
//GENERADOR DE PASSWORD PARA RECUPERAR CLAVE , RESULTADO EN $pw
//http://www.catchstudio.com/labs/password-generator/
$alpha = "abcdefghijklmnopqrstuvwxyz";
$alpha_upper = strtoupper($alpha);
$numeric = "0123456789";
$special = ".-+=_,!@$#*%<>[]{}";
$chars = "";

// default [a-zA-Z0-9]{9}
// $chars = $alpha . $alpha_upper . $numeric;

$chars .= $alpha;
$chars .= $alpha_upper;
$chars .= $numeric;
$chars .= $special;
 
 //LONGITUD FINAL DE LA CADENA
$length = 9;
$len = strlen($chars);
$pw = '';
 
for ($i=0;$i<$length;$i++)
{
	$pw .= substr($chars, rand(0, $len-1), 1);
	}
 
// the finished password
$pw = str_shuffle($pw);

//
?>