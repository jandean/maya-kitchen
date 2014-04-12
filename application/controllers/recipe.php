<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) :
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        endif;

        $this->load->model('RecipeModel', 'recipe_model');
        $this->load->model('RecipeCategoryModel', 'category_model');
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
        $this->data['recordset']    = $this->recipe_model->get_entries(null, $limit, $offset)->result();
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
            $this->data['result']   = $this->recipe_model->get_entries($id)->row();

            $recipe_contents = $this->recipe_model->get_contents($id);
            foreach ($recipe_contents->result() as $contents) {
                if ($contents->is_active == 1)
                    $data[$contents->title] = $contents->content;
            }
            $this->data['contents'] = $data;
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
        endif;

        $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
        $this->form_validation->set_rules('ingredient', 'Ingredient', 'trim|required');
        $this->form_validation->set_rules('procedure', 'Procedure', 'trim|required');
        $this->form_validation->set_rules('yield', 'Yield', 'trim');
        $this->form_validation->set_rules('notes', 'Notes', 'trim');
        $this->form_validation->set_rules('recipe_category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('is_active', 'Active', 'trim');
        $this->form_validation->set_rules('is_featured', 'Featured', 'trim');

        if (empty($_FILES['image']['name']))
            $this->form_validation->set_rules('image', 'Image', 'required');

        $this->data['categories']   = $this->category_model->get_entries();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'recipe', 'active' => 'add'), true);
        $this->data['page']         = "admin/recipe-form";

        if ($this->form_validation->run() == true) :

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

    public function category()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url('index.php/recipe/category/');
        $config['total_rows']   = $this->category_model->get_count();

        $this->pagination->initialize($config);

        $this->data['title']        = "Recipe Category Management";
        $this->data['links']        = $this->pagination->create_links();
        $this->data['recordset']    = $this->category_model->get_entries($limit, $offset);
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'recipe', 'active' => 'category'), true);
        $this->data['page']         = "admin/category-main";
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