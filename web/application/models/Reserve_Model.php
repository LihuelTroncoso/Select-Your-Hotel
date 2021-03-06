<?php
class Reserve_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert_reserve($hotelId = NULL){
        $data = array(
            'dateStart' => $this->input->post('arrival'),
            'dateEnd' => $this->input->post('departure'),
            'users_id' => $this->session->userdata('user_id'),
            'hotel_idHotel' => $hotelId
        );
        return $this->db->insert('reserva', $data);
    }

}