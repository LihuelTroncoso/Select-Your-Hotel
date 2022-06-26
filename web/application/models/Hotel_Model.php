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

    public function get_id_hotel($slug){
        $query = $this->db->query('SELECT idHotel FROM hotel WHERE slug = '$slug'');
        return $query->row_array();
    }

    public function book($slug){
        $data = array(
            $hotel_idHotel = get_id_hotel($slug),
            $users_id = $this->session->userdata('user_id'),
            $dateStart = $this->input->post('arrival'),
            $dateEnd = $this->input->post('departure')
        );

        return $this->db->insert('hotel', $data);
    }
}