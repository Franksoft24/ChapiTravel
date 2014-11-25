<?php
require_once 'Entidad.php';
class Destino extends Entidad{

	const TABLE_NAME = "Destinos";
	private $destinoID;
	protected $nombre;
	protected $lugar;
	protected $descripcion;
	protected $foto;

	public function getDestinoID() {
		return $this->destinoID;
	}

	public function setDestinoID($destinoID) {
		$this->destinoID = $destinoID;
		return $this;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
		return $this;
	}

	public function getLugar() {
		return $this->lugar;
	}

	public function setLugar($lugar) {
		$this->lugar = $lugar;
		return $this;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
		return $this;
	}

	public function getFoto() {
		return $this->foto;
	}

	public function setFoto($foto) {
		$this->foto = $foto;
		return $this;
	}

	
}