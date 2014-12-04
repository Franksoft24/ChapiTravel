<?php
require_once 'Entidad.php';
class ReservacionServicio extends Entidad{

	const TABLE_NAME = "reservacionservicio";
	private $idreservacionservicio;
	protected $idservicio;
	protected $idreservacion;

	public function getIdreservacionservicio(){
		return $this->idreservacionservicio;
	}

	public function setIdreservacionservicio($idreservacionservicio){
		$this->idreservacionservicio = $idreservacionservicio;
	}

	public function getIdservicio(){
		return $this->idservicio;
	}

	public function setIdservicio($idservicio){
		$this->idservicio = $idservicio;
	}

	public function getIdreservacion(){
		return $this->idreservacion;
	}

	public function setIdreservacion($idreservacion){
		$this->idreservacion = $idreservacion;
	}
}