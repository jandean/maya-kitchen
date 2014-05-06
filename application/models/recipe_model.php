<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe_model extends CI_Model {

    var $id;
    var $title;
    var $slug;
    var $recipe_category_id;
    var $image;
    var $for_kids;
    var $is_active;
    var $is_featured;
    var $date_created;
    var $date_updated;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get($slug)
    {
        $query = $this->db->get_where('recipe', array('slug' => $slug));
        return $query->row();
    }
    
    function get_entries($condition = null, $limit = null, $offset = null, $order_by = null, $active = 1)
    {
        if (!is_null($condition)) :
            $where = $condition;
        else :
            $where = array('category.type' => CATEGORY_RECIPE);
            if ($active == 1)
                $this->db->where('recipe.is_active', 1);
        endif;
        
        if (!is_null($order_by))
            $this->db->order_by($order_by);

        $query = $this->db->select('recipe.*, category.name')
                ->join('category', 'category.id = recipe.recipe_category_id')
                ->where($where)
                ->get('recipe', $limit, $offset);
        return $query;
    }
    
    function get_kids_entries($limit = null, $offset = null, $order_by = null)
    {
        $where = array('for_kids' => 1, 'is_active' => 1);

        if (!is_null($order_by))
            $this->db->order_by($order_by);

        $query = $this->db->get_where('recipe', $where, $limit, $offset);
        return $query;
    }

    function get_featured()
    {
        $where = array('is_featured' => 1);
        $query = $this->db->get_where('recipe', $where);
        return $query;
    }

    function get_contents($recipe_id)
    {
        $query = $this->db->get_where('recipe_contents', array('recipe_id' => $recipe_id));
        return $query;
    }

    function get_count($condition = null)
    {
        if (!is_null($condition))
            $this->db->where($condition);

        $count = $this->db->count_all('recipe');
        return $count;
    }

    function get_kids_count()
    {
        $count = $this->db->from('recipe')
                ->where(array('for_kids' => 1, 'is_active' => 1))
                ->count_all_results();
        return $count;
    }

    function insert_entry()
    {
        if ($this->input->post('is_featured') == 1) :
            $this->clear_feature();
        endif;

        $this->title                = $this->input->post('title');
        $this->slug                 = $this->input->post('slug');
        $this->recipe_category_id   = $this->input->post('recipe_category_id');
        $this->for_kids             = $this->input->post('for_kids');
        $this->is_active            = $this->input->post('is_active');
        $this->is_featured          = $this->input->post('is_featured');
        $this->date_created         = date('Y-m-d h:i:s');
        $this->date_updated         = date('Y-m-d h:i:s');
        $this->db->insert('recipe', $this);
        $this->insert_contents($this->db->insert_id());
    }

    function clear_feature()
    {
        $this->db->update('recipe', array('is_featured' => 0));
    }

    function insert_contents($recipe_id)
    {
        $contents = array('ingredient', 'procedure', 'yield', 'notes');

        foreach ($contents as $title) {
            $data = array(
                    'recipe_id' => $recipe_id,
                    'title'     => $title,
                    'content'   => $this->input->post($title),
                    'is_active' => 1,
                );
            $this->db->insert('recipe_contents', $data);
        }
    }

    function remove_entry()
    {
        $this->id = $this->input->post('id');
        $this->db->delete('recipe_contents', array('recipe_id' => $this->id));
        $this->db->delete('recipe', array('id' => $this->id));
    }

    function update_entry()
    {
        $this->id                   = $this->input->post('recipe_id');
        $this->title                = $this->input->post('title');
        $this->slug                 = $this->input->post('slug');
        $this->recipe_category_id   = $this->input->post('recipe_category_id');
        $this->for_kids             = $this->input->post('for_kids');
        $this->is_active            = $this->input->post('is_active');
        $this->is_featured          = $this->input->post('is_featured');
        $this->date_updated         = date('Y-m-d h:i:s');

        $this->db->update('recipe', $this, array('id' => $this->id));
        $this->update_contents($this->input->post('recipe_id'));
    }

    function update_contents($recipe_id)
    {
        $contents = array('ingredient', 'procedure', 'yield', 'notes');

        foreach ($contents as $title) {
            $data = array(
                    'content'   => $this->input->post($title),
                    'is_active' => 1,
                );

            $where = array(
                    'recipe_id' => $recipe_id,
                    'title'     => $title,
                );

            $this->db->update('recipe_contents', $data, $where);
        }
    }

}