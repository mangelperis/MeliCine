<?php
header('Content-Type: application/pdf');
//header('Content-Disposition: attachment; filename="Entrada.pdf"');

require('fpdf.php');
require_once('../Connections/conexion.php');

class PDF extends FPDF
{
  function Header()
    {
		//Páginas pares 
	if ($this->PageNo()%2 == '0'){	
		 // CABECERA 
		 $this->SetFont('Courier','B',13);
		 $this->Cell(0,3, "MELICINE",0,1,'C');
		 $this->Ln(1);
		 $this->SetFont('Courier','',10);
		 $this->Cell(0,3, utf8_decode("c/ San Fernando   nº 88 "),0,1,'C'); 
		 $this->Ln(1);
	  }
	}
	
	function Footer()
	{
		//PAGINAS PARES
		if ($this->PageNo()%2 == '0'){	
			// Posición: a 1,5 cm del final
			$this->SetY(-18);
			$this->SetFont('Courier','I',7);
			$this->Cell(0,1, html_entity_decode("-------------"),0,1,'C'); 
			$this->Ln(2);
			
			// Arial 8
			$this->SetFont('Courier','B',14);
			$this->Cell(0,2, utf8_decode("NO NUMERADA"),0,1,'C'); 
			$this->Ln(-1.5);
			$this->Cell(0,2, html_entity_decode("___________________"),0,1,'C'); 
			$this->Ln(4);		
			
			// Arial 8
			$this->SetFont('Courier','',7.5);
			$this->Cell(0,2, utf8_decode("010  PVP: 6.50 EUROS  ").($GLOBALS["code"]),0,1,'C'); 
			$this->Ln(1);
			
			// Arial 6
			$this->SetFont('Courier','',6.5);
			$this->Cell(0,2, utf8_decode("IMP. INCL. 21%  /  CIF: X123456"),0,1,'C'); 
		}
    }	
	
	function i25($xpos, $ypos, $code, $basewidth=1, $height=10){
	// based on the Code 39 script from The-eh
		$wide = $basewidth;
		$narrow = $basewidth / 3 ;

		// wide/narrow codes for the digits
		$barChar['0'] = 'nnwwn';
		$barChar['1'] = 'wnnnw';
		$barChar['2'] = 'nwnnw';
		$barChar['3'] = 'wwnnn';
		$barChar['4'] = 'nnwnw';
		$barChar['5'] = 'wnwnn';
		$barChar['6'] = 'nwwnn';
		$barChar['7'] = 'nnnww';
		$barChar['8'] = 'wnnwn';
		$barChar['9'] = 'nwnwn';
		$barChar['A'] = 'nn';
		$barChar['Z'] = 'wn';

		// add leading zero if code-length is odd
		if(strlen($code) % 2 != 0){
			$code = '0' . $code;
		}

		$this->SetFont('Arial','',10);
		$this->Text($xpos, $ypos + $height + 4, $code);
		$this->SetFillColor(0);

		// add start and stop codes
		$code = 'AA'.strtolower($code).'ZA';

		for($i=0; $i<strlen($code); $i=$i+2){
			// choose next pair of digits
			$charBar = $code[$i];
			$charSpace = $code[$i+1];
			// check whether it is a valid digit
			if(!isset($barChar[$charBar])){
				$this->Error('Invalid character in barcode: '.$charBar);
			}
			if(!isset($barChar[$charSpace])){
				$this->Error('Invalid character in barcode: '.$charSpace);
			}
			// create a wide/narrow-sequence (first digit=bars, second digit=spaces)
			$seq = '';
			for($s=0; $s<strlen($barChar[$charBar]); $s++){
				$seq .= $barChar[$charBar][$s] . $barChar[$charSpace][$s];
			}
			for($bar=0; $bar<strlen($seq); $bar++){
				// set lineWidth depending on value
				if($seq[$bar] == 'n'){
					$lineWidth = $narrow;
				}else{
					$lineWidth = $wide;
				}
				// draw every second value, because the second digit of the pair is represented by the spaces
				if($bar % 2 == 0){
					$this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
				}
				$xpos += $lineWidth;
			}
		}
	}
}	



