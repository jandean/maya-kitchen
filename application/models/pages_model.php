<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    var $type           = '';
    var $content        = '';
    var $date_updated   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_entries($type = PAGE_CONTACT)
    {
        $query = $this->db->get_where('static_pages', array('type' => $type));
        return $query->row();
    }

    function update_entry()
    {
        $this->type     = $this->input->post('page_type');
        $this->content  = $this->input->post('content');
        $this->date_updated  = date("Y-m-d h:i:s");
        $this->db->update('static_pages', $this, array('type' => $this->type));
    }

}