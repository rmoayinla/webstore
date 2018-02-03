<?php
/**
 * User model for CI
 *
 * Reads, inserts and update user info in the db
 * user table is users
 *this model handles the CRUD operation on Users table in Webstore database 
 *@package: webstore
 *@author: Rabiu Mustapha
 *@subpackage: Code Igniter
 *@category: Models
 *
 */

class User_model extends CI_Model{

	public function __construct(){

	}

	public function get_users(){
		$query = $this->db->get('users');
		return $query->row_array();
	}

	public function insert_user($data){

	}
}