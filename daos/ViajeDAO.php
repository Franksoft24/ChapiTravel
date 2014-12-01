<?php

require_once 'DAO.php';
require_once '/../entities/Viaje.php';


class ViajeDAO extends DataAccessObject{

	public function delete(Viaje $entidad){
		$this->data->delete(Viaje::TABLE_NAME, 
			array('idviaje' => $entidad->getViajeID()));
		return $this->data->result();
	}

	public function update(Viaje $entidad){
		$this->data->update(Viaje::TABLE_NAME, $entidad->toArray(), 
			array('idviaje' => $entidad->getViajeID()));
		return $this->data->result();
	}

	public function getByID(Viaje $entidad){
		$this->data->get($entidad::TABLE_NAME);

		$whereArray = array('idviaje = ' => $entidad->getViajeID());
		$this->data->where($whereArray);

		return $this->data->result();
	}

	public function obtenerDestinosEnViaje($viajeId)
	{
		if($viajeId == NULL || $viajeId == 0){
			return array();
		}

		$query = "SELECT v.idviaje, d.iddestino, d.nombre 
					FROM viaje v
					INNER JOIN ruta r  ON r.idviaje = v.idviaje
					INNER JOIN destino d ON d.iddestino = r.iddestino
					WHERE v.idviaje = $viajeId
					ORDER BY r.orden";

		$result = $this->data->executeQuery($query);
		return $result;
	}

	public function obtenerDestinosFueraDeViaje($viajeId){
		$query = null;
		if($viajeId == NULL || $viajeId == 0){
			$query = "SELECT * FROM destino";
		}
		else{
			$query = "SELECT * FROM destino 
						WHERE iddestino NOT in (
						SELECT r.iddestino FROM viaje v
						INNER JOIN ruta r  ON r.idviaje = v.idviaje
						WHERE v.idviaje = $viajeId
					)";	
		}		

		$result = $this->data->executeQuery($query);
		return $result;
	}

	public function eliminarRutaDeViaje($viajeId){
		$query = "DELETE FROM ruta WHERE idviaje = $viajeId ";
		//echo $query;

		$result = mysqli_query($this->data->getConnection(), $query);
		echo mysqli_error($this->data->getConnection());

		//$result = $this->data->executeQuery($viajeId);
		//echo $result;
		return $result;
	}



}

