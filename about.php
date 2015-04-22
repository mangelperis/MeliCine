<!doctype html>
<html lang="es">
<head>
<?php 
require('meta_es.php');
?>

<title>MeliCine | Sobre el cine</title>

</head>   
<body >
<?php 
include('funciones.php');  
head(); //llamo logo + social
//RESERVADO PARA $_POST de menú
$_REQUEST['page'] = '3';
menu(); //llamo menu
 ?>	
<div id="mapa_cine">
<iframe style="margin-left:60px;position:absolute;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3077.2631301865395!2d-0.3500612999999999!3d39.531117699999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6046f6eaa342bf%3A0x90a011ebea6af4d8!2sCarrer+de+Sant+Ferran%2C+46133+Meliana%2C+Valencia!5e0!3m2!1ses!2ses!4v1427903005274" width="560" height="430" frameborder="0" style="border:0"></iframe>
    <div id="desc_cine" align="right" >
    
						<table width="282" height="426" border="0" cellpadding="0" cellspacing="0" class="tbgubi" style="margin-right:2px">
                          <tr>
                            <td width="210" height="43" align="left"><span class="letralogo">MeliCine <span style="color:#E57502;">(Meliana)</span></span></td>
                            <td width="70" align="center"><img src="imagenes/otros/dolbi.png" alt="Dolbi" width="29" height="38" border="0" title="DOLBI" class="nob" /><img src="imagenes/otros/glasses2.png" alt="3D" width="27" height="38" border="0" class="nob" title="3D"/></td>
                          </tr>
                          <tr>
                            <td height="56" colspan="2" align="left">
							C/San Fernando, 88<br />
							46133 MELIANA<br />
							961 49X XYY<br /></td>
                          </tr>
                          <tr>
                            <td height="27" colspan="2" align="left"><span class="txtazul">SALAS:</span> 4<br />
                            <!--<span class="txtazul">LOCALIDADES:</span> 1899 --></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left" valign="top"><br />

                              <br />
         
                             </td>
                          </tr>
                        </table>
                        <div id="pdigital" align="left">             <br /><span class="txtazul">                                                   
                             <span class="txtb">Precio único </span> <br />
                               </span><span class="txtb"> </span><span class="txtazul"><br />
                             Todos los días (Sin excepción)    </span><span class="txtb">6,50 €   </span><span class="txtazul"><br />
                              
						</div> 

                        
    </div>
</div>
<div id="principal_cine">
	<div id="fotos_cine">
            <br />
            <img src="imagenes/cine1.jpg" width="230" height="172" alt="" class="bordeb" style="margin-right:5px; margin-top:10px"/>
            <img src="imagenes/cine2.jpg" width="230" height="172" alt="" class="bordeb" style="margin-right:5px; margin-top:10px"/>
            <img src="imagenes/cine3.jpg" width="230" height="172" alt="" class="bordeb" style="margin-right:5px; margin-top:10px"/>
    </div>

</div>
<?php footer();?>	