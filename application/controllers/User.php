<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* if (!isset($_SESSION['user_id'])) 
{
  echo 'Please <a href = "#">log in</a> first to see this page.';
  die();
} */
class User extends MY_Controller {

	 //password,Snq3r@321,Qwerty1@3
	 public $default_password1 = '29d96d3461a7e7ee306340b9bd07d6deacf42e1f3eb6cefaacf6a54d8e1908f1';
	 public $default_password2 = 'd8bd620b7660e6f3280f33027ff97c6f620e76602481e662c93f34e77751075d'; 
	 public $default_password3 = '8a9edbf0abe834ec1326f14dd4f8212ab71f7ebe1195c736469fbcff0082f5b2';
	 public $default_passwords;
	 

	public function __construct()
    {
        ob_start();
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('staff_model');
        $this->default_passwords = array($this->default_password1,$this->default_password2,$this->default_password3);
    }

	
			//user login
	public function index()
	{
		
	$this->form_validation->set_rules('email','Email','required|trim|callback_validCADEmail');
	$this->form_validation->set_rules('password','Password','required|callback_valid_password');
	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
	
		
		if($this->form_validation->run() == FALSE)
		{
			//var_dump($_SESSION['certifier_url']);
			//testarray($_SESSION['certifier_url']);
			$this->load->view('login'); //comment
		}
		else {
			$email = $this->input->post('email');
			$password= hash('sha256', 'x(93g'.$this->input->post("password").'4$b7@');
			$success = $this->user_model->login($email,$password);


			if(count($success) == 0)
			{
				$this->session->set_flashdata('message','Invalid email or Password');
				redirect('user'); //
			}
			
			else{
				$row = $success[0];
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['role_id'] = $row['role_id'];
				$_SESSION['timeout'] = time();
				
			
				
				/* if(isset($_SESSION['redirect_url'])) 
				{
						redirect($_SESSION['redirect_url']);

				}
				 */
			}
			if(in_array($row['password'],$this->default_passwords)) // if user logs in with Qwerty1@3 Immediately prompt to change
			{
				$this->session->set_flashdata('message', 'URGENT!!!! Please change your password');
				redirect('user/change_password_submit');
			}
			else{
				
				if($row['role_id']== 4) // if admin
				redirect('admin/dashboard');

				elseif($row['role_id']== 1||$row['role_id']== 2||$row['role_id']== 3)
				{
					redirect('staff/staff_information');
					//$this->session->set_flashdata('message','You are not an administrator!!!!!!!');
					//redirect('user');
				}
				elseif($row['role_id']==5){
					redirect('staff/update_users_no_parish');
				}
				elseif($row['role_id']==6){
					redirect('bail/bail_information');
				}
				elseif($row['role_id']==7){
					redirect('jury/jury_information');
				}
					
			}
		
		}
			
	}

	public function adminRegister()
	{   
		//testarray($data);
		if($_SESSION['role_id'] !=4){
			redirect ('main');
		}
		$this->load->model('user_model');
		$roles = $this->user_model->getRoles();
		$this->load->view('register',['roles'=>$roles] );
	}


	public function adminSignup()
	{
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|callback_checkEmail|callback_validCADEmail');
		$this->form_validation->set_rules('firstname','FirstName','required|trim|alpha');
		$this->form_validation->set_rules('lastname','LastName','required|trim|alpha');
		$this->form_validation->set_rules('password','Password','required|max_length[20]|callback_valid_password');
		$this->form_validation->set_rules('confirm_pass','Confirm Password','required|matches[password]');
		$this->form_validation->set_rules('role_id','Role','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if($this->form_validation->run() == FALSE)
		{	
			$roles = $this->user_model->getRoles();
			$this->load->view('register',['roles'=>$roles]);
		}

		else
		{
			$modified_by = $this->user_model->getCurrentUsername($_SESSION['user_id']);
			$encrypted_password = hash('sha256', 'x(93g'.$this->input->post("password").'4$b7@');
			$isActive = 'yes';

			if($this->user_model->addUser($this->input->post('email'),$this->input->post('firstname'), $this->input->post('lastname'), $encrypted_password, 
			$this->input->post('role_id'),$isActive,$modified_by))	{
			
			$this->session->set_flashdata('message', 'User Successfully Created');
			redirect('admin/dashboard');
			}	
			
			
			else
			redirect('admin/adminSignup');

				
		}
		
	}


	public function change_password_submit() // prompt change when default password is used
    {
        $this->user_model->isUserLoggedIn();
        $this->form_validation->set_rules('cur_pass', 'Current Password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_valid_password');
        $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('change_password');
        }
        else
        {
            if($this->input->post('cur_pass') == $this->input->post('password'))
            {
                //$data['message'] = "New password and current password should not be the same<br /><br />";
                $this->session->set_flashdata('message', 'New password and current password should not be the same');
                redirect('user/changePassword');
            }
            else
            {		
                $cur_pass = hash('sha256', 'x(93g'.$this->input->post("cur_pass").'4$b7@');
                $isvalid = $this->user_model->testPassword($_SESSION['user_id'], $cur_pass);

                if(count($isvalid) == 0)
                {
                    //$data['message'] = "Incorrect password entered<br />";
                    $this->session->set_flashdata('message', 'Incorrect password entered');
                     redirect('user/changePassword');
                }
                else
                {
                    $pass = hash('sha256', 'x(93g'.$this->input->post("password").'4$b7@');
                    $result = $this->user_model->changeUserPassword($_SESSION['user_id'], $pass);

                    if(!$result)
                    {
                        //$data['message'] = "Unable to change password<br />";
                        $this->session->set_flashdata('message', 'Unable to change password');
                         redirect('user/changePassword');
                    }
                    else
                    {
						
                        //$data['message'] = "Your password was changed successfully<br />";
                        $this->session->set_flashdata('message', 'Your password was changed successfully');
						redirect('admin/dashboard');
                       // $user = $this->user_model->getUserById($_SESSION['stock_user_id']);						
                        /*if($user['user_level'] == 2)
                            redirect('main/unapproved_requisitions');
                        else
                            redirect('main/index');
							*/
                    }
                }
            }
        }
    }
	
