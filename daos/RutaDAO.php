<?php

require_once 'DAO.php';
require_once '/../entities/Ruta.php';


class RutaDAO extends DataAccessObject{

	public function delete(Ruta $entidad){
		$this->data->delete(Ruta::TABLE_NAME, 
			array('idruta' => $entidad->getRutaID()));
		return $this->data->result();
	}

	public function deleteViajesDeRuta(Ruta $entidad, $viajeId){
		$this->data->delete(Ruta::TABLE_NAME, 
			array('idviaje' => $viajeId));
		return $this->data->result();
	}

	public function update(Ruta $entidad){
		$this->data->update(Ruta::TABLE_NAME, $entidad->toArray(), 
			array('idruta' => $entidad->getRutaID()));
		return $this->data->result();
	}

	public function getByID(Ruta $entidad){
		$this->data->get($entidad::TABLE_NAME);

		$whereArray = array('idruta = ' => $entidad->getRutaID());
		$this->data->where($whereArray);

		return $this->data->result();
	}

	public function getRutaForViaje(Ruta $ruta, Viaje $viaje) {
		$viajeId = $viaje->getViajeID();

		if($viajeId == NULL){
			$viajeId = 0;
		}

		$this->data->get($ruta::TABLE_NAME, "iddestino");

		$whereArray = array('idviaje = ' => $viajeId);
		$this->data->where($whereArray);

		$orderArray = array('orden' => 'asc');
		$this->data->order_by($orderArray);

		return $this->data->result();
	}

}

