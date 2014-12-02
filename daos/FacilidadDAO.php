<?php
require_once 'DAO.php';
require_once '/../entities/Facilidad.php';


class FacilidadDAO extends DataAccessObject{

	public function delete(Facilidad $entidad){
		$this->data->delete(Facilidad::TABLE_NAME, 
			array('idfacilidad' => $entidad->getIdfacilidad()));
		return $this->data->result();
	}

	public function update(Facilidad $entidad){
		$this->data->update(Facilidad::TABLE_NAME, $entidad->toArray(), 
			array('idfacilidad' => $entidad->getIdfacilidad()));
		return $this->data->result();
	}

	public function getByID(Facilidad $entidad){
		$this->data->get($entidad::TABLE_NAME);
		$whereArray = array('idfacilidad = ' => $entidad->getIdfacilidad());
		$this->data->where($whereArray);
		return $this->data->result();
	}

	public function getDatos(Facilidad $entidad){
		$this->data->get($entidad::TABLE_NAME.' f', 
			'f.idfacilidad as idfacilidad,
			f.descripcion as facilidad, 
			tf.nombre as tipofacilidad,
			d.nombre as destino');
		$this->data->join('tipofacilidad tf', 'f.idtipofacilidad = tf.idtipofacilidad');
		$this->data->join('destino d', 'f.iddestino = d.iddestino');
		return $this->data->result();
	}

}
