<?php
// incluye la clase Db
require_once('conexion.php');
 
	class CrudDispositivo{
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo dispositivo
		public function insertar($dispositivo){
			$db=Db::conectar();
			$d=rand(1,100);
			$insert=$db->prepare('INSERT INTO dispositivos values(:id ,:numero,:descripcion,:tamano,:sistema,:camara,:ram)');
			$insert->bindValue('id',$d);
			$insert->bindValue('numero',$dispositivo->getNumero());
			$insert->bindValue('descripcion',$dispositivo->getDescripcion());
			$insert->bindValue('tamano',$dispositivo->getTamano());
			$insert->bindValue('sistema',$dispositivo->getSistema());
			$insert->bindValue('camara',$dispositivo->getCamara());
			$insert->bindValue('ram',$dispositivo->getRam());
			$insert->execute();
		}
 
		// método para mostrar todos los dispositivos
		public function mostrar(){
			$db=Db::conectar();
			$listaDispositivos=[];
			$select=$db->query('SELECT * FROM dispositivos');
 
			foreach($select->fetchAll() as $dispositivo){
				$myDispositivo= new Dispositivo();
				$myDispositivo->setId($dispositivo['id']);
				$myDispositivo->setNumero($dispositivo['numero']);
				$myDispositivo->setDescripcion($dispositivo['descripcion']);
				$myDispositivo->setTamano($dispositivo['tamano']);
				$myDispositivo->setSistema($dispositivo['sistema']);
				$myDispositivo->setCamara($dispositivo['camara']);
				$myDispositivo->setRam($dispositivo['ram']);
				$listaDispositivos[]=$myDispositivo;
			}
			return $listaDispositivos;
		}
 
		// método para eliminar un dispositivo, recibe como parámetro el id del dispositivo
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM dispositivos WHERE id=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
 
		// método para buscar un dispocitivo, recibe como parámetro el id del dispositivo
		public function obtenerDispositivo($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM dispositivos WHERE id=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$dispositivo=$select->fetch();
			$myDispositivo= new Dispositivo();
			$myDispositivo->setId($dispositivo['id']);
			$myDispositivo->setNumero($dispositivo['numero']);
			$myDispositivo->setDescripcion($dispositivo['descripcion']);
			$myDispositivo->setTamano($dispositivo['tamano']);
			$myDispositivo->setSistema($dispositivo['sistema']);
			$myDispositivo->setCamara($dispositivo['camara']);
			$myDispositivo->setRam($dispositivo['ram']);
			return $myDispositivo;
		}
 
		// método para actualizar un dispositivo, recibe como parámetro el dispositivo
		public function actualizar($dispositivo){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE dispositivos SET numero=:numero, descripcion=:descripcion,tamano=:tamano,sistema=:sistema,camara=:camara,ram=:ram  WHERE id=:id');
			$actualizar->bindValue('id',$dispositivo->getId());
			$actualizar->bindValue('numero',$dispositivo->getNumero());
			$actualizar->bindValue('descripcion',$dispositivo->getDescripcion());
			$actualizar->bindValue('tamano',$dispositivo->getTamano());
			$actualizar->bindValue('sistema',$dispositivo->getSistema());
			$actualizar->bindValue('camara',$dispositivo->getCamara());
			$actualizar->bindValue('ram',$dispositivo->getRam());
			$actualizar->execute();
		}
	}
?>