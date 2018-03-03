<?php
/**
 * Database table trait for store model 
 *
 * This class handles all the database table settings for store model
 * setting of the active table, swapping tables and getting all database tables 
 *
 */

trait Db_Table{

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
		
		try{
			$this->validate_table($table);
			$this->table = str_replace(' ', '_', $table);
			return $this;

		} catch(Exception $e){
			throw new Exception ($e->getMessage());
		}
		
	}

	/**
	 * Returns the active table 
	 */
	public function get_table(){
		return !empty($this->table) ? $this->table  : $this->get_defaults('table');
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

	private function validate_table($table){
		$table = strtolower($table);

		//throw exception if the table does not exist in the database
		if(!in_array($table, $this->tables)){
			throw new Exception('table does not exist in database'); 
		}
	}
}