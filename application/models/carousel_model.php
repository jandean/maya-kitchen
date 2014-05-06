<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel_model extends CI_Model {

    var $id;
    var $img;
    var $url;
    var $date_created = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_entries($id = null, $limit = null)
    {
        if (!is_null($id))
            $this->db->where('id', $id);

        if (!is_null($id))
            $this->db->limit($limit);

        $query = $this->db->order_by('date_created DESC')
            ->get('carousel');
        return $query;
    }

    function get_count()
    {
        $count = $this->db->count_all();
        return $count;
    }

    function save_banner()
    {
        $this->url = $this->input->post('url');
        $this->date_created = date("Y-m-d h:i:s");
        if ($this->id)
        $this->db->update('carousel', $this, array('id' => $this->id));
        else
        $this->db->insert('carousel', $this);
    }

    function remove_entry()
    {
        $this->id = $this->input->post('id');
        $this->db->delete('carousel', array('id' => $this->id));
    }

}