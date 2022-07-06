<?php
class Hotel extends CI_Controller
{
    public function view($id = NULL){
        $this->load->model("Hotel_Model");
        $data['hotel'] = $this->Hotel_Model->get_hotel_by_id($id);
        if (empty($data['hotel'])) {
            show_404();
        } 
        $this->load->view('templates/header');
        $this->load->view('pages/view', $data);
        $this->load->view('templates/footer');
    }

    public function maps(){
        
    }

    public function myReserves(){

    }
}