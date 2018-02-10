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

/**
 * 
 * Url helper function that generate archive links dynamically from the db for products
 *
 *@since: 0.1
 *@return: string 	html formatted link 
 *@param: 	$product 		(array)		array containing product info 
			$attributes 	(array) 	array of attributes for the generated html a tag 
 *
 */
function ws_archive_url($product, $attributes = array()){
	$ci = $GLOBALS["ci"];
	//bail early if we dont have a product type id //
	if(empty($product["product_type_id"])) return base_url();

	$type_id = $product["product_type_id"];
	$sql = 'SELECT * FROM ws_products_type WHERE ID = ?';
	$product_type = $ci->db->query($sql, $type_id);
	$result = $product_type->result_array();
	if(!empty($result)){
		$text =sprintf('All %ss', ucwords($result[0]["name"]) );
		return anchor(base_url($result[0]["slug"]), $text, $attributes);
	}
}

//date("d/m/Y",strtotime($date));//