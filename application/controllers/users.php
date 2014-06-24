<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) :
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        endif;

        $this->load->model('user_model');
        $this->data['sidemenu'] = $this->load->view('admin/sidemenu', array('page' => 'user', 'active' => 'main'), true);
    }

    public function index()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url('users/index/');
        $config['total_rows']   = $this->user_model->get_count();
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['title']        = "User Management";
        $this->data['links']        = $this->pagination->create_links();
        $this->data['recordset']    = $this->user_model->get_entries($limit, $offset);
        $this->data['page']         = "admin/user-main";
        $this->load->view('admin/template', $this->data);
    }
}