<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function set_slug()
    {
        echo url_title($this->input->post('title'), 'dash', TRUE);
    }
}