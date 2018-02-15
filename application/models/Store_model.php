<?php
/**
 * A model for handling webstore database tables
 *
 * Specify a table and perform all actions on the table 
 * CRUD actions can be done easily
 *@author: Rabiu Mustapha
 *@package: Webstore
 *@version: 0.1
 *
 */

class Store_model extends CI_Model{
	
	private $table = "";

	private $tables  = null;

	private $database = "";

	private $result_type = "";

	public function __construct(){
		$this->set_defaults();
	}

	private function results($query, $type = null){
		$type = empty($type) ? $this->result_type : $type;
		switch ($type){
			case 'json':
				$result = json_encode($query->result());
				break;
			case 'obj':
			case 'object':
				$result = $query->result();
				break; 
			case 'array':
			default:
				$result = $query->result_array();
		}
		return $result;
	}
	
	/**
	 * Set default values for our properties 
	 *
	 * default database, result type, table are set 
	 */
	private function set_defaults(){
		$this->database = 'webstore';
		$this->result_type = 'array';
	}

	public function get_defaults($prop){
		if(property_exists($this, $prop))
			return $this->{$prop};
	}

	/**
	 * Set the active table 
	 *
	 * All database operations will only be performed on the active table 
	 */
	public function set_table($table){
		//fetch tables from the db if they have not been fetched before//
		if(empty($this->tables)){
			$this->tables = $this->get_tables();
		}
		
		$table = strtolower($table);

		//throw exception if the table does not exist in the database
		if(!in_array($table, $this->tables)){
			throw new Exception('table does not exist in database'); 
		}

		$this->table = str_replace(' ', '_', $table);

	}

	/**
	 * Returns the active table 
	 */
	public function get_table(){
		return $this->table;
	}

	/**
	 * Return all tables from the webstore database 
	 *
	 */
	public function get_tables(){
		$sql = $table_title = "";

		// mysql statement for showing all tables //
		$sql = "SHOW tables from $this->database";

		$tables_query = $this->db->query($sql);
		$tables = array();
		
		//bail early if we have empty tables//
		if(empty($tables_query->result_array())){
			return $tables;
		}

		$tables = array_column($tables_query->result_array(), sprintf('Tables_in_%s', $this->database));

		$tables = array_map(function($name){
			return str_ireplace(array('ws_', '_'), array('', ' '), $name);
		}, $tables);

		$this->tables = $tables;
		
		return $this->tables;
	}

	/**
	 * Load all data in a particular table 
	 *@param: $table 			string 		table name (optional)
	 		  $columns 			array 		select columns (optional)
	 		  $result_type 		string 		the type of data to be returned 
	 */
	public function getAllFromTable($table = "", $columns = null, $result_type = ""){
		if(empty($table)) $table = $this->get_table();
		if(!empty($columns)){
			$columns = implode(', ', $columns);
			$this->db->select($columns);
		}
		$products = $this->db->get($table);
		
 		return $this->results($products, $result_type);
	}
}