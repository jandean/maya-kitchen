<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) :
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		elseif (!$this->ion_auth->is_admin()) : //remove this elseif if you want to enable this for non-admins
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		else :
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['page'] = "auth/index";
			$this->load->view('template', $this->data);
		endif;
	}

}