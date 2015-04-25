<?php
//LOGO + SOCIAl
function head(){
	print '
<div id="content">
	<div id="header">
		<div  style="margin-top:5px;float:right;">	  
		  <a style="margin-left:auto;" href="https://www.facebook.com/#" target="_blank" OnMouseOver="document.face.src=imagenes/otros/face_on.png" OnMouseOut="document.face.src=imagenes/otros/face_off.png">
		  <img src="imagenes/otros/face_off.png" alt="" name="face" width="10" height="21" border="0" id="face" /></a>&nbsp;&nbsp;
		  <a href="https://twitter.com/#" target="_blank" OnMouseOver="document.twit.src=imagenes/otros/twit_on.png" OnMouseOut="document.twit.src=imagenes/otros/twit_off.png">
		  <img src="imagenes/otros/twit_off.png" alt="" name="twit" width="21" height="19" border="0" id="twit" /></a>&nbsp;     &nbsp;&nbsp;  			
		</div>
    </div>
	<div id="logo" align="right">
		<div style="margin-top:5px"><a href="." border="0"><img src="imagenes/logo.png"  height="140" alt="MeliCine" border="0"/></a></div>
	</div>';
}
//MENU (page)
function menu(){
	
	$result = $_REQUEST['page'];
	$id1= NULL;	
	$id2= NULL;	
	$id3= NULL;	
	
	if ($result == '1') {
		$id1 = 'class="active"';	
	}elseif ($result == '2') {
		$id2 = 'class="active"';		
	}elseif ($result == '3') {
		$id3 = 'class="active"';	
	}
	
	print'   
	<div id="menu">
		<div style="margin-top:40px;">
			<ul id="menu-bar">
			 <li '.$id1.'><a href=".">La Cartelera</a></li>
			 <li '.$id2.'><a href="proximamente.php">Próximamente</a></li>
			 <li '.$id3.'><a href="about.php">El cine</a></li>			 		 
			</ul>
		</div>     
	</div>';
	
}
//CAROUSEL - SLIDER
function slider(){
	print'  
	<div id="foto" align="center"><div id="mybgcarousel" class="bgcarousel"></div>
	</div>';	
}
//PIE DE PAGINA
function footer(){
	print '
	<div id="foot"><hr align="left" width="960" style="margin-top:0px"/>
	<center><a href=".">La cartelera</a><a href="proximamente.php">Próximamente</a><a href="about.php">El Cine</a><a href="privacidad.php" target="_blank" style="margin-right:30px">Política de Privacidad</a><a href="aviso_legal.php"  target="_blank" style="margin-right:0px">Aviso Legal</a>
	</center>
	
	
	<hr align="left" width="960" style="margin-top:10px"/>
		<div align="right" style="margin-top:10px;" class="copy"> MeliCine &copy; '.date("Y").'  
		<br />
		<a style="margin-right:0px; font-size:7pt" href="mailto:mangelperis@gmail.com">Miguel Angel Peris </a> - <a style="margin-right:0px; font-size:7pt" href="http://www.institutoserpis.org" target="_blank" >IES Serpis&nbsp; </a> 
		</div>
	</div>
<!-- Cerrar content -->
</div>
</body>
</html>
	';
}
?>