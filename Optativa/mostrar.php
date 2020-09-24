<?php

require_once('crud_dispositivo.php');
require_once('dispositivo.php');
$crud= new CrudDispositivo();
$dispositivo= new Dispositivo();

$listaDispositivos=$crud->mostrar();
?>
 
<html>
<head>
	<title>Mostrar Dispositivos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<h2>Registro de Dispositivos ingresados</h2>
	<button onclick = "location.href='index.php'">Volver</button>
	

		<table border=1>
		<head>
			<td>Numero</td>
			<td>Descripción</td>
			<td>Tamaño</td>
			<td>Sistema Operativo</td>
			<td>Camara</td>
			<td>RAM</td>
			<td>Actualizar</td>
			<td>Eliminar</td>
		</head>
		<body>
			<?php foreach ($listaDispositivos as $dispositivo) {?>
			<tr>
				<td><?php echo $dispositivo->getNumero() ?></td>
				<td><?php echo $dispositivo->getDescripcion() ?></td>
				<td><?php echo $dispositivo->getTamano()?> </td>
				<td><?php echo $dispositivo->getSistema() ?></td>
				<td><?php echo $dispositivo->getCamara() ?></td>
				<td><?php echo $dispositivo->getRam()?> </td>
				<td><button onclick = "location.href='actualizar.php?id=<?php echo $dispositivo->getId()?>&accion=a'">Actualizar</button></td>
				<td><button onclick = "location.href='administrar_dispositivo.php?id=<?php echo $dispositivo->getId()?>&accion=e'">Eliminar</button></td>
			</tr>
			<?php }?>
		</body>
	</table>

	
	
</body>
</html>