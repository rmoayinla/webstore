<?php
/**
 *
 * Custom procedurial functions that extends main CI url helper 
 *
 * All functions here are to generate url nothing more 
 *@author: Rabiu Mustapha
 *@package: Webstore
 *
 */

$GLOBALS["ci"] =&get_instance();
$GLOBALS["ci"]->load->database(); 

function ws_full_url($product){
	if(!empty($product["slug"])) return base_url($product["slug"]);
}

function ws_archive_url($product){
	$ci = $GLOBALS["ci"];

	if(empty($product["product_type_id"])) return base_url();
	$type_id = $product["product_type_id"];
	$sql = 'SELECT * FROM ws_products_type WHERE ID = ?';
	$product_type = $ci->db->query($sql, $type_id);
	$result = $product_type->result_array();
	if(!empty($result)){
		return base_url($result[0]["slug"]);
	}
}

//date("d/m/Y",strtotime($date));//