<?php

require_once 'DAO.php';
require_once '/../entities/Destino.php';


class DestinoDAO extends DataAccessObject{

	public function delete(Destino $entidad){
		$this->data->delete(Destino::TABLE_NAME, 
			array('iddestino' => $entidad->getIddestino()));
		return $this->data->result();
	}

	public function update(Destino $entidad){
		$this->data->update(Destino::TABLE_NAME, $entidad->toArray(), 
			array('iddestino' => $entidad->getIddestino()));
		return $this->data->result();
	}

	public function getByID(Destino $entidad){
		$this->data->get($entidad::TABLE_NAME);
		$whereArray = array('iddestino = ' => $entidad->getIddestino());
		$this->data->where($whereArray);
		return $this->data->result();
	}

}

