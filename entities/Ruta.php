<?php
require_once 'Entidad.php';
class Ruta extends Entidad{

	const TABLE_NAME = "ruta";
	private $idruta;
	protected $idviaje;
	protected $iddestino;
	protected $orden;

	public function getRutaID() {
		return $this->idruta;
	}

	public function setRutaID($rutaID) {
		$this->idruta = $rutaID;
		return $this;
	}

	public function getViajeID() {
		return $this->idviaje;
	}

	public function setViajeID($viajeID) {
		$this->idviaje = $viajeID;
		return $this;
	}

	public function getDestinoID() {
		return $this->iddestino;
	}

	public function setDestinoID($destinoID) {
		$this->iddestino = $destinoID;
		return $this;
	}

	public function getOrden() {
		return $this->orden;
	}

	public function setOrden($orden) {
		$this->orden = $orden;
		return $this;
	}
	
}