//Constructor del documento: Landscape , MiliMetros, Formato/Tamaño (70mm x 50 mm)
$pdf=new PDF('L','mm',array(70,50));
$pdf->SetAuthor('Miguel Angel Peris Iborra');
$pdf->SetCreator('Miguel Angel Peris Iborra');
//SetMargins(float left, float top [, float right])
$pdf->SetMargins(1, 3 ,1);
$pdf->SetTitle('Entrada');
//Como se muestra el documento: nivel de zoom y a dos columnas
$pdf->SetDisplayMode(50,'two'); 

//REQUEST + CONSULTAS
	//$_POST['numsesion']
	//$_POST['sala'];
	$hoy = date("Y-m-d");     
	$hoy = '2015-05-08'; 
	$hoy_ticket = date("d-m-y");
	$hoy_ticket = '08-05-15';
	
	
	

			$records = $databaseConnection->prepare('SELECT * FROM pases INNER JOIN sesiones on pases.NumSesion = sesiones.NumSesion 
													INNER JOIN salas on pases.NumSala = salas.NumSala INNER JOIN peliculas on pases.CodigoPeli = peliculas.Codigo 
													WHERE (Estado = 1 OR Estado = 2) AND DiaPase = :fechahoy AND pases.NumSala = :numsala AND pases.NumSesion = :numses ORDER BY Titulo ASC, HoraIni ASC');
			$records->bindParam(':fechahoy', $hoy);
			$records->bindParam(':numsala', $_POST['sala']);
			$records->bindParam(':numses', $_POST['numsesion']);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			
			
//UPDATE DE DISPONIBILIDAD DE LA SALA 
			$cantidad = $_POST[cantidad] + $results[Vendidas] ;
			$records1 = $databaseConnection->prepare('UPDATE pases SET Vendidas=:cantidad WHERE  NumSala=:numsala AND NumSesion=:numses ');
			$records1->bindParam(':cantidad', $cantidad);
			$records1->bindParam(':numsala', $_POST['sala']);
			$records1->bindParam(':numses', $_POST['numsesion']);
			$records1->execute();
/***************************************************/	

//global $code;
for ($i = 1; $i <= $_POST[cantidad]*2; $i++) {
	  
	/***************************************************/
	// 				LOGO + BARCODE						
	/***************************************************/  
	$pdf->AddPage();
	$code=mt_rand(857000000,858000000);
	$pdf->Image('img/fiesta.jpg', 0 ,0,' 70' ,' 50','JPG');
	$pdf->i25(2,1,$code,1.1, 18);


	/***************************************************/
	// 				CONTENIDO 						
	/***************************************************/
	$pdf->AddPage();
	$pdf->SetFont('Courier','B',12);
	//TITULO + SEPARADOR
	//$pdf->Cell(0,5,utf8_decode('LOS VENGADORES LA ERA DE ULTRON'),0,1,'C');
	$pdf->MultiCell(0,4,utf8_decode(strtoupper($results[Titulo])),0,'C');
	$pdf->Ln(-2);
	$pdf->SetFont('Courier','B',14);
	$pdf->Cell(0,2, html_entity_decode("___________________"),0,1,'C'); 
	$pdf->Ln(3);
	// SALA SESION Y FECHA
	$pdf->SetFont('Courier','',7);
	//NECESITO SABER EL EJE Y, PORQUE DEPENDIENDO DE LA LONGITUD DEL TITULO PUEDE VARIAR Y NO LO PUEDO PONER FIJO
	$y= $pdf->GetY();
	$pdf->SetXY(10,$y);
	$pdf->Cell(5,2,utf8_decode('Sala'),0,1,'C');
	$pdf->SetXY(25,$y);
	$pdf->Cell(7,2,utf8_decode('Sesion'),0,1,'C');
	$pdf->SetXY(45,$y);
	$pdf->Cell(9,2,utf8_decode('Fecha'),0,1,'C');
	$pdf->Ln(1.5);
	// VALORES
	$pdf->SetFont('Courier','B',13);
	$y= $pdf->GetY();
	$pdf->SetXY(10,$y);
	$pdf->Cell(5,4,utf8_decode($results[NumSala]),0,1,'C');
	$pdf->SetXY(25,$y);
	$pdf->Cell(7,4,utf8_decode(date("H:i", strtotime($results[HoraIni]))),0,1,'C');
	$pdf->SetXY(45,$y);
	$pdf->Cell(9,4,utf8_decode($hoy_ticket),0,1,'C');
	$pdf->Ln(0);
	/************************************************************************/
}
	
/***************************************/

$pdf->Output("Entrada.pdf",'I');



?>