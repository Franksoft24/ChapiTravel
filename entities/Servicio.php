<?php
require_once 'Entidad.php';
class Servicio extends Entidad{

	const TABLE_NAME = "Servicios";
	private $servicioID;
	protected $nombre;
	protected $precio;
	protected $proveedorID;

	public function getServicioID() {
		return $this->servicioID;
	}

	public function setServicioID($servicioID) {
		$this->servicioID = $servicioID;
		return $this;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
		return $this;
	}

	public function getPrecio() {
		return $this->precio;
	}

	public function setPrecio($precio) {
		$this->precio = $precio;
		return $this;
	}

	public function getProveedorID() {
		return $this->proveedorID;
	}

	public function setProveedorID($proveedorID) {
		$this->proveedorID = $proveedorID;
		return $this;
	}
	
}