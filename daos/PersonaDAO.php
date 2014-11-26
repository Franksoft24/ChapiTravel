<?php
	
	require_once 'DAO.php';
	require_once '/../entities/Personas.php';


	class PersonaDAO extends DataAccessObject{
	
		public function delete(Personas $entidad){
			$this->data->delete(Personas::TABLE_NAME, 
				array('PersonaID' => $entidad->getPersonaID()));
			return $this->data->result();
		}

		public function update(Personas $entidad){
			$this->data->update(Personas::TABLE_NAME, $entidad->toArray(), 
				array('PersonaID' => $entidad->getPersonaID()));
			return $this->data->result();
		}
		public function getByID(Personas $entidad){
			$this->data->get($entidad::TABLE_NAME);
			$whereArray = array('PersonaID = ' => $entidad->getPersonaID());
			$this->data->where($whereArray);
			return $this->data->result();
		}
	}
?>