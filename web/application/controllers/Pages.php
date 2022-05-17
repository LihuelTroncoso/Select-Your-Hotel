<?php 
	class Pages extends CI_Controller{

		public function view($page = 'home'){
			$this->load->model('Hotel_Model');
			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$data['title'] = ucfirst($page);

			$data['hotel'] = $this->Hotel_Model->get_hotels();
			if (empty($data['hotel'])) {
				show_404();
			}
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}
	