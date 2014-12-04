<?php
require_once 'Entidad.php';
class Reservacion extends Entidad{

	const TABLE_NAME = "reservacion";
	private $idreservacion;
	protected $idcliente;
	protected $idviaje;
	protected $cantidadpersonas;
	protected $estado;

	public function getIdreservacion(){
		return $this->idreservacion;
	}

	public function setIdreservacion($idreservacion){
		$this->idreservacion = $idreservacion;
	}

	public function getIdcliente(){
		return $this->idcliente;
	}

	public function setIdcliente($idcliente){
		$this->idcliente = $idcliente;
	}

	public function getIdviaje(){
		return $this->idviaje;
	}

	public function setIdviaje($idviaje){
		$this->idviaje = $idviaje;
	}

	public function getCantidadpersonas(){
		return $this->cantidadpersonas;
	}

	public function setCantidadPersonas($cantidadpersonas){
		$this->cantidadpersonas = $cantidadpersonas;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}
}