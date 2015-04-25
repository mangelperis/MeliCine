<?php
ob_end_clean();
function Conectarse()
{
   if (!($link=mysql_connect("localhost","wmjwhcbo","Oficinaisi29")))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("wmjwhcbo_formacion",$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   
   return $link;
} 


$link=Conectarse();
mysql_set_charset('utf8');
$dBtabla = 'Programas_Formativos_Validados_';
//$id = $_REQUEST['id'];			
			
//Consultas para el CATALOGO GLOBAL

$result=mysql_query("SELECT * from $dBtabla  ORDER BY Especialidad,NombreAF,Titulo ASC",$link);






/*$row = mysql_fetch_array($result);

$row=str_replace("_x000D_","",$row);
$row=str_replace("","",$row);
$row=str_replace("<br>","",$row);
$row=str_replace("•","-",$row);
*/

?>