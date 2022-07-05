<?php 
    class Reserva extends CI_Controller
    {
        public function index($id = NULL)
        {
            $this->load->model('Reserve_Model');
            $this->load->model('Hotel_Model');
            $data['hotel'] = $this->Hotel_Model->get_hotel_by_id($id);
            if (empty($data['hotel'])) {
                show_404();
            } 
            
            if(!$this->session->userdata('login')) {
                redirect('users/login');
            }

            $this->form_validation->set_rules('arrival', 'Fecha de llegada requerida', 'required');
			$this->form_validation->set_rules('departure', 'Fecha de salida requerida', 'required');
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('pages/reserva', $data);
				$this->load->view('templates/footer');
            }else{
                if($this->Reserve_Model->insert_reserve($id)){
                    redirect('');
                }else{
                    show_404();
                }
            }

        }
        
        public function myReserves(){
            $this->load->model('Reserve_Model');
            $this->load->model('Hotel_Model');

            $data['reserves'] = $this->Reserve_Model->get_reserves();
            $data['hotels'] = $this->Hotel_Model->get_hotels_by_reserve($data['reserves']);
            if(empty($data['hotels'])){
                show_404();
            }

            $this->load->view('templates/header');
            $this->load->view('pages/myReserves', $data);
            $this->load->view('templates/footer');
        }
    }