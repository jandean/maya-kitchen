<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) :
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        endif;

        $this->load->model(array('pages_model', 'carousel_model'));
    }

    public function contact()
    {
        $this->form_validation->set_rules('page_type', 'Page Type', 'trim');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');

        $this->data['title']        = "Contact Us";
        $this->data['type']         = "contact";
        $this->data['result']       = $this->pages_model->get_entries()->row();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'pages', 'active' => 'contact'), true);
        $this->data['page']         = "admin/pages-form";

        if ($this->form_validation->run() == true) :
            $this->pages_model->update_entry();
            redirect('pages/contact', 'refresh');
        else :
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('admin/template', $this->data);
        endif;
    }

    public function terms()
    {
        $this->form_validation->set_rules('page_type', 'Page Type', 'trim');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');

        $this->data['title']        = "Terms of Use";
        $this->data['type']         = "terms";
        $this->data['result']       = $this->pages_model->get_entries(PAGE_TERMS)->row();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'pages', 'active' => 'terms'), true);
        $this->data['page']         = "admin/pages-form";

        if ($this->form_validation->run() == true) :
            $this->pages_model->update_entry(PAGE_TERMS);
            redirect('pages/terms', 'refresh');
        else :
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('admin/template', $this->data);
        endif;
    }

    public function policy()
    {
        $this->form_validation->set_rules('page_type', 'Page Type', 'trim');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');

        $this->data['title']        = "Privacy Policy";
        $this->data['type']         = "policy";
        $this->data['result']       = $this->pages_model->get_entries(PAGE_POLICY)->row();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'pages', 'active' => 'policy'), true);
        $this->data['page']         = "admin/pages-form";

        if ($this->form_validation->run() == true) :
            $this->pages_model->update_entry(PAGE_POLICY);
            redirect('pages/policy', 'refresh');
        else :
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('admin/template', $this->data);
        endif;
    }

    public function banner()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(4);

        $config['base_url']     = base_url("index.php/pages/banner/");
        $config['total_rows']   = $this->carousel_model->get_count();
        $config['per_page']     = $this->config->item('per_page');
        $config['uri_segment']  = 4;
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['recordset']    = $this->carousel_model->get_entries()->result();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'features', 'active' => 'banner'), true);
        $this->data['page']         = "admin/banner-main";
        $this->load->view('admin/template', $this->data);
    }

    public function banner_form($id = null)
    {
        if (is_null($id)) : // add
            $this->data['title'] = "Add Image Banner";
        else : // edit
            $this->data['title'] = "Edit  Image Banner";
            $this->data['result'] = $this->carousel_model->get_entries($id)->row();
            $this->carousel_model->id = $this->data['result']->id;
            $this->carousel_model->date_created = $this->data['result']->date_created;
        endif;

        $this->form_validation->set_rules('url', 'URL', 'trim');

        $this->data['sidemenu'] = $this->load->view('admin/sidemenu', array('page' => 'features', 'active' => 'add'), true);
        $this->data['page']     = "admin/banner-form";

        if ($this->form_validation->run() == true) :

            if (is_null($id) || !empty($_FILES['image']['name'])) :
                //$image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $config['upload_path']      = FCPATH . '/images/uploads/';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['overwrite']        = TRUE;
                $config['file_name']        = 'banner-' . str_replace(' ', '-', $_FILES['image']['name']);
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) :
                    $this->data['message'] = $this->upload->display_errors();
                    $this->load->view('admin/template', $this->data);
                    return false;
                endif;

                $this->carousel_model->img = $config['file_name'];
            else:
                $this->carousel_model->img = $this->data['result']->img;
            endif;

            $this->carousel_model->save_banner();

            redirect('pages/banner', 'refresh');
        else :
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('admin/template', $this->data);
        endif;
    }

    public function delete()
    {
        $this->carousel_model->remove_entry();
        $msg = 'Successfully removed data.';
        echo json_encode(array('st' => 1, 'msg' => $msg));
    }

    public function subheader()
    {
        $this->form_validation->set_rules('page_type_' . PAGE_SUBHEADER_CLASS, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBHEADER_CLASS, 'Content', 'trim');
        $this->form_validation->set_rules('page_type_' . PAGE_SUBHEADER_RECIPE, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBHEADER_RECIPE, 'Content', 'trim');
        $this->form_validation->set_rules('page_type_' . PAGE_SUBHEADER_ARTICLE, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBHEADER_ARTICLE, 'Content', 'trim');
        $this->form_validation->set_rules('page_type_' . PAGE_SUBHEADER_PRODUCT, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBHEADER_PRODUCT, 'Content', 'trim');
        $this->form_validation->set_rules('page_type_' . PAGE_SUBHEADER_KIDS, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBHEADER_KIDS, 'Content', 'trim');

        $types = array(PAGE_SUBHEADER_CLASS, PAGE_SUBHEADER_RECIPE, PAGE_SUBHEADER_ARTICLE, PAGE_SUBHEADER_PRODUCT, PAGE_SUBHEADER_KIDS);
        $this->data['title']        = "Sub Header";
        $this->data['type']         = "subheader";
        $this->data['result']       = $this->pages_model->get_entries($types)->result();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'pages', 'active' => 'subheader'), true);
        $this->data['page']         = "admin/subs-form";

        if ($this->form_validation->run() == true) :
            $this->pages_model->update_subs('header');
            redirect('pages/subheader', 'refresh');
        else :
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('admin/template', $this->data);
        endif;
    }

    public function subfooter()
    {
        $this->form_validation->set_rules('page_type_' . PAGE_SUBFOOTER_CLASS, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBFOOTER_CLASS, 'Content', 'trim');
        $this->form_validation->set_rules('page_type_' . PAGE_SUBFOOTER_RECIPE, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBFOOTER_RECIPE, 'Content', 'trim');
        $this->form_validation->set_rules('page_type_' . PAGE_SUBFOOTER_ARTICLE, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBFOOTER_ARTICLE, 'Content', 'trim');
        $this->form_validation->set_rules('page_type_' . PAGE_SUBFOOTER_PRODUCT, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBFOOTER_PRODUCT, 'Content', 'trim');
        $this->form_validation->set_rules('page_type_' . PAGE_SUBFOOTER_KIDS, 'Page Type', 'trim');
        $this->form_validation->set_rules('content_' . PAGE_SUBFOOTER_KIDS, 'Content', 'trim');

        $types = array(PAGE_SUBFOOTER_CLASS, PAGE_SUBFOOTER_RECIPE, PAGE_SUBFOOTER_ARTICLE, PAGE_SUBFOOTER_PRODUCT, PAGE_SUBFOOTER_KIDS);
        $this->data['title']        = "Sub Footer";
        $this->data['type']         = "subfooter";
        $this->data['result']       = $this->pages_model->get_entries($types)->result();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => 'pages', 'active' => 'subfooter'), true);
        $this->data['page']         = "admin/subs-form";

        if ($this->form_validation->run() == true) :
            $this->pages_model->update_subs('footer');
            redirect('pages/subfooter', 'refresh');
        else :
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('admin/template', $this->data);
        endif;
    }
}