<?php

	//DB configuration Constants
	define('_HOST_NAME_', 'rdbms.strato.de');
	define('_USER_NAME_', 'U2126763');
	define('_DB_PASSWORD', 'melicine17');
	define('_DATABASE_NAME_', 'DB2126763');
	
	
	//PDO Database Connection
	try {
		$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
?>