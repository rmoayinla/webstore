<?php

class Product extends CI_Controller {

	/**
	 * Constructor for this controller
	 *
	 * called when this controller is instantiated 
	 * calls the base controller constructor and load helpers
	 */
	public function __construct(){
		parent::__construct();
		$data['config'] = !empty($this->config) ? $this->config : [];
		$data['session'] = $this->session->userdata();
		
		//the $data will be available in all view templates //
		$this->load->vars($data);

		//load models //
		$this->load->model(['product_model', 'store_model']);

 		//load helpers //
 		$this->load->helper(['date', 'htmlpurifier']);

	}

	public function index(){
		$data = array();
		$this->store_model->set_table('products');
		$data['store'] = $this->store_model->get_table();
		$data['products'] = $this->store_model->getAllFromTable('', 
			['ID', 'product_type', 'title', 'slug', 'created_date', 'description', 'product_type_id'], 'obj');
		$this->load->view('products/home', $data);
	}

	public function create($product){
		$data['product_type'] = preg_replace('/s$/i', '', $product);
		$this->load->view('products/create', $data);
	}

	public function getAllFromProductType($type){
		$data = array();
		$data['products'] = $this->product_model->getAll();
		$this->load->view('products/home', $data);
	}
	

}