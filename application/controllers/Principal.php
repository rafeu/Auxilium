<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$this->load->view('index_view.php');
	}
	
	
	public function index_sobre(){
		$this->load->view('sobre_view.php');
	}

}

?>