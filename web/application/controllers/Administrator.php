<?php 
	class Administrator extends CI_Controller{

		

		public function view($page = 'index'){
			if($this->session->userdata('login')) {
    			redirect('administrator/dashboard');
   			}

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/index');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function home($page = 'home'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function dashboard($page = 'dashboard'){
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
		   	if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		   	 show_404();
		   	}
		   	$data['title'] = ucfirst($page);
		   	$this->load->view('administrator/header-script');
		   	$this->load->view('administrator/header');
		   	$this->load->view('administrator/header-bottom');
		   	$this->load->view('administrator/'.$page, $data);
		   	$this->load->view('administrator/footer');
		}

	 

	  // Log in Admin
		public function adminLogin(){
			$data['title'] = 'Admin Login';

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				//$data['title'] = ucfirst($page);
				$this->load->view('administrator/header-script');
				//$this->load->view('administrator/header');
				//$this->load->view('administrator/header-bottom');
				$this->load->view('administrator/index', $data);
				$this->load->view('administrator/footer');
			}else{
				// get email and Encrypt Password
				$email = $this->input->post('email');
				$encrypt_password = md5($this->input->post('password'));

				$user_id = $this->Administrator_Model->adminLogin($email, $encrypt_password);

				if ($user_id && $user_id->role_id == 1) {
					//Create Session
					$user_data = array(
								'user_id' => $user_id->id,
				 				'username' => $user_id->username,
				 				'email' => $user_id->email,
				 				'login' => true,
				 				'role' => $user_id->role_id,
				 	);

				 	$this->session->set_userdata($user_data);

					//Set Message
					$this->session->set_flashdata('success', 'Welcome to administrator Dashboard.');
					redirect('administrator/dashboard');
				}else{
					$this->session->set_flashdata('danger', 'Login Credential in invalid!');
					redirect('administrator/index');
				}
				
			}
		}

				// log admin out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('image');
			$this->session->unset_userdata('site_logo');

			//Set Message
			$this->session->set_flashdata('success', 'You are logged out.');
			redirect(base_url().'administrator/index');
		}

		public function forget_password($page = 'forget-password'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function add_user($page = 'add-user')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Create User';

			//$data['add-user'] = $this->Administrator_Model->get_categories();

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1000';
				$config['max_width'] = '800';
				$config['max_height'] = '600';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$password = md5('Test@123');
				$this->Administrator_Model->add_user($post_image,$password);

				//Set Message
				$this->session->set_flashdata('success', 'User has been created Successfull.');
				redirect('administrator/users');
			}
			
		}

		// Check user name exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}


		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}

		public function users($offset = 0)
		{
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/users/';
			$config['total_rows'] = $this->db->count_all('users');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Users';

			$data['users'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);

			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/users', $data);
		  		$this->load->view('administrator/footer');
		}

		public function delete($id)
		{
			$data = $this->Administrator_Model->listHotels($id);
			if(file_exists("./assets/images/hotels/".$data['image'])){
				unlink("./assets/images/hotels/".$data['image']);
			}
			$this->Administrator_Model->deleteHotel($id);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Desabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->desable($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function update_user($id = NULL)
		{
			$data['user'] = $this->Administrator_Model->get_user($id);
			
			if (empty($data['user'])) {
				show_404();
			}
			$data['title'] = 'Update User';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-user', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_user_data($page = 'update-user')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Update User';

			//$data['add-user'] = $this->Administrator_Model->get_categories();

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1000';
				$config['max_width'] = '800';
				$config['max_height'] = '600';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$id = $this->input->post('id');
					$data['img'] = $this->Administrator_Model->get_user($id);
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->Administrator_Model->update_user_data($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('administrator/users');
			}
			
		}

		// blogs functions start
		public function add_hotel($page = 'add-hotel')
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Add Hotel';

			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/hotels';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1000';
				$config['max_width'] = '800';
				$config['max_height'] = '600';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.png';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->create_hotel($post_image);

				//Set Message
				$this->session->set_flashdata('post_created', 'Your post has been created.');
				redirect('administrator/list-hotel');
			}
			
		}

		public function list_hotel($offset = 0){
			// Pagination Config
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$config['base_url'] = base_url(). 'administrator/blogs/';
			$config['total_rows'] = $this->db->count_all('hotel');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List of Hotels';

			$data['hotels'] = $this->Administrator_Model->listHotels(FALSE, $config['per_page'], $offset);

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/list-hotel', $data);
			$this->load->view('administrator/footer');
		}

		public function update_hotel($hotel_id = false){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Edit Hotel';
			
			$data['hotels'] = $this->Administrator_Model->listHotels($hotel_id);

			$this->form_validation->set_rules('nombre', 'Nombre', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/update-hotel', $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				
				$config['upload_path'] = './assets/images/hotels';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1000';
				$config['max_width'] = '800';
				$config['max_height'] = '600';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$data['postimg'] = $this->Administrator_Model->listHotels($this->input->post('id'));
					$post_image = $data['postimg']['image'];
				}else{
					/* $data['oldImage'] = $this->Administrator_Model->listHotels($hotel_id);
					if(file_exists("./assets/images/hotels/".$data['oldImage'])){
						unlink("./assets/images/hotels/".$data['oldImage']);
					} */
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
					
				}


				$this->Administrator_Model->update_hotel_data($post_image);

			    //Set Message
			    $this->session->set_flashdata('success', 'Blog has been Updated Successfully.');
			    redirect('administrator/list-hotel');
			}
		}


		public function get_admin_data()
		{
			$data['changePassword'] = $this->Administrator_Model->get_admin_data();
			$data['title'] = 'Change Password';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/change-password', $data);
	  		$this->load->view('administrator/footer');
		}

		public function change_password($page = 'change-password')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Change password';

			//$data['add-user'] = $this->Administrator_Model->get_categories();

			$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_match_old_password');
			$this->form_validation->set_rules('new_password', 'New Password Field', 'required');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'matches[new_password]');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{


				$this->Administrator_Model->change_password($this->input->post('new_password'));

				//Set Message
				$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
				redirect('administrator/change-password');
			}
			
		}
		// Check user name exists
		public function match_old_password($old_password){
			
			$this->form_validation->set_message('match_old_password', 'Current Password Does not matched, Please Try Again.');
			$password = md5($old_password);
			$que = $this->Administrator_Model->match_old_password($password);
			if ($que) {
				return true; 
			}else{
				return false;
			}
		}

		public function update_admin_profile()
		{
			$data['user'] = $this->Administrator_Model->get_admin_data();
			$data['title'] = 'Update Profile';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-profile', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_admin_profile_data($page = 'update-profile')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Update Profile';

			//$data['add-user'] = $this->Administrator_Model->get_categories();

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1000';
				$config['max_width'] = '800';
				$config['max_height'] = '600';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$id = $this->input->post('id');
					$data['img'] = $this->Administrator_Model->get_user($id);
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->Administrator_Model->update_user_data($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('administrator/update-profile');
			}
			
		}


		//forget password functions start
		public function forget_password_mail(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

            //check if email is in the database
        $this->load->model('Administrator_Model');
        if($this->Administrator_Model->email_exists()){
            //$them_pass is the varible to be sent to the user's email
            $temp_pass = md5(uniqid());
            //send email with #temp_pass as a link
            $this->load->library('email', array('mailtype'=>'html'));
            $this->email->from('admin1234567@gmail.com', "Site");
            $this->email->to($this->input->post('email'));
            $this->email->subject("Reset your Password");

            $message = "<p>This email has been sent as a request to reset our password</p>";
            $message .= "<p><a href='".base_url()."administrator/reset-password/$temp_pass'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
            $this->email->message($message);

            if($this->email->send()){
                $this->load->model('Administrator_Model');
                if($this->Administrator_Model->temp_reset_password($temp_pass)){
                    echo "check your email for instructions, thank you";
                }
            }
            else{
                echo "email was not sent, please contact your administrator";
            }

        }else{
            echo "your email is not in our database";
        }
}
public function reset_password($temp_pass){
    $this->load->model('Administrator_Model');
    if($this->Administrator_Model->is_temp_pass_valid($temp_pass)){

        $this->load->view('reset-password');
       //once the user clicks submit $temp_pass is gone so therefore I can't catch the new password and   //associated with the user...

    }else{
        echo "the key is not valid";    
    }

}
public function update_password(){
    $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
            if($this->form_validation->run()){
            echo "passwords match";
            }else{
            echo "passwords do not match";  
            }
}


		
}
	




