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
		$this->load->model('store_model');

	}

	public function index(){
		$data['tables'] =  $this->store_model->get_tables();
		$this->store_model->set_table('customers');
		$data['table'] = $this->store_model->get_table();
		$this->load->view('products/home', $data);
	}

}