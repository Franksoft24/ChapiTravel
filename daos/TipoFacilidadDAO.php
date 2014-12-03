<?php

require_once 'DAO.php';
require_once '/../entities/TipoFacilidad.php';


class TipoFacilidadDAO extends DataAccessObject{

	public function delete(TipoFacilidad $entidad){
		$this->data->delete(TipoFacilidad::TABLE_NAME, 
			array('idtipofacilidad' => $entidad->getIdtipofacilidad()));
		return $this->data->result();
	}

	public function update(TipoFacilidad $entidad){
		$this->data->update(TipoFacilidad::TABLE_NAME, $entidad->toArray(), 
			array('idtipofacilidad' => $entidad->getIdtipofacilidad()));
		return $this->data->result();
	}

	public function getByID(Destino $entidad){
		$this->data->get($entidad::TABLE_NAME);

		$whereArray = array('idtipofacilidad = ' => $entidad->getIdtipofacilidad());
		$this->data->where($whereArray);

		return $this->data->result();
	}

}

