<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) :
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        endif;

        $this->load->model('ArticleModel', 'article_model');
    }

    public function index($content_type = CONTENT_CLASS_STR)
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("index.php/article/index/{$content_type}/");
        $config['total_rows']   = $this->article_model->get_count();

        $this->pagination->initialize($config);
        $type = $this->getContentTypeId($content_type);

        $this->data['content_type'] = $content_type;
        $this->data['title']        = ucfirst($content_type) . " Management";
        $this->data['links']        = $this->pagination->create_links();
        $this->data['recordset']    = $this->article_model->get_entries($type, null, $limit, $offset)->result();
        $this->data['sidemenu']     = $this->load->view('admin/sidemenu', array('page' => $content_type, 'active' => 'main'), true);
        $this->data['page']         = "admin/article-main";
        $this->load->view('admin/template', $this->data);
    }

    private function getContentTypeId($content_type)
    {
        switch ($content_type) {
            case 'article':
                return CONTENT_ARTICLE;
                break;

            case 'product':
                return CONTENT_PRODUCT;
                break;
            
            default:
                return CONTENT_CLASS;
                break;
        }
    }

    public function form($content_type = CONTENT_CLASS_STR, $id = null)
    {
        $type = $this->getContentTypeId($content_type);

        if (is_null($id)) : // add
            $this->data['title'] = "Add " . ucfirst($content_type);
            $this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique[article.title]');
        else : // edit
            $this->data['title'] = "Edit " . ucfirst($content_type);
            $this->data['result'] = $this->article_model->get_entries($type, $id)->row();
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
        endif;

        $this->form_validation->set_rules('article_id', 'ID', 'trim');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        $this->form_validation->set_rules('is_active', 'Active', 'trim');
        $this->form_validation->set_rules('is_featured', 'Featured', 'trim');

        $this->data['content_type'] = $content_type;
        $this->data['sidemenu'] = $this->load->view('admin/sidemenu', array('page' => $content_type, 'active' => 'add'), true);
        $this->data['page']     = "admin/article-form";

        if ($this->form_validation->run() == true) :

            if (is_null($id) || !empty($_FILES['image']['name'])) :
                $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $config['upload_path']      = FCPATH . '/images/uploads/';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['overwrite']        = TRUE;
                $config['file_name']        = $content_type . '-' . $this->input->post('slug') . '.' . $image_ext;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) :
                    $this->data['message'] = $this->upload->display_errors();
                    $this->load->view('admin/template', $this->data);
                    return false;
                endif;

                $this->article_model->image = $config['file_name'];
            else:
                $this->article_model->image = $this->data['result']->image;
            endif;

            if (!$this->input->post('article_id'))
                $this->article_model->insert_entry($type);
            else
                $this->article_model->update_entry($type);

            redirect('article/index/' . $content_type, 'refresh');
        else :
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('admin/template', $this->data);
        endif;
    }

    public function delete()
    {
        $this->article_model->remove_entry();
        $msg = 'Successfully removed data.';
        echo json_encode(array('st' => 1, 'msg' => $msg));
    }
}