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

		//load the user model //
		$this->load->model('product_model');

 		$this->load->helper('date');

	}

	public function index(){
		$data = array();
		$data['products'] = $this->product_model->getAll();
		$this->load->view('products/home', $data);
	}

	public function create($product){
		$data['product_type'] = preg_replace('/s$/i', '', $product);
		$this->load->view('products/create', $data);
	}

}