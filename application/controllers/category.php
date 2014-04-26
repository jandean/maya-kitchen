<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) :
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        endif;

        $this->load->model('categoryModel', 'category_model');
    }

    public function index($content_type = CATEGORY_RECIPE_STR)
    {
        $type   = $this->getContentTypeId($content_type);
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url('index.php/category/index/');
        $config['total_rows']   = $this->category_model->get_count($type);
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['type']         = $type;
        $this->data['content_type'] = $content_type;
        $this->data['category_form']= $this->load->view('admin/category-form', $this->data, true);
        $this->data['title']        = ucfirst($content_type) . " Category Management";
        $this->data['links']        = $this->pagination->create_links();
        $this->data['recordset']    = $this->category_model->get_entries($type, null, $limit, $offset)->result();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => $content_type, 'active' => 'category'), true);
        $this->data['page']         = "admin/category-main";
        $this->load->view('admin/template', $this->data);
    }

    private function getContentTypeId($content_type)
    {
        switch ($content_type) {
            case 'class':
                return CATEGORY_CLASS;
                break;

            default:
                return CATEGORY_RECIPE;
                break;
        }
    }

    public function save()
    {
        $this->category_model->type = $this->input->post('category_type');

        if (!$this->input->post('category_id'))
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[category.name]');
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

    public function delete()
    {
        $this->category_model->remove_entry();
        $msg = 'Successfully removed data.';
        echo json_encode(array('st' => 1, 'msg' => $msg));
    }
}