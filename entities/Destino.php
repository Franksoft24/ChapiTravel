<?php
require_once 'Entidad.php';
class Destino extends Entidad{

	const TABLE_NAME = "destino";
	private $iddestino;
	protected $nombre;
	protected $ubicacion;
	protected $foto;

	public function getIddestino(){
		return $this->iddestino;
	}

	public function setIddestino($iddestino){
		$this->iddestino = $iddestino;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getUbicacion(){
		return $this->ubicacion;
	}

	public function setUbicacion($ubicacion){
		$this->ubicacion = $ubicacion;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	
}