<?php

require_once 'DAO.php';
require_once '/../entities/Servicio.php';


class ServicioDAO extends DataAccessObject{

	public function delete(Servicio $entidad){
		$this->data->delete(Servicio::TABLE_NAME, 
			array('idservicio' => $entidad->getIdservicio()));
		return $this->data->result();
	}

	public function update(Servicio $entidad){
		$this->data->update(Servicio::TABLE_NAME, $entidad->toArray(), 
			array('idservicio' => $entidad->getIdservicio()));
		return $this->data->result();
	}

	public function getByID(Servicio $entidad){
		$this->data->get($entidad::TABLE_NAME);

		$whereArray = array('idservicio = ' => $entidad->getIdservicio());
		$this->data->where($whereArray);

		return $this->data->result();
	}

}

