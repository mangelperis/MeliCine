<?php
//Para servidores en modo STRICT y eliminar los errores NOTICE()
error_reporting(E_ALL ^ E_NOTICE);

	//DB configuration Constants
	define('_HOST_NAME_', 'localhost');
	define('_USER_NAME_', '');
	define('_DB_PASSWORD', '');
	define('_DATABASE_NAME_', 'melicine');

	
	
	//PDO Database Connection
	try {
		$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
	
?>