<?php
//disable direct access to the file via the browser //
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Controller class that handles the default route 
 *
 * this welcome controller is shipped with CI
 *
 */
class Welcome extends CI_Controller {

	/**
	 * Constructor for this controller
	 *
	 * called when this controller is instantiated 
	 * calls the base controller constructor and load helpers
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['content'] = 'Lets test if this will work'; 
		$data['title'] = 'home';
		$this->load->view('home', $data);
	}

	public function view($page)
	{
		if( !file_exists(VIEWPATH.$page.'.php')){
			show_404();
		}
		
		$data['title'] = ucwords($page); 
		$this->load->view($page, $data);
		

	}
}
