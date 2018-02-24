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
		$this->load->model(['product_model', 'store_model', 'product_type_model']);

 		//load helpers //
 		$this->load->helper(['date', 'htmlpurifier']);

	}

	public function index(){
		$data = array();
		
		$data['store'] = $this->product_model->get_table();
		$data['products'] = $this
							->product_model
							->getAllFromTable(['ID', 'product_type', 'title', 'slug', 'created_date', 'description', 'product_type_id'])
							->populate('product_type_id')
							->get_results();

		$this->load->view('products/home', $data);
	}

	public function create($product){
		if(!empty($_POST)){
			$data['message'] = $this->upload();			
		}
		$product_type_slug = $this->product_type_model->getSlug();
		$data['product_type'] = $this->product_type_model->get(array('slug' => $product_type_slug));

		$this->load->view('products/create', $data);
	}

	private function upload(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		
		if(!$this->form_validation->run()){
			return validation_errors();
		} else{
			
			$data = $this->input->post(array('title', 'description', 'product_type_id', 'product_type_name'), true);
			$data['slug'] = url_title($data['title']);
			

			if($this->product_model->get_db()->insert('products', $data))
				return "inserted!!!";

			return "insert faled";

		}
	}

	public function getAllFromProductType($type){
		
	}
	

}