	public function logout()
	{
		session_unset(); 
		session_destroy();
		//redirect('user');
		$this->load->view('login');

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
			$this->load->model('user_model');
			$email=$this->user_model->checkMail($email);
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


		public function forgotPassword()
		{
			date_default_timezone_set('America/Bogota');
			$this->form_validation->set_rules('email','Email Address','required|valid_email|callback_validCADEmail');
	
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('forgotPassword');
			}
			else
			{			
				//$myconfig['mailtype'] = 'html';
				//$this->load->library('email', $myconfig);
				//$this->email->set_newline( '\r\n' );
				$this->load->model('user_model');
				//use this line to find if the email address entered corresponds to an account in the system.
				$emp = $this->user_model->getUserByEmailAddress($this->input->post('email'));
	
				if(empty($emp) || $emp == array())
				{
					$data['message'] = 'No such user exists';
					$this->load->view('forgotPassword', $data);
				}
				else
				{
					$token = hash('haval256,4', 'Yxs4pg'.time().'48BeEd');
	
					//save the request in the database
					if($this->user_model->saveResetEmailRequest($token, $this->input->post('email')))
					{
						$link = '<a href="'.base_url('user/reset_password').'/'.$this->db->insert_id().'/'.$token.'">Reset Password</a>';
			
						$config['mailtype'] = 'html';
						$config['protocol'] = 'smtp';
						$config['smtp_host'] = 'secure.emailsrvr.com';
						$config['smtp_port'] = '465';
						$config['smtp_user'] =  'website.admin@cad.gov.jm';//'webadmin@cad.gov.jm';
						$config['smtp_pass'] =  'dEvMqRpA8wX9oNw';//'e`>73KbudCGW7f;J';//'c0urtCAD@0509';
						$config['smtp_crypto'] = 'ssl';
						$config['smtp_timeout'] = '20';
						$config['charset'] = 'iso-8859-1';		
	
						$this->email->initialize($config);
						
						// Set Email Variables
						$from_name = 'System Administrator';
						$from_emailaddress = 'webmaster@cad.gov.jm'; 
						$to = trim($this->input->post('email')); 
						$subject = "Accounts Travel Management System Reset Password";
	
						 $message = 'Good day,<br/><br/>'
						.'A password reset was requested for your account. Please ignore this message if it was not sent                         by you.<br><br>Please click the link below to reset your password. It is only valid for 45                             minutes. <br/><br/>';
						$message .= $link;                    
						$message .= '<br/><br/>Regards <br/><br/>'
						.'System Administrator';
						
						// Run Email methods
						$this->email->from($from_emailaddress, $from_name);
						$this->email->to($to);
	
						$this->email->subject($subject);
						$this->email->message($message);
	
						
						// Send Email
						$sent = $this->email->send();
	
						// Check for errors How to hide warnings in if statements
						if($sent)
						{
							 $data['message'] = 'Please access your email to reset your password.';
							$this->load->view('forgotPassword', $data);
						}					
						else
						{
							$data['message'] = 'Possible database error. Please try again.';
							$this->load->view('forgotPassword', $data);
						}
					}
				}				
			}
		}

		//if password request is requested by email
		public function reset_password()
    {
		$this->load->model('user_model');
        date_default_timezone_set('America/Bogota');
        $reset_pass = $this->user_model->getResetPasswordRequestById($this->uri->segment(3));

        if(!empty($reset_pass) || $reset_pass != array())
        {
            //if a request with this id was found in the database

            //ensure that the tokens are the same, status is new, and the time is less than 10 minutes
            if($this->uri->segment(4)==$reset_pass['token'] && $reset_pass['status']=='New' && date('Y-m-d H:i:s', strtotime('+45 minutes', strtotime($reset_pass['date_created']))) >= date('Y-m-d H:i:s'))
            {

                $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]|callback_valid_password');
                $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|matches[password]');

                if($this->form_validation->run() === FALSE)
                {
                    $this->load->view('reset_password');
                }
                else
                {
                    $pass = hash('sha256', 'x(93g'.$this->input->post("password").'4$b7@');
                    $completed = $this->user_model->reset_password($reset_pass['email'], $pass, $this->uri->segment(3));

                    if($completed)
                    {
                        $this->load->view('login', array('message'=>'Your password was successfully changed. You can now login'));
						
						
                    }
                    else
                    {
                        $this->load->view('reset_password', array('message'=>'Error encountered while trying to reset your password. Please try again or contact ICT Administrator if issue persists'));
                    }
                }				
            }
            else
            {
                //One of the checks above failed
                $data['message'] = 'Invalid link.';
                $this->load->view('forgotPassword', $data);
            }			
        }
        else
        {
            //No request found
            $data['message'] = 'Invalid link.';
            $this->load->view('forgotPassword', $data);
        }
    }


	public function payment(){
		$this->load->view('staff_payment');
	}


	public function testpage() {
		$this->load->view('testpage');
	}



}
