<?php
 class Product_model extends CI_Model{

 	public function __construct(){
 		
 	}
 	public function getAll(){
 		$products = $this->db->get('products');
 		return $products->result_array();
 	}
 }