<?php 
    class Reserva extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('login')) {
                redirect('users/login');
            }

            $this->form_validation->set_rules('arrival', 'Fecha de llegada requerida', 'required');
			$this->form_validation->set_rules('departure', 'Fecha de salida requerida', 'required');
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('lastName', 'Apellido', 'required');
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('pages/reserva');
				$this->load->view('templates/footer');
            }else{

            }

        }
        
    }