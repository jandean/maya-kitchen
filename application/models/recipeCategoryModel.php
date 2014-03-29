<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RecipeCategoryModel extends CI_Model {

    var $id     = '';
    var $name   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_entries($limit = null, $offset = null)
    {
        $query = $this->db->get('recipe_category', $limit, $offset);
        return $query->result();
    }

    function get_count()
    {
        $count = $this->db->count_all('recipe_category');
        return $count;
    }

    function insert_entry()
    {
        $this->name = $this->input->post('category_name');
        $this->db->insert('recipe_category', $this);
    }

    function remove_entry()
    {
        $this->id = $this->input->post('catid');
        $this->db->delete('recipe_category', array('id' => $this->id));
    }

    function update_entry()
    {
        $this->id = $this->input->post('category_id');
        $this->name = $this->input->post('category_name');
        $this->db->update('recipe_category', $this, array('id' => $this->id));
    }

}