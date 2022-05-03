<?php 	
	require "conexion.php";
	$sql = "SELECT id,grado FROM grados";
	$result = $mysqli->query($sql);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reporte</title>
</head>
<body>
	<h2>Genera reporte de alumnos</h2>
	<form action="reporte.php" method="POST" autocomplete="off">
		Ingresa grado
		<select id="grado" name="grado">
			<option value="">Selecciona una opcion</option>
			<?php 
				while ($fila = $result->fetch_assoc()) {?>
					<option value="<?php echo $fila['grado']; ?>"><?php echo $fila['grado']; ?></option>
				<?php } ?>
		</select> <br>
		<button type="submit">Generar</button>
	</form>
</body>
</html>