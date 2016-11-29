<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends CI_Controller {
	public function index()	{
		$this->data["title"] = ":: Transactions";
		$this->data["page"] = "admin/test";
		$this->load->view("admin/template", $this->data);
	}

	public function another(){
			$this->data["page"] = "admin/home";
			$this->data["title"] = ":: All Depots";
			$this->load->view("admin/template", $this->data);
	}
}