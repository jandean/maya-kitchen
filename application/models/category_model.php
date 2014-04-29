<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    var $id     = '';
    var $type   = '';
    var $name   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_entries($type = CATEGORY_RECIPE, $id = null, $limit = null, $offset = null, $order_by = null)
    {
        if (!is_null($order_by))
            $this->db->order_by($order_by);

        if (is_null($id))
            $where = array('type' => $type);
        else
            $where = array('id' => $id);

        $query = $this->db->get_where('category', $where, $limit, $offset);
        return $query;
    }

    function get_count($type = CATEGORY_RECIPE)
    {
        $count = $this->db->where('type', $type)
                ->from('category')
                ->count_all_results();
        return $count;
    }

    function insert_entry()
    {
        $this->name = $this->input->post('category_name');
        $this->db->insert('category', $this);
    }

    function remove_entry()
    {
        $this->id = $this->input->post('id');
        $this->db->delete('category', array('id' => $this->id));
    }

    function update_entry()
    {
        $this->id = $this->input->post('category_id');
        $this->name = $this->input->post('category_name');
        $this->db->update('category', $this, array('id' => $this->id));
    }

}