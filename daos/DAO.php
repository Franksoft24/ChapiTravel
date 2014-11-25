<?php
require_once '/../data/DataAccessDB.php';


abstract class DataAccessObject{
	protected $data;

	public function __construct(){
		if(!isset($this->data)){
			$this->data = new DataAccessDB();
		}
	}

	public function insert(Entidad $entidad){
		$this->data->insert($entidad::TABLE_NAME, $entidad->toArray());
		return $this->data->result();
	}

	public function get(Entidad $entidad){
		$this->data->get($entidad::TABLE_NAME);
		return $this->data->result();
	}
	
}
