<?php

class User_model extends CI_Model{

	public function __construct(){

	}

	public function get_users(){
		$query = $this->db->get('fuel_users');
		return $query->row_array();
	}
}