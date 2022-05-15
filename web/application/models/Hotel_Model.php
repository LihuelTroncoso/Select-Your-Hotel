<?php
class Hotel_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_hotels(){
        
        $query = $this->db->get('hotel');
        return $query->result_array();
        
    }
}