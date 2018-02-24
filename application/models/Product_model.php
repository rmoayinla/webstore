<?php
/**
 * A simple model for handling the products table 
 *
 * CRUD (create, read, update and delete operations are done on the database)
 *
 */
require_once APPPATH."models/store_model.php";

class Product_model extends Store_Model{

 	

 	public function __construct(){
 		parent::__construct();
		$this->set_table('products');
		$this->set_defaults('relationships', ['product_type_id' => 'products_type']);
 		
 		$config = [];
 		$this->load->library('upload', $config);
 	}

 	public function getAll(){
 		$products = $this->db->get('products');
 		return $products->result_array();
 	}
 }