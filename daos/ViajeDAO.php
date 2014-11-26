<?php

require_once 'DAO.php';
require_once '/../entities/Viajes.php';


class ViajeDAO extends DataAccessObject{

	public function delete(Viajes $entidad){
		$this->data->delete(Viajes::TABLE_NAME, 
			array('ViajeID' => $entidad->getViajeID()));
		return $this->data->result();
	}

	public function update(Viajes $entidad){
		$this->data->update(Viajes::TABLE_NAME, $entidad->toArray(), 
			array('ViajeID' => $entidad->getViajeID()));
		return $this->data->result();
	}

	public function getByID(Viajes $entidad){
		$this->data->get($entidad::TABLE_NAME);

		$whereArray = array('ViajeID = ' => $entidad->getViajeID());
		$this->data->where($whereArray);

		return $this->data->result();
	}

}

