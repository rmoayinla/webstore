<?php
/**
 * Database Query trait
 *
 * This class loads all the database methods for our store model
 * the copy of CI Db is used here to query the db 
 *
 *@author: Rabiu Mustapha
 *@category: Database model
 *@version: 0.1
 */

trait DB_query{
	
	/**
	 * Returns an instance of db object
	 *
	 * the db object is CI Database handler which does the actual querying 
	 */
	public function get_db(){
		return $this->db;
	}

	public function query($sql){
		$this->results = $this->db->query($sql);
	}

	/**
	 * generate query results in different formats 
	 *
	 *@param: $type 	(string)	format can be array, obj or json
	 */
	public function get_results($type = null){
		$type = empty($type) ? $this->get_defaults('result_type') : $type;
		switch ($type){
			case 'json':
				$result = is_object($this->results) ? json_encode($this->results->result()) : json_encode($this->results);
				break;
			case 'obj':
			case 'object':
				$result = method_exists($this->result, 'result') ? $this->results->result() : $this->results;
				break; 
			case 'array':
			default:
				$result = method_exists($this->results, 'result_array') ? $this->results->result_array() : (array)$this->results;
		}
		return $result;
	}

	/**
	 * Load all data in a particular table 
	 *@param: $columns 			array|string		select columns (optional)
	 *@return: $this			object 				instance of this class 
	 *
	 */
	public function getAllFromTable($columns = array()){
		
		//get the active table //
		$table = $this->get_table();

		//select only particular columns from the table if columns are passed //
		if(!empty($columns)){
			$columns = is_array($columns) ? implode(', ', $columns) : (string) $columns;
			$this->db->select($columns);
		}
		//query the database, and store the raw result //
		$this->results = $this->db->get($table);
		
 		return $this;
	}

	/**
	 * Get only one data from the database 
	 *@param: $column 		array 		array of columns to select from database
	 *@return: $this 		object 		instance of Store_model class
	 *
	 */
	public function getOneFromTable($columns=array()){
		//get the active table //
		$table = $this->get_table();

		//select only particular columns from the table if columns are passed //
		if(!empty($columns)){
			$columns = is_array($columns) ? implode(', ', $columns) : (string) $columns;
			$this->db->select($columns);
		}
		//limit this query to only one result //
		$this->db->limit(1);

		//query the database, and store the raw result //
		$this->results = $this->db->get($table);
		
 		return $this;
	}

	
	/**
	 * Populate related datas from relationship tables 
	 *
	 * queries the database and get datas of related columns 
	 * one to many or many to one relationships are loaded here 
	 * @param: 	$column 		string|array 		columns with foreign keys 
	 *@return: 	$this 			object 				instance of this class
	 *
	 */
	public function populate($columns){
		//check if the stored result is an instance of CI_DB result, if so convert to array //
		if(method_exists($this->results, 'result') || method_exists($this->results, 'result_array'))
			$this->results = $this->get_results();
		
		//copy or clone our results here, since it will be overriden in our next query //
		$clone_results  = $this->results;

		if(is_string($columns)) $columns = (array) $columns;

		/**
		 * Loop through our current results and check each result if the column is a foreign key
		 * checks the foreign key column in our relationships, this will tell us which table to map to 
		 * query the table and get the populated data, add the populated data to our cloned result 
		 */
		foreach($this->results as $index => $result){

			if(empty($result['meta'])) $result['meta'] = array();
			//if passed column is a boolean, then we are searching the key of results //
			if(is_bool($columns)) $columns = array_keys($result);

			foreach($columns as $column){
				
				if(!array_key_exists($column, $result)) continue;
				if(!array_key_exists($column, $this->relationships)) continue;
				
				$key = $this->relationships[$column];
				
				if($column === "meta"){
					$result[$column] = $this->get_meta($result["ID"]);
					$clone_results[$index] = $result;
					continue;
				}
				
				try{
					$table = is_array($key) ? $key['table'] : $key;
					$table = str_replace('_', ' ', $table);
					$sub_table = $this->set_table($table);
					
					//if a column is specified for this relationship, run a where clouse query//
					if(!empty($key['column'])) $this->db->where(array($key['column'] => $result[$column]));
					
					if(!empty($key['find']) && $key['find'] === 'one'){
						$result[$column] = $this->getOneFromTable()->get_results();
						$result[$column] = $result[$column][0];
					}else{
						$result[$column] = $this->getAllFromTable()->get_results();
					}

					$clone_results[$index] = $result;
				} catch(Exception $e){
					throw new Exception($e->getMessage());
				}
				
			} //end foreach $columns //
		}
		//copy our result back to the stored results //
		$this->results =  $clone_results;
		return $this;
	}
}