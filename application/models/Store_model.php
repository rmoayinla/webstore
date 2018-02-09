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

	public function __construct(){
		
	}

	/**
	 * Set the active table 
	 *
	 * All database operations will only be performed on the active table 
	 */
	public function set_table($table){
		if(empty($this->tables)){
			throw new Exception('table has not been fetched yet');
		}
		//prefix the passed table //
		$table = strtolower('ws_'.$table);

		if(!in_array($table, $this->tables)){
			throw new Exception('table does not exist in database'); 
		}

		$this->table = $table;

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
		$sql = 'SHOW tables from webstore';

		$tables_query = $this->db->query($sql);
		$tables = array();
		
		//bail early if we have empty tables//
		if(empty($tables_query->result_array())){
			return $tables;
		}

		$tables = array_column($tables_query->result_array(), 'Tables_in_webstore');
		$this->tables = $tables;
		$tables = array_map(function($name){
			return str_ireplace(array('ws_', '_'), array('', ' '), $name);
		}, $this->tables);
		
		return $tables;
	}
}