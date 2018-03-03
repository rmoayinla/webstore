<?php

class Product extends CI_Controller {

	private $form_error = null;

	private $upload_error = null;
	
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

 		$this->load->library('facebook');

	}

	/**
	 * Show the index page for this controller route
	 *
	 * this method displays the content of the homepage for this controller 
	 */
	public function index(){
		$data = array();
		
		$data['store'] = $this->product_model->get_table();
		//populate the product with a query from the database //
		$data['products'] = $this
							->product_model
							->getAllFromTable(['ID', 'product_type_name', 'title', 'slug', 'created_date', 'description', 
								'product_type_id', 'thumbnail'])
							->populate('product_type_id')
							->get_results();

		$this->load->view('products/home', $data);
	}

	/**
	 * Create a basic form to inserting data for this product 
	 *
	 */
	public function create($product){
		if(!empty($_POST)){
			$data['message'] = $this->upload();	
			if(empty($this->form_error))
				$data['created'] = true;			
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

			$this->form_error = true;
			return validation_errors();
		} 
			
		$data = $this->input->post(array('title', 'description', 'product_type_id', 'product_type_name'), true);

		$data['slug'] = strtolower($this->input->post('product_type_slug', true)."/".url_title($data['title']));
		
		$config = array();
		$config['upload_path'] = VIEWPATH.'uploads/';
		$config['allowed_types']  = 'gif|jpg|png|jpeg';
		$config['max_size']       = 100;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('thumbnail'))
		{
		    $this->form_error = true;
		    return sprintf('Upload error. error: %s', $this->upload->display_errors());

		}
		
		$this->form_error = false;        
		$upload_data = $this->upload->data();

		$data['thumbnail'] = $upload_data["full_path"];
		               

		if($this->product_model->get_db()->insert('products', $data))
		{
			$this->form_error = false; 
			$product_ID = $this->product_model->get_db()->insert_id();
			$meta_data = array('product_id' => $product_ID, 'meta_key' => 'book_meta', 'meta_value' => array('author' => 'Rabiu Mustapha', 'ISBN' => '1015020180219'));
			try{
				return $this->product_model->add_meta($meta_data);
				return sprintf('inserted!!!. Check out the ID %s', $product_ID);
			}catch(Exception $e){
				throw new Exception(sprintf('Data inserted but meta data error. error: %s', $e->getMessage()));
			}
			
		}

		$this->form_b->rror = true;
		return sprintf('insert failed. error: %s', $this->product_model->get_db()->error() );

		
	}


	

}