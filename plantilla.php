<?php 	
	require "fpdf/fpdf.php";

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this -> Setfont("Arial","",9); /*Fuente*/
	
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this -> Cell(190,5,"Reporte de Alumnos",0,1,"C");
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}



 ?>