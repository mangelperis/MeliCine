<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once('Connections/conexion.php');

if (isset($_GET['key'])){

	$key=$_GET['key'];
    $array = array();
   
   	$records5 = $databaseConnection->prepare("SELECT Titulo FROM  peliculas WHERE Titulo LIKE '%".$key."%'");
    $records5->execute();

		while( $results5 = $records5->fetch(PDO::FETCH_ASSOC) ){
			$array[] = $results5['Titulo'];	
		}  
	 echo json_encode($array);
}

if (isset($_GET['num'])){


	$key=$_GET['num'];
    $array = array();
   
   	$records5 = $databaseConnection->prepare("SELECT NumSala FROM  salas WHERE NumSala LIKE '%".$key."%'");
    $records5->execute();

		while( $results5 = $records5->fetch(PDO::FETCH_ASSOC) ){
			$array[] = $results5['NumSala'];	
		}  
	 echo json_encode($array);
}


if (isset($_GET['hora'])){


	$key=$_GET['hora'];
    $array = array();
   
   	$records5 = $databaseConnection->prepare("SELECT HoraIni FROM sesiones WHERE HoraIni LIKE '%".$key."%'");
    $records5->execute();

		while( $results5 = $records5->fetch(PDO::FETCH_ASSOC) ){
			$array[] = date("H:i", strtotime($results5['HoraIni']));	
		}  
	 echo json_encode($array);
}









?>
