<?php
	class Dispositivo{
		private $id;
		private $numero;
		private $descripcion;
		private $tamano;
		private $sistema;
		private $camara;
		private $ram;
 
		function __construct(){}
 
		public function getNumero(){
		return $this->numero;
		}
 
		public function setNumero($numero){
			$this->numero = $numero;
		}
 
		public function getDescripcion(){
			return $this->descripcion;
		}
 
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
 
		public function getTamano(){
		return $this->tamano;
		}
 
		public function setTamano($tamano){
			$this->tamano = $tamano;
		}
		public function getSistema(){
			return $this->sistema;
		}
 
		public function setSistema($sistema){
			$this->sistema = $sistema;
		}
		public function getCamara(){
			return $this->camara;
		}
 
		public function setCamara($camara){
			$this->camara = $camara;
		}
		public function getRam(){
			return $this->ram;
		}
 
		public function setRam($ram){
			$this->ram = $ram;
		}
		public function getId(){
			return $this->id;
		}
 
		public function setId($id){
			$this->id = $id;
		}
	}
?>