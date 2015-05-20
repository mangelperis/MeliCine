<?php
//MENU (page) para ADMINISTRADORES
function menu(){
	
	$result = $_REQUEST['page'];
	$id0= NULL;
	$id1= NULL;	
	$id2= NULL;	
	$id3= NULL;	
	$id4= NULL;
	$id5= NULL;
	
	if ($result == '1') {
		$id1 = 'class="selected"';	
	}elseif ($result == '2') {
		$id2 = 'class="selected"';		
	}elseif ($result == '3') {
		$id3 = 'class="selected"';	
	}elseif($result == '4'){
		$id4 = 'class="selected"';
	}elseif($result == '0'){
		$id0 = 'class="selected"';
	}elseif($result == '5'){
		$id5 = 'class="selected"';
	}
	
	print'   
				<div class="menu">
				<div id="welcome">
					<div class="marco">
						<p style="padding-top:15px;padding-left:10px;">Bienvenido, <br/><br/> <span>'.$_SESSION['username'].'</span> <img  src="images/logo.png"/></p>
					</div>
				</div>
                <ul class="ca-menu">
					<li '.$id0.'>
                        <a href="panel.php">
                            <span class="ca-icon">&#73;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Panel</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
					<li '.$id1.'>
                        <a href="gestionbdd.php">
                            <span class="ca-icon">&#90;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Gestionar BDD</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
					<li '.$id2.'>
                        <a href="informes.php">
                            <span class="ca-icon">&#179;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Informes</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>			
                    <li '.$id3.'>
                        <a href="cartelera.php">
                            <span class="ca-icon">&#77;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">La Cartelera</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>                    		
					<li '.$id4.'>
                        <a href="taquilla.php">
                            <span class="ca-icon">&#44;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Taquilla</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
					<li '.$id5.'>
                        <a href="desconectar.php">
                            <span class="ca-icon">&#88;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Cerrar Sesión</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>                    
                </ul>

			<div id="clock" class="light">
			<div class="display">
				<div class="weekdays"></div>
				<!--<div class="ampm"></div>-->
				
				<div class="digits"></div>
			</div>
		</div>
			</div>';
	
}
/******************************************************/
//MENU para EMP.Taquilla
function menu_tq(){
	$result = $_REQUEST['page'];
	$id0= NULL;
	$id1= NULL;	
	$id2= NULL;	
	$id3= NULL;	
	$id4= NULL;
	$id5= NULL;
	
	if ($result == '1') {
		$id1 = 'class="selected"';	
	}elseif ($result == '2') {
		$id2 = 'class="selected"';		
	}elseif ($result == '3') {
		$id3 = 'class="selected"';	
	}elseif($result == '4'){
		$id4 = 'class="selected"';
	}elseif($result == '0'){
		$id0 = 'class="selected"';
	}elseif($result == '5'){
		$id5 = 'class="selected"';
	}
	
	print'   
				<div class="menu">
				<div id="welcome">
					<div class="marco">
						<p style="padding-top:15px;padding-left:10px;">Bienvenido, <br/><br/> <span>'.$_SESSION['username'].'</span> <img  src="images/logo.png"/></p>
					</div>
				</div>
                <ul class="ca-menu">
					<li '.$id0.'>
                        <a href="panel.php">
                            <span class="ca-icon">&#73;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Panel</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
					<li '.$id4.'>
                        <a href="taquilla.php">
                            <span class="ca-icon">&#44;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Taquilla</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
					<li '.$id5.'>
                        <a href="desconectar.php">
                            <span class="ca-icon">&#88;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Cerrar Sesión</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>                    
                </ul>

			<div id="clock" class="light">
			<div class="display">
				<div class="weekdays"></div>
				<!--<div class="ampm"></div>-->
				
				<div class="digits"></div>
			</div>
		</div>
			</div>';
	
}

?>