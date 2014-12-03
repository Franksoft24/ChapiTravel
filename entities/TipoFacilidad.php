<?php
require_once 'Entidad.php';
class TipoFacilidad extends Entidad
{
	const TABLE_NAME = 'tipofacilidad';
    private $idtipofacilidad;
    protected $nombre;
    protected $habilitado;
    
    public function getIdtipofacilidad(){
		return $this->idtipofacilidad;
	}

	public function setIdtipofacilidad($idtipofacilidad){
		$this->idtipofacilidad = $idtipofacilidad;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getHabilitado(){
		return $this->habilitado;
	}

	public function setHabilitado($habilitado){
		$this->habilitado = $habilitado;
	}
    
	
}