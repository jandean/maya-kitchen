<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) :
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		endif;
	}

	public function index()
	{
		$data['page'] = "admin/index";
		$this->load->view('admin/template', $data);
	}
}