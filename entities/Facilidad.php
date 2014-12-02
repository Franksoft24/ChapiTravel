<?php
require_once 'Entidad.php';
class Facilidad extends Entidad
{
	const TABLE_NAME = 'facilidad';
	private $idfacilidad;
	protected $iddestino;
	protected $idtipofacilidad;
	protected $descripcion;

	public function getIdfacilidad(){
		return $this->idfacilidad;
	}

	public function setIdfacilidad($idfacilidad){
		$this->idfacilidad = $idfacilidad;
	}

	public function getIddestino(){
		return $this->iddestino;
	}

	public function setIddestino($iddestino){
		$this->iddestino = $iddestino;
	}

	public function getIdtipofacilidad(){
		return $this->idtipofacilidad;
	}

	public function setIdtipofacilidad($idtipofacilidad){
		$this->idtipofacilidad = $idtipofacilidad;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
}