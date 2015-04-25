<?php
header('Content-Type: text/html; charset=UTF-8'); 
/**
 * Bases de datos - funciones.php
 * Consultas sql ISI
 * Este es un archivo base y genérico gastado como material educativo , únicamente se está usando la función de conexión a BDD
 * 2012 @ Miguel Angel Peris Iborra - mangelperis@gmail.com
 */

//define('FORM_METHOD',            'get');  // Formularios se env�an con GET o...
define('FORM_METHOD',            'post'); // Formularios se env�an con POST para evitar entrar directamente copiando parametros de la barradel navegador...


//FUNCION DE LA CONEXION A BDD
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

//COMPROBAR QUE LA TABLA EXISTE

function tableExists($table_name)
{
  $Table = mysql_query("show tables like '" .
  $table_name . "'");

  if(mysql_fetch_row($Table) === false)
   return(false);

  return(true);
}

//USO DE LA FUNCION ::  if(!tableExists('$dBtabla')) echo "La tabla existe";

 ?>