<?php
	
	require_once 'DAO.php';
	require_once '/../entities/Proveedor.php';


	class ProveedorDAO extends DataAccessObject{
	
		public function delete(Proveedor $entidad){
			$this->data->delete(Proveedor::TABLE_NAME, 
				array('idproveedor' => $entidad->getIdproveedor()));
			return $this->data->result();
		}

		public function update(Proveedor $entidad){
			$this->data->update(Proveedor::TABLE_NAME, $entidad->toArray(), 
				array('idproveedor' => $entidad->getIdproveedor()));
			return $this->data->result();
		}
		public function getByID(Proveedor $entidad){
			$this->data->get($entidad::TABLE_NAME);
			$whereArray = array('idproveedor = ' => $entidad->getIdproveedor());
			$this->data->where($whereArray);
			return $this->data->result();
		}
	}
?>