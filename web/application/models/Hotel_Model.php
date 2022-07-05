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

    public function get_hotel_by_id($id){
        $query = $this->db->query('SELECT * FROM hotel WHERE idHotel = '.$id);
        return $query->row_array();
    }

    public function get_hotels_by_reserve($reserve){
        $query = $this->db->get_where('hotel', array('idHotel' => $reserve['hotel_idHotel']));
        return $query->result_array();
    }

}