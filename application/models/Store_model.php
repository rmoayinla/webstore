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

require_once APPPATH."third_party/traits/Db_table.php";
require_once APPPATH."third_party/traits/Db_query.php";

class Store_model extends CI_Model{

	use Db_Table, Db_query;
	
	private $table = "";

	private $tables  = null;

	private $database = "";

	private $result_type = "";

	private $relationships = array();

	private $validation = array();

	/**
	 * stores results of queries run on the db
	 *
	 *@var: array||object 
	 */
	private $results = null;

	public function __construct(){
		$this->set_defaults();
	}

	/**
	 * Set default values for our properties 
	 *
	 * default database, result type, table are set 
	 * @return: $this 	(object)	instance of this class 
	 */
	public function set_defaults($prop = '', $value = ''){
		
		//if a property is passed, set the value //
		if(!empty($prop) && property_exists($this, $prop)){
			$this->{$prop} = $value;
			return $this;
		}

		$this->database = 'webstore';
		$this->result_type = 'array';
		return $this;
	}

	public function get_defaults($prop){
		if(property_exists($this, $prop))
			return $this->{$prop};
	}

	
}