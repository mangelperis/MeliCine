<?php	
header('Content-Type: application/pdf');


	
require('fpdf.php');
require('php_mysql.php');


class PDF extends FPDF
{
  function Header()
    {
      // Logo
	
	$this->Image('catalogo_cursos/fpdf/img/pdf_base_2.png',1,1,'210' ,'297 ','PNG');
    $this->Ln(20);
     }

 function Footer()
    {
	  // Posición: a 1,5 cm del final
    //$this->SetY(-15);
	// Logo
	//$this->Image('catalogo_cursos/fpdf/img/pie.jpg', 10 ,275,' ' ,' ','JPG','http://www.isiconsulting.es');
   
    // Arial italic 8
    //$this->SetFont('Arial','I',8);
    // Número de página
	//$this->$paginas='{nb}';
    //$this->Cell(0,10,html_entity_decode("P&aacute;gina &nbsp;").$this->PageNo(),0,0,'C');
    }
	
	
}

$pdf=new PDF('P','mm','A4');
$pdf->SetAuthor('Juan Carlos Hernandez Biosca');
$pdf->SetMargins(15, 10 ,10);

$pdf->AddPage();
$pdf->SetDisplayMode(real,'default'); 
$pdf->Ln(5);
$pdf->SetTextColor(54,54,54);
$pdf->SetFont('Arial','B',14);
	$idCurso=utf8_decode($row["IdCurso"]);
	$Titulo=utf8_decode($row["Titulo"]);
	$h1="$idCurso / $Titulo";
	
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(120,10,$h1,0,1,'C',false);
$pdf->Ln(5);

$pdf->SetFont('Times','BU',12);
$pdf->Cell(0,4, html_entity_decode("Presentaci&oacute;n"),0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,4,utf8_decode($row["Presentacion"]),0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(0,4, html_entity_decode("Prop&oacute;sito"),0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,4,utf8_decode($row["Proposito"]),0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(0,4,'Objetivos',0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,4,utf8_decode($row["Objetivos"]),0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(0,4,'A quien va dirigido',0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,4,utf8_decode($row["AQuienVaDirigido"]),0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(0,4,'Requisitos',0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,4,utf8_decode($row["Requisitos"]),0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(0,4,'Contenido' ,0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,4,utf8_decode($row["Contenido"]),0,1);
$pdf->Ln(4);
$pdf->SetFont('Times','BU',12);
$pdf->Cell(0,4, html_entity_decode("Duraci&oacute;n"),0,1);	
$pdf->Ln(2);
	$Duracion= utf8_decode($row["Duracion"]);
	$c1="$Duracion  horas";
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,4,$c1,0,1);
$pdf->Ln(4);
$pdf->Output($Titulo.".pdf",'D');


mysql_free_result($result); 
mysql_close($link);




?>