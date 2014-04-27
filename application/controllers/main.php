<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    var $order_by;
    var $common_side;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RecipeModel', 'recipe_model');
        $this->load->model('ArticleModel', 'article_model');
        $this->load->model('pagesModel', 'pages_model');
        $this->data['feat_recipe']  = $this->recipe_model->get_featured()->row();
        $this->order_by = 'date_created DESC';
        $this->common_side = $this->load->view('side', null, true);
    }

    public function index()
    {
        $this->data['classes']      = $this->article_model->get_entries(CONTENT_CLASS, null, null, null, $this->order_by)->result();
        $this->data['home_side']    = $this->load->view('homepage_side', $this->data, true);

        $this->data['banner']       = $this->pages_model->get_entries(PAGE_BANNER)->content;
        $this->data['side']         = $this->load->view('side', $this->data, true);
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_ARTICLE, null, 7, null, $this->order_by)->result();
        $this->data['page']         = "home";
        $this->load->view('template', $this->data);
    }

    public function classes()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("index.php/main/classes/");
        $config['total_rows']   = $this->article_model->get_count(CONTENT_CLASS);
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_CLASS, null, $limit, $offset, $this->order_by)->result();
        $this->data['page']         = "classes";
        $this->load->view('template', $this->data);
    }

    public function recipe($slug)
    {
        if ($slug) :
            $this->data['row']      = $this->recipe_model->get($slug);
            $this->data['contents'] = $this->recipe_model->get_contents($this->data['row']->id);
            $this->data['side']     = $this->common_side;
            $this->data['page']     = "recipe_content";
            $this->load->view('template', $this->data);
        else :
            redirect('home', 'refresh');
        endif;
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

    public function content($slug)
    {
        if ($slug) :
            $this->data['row']  = $this->article_model->get($slug);
            $this->data['side'] = $this->common_side;
            $this->data['page'] = "content";
            $this->load->view('template', $this->data);
        else :
            redirect('home', 'refresh');
        endif;
    }

    public function kids_corner()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("index.php/main/kids_corner/");
        $config['total_rows']   = $this->article_model->get_count(CONTENT_CLASS, 1, CLASS_KIDS) + $this->recipe_model->get_count(1, RECIPE_KIDS);
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['class_set']    = $this->article_model->get_entries(CONTENT_CLASS, null, $limit / 2 , $offset / 2, $this->order_by)->result();
        $this->data['recipe_set']   = $this->recipe_model->get_entries(null, $limit / 2 , $offset / 2, $this->order_by)->result();
        $this->data['page']         = "kids_corner";
        $this->load->view('template', $this->data);
    }

    public function products()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("index.php/main/products/");
        $config['total_rows']   = $this->article_model->get_count(CONTENT_PRODUCT);
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_PRODUCT, null, $limit, $offset, $this->order_by)->result();
        $this->data['page']         = "products";
        $this->load->view('template', $this->data);
    }

    public function contact_us()
    {
        $this->data['title']    = 'Contact Us';
        $this->data['side']     = $this->common_side;
        $this->data['result']   = $this->pages_model->get_entries();
        $this->data['page']     = "static_page";
        $this->load->view('template', $this->data);
    }

    public function terms_of_use()
    {
        $this->data['title']    = 'Terms of Use';
        $this->data['side']     = $this->common_side;
        $this->data['result']   = $this->pages_model->get_entries(PAGE_TERMS);
        $this->data['page']     = "static_page";
        $this->load->view('template', $this->data);
    }

    public function privacy_policy()
    {
        $this->data['title']    = 'Privacy Policy';
        $this->data['side']     = $this->common_side;
        $this->data['result']   = $this->pages_model->get_entries(PAGE_POLICY);
        $this->data['page']     = "static_page";
        $this->load->view('template', $this->data);
    }
}