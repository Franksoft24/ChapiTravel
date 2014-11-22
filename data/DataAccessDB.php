<?php
require_once 'config.php';
 class DataAccessDB{

	private $connection = null;
	private $query = '';
	
	public function __construct($connection = null){
		if(isset($connection)){
			$this->connection = $connection;

		}else{

			if(!isset($this->connection)){
				$this->connection = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME, DB_PORT);	
			}

		}

		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
	
	
	public function insert($tableName,$data){
		$this->query = '';
		$fields = implode(',', array_keys($data));
		$values = implode(',', 
			array_map( 
				function($value){ 
					return "'".mysqli_real_escape_string($this->connection, $value)."'"; 
				} , array_values($data)));
		$this->query = "INSERT INTO {$tableName} ({$fields}) VALUES ({$values});";
	}

	public function update($tableName,$data, $whereOptions){
		$this->query = '';
		$values = implode(',', 
			array_map( 
				function($key,$value){ 
					return "{$key} = '".mysqli_real_escape_string($this->connection, $value)."'"; 
				} , array_keys($data),array_values($data)));

		$this->query = "UPDATE {$tableName} SET {$values}";
		$this->where($whereOptions);
	}

	public function delete($tableName,$whereOptions){
		$this->query = '';
		$this->query = "DELETE FROM {$tableName}";
		$this->where($whereOptions);
	}

	public function get($tableName, $data = "*", $options = null){
		$fields = "";
		$result = array();		
		$this->query = '';
		if(is_array($data)){
			$fields = implode(",", array_values($data));
			
		}else{
			$fields = $data;
		}

		$this->query = "SELECT {$fields} FROM {$tableName} ";

	}

	public function where($data, $connector = 'AND'){
		if(gettype($data) == 'string'){
			$values = $data;
		}else if(is_array($data)){
			$values = implode($connector, 
			array_map( 
				function($key,$value){ 
					return "{$key} = '".mysqli_real_escape_string($this->connection, $value)."'"; 
				} , array_keys($data),array_values($data)));
		}
		
		$this->query .= " WHERE {$values}";
	}

	public function order_by($data){
		if(is_array($data)){
			$values = implode(',', 
			array_map( 
				function($key,$value){ 
					return "{$key} {$value}"; 
				} , array_keys($data),array_values($data)));
		}else{
			$values = $data;
		}
		$this->query .= " ORDER BY {$values}";
	}

	public function group_by($data){
		if(is_array($data)){
			$values = implode(',', $data);
		}else{
			$values = $data;
		}
		$this->query .= " GROUP BY {$values}";
	}

	public function join($table, $on, $type='INNER'){
		$this->query .= " {$type} JOIN {$table} ON {$on}";
	}

	public function result(){
		$resultSet= array();
		$result = mysqli_query($this->connection, $this->query);
		if($result){
			if(preg_match('/INSERT /', $this->query)){
				return mysqli_insert_id($this->connection);
			}
			if(preg_match('/SELECT /', $this->query)){
				
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)){
						$resultSet[] = $row;
					}
					
				}
				return $resultSet;
			}
		}
		return $result;
		
	}

	public function select($query){
		$result = array();
		$res = mysqli_query($this->connection, $query);
		if($res){
			while ($row = mysqli_fetch_assoc($res)){
				$result[] = $row;
			}
			return $result;
		}
		return $res;
	}

	public function query($query){
		return mysqli_query($this->connection, $query);
	}

	public function closeConnection(){
		mysqli_close($this->connection);
	}

	public function getConnection(){
		return $this->connection;
	}

	public function setConnection($connection){
		$this->connection = $connection;
	}


}
