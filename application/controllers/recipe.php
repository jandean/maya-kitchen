<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) :
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        endif;

        $this->data['side'] = "admin/recipe-sidemenu";
        $this->load->model('RecipeCategoryModel', 'category_model');
    }

    public function index()
    {
        $this->data['title'] = "Recipe Management";
        $this->data['page'] = "admin/recipe-main";
        $this->load->view('admin/template', $this->data);
    }

    public function add()
    {
        $this->data['title'] = "Add New Recipe";
        $this->data['page'] = "admin/recipe-form";
        $this->load->view('admin/template', $this->data);
    }

    public function category()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url('index.php/recipe/category/');
        $config['total_rows']   = $this->category_model->get_count();

        $this->pagination->initialize($config);

        $this->data['title']            = "Recipe Category Management";
        $this->data['links']            = $this->pagination->create_links();
        $this->data['recordset']        = $this->category_model->get_entries($limit, $offset);
        $this->data['page']             = "admin/category-main";
        $this->data['category_form']    = $this->load->view('admin/category-form', null, true);
        $this->load->view('admin/template', $this->data);
    }

    public function save_category()
    {
        if (!$this->input->post('category_id'))
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[recipe_category.name]');
        else
            $this->form_validation->set_rules('category_name', 'Category Name', 'required');

        if ($this->form_validation->run() == true) :
            if (!$this->input->post('category_id'))
                $this->category_model->insert_entry();
            else
                $this->category_model->update_entry();

            $msg = 'Successfully saved.';
            echo json_encode(array('st' => 1, 'msg' => $msg));
        else :
            //set the flash data error message if there is one
            $msg =  (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            echo json_encode(array('st' => 0, 'msg' => $msg));
        endif;
    }

    public function delete_category()
    {
        $this->category_model->remove_entry();
        $msg = 'Successfully removed data.';
        echo json_encode(array('st' => 1, 'msg' => $msg));
    }
}