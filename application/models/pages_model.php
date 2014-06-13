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
        if (is_array($type))
            $this->db->where_in('type', $type);
        else
            $this->db->where('type', $type);

        $query = $this->db->get('static_pages');
        return $query;
    }
    
    function get_header_footer($type)
    {
        $this->db->select('content');
        $this->db->where_in('type', $type);
        $query = $this->db->get('static_pages');
        return $query->row();
    }

    function update_entry()
    {
        $this->type     = $this->input->post('page_type');
        $this->content  = $this->input->post('content');
        $this->date_updated  = date("Y-m-d h:i:s");
        $this->db->update('static_pages', $this, array('type' => $this->type));
    }

    function update_subs($type)
    {
        $start = PAGE_SUBHEADER_CLASS;
        $until = PAGE_SUBHEADER_KIDS;
        if ($type == 'footer') :
            $start = PAGE_SUBFOOTER_CLASS;
            $until = PAGE_SUBFOOTER_KIDS;
        endif;

        for ($i=$start; $i <= $until; $i++) :
            $this->type     = $this->input->post('page_type_' . $i);
            $this->content  = $this->input->post('content_' . $i);
            $this->date_updated  = date("Y-m-d h:i:s");
            $this->db->update('static_pages', $this, array('type' => $this->type));
        endfor;
    }

}