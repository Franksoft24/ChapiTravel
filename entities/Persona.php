<?php
	//Crud de la clase persona
	require_once 'Entidad.php';
	class persona extends Entidad
	{
		const TABLE_NAME = "Personas";//Este lo deje de esa manera porque en el diagrama entidad relacion esta asi, de cambiar me avisan. 
		private $PersonaID;
		protected $Nombre;
		protected $Documento;
		protected $Email;
		protected $Telefono;	
		protected $Rol;
		protected $CuentaPaypal;
		protected $Clave;
		public function setPersonaID($PersonaID)
		{
			$this->PersonaID = $PersonaID;
			return $this;
		}
		public function setNombre($Nombre)
		{
			$this->Nombre = $Nombre;
			return $this;
		}
		public function setDocumento($Documento)
		{
			$this->Documento = $Documento;
			return $this;
		}
		public function setEmail($Email)
		{
			$this->Email = $Email;
			return $this;
		}
		public function setTelefono($Telefono)
		{
			$this->Telefono = $Telefono;
			return $this;
		}
		public function setRol($Rol)
		{
			$this->Rol = $Rol;
			return $this;
		}
		public function setCuentaPaypal($CuentaPaypal)
		{
			$this->CuentaPaypal = $CuentaPaypal;
			return $this;
		}
		public function setClave($Clave)
		{
			$this->Clave = $Clave;
			return $this;
		}
		public function getPersonaID()
		{
			return $this->PersonaID;
		}
		public function getNombre()
		{
			return $this->Nombre;
		}
		public function getDocumento()
		{
			return $this->Documento;
		}
		public function getEmail()
		{
			return $this->Email;
		}
		public function getTelefono()
		{
			return $this->Telefono;
		}
		public function getRol()
		{
			return $this->Rol;
		}
		public function getCuentaPaypal()
		{
			return $this->CuentaPaypal;
		}
		public function getClave()
		{
			return $this->Clave;
		}
	}

?>