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
	$this->Image('catalogo_cursos/fpdf/img/pdf_base.png', 1 ,1,' 210' ,' 297','PNG');
    $this->Ln(22);}
	
     }

 function Footer()
    {
	  if ($this->PageNo() >='2'){
		// Posición: a 1,5 cm del final
		// $this->SetY(-15);
		$this->SetXY(15,285);
			// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->MultiCell(0,5,html_entity_decode("P&aacute;gina ").$this->PageNo(),0,1);
		}
    }
	
	
}

$pdf=new PDF('P','mm','A4');
$pdf->SetAuthor('Juan Carlos Hernandez Biosca');
$pdf->SetCreator('Juan Carlos Hernandez Biosca');
$pdf->SetMargins(25, 10 ,10);
$pdf->SetTitle($title);
$pdf->SetDisplayMode(real,'default'); 
$pdf->SetTextColor(54,54,54);
//PORTADA
$pdf->AddPage();
$pdf->Image('catalogo_cursos/fpdf/img/pdf2_'.Date("y").'.png', 0 ,0,' 210' ,' 297','PNG');
$pdf->Ln(25);
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



//Consultas para el CATALOGO ABREVIADO
$result1=mysql_query("SELECT Distinct(Especialidad) from $dBtabla ORDER BY Especialidad ASC",$link);

	
	//Bucle para cada una de las páginas de contenidos
	
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
		
$pdf->AddPage();
$pdf->Ln(4);
$pdf->SetFont('Arial','BIU',15);
		$Especialidad=utf8_decode($row["Especialidad"]);
		$Especialidad1=$row["Especialidad"];
$pdf->SetXY(50,20);
$pdf->Cell(120,10,$Especialidad,0,1,'C',false);
$pdf->Ln(3);


	if ( $Especialidad1=='Informática' || $Especialidad1=='Formación Ocupacional') {
				
			$result2=mysql_query("SELECT Distinct(NombreAF) from $dBtabla where Especialidad='$Especialidad1' ORDER BY NombreAF ASC",$link);
			
			while($raw = mysql_fetch_array($result2) ) {
			$pdf->Ln(5);
			$pdf->SetFont('Arial','B',11);
			$NombreAF=utf8_decode($raw["NombreAF"]);
			$NombreAF1=$raw["NombreAF"];
			
			$pdf->MultiCell(0,4,$NombreAF,0,'J');
			$pdf->Ln(3);
			
			// AQUI OTRO BUCLE PARA MOSTRAR LOS CURSOS DE CADA AREA FORMATIVA ((SOLO LOS CURSOS PUBLICADOS & NO-OBSOLETOS))
					$result3=mysql_query("SELECT Titulo FROM $dBtabla WHERE Especialidad='$Especialidad1' AND NombreAF='$NombreAF1' AND Obsoleto='0' AND Publicado='-1' ORDER BY Titulo ASC ",$link);
				
					while($rew = mysql_fetch_array($result3)  ) {
									
						
						
						$Titulo=utf8_decode($rew["Titulo"]);
						$Titulo1=$rew["Titulo"];
						$pdf->SetFont('Arial','',10);
						$pdf->MultiCell(0,4,"- $Titulo",0,1);
						$pdf->Ln(1);
																}	
						mysql_free_result($result3); 
						
						}
			
				
						mysql_free_result($result2); 
				
				
			//De lo contrario , se mostrará el listado de cursos disponibles para esa 'Especialidad' , y que no estén Obsoletos/(NO)Publicado
			}else {
				
					$result2=mysql_query("SELECT Titulo,IdCurso FROM $dBtabla WHERE Especialidad='$Especialidad1' AND Obsoleto='0' AND Publicado='-1' ORDER BY Titulo ASC",$link);
				
					while($raw = mysql_fetch_array($result2)  ) {
									
						
						
						$Titulo=utf8_decode($raw["Titulo"]);
						$Titulo1=$raw["Titulo"];
						$pdf->SetFont('Arial','',10);
						$pdf->MultiCell(0,4,"- $Titulo",0,1);
						$pdf->Ln(1);
																}	
						mysql_free_result($result2); 
						
						}
				  
					

	

	
	
		
		
}
$pdf->Output("Listado de cursos - ISI Consulting.pdf",'D');


mysql_free_result($result1);
mysql_close($link);
?>