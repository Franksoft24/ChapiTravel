<?php

require_once __DIR__ .'/config.php';

/**
 * For lazy reasons, you need to call the query parts in order.
 * Think of this class as a layer of mysqli PHP functions and a query builder.
 * Just MySQL queries. It uses mysqli functions.
 */
 class DataAccessDB{

	private $connection = null;
	private $query;
	private $insert;
	private $update;
	private $delete;
	private $select;
	private $where;
	private $group_by;
	private $having;
	private $order_by;
	private $limit;
	private $join;
	/**
	 * If you pass a connection, it uses that connection, else it uses the parameters passed in config.php file.
	 * @param mysqli connection $connection A mysqli connection
	 */
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
		$fields = implode(',', array_keys($data));
		$values = implode(',', 
			array_map( 
				function($value){ 
					$this->wrapInSingleQuotes($value);
					return $value;
				} , array_values($data)));
		$this->insert =  "INSERT INTO {$tableName} ({$fields}) VALUES ({$values});";
		
	}

	public function update($tableName,$data, $whereOptions){
		$values = implode(',', 
			array_map( 
				function($key,$value){ 
					$this->wrapInSingleQuotes($value);
					return "{$key} = {$value}"; 
				} , array_keys($data),array_values($data)));

		$this->update = "UPDATE {$tableName} SET {$values}";
		$this->where($whereOptions);
	}

	public function delete($tableName,$whereOptions){
		$this->delete = "DELETE FROM {$tableName}";
		$this->where($whereOptions);
	}

	public function get($tableName, $data = "*", $keysInData = false){
		$fields = "";
		$result = array();		
		if(is_array($data)){

			$fields = $keysInData ? implode(",", array_keys($data)) : implode(",", array_values($data));
			
		}else{
			$fields = $data;
		}

		$this->select = "SELECT {$fields} FROM {$tableName}";
		return $this;

	}
	/**
	 * Adds a WHERE to the current query
	 * @param  array $data        Where the keys are the fields and the values are, well, the values.
	 */
	public function where($data){
		$this->where = $this->createWhereOrHavingParts($data);
		return $this;
	}

	public function having($data){
        $this->having = $this->createWhereOrHavingParts($data);
        return $this;
	}

	public function limit($count, $offset = "0"){
		$this->limit = "{$offset}, {$count}";
		return $this;
	}

	public function order_by($data){
		if(is_array($data)){
			$values = implode(',', 
			array_map( 
				function($key,$value){ 
					return "{$key} {$value}"; 
				} , array_keys($data),array_values($data)));
			$this->order_by = "{$values}";
		}
		return $this;
	}

	public function group_by($data){
		if(is_array($data)){
			$values = implode(',', $data);
			$this->group_by = "{$values}";
		}
		return $this;
	}

	public function join($table, $on, $type='INNER'){
		$this->join .= " {$type} JOIN {$table} ON {$on}";
		return $this;
	}

	public function query($query){
		$this->query = $query;
		return $this->result();
	}

	private function buildQuery(){

		//INSERT
		if(!empty($this->insert)){
			$this->query = '';
			$this->query = $this->insert;	
		}
		
		//UPDATE
		if(!empty($this->update)){
			$this->query = '';
			$this->query = "
				{$this->update}
				WHERE {$this->where}
				";
		}
		
		//DELETE
		if(!empty($this->delete)){
			$this->query = '';
			$this->query = "
				{$this->delete}
				WHERE {$this->where}
				";
		}

		//SELECT
		if(!empty($this->select)){
			$this->where = !empty($this->where) ? "WHERE {$this->where}" : $this->where;
			$this->group_by = !empty($this->group_by) ? "GROUP BY {$this->group_by}" : $this->group_by;
			$this->having = !empty($this->having) ? "HAVING {$this->having}" : $this->having;
			$this->order_by  = !empty($this->order_by) ? "ORDER BY {$this->order_by}" : $this->order_by;
			$this->limit =  !empty($this->limit) ? "LIMIT {$this->limit}" : $this->limit;
			$this->query = '';
			$this->query = "
				{$this->select}
				{$this->join} 
				{$this->where} 
				{$this->group_by} 
				{$this->having} 
				{$this->order_by} 
				{$this->limit} 
			";
		}
		echo $this->query;
	}

	/**
	 * On success:
	 * If is an INSERT statement returns the last inserted id.
	 * If is a SELECT statement returns a result set.
	 * If it is any other statement like UPDATE or DELETE returns true.
	 * On failure:
	 * Always returns false
	 * @return mixed
	 */
	public function result(){
		$this->buildQuery();
		$resultSet= array();
		$result = mysqli_query($this->connection, $this->query);
		if($result){
			if(preg_match('/INSERT /', $this->query)){
				return mysqli_insert_id($this->connection);
			}

			if(preg_match('/SELECT /', $this->query)){
				
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_object($result)){
						$resultSet[] = $row;
					}
					
				}
				return $resultSet;
			}
		}

		return $result;
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

	private function wrapInSingleQuotes(&$value){
		if(is_string($value)){
			$value = "'".mysqli_real_escape_string($this->connection, $value)."'";
		}else if(is_int($value)){
			$value = mysqli_real_escape_string($this->connection, $value);
		}

	}
	private function createWhereOrHavingParts($data){
		if(is_array($data)){
            $values = implode(" ",
                array_map(
                    function($key,$value) {
                        $this->wrapInSingleQuotes($value);
                        $parts = explode(" ",$key);
                        $key = $parts[0];
                        $operator = isset($parts[1]) ? $parts[1] : "=";
                        $connector = isset($parts[2]) ? $parts[2] : "";
                        return "{$key} {$operator} {$value} {$connector}";
                    } , array_keys($data),array_values($data)));
            return "{$values}";
        }
	}
}


