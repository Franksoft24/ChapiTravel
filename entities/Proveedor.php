<?php
	//Crud de la clase proveedor
	require_once 'Entidad.php';
	class Proveedor extends Entidad
	{
		const TABLE_NAME = "proveedor";
		private $idproveedor;
		protected $nombres;
		protected $apellidos;
		protected $identificacion;
		protected $direccion;	
		protected $telefono;
		protected $email;
		protected $fecharegistro;
		protected $habilitado;
		
	public function getIdproveedor(){
		return $this->idproveedor;
	}

	public function setIdproveedor($idproveedor){
		$this->idproveedor = $idproveedor;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getIdentificacion(){
		return $this->identificacion;
	}

	public function setIdentificacion($identificacion){
		$this->identificacion = $identificacion;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getFecharegistro(){
		return $this->fecharegistro;
	}

	public function setFecharegistro($fecharegistro){
		$this->fecharegistro = $fecharegistro;
	}

	public function getHabilitado(){
		return $this->habilitado;
	}

	public function setHabilitado($habilitado){
		$this->habilitado = $habilitado;
	}
}
?>