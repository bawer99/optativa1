<?php

	require_once('crud_dispositivo.php');
	require_once('dispositivo.php');
	$crud= new CrudDispositivo();
	$dispositivo= new Dispositivo();

	$dispositivo=$crud->obtenerDispositivo($_GET['id']);
?>
<html>
<head>
	<title>Actualizar Dispositivo</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<h2>Actualizar Dispositivo</h2>
	<form action='administrar_dispositivo.php' method='post'>
	<table>
		<tr>
			<input type='hidden' name='id' value='<?php echo $dispositivo->getId()?>'>
			<td>Numero de serie:</td>
			<td> <input type='text' name='numero' value='<?php echo $dispositivo->getNumero()?>'></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='descripcion' value='<?php echo $dispositivo->getDescripcion()?>' ></td>
		</tr>
		<tr>
			<td>Tamano:</td>
			<td><input type='text' name='tamano' value='<?php echo $dispositivo->getTamano() ?>'></td>
		</tr>
		<tr>
			<td>Sistema Operativo:</td>
			<td><input type='text' name='sistema' value='<?php echo $dispositivo->getSistema()?>' ></td>
		</tr>
		<tr>
			<td>Camara:</td>
			<td><input type='text' name='camara' value='<?php echo $dispositivo->getCamara() ?>'></td>
		</tr>
		<tr>
			<td>RAM:</td>
			<td><input type='text' name='ram' value='<?php echo $dispositivo->getRam() ?>'></td>
		</tr>
		<input type='hidden' name='actualizar' value = 'actualizar'>
	</table>
	<input type='submit' value='Guardar'>
	<button onclick = "location.href='index.php'">Volver</button>
</form>
</body>
</html>