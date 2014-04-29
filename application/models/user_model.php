<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    var $id         = '';
    var $username   = '';
    var $email      = '';
    var $first_name = '';
    var $last_name  = '';
    var $status     = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_entries($limit = null, $offset = null)
    {
        $query = $this->db->get('users', $limit, $offset);
        return $query->result();
    }

    function get_count()
    {
        $count = $this->db->count_all('category');
        return $count;
    }
}