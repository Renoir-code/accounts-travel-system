<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	

		public function index()
		{
			$this->load->model('queries');
			$chkAdminExist = $this->queries->chkAdminExist();
			$this->load->view('login', ['chkAdminExist' => $chkAdminExist]);
		}

		public function adminRegister()
		{
			$this->load->model('queries');
			$roles = $this->queries->getRoles();
			$this->load->view('register',['roles'=>$roles]);
		}

		public function adminSignup()
		{
		
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|callback_checkEmail|callback_validCADEmail');
			$this->form_validation->set_rules('firstname','FirstName','required|trim|alpha');
			$this->form_validation->set_rules('lastname','LastName','required|trim|alpha');
			$this->form_validation->set_rules('password','Password','required|min_length[8]|callback_valid_password');
			$this->form_validation->set_rules('role_id','Role','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

			if($this->form_validation->run() ){
				
				$encrypted_password = hash('sha256', 'x(93g'.$this->input->post("password").'4$b7@');
				
							$data =[
							
								'email' => $this->input->post('email'),
								'firstname' => $this->input->post('firstname'),
								'lastname' => $this->input->post('lastname'),
								'password' => $encrypted_password,
								'role_id' => $this->input->post('role_id'),
							];

							$this->load->model('queries');
							$success = $this->queries->registerAdmin($data);	
							
							if($success)
							{ 
								$this->session->set_flashdata('message','User Registered Successfully');
								return redirect("welcome/login");
							}	
							else
							{
								$this->session->set_flashdata('message','Registration Failed');
								return redirect("welcome/adminRegister");
							}
						}	
						else
						{
							$this->adminRegister();
						}
		
	}


	public function signin(){
		
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
			
		if($this->form_validation->run())
		{
			
					$email =$this->input->post('email');
					$password= hash('sha256', 'x(93g'.$this->input->post("password").'4$b7@');
					
					$this->load->model('queries');		  
					$userExist = $this->queries->logme($email,$password);
					
					if($userExist)
					{

						if($userExist->user_id == '14') //if user is administrator // 1777ee
								{
									$sessionData = [
										'user_id' => $userExist->user_id,
										'email' => $userExist->email,
										'password'=>$userExist->password,    
										'role_id' => $userExist->role_id,
									];

									$this->session->set_userdata($sessionData);
									return redirect("admin/dashboard");
								}
									elseif($userExist->user_id != '14')  //if user is insertor
									{  
										$sessionData = [
											'user_id' => $userExist->user_id,
											'email' => $userExist->email,
											'password'=>$userExist->password,    
											'role_id' => $userExist->role_id,
										];

										$this->session->set_userdata($sessionData);
										return redirect("users/dashboard");
									}
					}
					else
					{
						$this ->session->set_flashdata('message',  'Your Email or Password is Incorrect');
						return redirect("welcome/login");
					}
			}
			else
			{
				$this->login();
			}
	}
	
	public function logout()
	{
		$this->session->unset_userdata("user_id");
		return redirect("welcome/login");
	
	}

		public function valid_password($password = ''){
			$password = trim($password);

			$regex_lowercase = '/[a-z]/';
			$regex_uppercase = '/[A-Z]/';
			$regex_number = '/[0-9]/';
			$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

			if (empty($password)){
				$this->form_validation->set_message('valid_password', 'The {field} field is required.');
				return FALSE;
			}

			if (preg_match_all($regex_lowercase, $password) < 1){
				$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
				return FALSE;
			}

			if (preg_match_all($regex_uppercase, $password) < 1){
				$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
				return FALSE;
			}

			if (preg_match_all($regex_number, $password) < 1){
				$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
				return FALSE;
			}

			if (preg_match_all($regex_special, $password) < 1){
				$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));
				return FALSE;
			}
			if (strlen($password) < 5){
				$this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
				return FALSE;
			}

			if (strlen($password) > 32){
				$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
				return FALSE;
			}
			return TRUE;
		}

		function checkUserName($userName)
		{
				$this->load->model('queries');
				$username=$this->queries->checkusername($userName);
				if($username == FALSE){
				return true;
				}
				else 
				{
				$this->form_validation->set_message('checkUserName', 'This userName already exists!');
				return FALSE;
				}
		}

		
		
		public function validCADEmail($email)
		{
			if(!preg_match('/^[^\s]*\.[^\s]*@(cad.gov.jm|cms.gov.jm|rmc.gov.jm|supremecourt.gov.jm|courtofappeal.gov.jm|parishcourt.gov.jm)$/',$email))
			{
			$this->form_validation->set_message('validCADEmail', 'Please enter a valid Work Email Address');
			return false;
			}
			return true;
		}
		
		
		function checkEmail($email)
		{
			$this->load->model('queries');
			$email=$this->queries->checkMail($email);
			if($email == FALSE)
			{
			return true;
			}
			else 
			{
			$this->form_validation->set_message('checkEmail', 'This Email already exists!');
			return FALSE;
			}
		}


	public function login()
	{
		if($this->session->userdata("user_id"))
		return redirect("admin/dashboard");
		$this->load->view('login');
	}




}
