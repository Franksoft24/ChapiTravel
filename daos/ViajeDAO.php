<?php

require_once 'DAO.php';
require_once '/../entities/Viaje.php';


class ViajeDAO extends DataAccessObject{

	public function delete(Viaje $entidad){
		$this->data->delete(Viaje::TABLE_NAME, 
			array('ViajeID' => $entidad->getViajeID()));
		return $this->data->result();
	}

	public function update(Viaje $entidad){
		$this->data->update(Viaje::TABLE_NAME, $entidad->toArray(), 
			array('ViajeID' => $entidad->getViajeID()));
		return $this->data->result();
	}

	public function getByID(Viaje $entidad){
		$this->data->get($entidad::TABLE_NAME);

		$whereArray = array('ViajeID = ' => $entidad->getViajeID());
		$this->data->where($whereArray);

		return $this->data->result();
	}

}

