<?php

require_once 'DAO.php';
require_once '/../entities/Servicio.php';


class ServicioDAO extends DataAccessObject{

	public function delete(Servicio $entidad){
		$this->data->delete(Servicio::TABLE_NAME, 
			array('ServicioID' => $entidad->getServicioID()));
		return $this->data->result();
	}

	public function update(Servicio $entidad){
		$this->data->update(Servicio::TABLE_NAME, $entidad->toArray(), 
			array('ServicioID' => $entidad->getServicioID()));
		return $this->data->result();
	}

	public function getByID(Servicio $entidad){
		$this->data->get($entidad::TABLE_NAME);

		$whereArray = array('ServicioID = ' => $entidad->getServicioID());
		$this->data->where($whereArray);

		return $this->data->result();
	}

}

