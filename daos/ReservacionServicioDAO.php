<?php

require_once 'DAO.php';
require_once '/../entities/ReservacionServicio.php';


class ReservacionServicioDAO extends DataAccessObject{

	public function delete(ReservacionServicio $entidad){
		$this->data->delete(ReservacionServicio::TABLE_NAME, 
			array('idreservacionservicio' => $entidad->getIdreservacionservicio()));
		return $this->data->result();
	}

	public function update(ReservacionServicio $entidad){
		$this->data->update(ReservacionServicio::TABLE_NAME, $entidad->toArray(), 
			array('idreservacionservicio' => $entidad->getIdreservacionservicio()));
		return $this->data->result();
	}

	public function getByID(ReservacionServicio $entidad){
		$this->data->get($entidad::TABLE_NAME);
		$whereArray = array('idreservacionservicio = ' => $entidad->getIdreservacionservicio());
		$this->data->where($whereArray);
		return $this->data->result();
	}

	public function getServiciosEnReservacion($reservacion){
		$reservacionId = $reservacion->getIdreservacion();
		if(empty($reservacionId)){
			return array();
		}
		$this->data->get(ReservacionServicio::TABLE_NAME. ' rs',
			's.descripcion as servicio,
			rs.idreservacionservicio as idreservacionservicio,
			rs.idservicio as idservicio,
			rs.idreservacion as idreservacion');
		$this->data->join('servicio s', 'rs.idservicio = s.idservicio');
		$this->data->where(array('idreservacion' => $reservacionId));
		return $this->data->result();
	}

	public function getServiciosNoEnReservacion($reservacion){
		$reservacionId = $reservacion->getIdreservacion();
		if(empty($reservacionId)){
			$query = "SELECT * from servicio;";
		}else{
			$query = "SELECT 
				idservicio,
				descripcion,
				precio
			from servicio 
			where idservicio 
			not in ( 
				select idservicio from reservacionservicio
					where idreservacion = $reservacionId
			);";
		}
		return $this->data->executeQuery($query);
	}

	public function eliminarServicioEnReservacion($reservacion){
		$rId = $reservacion->getIdreservacion();
		$query = "DELETE FROM reservacionservicio 
		where idreservacion = $rId;";
		return mysqli_query($this->data->getConnection(), $query);
	}

}