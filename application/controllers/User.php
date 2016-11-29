<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public $data = array();

	function __construct() {
		parent::__construct();
	}

	public function index(){
		redirect("user/login", "refresh");
	}
	
	public function login()	{
		$message = null;
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		if ( $this->input->post("email") && $this->input->post("password")) {
			$response = $this->User_model->attemptLogin( $email, $password);
			if ( $response == "success" ) {
				redirect("/");
				exit();	
			}else{
				$message = $response;
			}
		}

		$this->data["title"] = ":: Login";
		$this->data["email"] = $email;
		$this->data["message"] = $message;
		$this->load->view("auth/login", $this->data) ;
	}

	public function logout(){
		$this->User_model->logout();
		redirect("user/login", "refresh");
	}
}