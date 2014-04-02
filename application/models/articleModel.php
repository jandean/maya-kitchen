<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleModel extends CI_Model {

    var $id             = '';
    var $title          = '';
    var $slug           = '';
    var $content        = '';
    var $image          = '';
    var $is_active      = '';
    var $is_featured    = '';
    var $date_created   = '';
    var $date_updated   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_entries($id = null, $limit = null, $offset = null)
    {
        if (is_null($id))
            $query = $this->db->get_where('article', null, $limit, $offset);
        else
            $query = $this->db->get_where('article', array('id' => $id), $limit, $offset);

        return $query;
    }

    function get_count()
    {
        $count = $this->db->count_all('article');
        return $count;
    }

    function insert_entry()
    {
        $this->title        = $this->input->post('title');
        $this->slug         = $this->input->post('slug');
        $this->content      = $this->input->post('content');
        $this->is_active    = $this->input->post('is_active');
        $this->is_featured  = $this->input->post('is_featured');
        $this->date_created = date('Y-m-d h:i:s');
        $this->db->insert('article', $this);
    }

    function remove_entry()
    {
        $this->id = $this->input->post('id');
        $this->db->delete('article', array('id' => $this->id));
    }

    function update_entry()
    {
        $this->id           = $this->input->post('article_id');
        $this->title        = $this->input->post('title');
        $this->slug         = $this->input->post('slug');
        $this->content      = $this->input->post('content');
        $this->is_active    = $this->input->post('is_active');
        $this->is_featured  = $this->input->post('is_featured');
        $this->is_featured  = $this->input->post('is_featured');
        $this->date_updated = date('Y-m-d h:i:s');
        $this->db->update('article', $this, array('id' => $this->id));
    }

}