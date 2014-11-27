<?php
	
	require_once 'DAO.php';
	require_once '/../entities/Persona.php';


	class PersonaDAO extends DataAccessObject{
	
		public function delete(Persona $entidad){
			$this->data->delete(Persona::TABLE_NAME, 
				array('PersonaID' => $entidad->getPersonaID()));
			return $this->data->result();
		}

		public function update(Persona $entidad){
			$this->data->update(Persona::TABLE_NAME, $entidad->toArray(), 
				array('PersonaID' => $entidad->getPersonaID()));
			return $this->data->result();
		}
		public function getByID(Persona $entidad){
			$this->data->get($entidad::TABLE_NAME);
			$whereArray = array('PersonaID = ' => $entidad->getPersonaID());
			$this->data->where($whereArray);
			return $this->data->result();
		}
	}
?>