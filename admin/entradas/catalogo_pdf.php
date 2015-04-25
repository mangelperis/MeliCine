<?php
header('Content-Type: application/pdf');


require('fpdf.php');
require('catalogo_mysql.php');




class PDF extends FPDF
{
  function Header()
    {
      // Logo
	
	
	
    if ($this->PageNo() >='2') {
	$this->Image('catalogo_cursos/fpdf/img/pdf_base.png', 0 ,0,' 210' ,' 297','PNG');
    $this->Ln(22);}
	
     
		}
		// Pie de página
		
function Footer()
{
	if ($this->PageNo() >='2'){
		// Posición: a 1,5 cm del final
		// $this->SetY(-15);
		$this->SetXY(93,285);
			// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->MultiCell(0,5,html_entity_decode("P&aacute;gina ").$this->PageNo(),0,1);
      	
	//}


	//if ($this->PageNo() >'2') {
    		
		$this->SetXY(15,285);
		$this->SetFont('Arial','B',8);
		$this->MultiCell(0,5,$GLOBALS["AF"],0,1);
		$this->Ln(3);
		}
}
}


$pdf=new PDF('P','mm','A4');
$pdf->SetAuthor('Juan Carlos Hernandez Biosca');
$pdf->SetCreator('Juan Carlos Hernandez Biosca');
$pdf->SetMargins(15, 10 ,10);
$pdf->SetTitle($title);
$pdf->SetDisplayMode(real,'default'); 
//PORTADA
$pdf->AddPage();
$pdf->Image('catalogo_cursos/fpdf/img/pdf_portada'.Date("y").'.png', 0 ,0,' 210' ,' 297','PNG');
$pdf->Ln(25);
						//***********************************//
// REVISADO A::
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(54,54,54);
$pdf->SetXY(120,269);
$pdf->Cell(120,5,"Revisado a : ".Date("m/Y"),0,1,'C',false);


//*******************************************************************************************************
//ÍNDICE DE CONTENIDOS
$pdf->AddPage();
$pdf->SetFont('Arial','BU',17);
$pdf->SetXY(40,25);
$pdf->Cell(120,10,html_entity_decode("&Iacute;ndice de &Aacute;reas Formativas"),0,1,'C',false);
$pdf->Ln(5);

//COPIA DE ::: Consultas para el CATALOGO ABREVIADO
$result1=mysql_query("SELECT Distinct(Especialidad) from $dBtabla ORDER BY Especialidad ASC",$link);

	
	//Bucle para GENERAR EL INDICE
	
	while($row = mysql_fetch_array($result1) ) {
		$row=str_replace("_x000D_","",$row);
		$row=str_replace("","",$row);
		$row=str_replace("<br>","",$row);
		$row=str_replace("•","-",$row);
		$row=str_replace("“","\"",$row);
		$row=str_replace("”","\"",$row);
		$row=str_replace("…","...",$row);
		$row=str_replace("–>","->",$row);
		$row=str_replace("","-",$row);
		$row=str_replace("","-",$row);
		$row=str_replace("","-",$row);
		$row=str_replace("‘","'",$row);
		$row=str_replace("’","'",$row);
		$row=str_replace("–","-",$row);
		


$pdf->SetFont('Arial','BI',13);
		$Especialidad=utf8_decode($row["Especialidad"]);
		$Especialidad1=$row["Especialidad"];
$pdf->SetDrawColor(50,60,100);
$pdf->SetX(+45);
$pdf->MultiCell(120,7,$Especialidad,0,'L',false);
$pdf->Ln(3);


	if ( $Especialidad1=='Informática' || $Especialidad1=='Formación Ocupacional') {
				
			$result2=mysql_query("SELECT Distinct(NombreAF) from $dBtabla where Especialidad='$Especialidad1' ORDER BY NombreAF ASC",$link);
			
			while($raw = mysql_fetch_array($result2) ) {
			$pdf->Ln(1);
			$pdf->SetFont('Arial','',10);
			$NombreAF=utf8_decode($raw["NombreAF"]);
			$NombreAF1=$raw["NombreAF"];
			$pdf->SetX(+60);
			$pdf->MultiCell(0,4,$NombreAF,0,'J');
			$pdf->Ln(1);
			
			
						
						}
			
				
						mysql_free_result($result2); 
				
				
			//De lo contrario , NADA
			}else {
									
						
						}
				  
					

	

	
	
		
		
}





//*******************************************************************************************************
	




//*******************************************************************************************************
	global $AF;
	$AF='';
	//Bucle para cada una de las páginas de contenidos
	
	while($raw = mysql_fetch_array($result) ) {
		$raw=str_replace("_x000D_","",$raw);
		$raw=str_replace("","",$raw);
		$raw=str_replace("<br>","",$raw);
		$raw=str_replace("•","-",$raw);
		$raw=str_replace("“","\"",$raw);
		$raw=str_replace("”","\"",$raw);
		$raw=str_replace("…","...",$raw);
		$raw=str_replace("–>","->",$raw);
		$raw=str_replace("","-",$raw);
		$raw=str_replace("","-",$raw);
		$raw=str_replace("","-",$raw);
		$raw=str_replace("‘","'",$raw);
		$raw=str_replace("’","'",$raw);
		$raw=str_replace("–","-",$raw);
		
		
		 
		
$pdf->AddPage();
$AF=utf8_decode($raw["NombreAF"]);
$pdf->Ln(4);
$pdf->SetFont('Arial','B',14);
	$idCurso=utf8_decode($raw["IdCurso"]);
	$Titulo=utf8_decode($raw["Titulo"]);
	$h1="$idCurso / $Titulo";
	
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(120,10,$h1,0,1,'C',false);
$pdf->Ln(4);

$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,4, html_entity_decode("Presentaci&oacute;n"),0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,utf8_decode($raw["Presentacion"]),0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,4, html_entity_decode("Prop&oacute;sito"),0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,utf8_decode($raw["Proposito"]),0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,4,'Objetivos',0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,utf8_decode($raw["Objetivos"]),0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,4,'A quien va dirigido',0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,utf8_decode($raw["AQuienVaDirigido"]),0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,4,'Requisitos',0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,utf8_decode($raw["Requisitos"]),0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,4,'Contenido' ,0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,utf8_decode($raw["Contenido"]),0,1);
$pdf->Ln(3);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,4, html_entity_decode("Duraci&oacute;n"),0,1);	
$pdf->Ln(1);
	$Duracion= utf8_decode($raw["Duracion"]);
	$c1="$Duracion  horas";
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,$c1,0,1);
 

	
}
$pdf->Output(html_entity_decode("Cat&aacute;logo de cursos - ISI Consulting.pdf"),'D');


mysql_free_result($result);
mysql_close($link);
?>