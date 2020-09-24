<?php

require_once('crud_dispositivo.php');
require_once('dispositivo.php');
 
$crud= new CrudDispositivo();
$dispositivo= new Dispositivo();
 
	if (isset($_POST['insertar'])) {
		$dispositivo->setNumero($_POST['numero']);
		$dispositivo->setDescripcion($_POST['descripcion']);
		$dispositivo->setTamano($_POST['tamano']);
		$dispositivo->setSistema($_POST['sistema']);
		$dispositivo->setCamara($_POST['camara']);
		$dispositivo->setRam($_POST['ram']);

		$crud->insertar($dispositivo);
		header('Location: index.php');

	}elseif(isset($_POST['actualizar'])){
		$dispositivo->setId($_POST['id']);
		$dispositivo->setNumero($_POST['numero']);
		$dispositivo->setDescripcion($_POST['descripcion']);
		$dispositivo->setTamano($_POST['tamano']);
		$dispositivo->setSistema($_POST['sistema']);
		$dispositivo->setCamara($_POST['camara']);
		$dispositivo->setRam($_POST['ram']);
		$crud->actualizar($dispositivo);
		header('Location: index.php');

	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
		header('Location: index.php');		

	}elseif($_GET['accion']=='a'){
		header('Location: actualizar.php');
	}
?>