<?php
class Hotel_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_hotels($slug = false){
        
        if($slug === false){
            $query = $this->db->get('hotel');
            return $query->result_array();
        }

        $query = $this->db->get_where('hotel', array('slug' => $slug));
        return $query->row_array();
    }
}