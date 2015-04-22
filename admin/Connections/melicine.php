<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_melicine = "localhost";
$database_melicine = "melicine";
$username_melicine = "melicine";
$password_melicine = "melicine";
$melicine = mysql_pconnect($hostname_melicine, $username_melicine, $password_melicine) or trigger_error(mysql_error(),E_USER_ERROR); 
?>