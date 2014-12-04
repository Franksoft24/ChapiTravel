<?php

require_once 'DAO.php';
require_once '/../entities/Reservacion.php';


class ReservacionDAO extends DataAccessObject{

	public function delete(Reservacion $entidad){
		$this->data->delete(Reservacion::TABLE_NAME, 
			array('idreservacion' => $entidad->getIdreservacion()));
		return $this->data->result();
	}

	public function update(Reservacion $entidad){
		$this->data->update(Reservacion::TABLE_NAME, $entidad->toArray(), 
			array('idreservacion' => $entidad->getIdreservacion()));
		return $this->data->result();
	}

	public function getByID(Reservacion $entidad){
		$this->data->get($entidad::TABLE_NAME);
		$whereArray = array('idreservacion = ' => $entidad->getIdreservacion());
		$this->data->where($whereArray);
		return $this->data->result();
	}

	public function getDatos(){
		$query = "SELECT 
		
			r.estado as estado, 
			s.descripcion as servicio,
			s.precio as servicioPrecio, 
			r.cantidadpersonas as cantidadPersonas,
			
			c.idcliente as idcliente,
			c.idusuario as idusuario, 
			v.descripcion as viajedesc, 
			
			v.precio as viajeprecio
		from reservacionservicio rs
		inner join reservacion r on rs.idreservacion = r.idreservacion
		inner join servicio s on rs.idservicio = s.idservicio
		inner join viaje v on r.idviaje = v.idviaje
		inner join cliente c on r.idcliente = c.idcliente";

		return $this->data->executeQuery($query);
	}


	public function getReservaciones(){
		$query = "
		SELECT concat(c.nombres,' ', c.apellidos) as cliente, r.idreservacion as idreservacion, 
			concat(v.fechainicio, ' - ', v.fechafin) as fechaviaje, v.descripcion as viajedesc
			from reservacion r
			inner join cliente c
				on r.idcliente = r.idcliente
			inner join viaje v
				on v.idviaje = r.idviaje
		";

		return $this->data->executeQuery($query);
	}

}

