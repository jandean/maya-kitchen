<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    var $order_by;
    var $common_side;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RecipeModel', 'recipe_model');
        $this->load->model('ArticleModel', 'article_model');
        $this->data['feat_recipe']  = $this->recipe_model->get_featured()->row();
        $this->order_by = 'date_created DESC';
        $this->common_side = $this->load->view('side', null, true);
    }

    public function index()
    {
        $this->data['classes']      = $this->article_model->get_entries(CONTENT_CLASS, null, null, null, $this->order_by)->result();
        $this->data['home_side']    = $this->load->view('homepage_side', $this->data, true);

        $this->data['side']         = $this->load->view('side', $this->data, true);
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_ARTICLE, null, 7, null, $this->order_by)->result();
        $this->data['page']         = "home";
        $this->load->view('template', $this->data);
    }

    public function classes()
    {
        $this->data['side']         = $this->common_side;
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_CLASS, null, null, null, $this->order_by)->result();
        $this->data['page']         = "classes";
        $this->load->view('template', $this->data);
    }

    public function recipes()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("index.php/main/recipes/");
        $config['total_rows']   = $this->recipe_model->get_count();
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['recordset']    = $this->recipe_model->get_entries(null, $limit, $offset, $this->order_by)->result();
        $this->data['page']         = "recipes";
        $this->load->view('template', $this->data);
    }

    public function articles()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("index.php/main/articles/");
        $config['total_rows']   = $this->article_model->get_count();
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_ARTICLE, null, $limit, $offset, $this->order_by)->result();
        $this->data['page']         = "articles";
        $this->load->view('template', $this->data);
    }

    public function contact()
    {
        $this->data['side'] = $this->common_side;
        $this->data['page'] = "contact";
        $this->load->view('template', $this->data);
    }
}