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

    public function get_hotels_by_reserve(){
        $this->db->select('*');
        $this->db->from('hotel'); 
        $this->db->join('reserva', 'reserva.hotel_idHotel = hotel.idHotel');
        $this->db->join('users', 'reserva.users_id = users.id');
        $this->db->where('users.id', $this->session->userdata('user_id'));
        $this->db->order_by('reserva.dateStart','asc');       
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
        return $query->result_array();
    }

}