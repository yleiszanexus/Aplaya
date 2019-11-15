<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index(){
		logged_check();
		$data = array(
			'user' => $this->Admin_model->get_user($this->session->userdata('user')->id),
		);
		$this->template->setCss('css', array('css/pages/dashboard1', 'css/admin'));
		$this->template->setJs('js', array());
		$this->template->set('title', 'Admin | Dashboard');
		$this->template->loadSub('admin','content','admin/index', $data);
	}

	public function login(){
		login();
		$this->template->setCss('css', array('css/pages/login-register-lock'));
		$this->template->setJs('js', array('js/admin/login'));
		$this->template->set('title', 'Admin | Login');
		$this->template->loadSub('admin_login','content','admin/login', '');
	}

	public function loginCheck(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		 if ($this->form_validation->run() == FALSE){
            $response = array(
            	'success' => FALSE,
            	'error' => validation_errors(),
            );
            echo json_encode($response);
            exit();
        }else{
        	$data = array(
        		'email' => $this->input->post('email'),
        		'password' => $this->input->post('password'),
        	);
        	$response = $this->Admin_model->login($data);
        	if($response['success'] == FALSE){
	        	echo json_encode($response);
	            exit();
        	}else{
        		if($response['user']->role_id == 3){
        			echo json_encode(array(
	        			'success' => FALSE,
	        			'error' => 'Email/Password is incorrect',
	        		));
	        		exit();
        		}else{
	        		$this->session->set_userdata($response);
	        		echo json_encode(array(
	        			'response' => TRUE,
	        			'redirect' => base_url('admin'),
	        		));
	        		exit();
	        	}
        	}
        }
	}

	public function logout(){
		session_destroy();
		redirect('admin/login');
	}

	public function profile($id=null, $change_pass=null){
		logged_check();
		$this->template->setCss('css', array(
			'/node_modules/dropify/dist/css/dropify.min.css'
		));	
		$this->template->setJs('js', array(
			base_url('assets/node_modules/dropify/dist/js/dropify.min.js'),
			base_url('assets/js/admin/profile.js')
		));
		if($id != null){
			if($change_pass != null){
				$this->form_validation->set_rules('old-pass', 'Old Password', 'required');
				$this->form_validation->set_rules('new-pass', 'New Password', 'required');
				$this->form_validation->set_rules('con-new-pass', 'Password Confirmation', 'required|matches[new-pass]');
				if($this->form_validation->run() == FALSE){
					$data = array(
						'user' => $this->Admin_model->get_user($this->session->userdata('user')->id),
					);
					$this->template->set('title', 'Admin | Profile');
					$this->template->loadSub('admin','content','admin/profile', $data);
				}else{
					$post_data = array(
						'old_pass' => $this->input->post('old-pass'),
						'new_pass' => $this->input->post('new-pass')
					);

					$query = $this->Admin_model->change_password($post_data, $id);
					if($query == TRUE){					
						set_flash('success', 'Password changed!', 'admin/profile');
					}else{
						set_flash('danger', 'Incorrect password!', 'admin/profile');
					}

				}
			}else{
				$this->form_validation->set_rules('firstname', 'First Name', 'required');
				$this->form_validation->set_rules('lastname', 'Last Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('contact', 'Contact', 'required');
				if($this->form_validation->run() == FALSE){
					$data = array(
						'user' => $this->Admin_model->get_user($this->session->userdata('user')->id),
					);
					$this->template->set('title', 'Admin | Profile');
					$this->template->loadSub('admin','content','admin/profile', $data);
				}else{
					$photo = '';
					if(!empty($_FILES)){
						$filename = 'user_'.$this->session->userdata('user')->id.'_'.time(); 
						$config['file_name'] 			= $filename;
						$config['upload_path']          = './assets/images/users/';
		                $config['allowed_types']        = 'jpg|jpeg|png';

		                $this->load->library('upload', $config);
		                if($this->upload->do_upload('photo')){
		                	$data = $this->upload->data();
		                	$config['image_library'] = 'gd2'; 
							$config['source_image'] = './assets/images/users/'.$data["file_name"];  
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = TRUE;
							$config['width'] = 200;  
							$config['height'] = 200;  
							$config['new_image'] = './assets/images/users/'. $data['file_name']; 

						    $this->image_lib->initialize($config);
						    $this->image_lib->resize();
						    $data = array(
						    	'photo' => $data['file_name'],
						    );
							$this->Admin_model->profle_update($data, $id);
							$photo = 1;
							$prev_photo = 'assets/images/users/' . $this->input->post('prev_photo');
							if(file_exists($prev_photo)){
								unlink($prev_photo);
							}
		            	}
					}
					$data = array(
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'contact' => $this->input->post('contact'),
						'address' => $this->input->post('address'),
					);
					$query = $this->Admin_model->profle_update($data, $id);
					if($query == TRUE or $photo != null){
						set_flash('success', 'Details updated!', 'admin/profile');
					}else{
						set_flash('danger', 'Failed to update/no changes have found!', 'admin/profile');
					}
				}
			}
		}else{
			$data = array(
				'user' => $this->Admin_model->get_user($this->session->userdata('user')->id),
			);
			$this->template->set('title', 'Admin | Profile');
			$this->template->loadSub('admin','content','admin/profile', $data);
		}
	}

	public function userManagement($add=null){
		logged_check();
		$this->template->setJs('js', array(
			base_url('assets/node_modules/datatables.net/js/jquery.dataTables.min.js'),
			base_url('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js'),
			base_url('assets/js/dataTablesButtons/dataTables.buttons.min.js'),
			base_url('assets/js/dataTablesButtons/buttons.flash.min.js'),
			base_url('assets/js/dataTablesButtons/jszip.min.js'),
			base_url('assets/js/dataTablesButtons/pdfmake.min.js'),
			base_url('assets/js/dataTablesButtons/vfs_fonts.js'),
			base_url('assets/js/dataTablesButtons/buttons.html5.min.js'),
			base_url('assets/js/dataTablesButtons/buttons.print.min.js'),
			base_url('assets/node_modules/dropify/dist/js/dropify.min.js'),
			base_url('assets/js/admin/user_management.js'),
		));
		$this->template->setCss('css', array(
			'/node_modules/dropify/dist/css/dropify.min.css'
		));
		$users_query = array(
			'type !=' => 'customer',
			'active' => 1,
		);
		if($add != null){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('contact', 'Contact', 'required');
			if($this->form_validation->run() == FALSE){
				$data = array(
					'user' => $this->Admin_model->get_user($this->session->userdata('user')->id),
					'roles' => $this->Admin_model->get_roles(),
					'users' => $this->Admin_model->get_users($users_query),
				);
				$this->template->set('title', 'Admin | Add User');
				$this->template->loadSub('admin','content','admin/user_management', $data);
			}else{
				$data = array(
					'email' => $this->input->post('email'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'role_id' => $this->input->post('role'),
					'firstname' => $this->input->post('first_name'),
					'lastname' => $this->input->post('last_name'),
					'contact' => $this->input->post('contact'),
					'address' => ($this->input->post('address')) ? $this->input->post('address') : ' - - - ',
					'active' => 1
				);
				$query = $this->Admin_model->add_user($data);
				if($query == TRUE){
					set_flash('success', 'User Added!', 'admin/usermanagement');
				}else{
					set_flash('danger', 'Error occurred, please try again!', 'admin/usermanagement');
				}
			}
		}else{
			if($_POST){
				if($_FILES){
					$data = array();
					$photo = '';
					if(!empty($_FILES)){
						$filename = 'user_'.$this->input->post('id').'_'.time(); 
						$config['file_name'] 			= $filename;
						$config['upload_path']          = './assets/images/users/';
		                $config['allowed_types']        = 'jpg|jpeg|png';

		                $this->load->library('upload', $config);
		                if($this->upload->do_upload('photo')){
		                	$data = $this->upload->data();
		                	$config['image_library'] = 'gd2'; 
							$config['source_image'] = './assets/images/users/'.$data["file_name"];  
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = TRUE;
							$config['width'] = 200;  
							$config['height'] = 200;  
							$config['new_image'] = './assets/images/users/'. $data['file_name']; 

						    $this->image_lib->initialize($config);
						    $this->image_lib->resize();
	    					$data = array(
								'photo' => $data['file_name'],
								'role_id' => $this->input->post('role'),
								'firstname' => $this->input->post('first_name'),
								'lastname' => $this->input->post('last_name'),
								'contact' => $this->input->post('contact'),
								'address' => $this->input->post('address')
							);
							$photo = 1;
							$prev_photo = 'assets/images/users/' . $this->input->post('prev_photo');
							if($this->input->post('prev_photo')){
								unlink($prev_photo);
							}
		            	}
					}
				}else{
					$data = array(
						'role_id' => $this->input->post('role'),
						'firstname' => $this->input->post('first_name'),
						'lastname' => $this->input->post('last_name'),
						'contact' => $this->input->post('contact'),
						'address' => $this->input->post('address')
					);
				}
				$query = $this->Admin_model->profle_update($data, $this->input->post('id'));
				if($query == TRUE){
					set_flash('success', 'User updated!', 'admin/usermanagement');
				}else{
					set_flash('danger', 'Error occurred, no changes has found!', 'admin/usermanagement');
				}
			}else{
				$data = array(
					'user' => $this->Admin_model->get_user($this->session->userdata('user')->id),
					'roles' => $this->Admin_model->get_roles(),
					'users' => $this->Admin_model->get_users($users_query),
				);
				$this->template->set('title', 'Admin | User Management');
				$this->template->loadSub('admin','content','admin/user_management', $data);
			}
		}
	}

	public function getUserOnTable($id){
		$userdata = $this->Admin_model->get_user($id);
		if($userdata){
			echo json_encode($userdata);
			exit();	
		}
	}

	public function deactivateUser($id){
		$data = array('active'=>0);
		$query = $this->Admin_model->profle_update($data, $id);
		if($query == TRUE){
			$response = array(
				'title' => 'Success',
				'content' => 'Users deactivated!',
				'type' => 'green'
			);
			echo json_encode($response);
			exit();
		}else{
			$response = array(
				'title' => 'Error',
				'content' => 'Please try again!',
				'type' => 'red'
			);
			echo json_encode($response);
			exit();
		}
	}

	public function roomManagement(){
		logged_check();
		$this->template->setJs('js', array(
			base_url('assets/node_modules/datatables.net/js/jquery.dataTables.min.js'),
			base_url('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js'),
			base_url('assets/js/dataTablesButtons/dataTables.buttons.min.js'),
			base_url('assets/js/dataTablesButtons/buttons.flash.min.js'),
			base_url('assets/js/dataTablesButtons/jszip.min.js'),
			base_url('assets/js/dataTablesButtons/pdfmake.min.js'),
			base_url('assets/js/dataTablesButtons/vfs_fonts.js'),
			base_url('assets/js/dataTablesButtons/buttons.html5.min.js'),
			base_url('assets/js/dataTablesButtons/buttons.print.min.js'),
			base_url('assets/js/admin/room_management.js'),
		));
		$data = array(
			'user' => $this->Admin_model->get_user($this->session->userdata('user')->id),
			'rooms' => $this->Admin_model->get_rooms(),
		);
		$this->template->set('title', 'Admin | Room Management');
		$this->template->loadSub('admin','content','admin/room_management', $data);
	}
	
}