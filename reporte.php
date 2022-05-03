<?php 
	require "conexion.php";
	require "plantilla.php";

	$grado = $_POST['grado'];

	//$sql = "SELECT id, nombre, edad,matricula, correo FROM alumnos";
	$sql = "SELECT a.id, a.nombre, a.edad, a.matricula, a.correo, g.grado FROM alumnos as a INNER JOIN grados as g on a.id_grado=g.id where g.grado like '$grado'";
	$result=$mysqli->query($sql);

	$pdf= new FPDF("P","mm","letter");/*P para que sea vertical y mm de milimetros*/
	$pdf -> AddPage();
	$pdf -> Setfont("Arial","",9); /*Fuente*/
	$pdf -> Cell(190,5,"Reporte de Alumnos",0,1,"C"); /*largo 100, alto 5*/

	$pdf -> Ln(2);

	$pdf -> Cell(20,5,"Id",1,0,"C");
	$pdf -> Cell(40,5,"Nombre",1,0,"C");
	$pdf -> Cell(20,5,"Edad",1,0,"C");
	$pdf -> Cell(40,5,"Matricula",1,0,"C");
	$pdf -> Cell(30,5,"Grado",1,0,"C");
	$pdf -> Cell(50,5,"Correo",1,1,"C");
	
	while ($fila = $result->fetch_assoc()) {
		
		$pdf -> Cell(20,5,$fila['id'],1,0,"C");
		$pdf -> Cell(40,5,$fila['nombre'],1,0,"C");
		$pdf -> Cell(20,5,$fila['edad'],1,0,"C");
		$pdf -> Cell(40,5,$fila['matricula'],1,0,"C");
		$pdf -> Cell(40,5,$fila['grado'],1,0,"C");
		$pdf -> Cell(50,5,$fila['correo'],1,1,"C");
	}
	
	$pdf -> Output();


 ?>