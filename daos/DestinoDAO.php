<?php

require_once 'DAO.php';
require_once '/../entities/Destino.php';


class DestinoDAO extends DataAccessObject{

	public function delete(Destino $entidad){
		$this->data->delete(Destino::TABLE_NAME, 
			array('DestinoID' => $entidad->getDestinoID()));
		return $this->data->result();
	}

	public function update(Destino $entidad){
		$this->data->update(Destino::TABLE_NAME, $entidad->toArray(), 
			array('DestinoID' => $entidad->getDestinoID()));
		return $this->data->result();
	}

}

