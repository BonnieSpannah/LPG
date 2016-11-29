<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->User_model->is_logged_in() ) {
			redirect("user/login");
			exit();
		}
	}	

	public function index()	{
		$this->load->view("template/template"); 
	}
}