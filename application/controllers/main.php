<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $this->load->model('RecipeModel', 'recipe_model');
        $this->load->model('ArticleModel', 'article_model');
		$this->data['classes']    	= $this->article_model->get_entries(CONTENT_CLASS, null, null, null, 'date_created DESC')->result();
		$this->data['home_side']	= $this->load->view('homepage_side', $this->data, true);
		$this->data['feat_recipe']  = $this->recipe_model->get_featured()->row();
		$this->data['side']			= $this->load->view('side', $this->data, true);
		
		$this->data['recordset']    = $this->article_model->get_entries(CONTENT_ARTICLE, null, 7, null, 'date_created DESC')->result();
		$this->data['page'] 		= "home";
		$this->load->view('template', $this->data);
	}
}