<?php
require_once 'Entidad.php';
class Viaje extends Entidad{

	const TABLE_NAME = "Viajes";
	private $ViajeID;
	protected $Nombre;
	protected $CantidadPlazas;
	protected $FechaPartida;
	protected $FechaLlegada;

	public function getViajeID() {
		return $this->ViajeID;
	}

	public function setViajeID($viajeID) {
		$this->ViajeID = $viajeID;
		return $this;
	}

	public function getNombre() {
		return $this->Nombre;
	}

	public function setNombre($nombre) {
		$this->Nombre = $nombre;
		return $this;
	}

	public function getCantidadPlazas() {
		return $this->CantidadPlazas;
	}

	public function setCantidadPlazas($cantidadPlazas) {
		$this->CantidadPlazas = $cantidadPlazas;
		return $this;
	}

	public function getFechaPartida() {
		return $this->FechaPartida;
	}

	public function setFechaPartida($fechaPartida) {
		$this->FechaPartida = $fechaPartida;
		return $this;
	}

	public function getFechaLlegada() {
		return $this->FechaLlegada;
	}

	public function setFechaLlegada($fechaLlegada) {
		$this->FechaLlegada = $fechaLlegada;
		return $this;
	}

	
}