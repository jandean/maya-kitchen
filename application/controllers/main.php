<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    var $order_by;
    var $common_side;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('recipe_model','article_model','pages_model','carousel_model','category_model'));
        $this->data['feat_recipe']  = $this->recipe_model->get_featured()->row();
        $this->order_by             = 'date_created DESC';
        $this->common_side          = $this->load->view('side', $this->data, true);
    }

    public function index()
    {
        $this->data['classes']      = $this->article_model->get_entries(CONTENT_CLASS, null, null, null, 'start_date')->result();
        $this->data['home_side']    = $this->load->view('homepage_side', $this->data, true);

        $this->data['banner']       = $this->pages_model->get_entries(PAGE_BANNER)->row()->content;
        $this->data['side']         = $this->load->view('side', $this->data, true);
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_ARTICLE, null, 7, null, $this->order_by)->result();
        $this->data['carousel']     = $this->carousel_model->get_entries(null, 5)->result();
        $this->data['page']         = "home";
        $this->load->view('template', $this->data);
    }

    public function classes()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("main/classes/");
        $config['total_rows']   = $this->article_model->get_count(CONTENT_CLASS);
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_CLASS, null, $limit, $offset, 'start_date')->result();
        $this->data['subheader']    = $this->pages_model->get_header_footer(PAGE_SUBHEADER_CLASS);
        $this->data['subfooter']    = $this->pages_model->get_header_footer(PAGE_SUBFOOTER_CLASS);
        $this->data['page']         = "classes";
        $this->load->view('template', $this->data);
    }

    public function recipe($slug)
    {
        if ($slug) :
            $this->data['row']      = $this->recipe_model->get($slug);
            $this->data['contents'] = $this->recipe_model->get_contents($this->data['row']->id);
            $this->data['crumb']    = "recipes";
            $this->data['side']     = $this->common_side;
            $this->data['page']     = "recipe_content";
            $this->load->view('template', $this->data);
        else :
            redirect('home', 'refresh');
        endif;
    }

    public function recipes($category = null)
    {
        $limit  = $this->config->item('per_page');

        $segment2 = $this->uri->segment(2);
        $segment3 = $this->uri->segment(3);
        $segment4 = $this->uri->segment(4);

        if ($segment2 > 0) :
            $category = $segment2;
            $offset = 0;
        elseif ($segment2 == 'recipes') :
            $category = $segment3;
            $offset = $segment4;
        else :
            $category = 0;
            $offset = 0;
        endif;

        $where = array('is_active' => 1);
        if ($category > 0) :
            $where['recipe_category_id'] = $category;
            $this->data['filter'] = $this->category_model->get_entries(null, $category)->row();
        else :
            $this->data['filter'] = null;
        endif;

        $config['base_url']     = base_url("main/recipes/" . $category . "/");
        $config['total_rows']   = $this->recipe_model->get_count($where);
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['categories']   = $this->category_model->get_entries(CATEGORY_RECIPE, null, null, null, 'name');
        $this->data['side_links']   = $this->load->view('side_category', $this->data, true);
        $this->data['side']         = $this->load->view('side', $this->data, true);
        $this->data['recordset']    = $this->recipe_model->get_entries($where, $limit, $offset, $this->order_by)->result();
        $this->data['subheader']    = $this->pages_model->get_header_footer(PAGE_SUBHEADER_RECIPE);
        $this->data['subfooter']    = $this->pages_model->get_header_footer(PAGE_SUBFOOTER_RECIPE);
        $this->data['page']         = "recipes";
        $this->load->view('template', $this->data);
    }

    public function articles()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("main/articles/");
        $config['total_rows']   = $this->article_model->get_count();
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_ARTICLE, null, $limit, $offset, $this->order_by)->result();
        $this->data['subheader']    = $this->pages_model->get_header_footer(PAGE_SUBHEADER_ARTICLE);
        $this->data['subfooter']    = $this->pages_model->get_header_footer(PAGE_SUBFOOTER_ARTICLE);
        $this->data['page']         = "articles";
        $this->load->view('template', $this->data);
    }

    public function content($type, $slug)
    {
        if ($slug) :
            $this->data['row']  = $this->article_model->get($slug);
            $this->data['side'] = $this->common_side;
            $this->data['crumb'] = $type;
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

        $config['base_url']     = base_url("main/kids_corner/");
        $config['total_rows']   = $this->article_model->get_kids_count() + $this->recipe_model->get_kids_count();
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['class_set']    = $this->article_model->get_kids_entries($limit / 2 , $offset / 2, $this->order_by)->result();
        $this->data['recipe_set']   = $this->recipe_model->get_kids_entries($limit / 2 , $offset / 2, $this->order_by)->result();
        $this->data['subheader']    = $this->pages_model->get_header_footer(PAGE_SUBHEADER_KIDS);
        $this->data['subfooter']    = $this->pages_model->get_header_footer(PAGE_SUBFOOTER_KIDS);
        $this->data['page']         = "kids_corner";
        $this->load->view('template', $this->data);
    }

    public function products()
    {
        $limit  = $this->config->item('per_page');
        $offset = $this->uri->segment(3);

        $config['base_url']     = base_url("main/products/");
        $config['total_rows']   = $this->article_model->get_count(CONTENT_PRODUCT);
        $config['per_page']     = $this->config->item('per_page');
        $this->pagination->initialize($config);

        $this->data['links']        = $this->pagination->create_links();
        $this->data['side']         = $this->common_side;
        $this->data['recordset']    = $this->article_model->get_entries(CONTENT_PRODUCT, null, $limit, $offset, $this->order_by)->result();
        $this->data['subheader']    = $this->pages_model->get_header_footer(PAGE_SUBHEADER_PRODUCT);
        $this->data['subfooter']    = $this->pages_model->get_header_footer(PAGE_SUBFOOTER_PRODUCT);
        $this->data['page']         = "products";
        $this->load->view('template', $this->data);
    }

    public function contact_us()
    {
        $this->data['title']    = 'Contact Us';
        $this->data['side']     = $this->common_side;
        $this->data['result']   = $this->pages_model->get_entries()->row();
        $this->data['page']     = "static_page";
        $this->load->view('template', $this->data);
    }

    public function terms_of_use()
    {
        $this->data['title']    = 'Terms of Use';
        $this->data['side']     = $this->common_side;
        $this->data['result']   = $this->pages_model->get_entries(PAGE_TERMS)->row();
        $this->data['page']     = "static_page";
        $this->load->view('template', $this->data);
    }

    public function privacy_policy()
    {
        $this->data['title']    = 'Privacy Policy';
        $this->data['side']     = $this->common_side;
        $this->data['result']   = $this->pages_model->get_entries(PAGE_POLICY)->row();
        $this->data['page']     = "static_page";
        $this->load->view('template', $this->data);
    }
}