<?php
require_once 'Entidad.php';
class Viaje extends Entidad{

	const TABLE_NAME = "viaje";
	private $idviaje;
	protected $descripcion;
	//protected $CantidadPlazas;
	protected $fechainicio;
	protected $fechafin;
	protected $precio;
	protected $foto;

	public function getViajeID() {
		return $this->idviaje;
	}

	public function setViajeID($viajeID) {
		$this->idviaje = $viajeID;
		return $this;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
		return $this;
	}

	// public function getCantidadPlazas() {
	// 	return $this->CantidadPlazas;
	// }

	// public function setCantidadPlazas($cantidadPlazas) {
	// 	$this->CantidadPlazas = $cantidadPlazas;
	// 	return $this;
	// }

	public function getFechaPartida() {
		return $this->fechainicio;
	}

	public function setFechaPartida($fechaPartida) {
		$this->fechainicio = $fechaPartida;
		return $this;
	}

	public function getFechaLlegada() {
		return $this->fechafin;
	}

	public function setFechaLlegada($fechaLlegada) {
		$this->fechafin = $fechaLlegada;
		return $this;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
		return $this;
	}

	public function getFoto() {
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
		return $this;
	}


	
}