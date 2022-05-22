<?php
class Hotel extends CI_Controller
{
    public function view($slug = NULL){
        $this->load->model("Hotel_Model");
        $data['hotel'] = $this->Hotel_Model->get_hotels($slug);
        if (empty($data['hotel'])) {
            show_404();
        } 
        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

}