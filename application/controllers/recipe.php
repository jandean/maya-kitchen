<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) :
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        endif;

        $this->load->model(array('recipe_model','category_model'));
    }

    public function index()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url('index.php/recipe/index/');
        $config['total_rows']   = $this->recipe_model->get_count();
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['title']        = "Recipe Management";
        $this->data['links']        = $this->pagination->create_links();
        $this->data['recordset']    = $this->recipe_model->get_entries(null, $limit, $offset, 'recipe.date_created DESC', 0)->result();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'recipe', 'active' => 'main'), true);
        $this->data['page']         = "admin/recipe-main";
        $this->load->view('admin/template', $this->data);
    }

    public function form($id = null)
    {
        if (is_null($id)) : // add
            $this->data['title'] = "Add Recipe";
            $this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique[recipe.title]');
        else : // edit
            $this->data['title']    = "Edit Recipe";
            $where = array('recipe.id' => $id);
            $this->data['result']   = $this->recipe_model->get_entries($where)->row();
            $this->recipe_model->date_created = $this->data['result']->date_created;

            $contents_data = array();
            $recipe_contents = $this->recipe_model->get_contents($id);
            foreach ($recipe_contents->result() as $contents) {
                if ($contents->is_active == 1)
                    $contents_data[$contents->title] = $contents->content;
            }
            $this->data['contents'] = $contents_data;
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
        endif;

        $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
        $this->form_validation->set_rules('ingredient', 'Ingredient', 'trim|required');
        $this->form_validation->set_rules('procedure', 'Procedure', 'trim|required');
        $this->form_validation->set_rules('yield', 'Yield', 'trim');
        $this->form_validation->set_rules('notes', 'Notes', 'trim');
        $this->form_validation->set_rules('recipe_category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('for_kids', 'For Kids', 'trim');
        $this->form_validation->set_rules('is_active', 'Active', 'trim');
        $this->form_validation->set_rules('is_featured', 'Featured', 'trim');

        $this->data['categories']   = $this->category_model->get_entries()->result();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'recipe', 'active' => 'add'), true);
        $this->data['page']         = "admin/recipe-form";

        if ($this->form_validation->run() == true) :
            if (is_null($id) || !empty($_FILES['image']['name'])) :
                $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $config['upload_path']      = FCPATH . '/images/uploads/';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['overwrite']        = TRUE;
                $config['file_name']        = 'recipe-' . $this->input->post('slug') . '.' . $image_ext;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) :
                    $this->data['message'] = $this->upload->display_errors();
                    $this->load->view('admin/template', $this->data);
                    return false;
                endif;

                $this->recipe_model->image = $config['file_name'];
            else:
                $this->recipe_model->image = $this->data['result']->image;
            endif;

            if (!$this->input->post('recipe_id'))
                $this->recipe_model->insert_entry();
            else
                $this->recipe_model->update_entry();

            redirect('recipe/index', 'refresh');
        else :
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('admin/template', $this->data);
        endif;
    }

    public function delete_recipe()
    {
        $this->recipe_model->remove_entry();
        $msg = 'Successfully removed data.';
        echo json_encode(array('st' => 1, 'msg' => $msg));
    }
}