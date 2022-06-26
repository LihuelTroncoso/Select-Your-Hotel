<?php 
	class Pages extends CI_Controller{

		public function view($page = 'home'){
			$this->load->model("Hotel_Model");
			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$data['title'] = ucfirst($page);

			$data['hotels'] = $this->Hotel_Model->get_hotels();
			
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}
	