<?php
require_once 'Entidad.php';
class Servicio extends Entidad{

	const TABLE_NAME = "servicio";
	private $idservicio;
	protected $idproveedor;
	protected $codigo;
	protected $descripcion;
	protected $precio;
	protected $habilitado;

	public function getIdservicio(){
		return $this->idservicio;
	}

	public function setIdservicio($idservicio){
		$this->idservicio = $idservicio;
	}

	public function getIdproveedor(){
		return $this->idproveedor;
	}

	public function setIdproveedor($idproveedor){
		$this->idproveedor = $idproveedor;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getHabilitado(){
		return $this->habilitado;
	}

	public function setHabilitado($habilitado){
		$this->habilitado = $habilitado;
	}
	
}