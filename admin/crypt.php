<?php
$in = 'taquilla';
$out = crypt($in);
print "Funcion <a href='http://php.net/manual/es/function.crypt.php'> crypt()</a><br/> ";
print "Estoy encriptando la palabra..  '<strong> ".$in." </strong>'";
print "<br/>";
print "Standard DES:   <u>".$out."</u>";
?>