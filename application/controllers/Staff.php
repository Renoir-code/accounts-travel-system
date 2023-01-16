<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* if (!isset($_SESSION['user_id'])) 
{
  echo "Please log in first to see this page.";
  die();
} */

class Staff extends MY_Controller {


    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('staff_model');
        $this->load->model('user_model');
    }    
    
    public function staff_create()
    {
    
        $this->load->model('staff_model');
        $location = $this->staff_model->get_locations();
        $officers = $this->staff_model->get_officer_type();
        $typeofUpkeep = $this->staff_model->get_upkeep_type();
     
        $this->load->view('create_staff',['officers'=>$officers,'location'=>$location,'upkeep'=>$typeofUpkeep]);

    }

    public function staff_submit()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['role_id'] != 4 ) { // admin access removed to this page|| only account staff members should have access
            redirect('admin/dashboard');
       }

            $this->form_validation->set_rules('firstname','First Name','required|trim|alpha');
            $this->form_validation->set_rules('lastname','Last Name','required|trim|alpha' );
            $this->form_validation->set_rules('post_title','Post Title','required');
            $this->form_validation->set_rules('trn','TRN','required|trim|numeric|exact_length[9]|callback_checkTRN');
            $this->form_validation->set_rules('officer_id','Type of Officer','required'); // Should be dropdown
            $this->form_validation->set_rules('location_id','Location','required');
            $this->form_validation->set_rules('upkeep_id','Type of Upkeep','required'); // 
            $this->form_validation->set_rules('vehicle_model','Vehicle Model'); // veh
            $this->form_validation->set_rules('vehicle_make','Vehicle Model');
            $this->form_validation->set_rules('vehicle_chasisnum','Vehicle Chasis Number','alpha_numeric');
            $this->form_validation->set_rules('vehicle_engine_num','Vehicle Engine Number','alpha_numeric');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');



         
        if($this->form_validation->run())
        {
            $officerData = [               
                'firstname'      => $this->input->post('firstname'),
                'lastname'       => $this->input->post('lastname'),
                'post_title'     => $this->input->post('post_title'),
                'trn'            => $this->input->post('trn'),
                'officer_id'     => $this->input->post('officer_id'),
                'location_id'    => $this->input->post('location_id'),
                'upkeep_id'  => $this->input->post('upkeep_id'),
                'vehicle_model'  => $this->input->post('vehicle_model'),
                'vehicle_make'   => $this->input->post('vehicle_make'),
                'vehicle_chasisnum'=> $this->input->post('vehicle_chasisnum'),
                'vehicle_engine_num'=> $this->input->post('vehicle_engine_num')
            ];

        
          $this->load->model('staff_model');
          $response = $this->staff_model->register_officer($officerData);
          
          
                if($response)
                {
                    $this->session->set_flashdata('message','Officer Registered Successfully');
                    return redirect('staff/staff_information');
                }
                else
                {
                    $this->session->set_flashdata('fail_message','Possible Database Error Contact Administrator');
                    return redirect('staff/staff_information');
                }

        }
        else
        {
            $this->staff_create();
        }

    }

    function checkTRN($trn)
		{
			$this->load->model('user_model');
			$trn=$this->staff_model->checktrn($trn);
			if($trn == FALSE)
			{
			return true;
			}
			else 
			{
			$this->form_validation->set_message('checkTRN', 'This TRN already exists!');
			return FALSE;
			}
		}


    public function staff_information()
    {
       if(isset($_SESSION['user_id']) && $_SESSION['role_id'] == 4 ) { // admin access removed to this page|| only account staff members should have access
            redirect('admin/dashboard');
       }
        $trn = $this->input->post('trn');
  
        $trn_records = $this->staff_model->getStaffIDbyTRN($trn );
        //testarray( $trn_records);
        $this->load->view('staff_dashboard',['trn_records' => $trn_records]);
    }


         public function staff_payment_submit($staff_id)
        {
            //echo $staff_id;

            
       if(isset($_SESSION['user_id']) && $_SESSION['role_id'] == 4 ) { // admin access removed to this page|| only account staff members should have access
        redirect('admin/dashboard');
         }

        if(isset($_SESSION['user_id']) && $_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3) { 
            redirect('staff/staff_information');
        }

            $this->form_validation->set_rules('voucher_number','Voucher Number','trim|alpha_numeric|max_length[7]','required');
            $this->form_validation->set_rules('year_travelled','Year Travelled','required' );
            $this->form_validation->set_rules('month_travelled','Month Travelled','required');
            $this->form_validation->set_rules('mileage_km','Mileage','trim|numeric','required');
            $this->form_validation->set_rules('mileage_rate','Mileage Rate',''); //dropdown
            $this->form_validation->set_rules('passenger_km','Passenger Km','trim|numeric'); 
            $this->form_validation->set_rules('passenger_rate','Passenger Rate',''); // Should be dropdown
            $this->form_validation->set_rules('toll_amt','Toll Amount','trim|numeric');
            $this->form_validation->set_rules('subsistence_km','Subsistence Km','trim|numeric'); 
            $this->form_validation->set_rules('subsistence_rate','Subsistence Rate',''); 
            $this->form_validation->set_rules('actual_expense','Actual Expense','trim|numeric'); 
            $this->form_validation->set_rules('supper_days','Supper Days','trim|numeric'); // veh
            $this->form_validation->set_rules('supper_rate','Supper Rate',''); // veh
            $this->form_validation->set_rules('refreshment_days','Refreshment Days','trim|numeric');
            $this->form_validation->set_rules('refreshment_rate','Refreshment Rate',''); // veh
            $this->form_validation->set_rules('taxi_out_town','Taxi Out of Town','trim|numeric');
            $this->form_validation->set_rules('taxi_out_rate','Taxi Out Rate','trim|numeric');
            $this->form_validation->set_rules('taxi_in_town','Taxi In Town','trim|numeric');
            $this->form_validation->set_rules('taxi_in_rate','Taxi Rate','');
            $this->form_validation->set_rules('certifier_remarks','Certifier Remarks','alpha');


            if($this->form_validation->run() == FALSE)
            {
                $fname =$this->input->post('firstname');
                $staff =$staff_id;
                $lname =$this->input->post('lastname');
                $currentMonth =$this->input->post('month_travelled');
                $currentYear =$this->input->post('year_travalled');
                $months = $this->staff_model-> get_enum_values('staff_payment','month_travelled');
                $years = $this->staff_model-> get_enum_values('staff_payment','year_travelled');
               // $mileage_rate = $this->staff_model-> get_enum_values('staff_payment','mileage_rate');
               $mileage_rate = $this->staff_model-> getRates('mileage');
                $passenger_rate = $this->staff_model-> getRates('passenger');
                $subsistence_rate = $this->staff_model-> getRates('subsistence');
                $supper_rate = $this->staff_model-> getRates('supper');
                $refreshment_rate = $this->staff_model-> getRates('refreshment');
                $taxi_out_rate =$this->staff_model-> getRates('taxi_out_town');
                $taxi_in_rate = $this->staff_model-> getRates('taxi_in_town');
                $this->load->view('staff_payment',['mileage_rate' =>  $mileage_rate, 'passenger_rate' =>  $passenger_rate ,'subsistence_rate' =>  $subsistence_rate ,'supper_rate' =>  $supper_rate 
                  ,'refreshment_rate' => $refreshment_rate,'taxi_out_rate' => $taxi_out_rate,'taxi_in_rate' => $taxi_in_rate,'months' => $months,'years'=>$years, 'fname' => $fname, 'staff' => $staff,
                   'lname' => $lname ,'currentMonth' => $currentMonth ,'currentYear'=>$currentYear ]);
                
            }
            else
            {
                   
                date_default_timezone_set('America/Bogota');
                $date_created = date("Y-m-d h:i:sa",time());
                $added_by = md5($_SESSION['email']);
           
                  //  echo  $this->input->post('mileage_rate');  die();
                if($this->staff_model->insert_staffPayment(

                    $this->input->post('staff_id'),
                    $this->input->post('voucher_number'),
                    $this->input->post('year_travelled'),
                    $this->input->post('month_travelled'),
                    $this->input->post('mileage_km'),
                    $this->input->post('mileage_rate'), //drpdown
                    $this->input->post('passenger_km'),
                    $this->input->post('passenger_rate'), //dropwodn
                    $this->input->post('toll_amt'),
                    $this->input->post('subsistence_km'),
                    $this->input->post('subsistence_rate'), //dropdown
                    $this->input->post('actual_expense'),
                    $this->input->post('supper_days'),
                    $this->input->post('supper_rate'), //dropdown
                    $this->input->post('refreshment_days'),
                    $this->input->post('refreshment_rate'),
                    $this->input->post('taxi_out_town'),
                    $this->input->post('taxi_out_rate'),
                    $this->input->post('taxi_in_town'),
                    $this->input->post('taxi_in_rate'),
                    $this->input->post('certifier_remarks') ,
                    $added_by,
                    $date_created
                    )){
                        $this->session->set_flashdata('success_message','Payment Record Successfully Added');
                        redirect("staff/view_payment_records/{$staff_id}");
                    }
                   
                    else{
                        $this->session->set_flashdata('fail_message','Payment Record Not Added');
                        redirect('staff/staff_information');
                    
                    }
                        
                              
                }
            
        }



    public function viewStaffMembers()
    {
        $data['staff'] = $this->staff_model->getStaff();
        $this->load->view('staff_list_view',$data);

    }

    public function view_payment_records($staff_id)
    {   
        $data = $this->staff_model->get_staffRecords($staff_id);
       $staff_name = $this->staff_model->getStaffUsername($staff_id);
       $payment_records = $this->staff_model->getPaymentRecords($staff_id);
       //testarray($payment_records);
        $this->load->view('payment_list_view',['data'=>$data ,'payment_records'=> $payment_records , 'staff_name' => $staff_name ] );

    }

    public function view_all_payment_records($staff_email) // Explanation needed
    {   
       /* $e = 'added_by'; // default column if nothing is detected in the uri
        if($this->uri->segment(4)=='inserter'){
            $e = 'added_by';
        }*/
        if($_SESSION['role_id']==1){
            $e = 'added_by';
        }
        elseif($_SESSION['role_id']==2){
            $e = 'certified_by';
        }
        elseif($_SESSION['role_id']==3){
            $e = 'authorized_by';
        }
        

        $data = $this->staff_model->get_staffRecords($staff_email);
      // $staff_name = $this->staff_model->getStaffUsername($staff_email);
       $payment_records = $this->staff_model->getAllPaymentRecords($e,$staff_email);
       //testarray($payment_records);
        $this->load->view('all_payment_records',['data'=>$data ,'payment_records'=> $payment_records  ] );

    }
    //testing again
        //test
        //tester
        //testing
    public function modify_payment_records($staff_payment_id)
    {
        $data = $this->staff_model->getinserted_paymentRecords($staff_payment_id);
        $months = $this->staff_model-> get_enum_values('staff_payment','month_travelled');
        $years = $this->staff_model-> get_enum_values('staff_payment','year_travelled');
        $mileage_rate = $this->staff_model-> getRates('mileage');
        $passenger_rate = $this->staff_model-> getRates('passenger');
        $subsistence_rate = $this->staff_model-> getRates('subsistence');
        $supper_rate = $this->staff_model-> getRates('supper');
        $refreshment_rate = $this->staff_model-> getRates('refreshment');
        $taxi_out_rate =$this->staff_model-> getRates('taxi_out_town');
        $taxi_in_rate = $this->staff_model-> getRates('taxi_in_town');
       //testarray($data);
       $this->load->view('modify_payment_view',['data' => $data , 'months' => $months , 'years' =>$years, 
       'mileage_rate' =>$mileage_rate 
       , 'passenger_rate' =>$passenger_rate 
       , 'subsistence_rate' =>$subsistence_rate 
       , 'supper_rate' =>$supper_rate 
       , 'refreshment_rate' =>$refreshment_rate
       , 'taxi_out_rate' =>$taxi_out_rate
       , 'taxi_in_rate' =>$taxi_in_rate
       ]  );
      
    }

    public function update_payment_records($staff_payment_id,$staff_id)
    {
        $this->form_validation->set_rules('voucher_number','Voucher Number','trim|required|alpha_numeric|max_length[7]');
        $this->form_validation->set_rules('year_travelled','Year Travelled','required' );
        $this->form_validation->set_rules('month_travelled','Month Travelled','required');
        $this->form_validation->set_rules('mileage_km','Mileage','trim|numeric');
        $this->form_validation->set_rules('passenger_km','Passenger Km','trim|numeric'); // Should be dropdown
        $this->form_validation->set_rules('toll_amt','Toll Amount','trim|numeric');
        $this->form_validation->set_rules('subsistence_km','Subsistence Km','trim|numeric'); // 
        $this->form_validation->set_rules('actual_expense','Actual Expense','trim|numeric'); // 
        $this->form_validation->set_rules('supper_days','Supper Days','trim|numeric'); // veh
        $this->form_validation->set_rules('refreshment_days','Refreshment Days','trim|numeric');
        $this->form_validation->set_rules('taxi_out_town','Taxi Out of Town','trim|numeric');
        $this->form_validation->set_rules('taxi_in_town','Taxi In Town','trim|numeric');
        $this->form_validation->set_rules('certifier_remarks','Certifier Remarks','trim');

        $data = $this->staff_model->getinserted_paymentRecords($staff_payment_id);
        $months = $this->staff_model-> get_enum_values('staff_payment','month_travelled');
        $years = $this->staff_model-> get_enum_values('staff_payment','year_travelled');
      // testarray($data);
      
        if($this->form_validation->run() == FALSE ){
            $this->load->view('modify_payment_view',[ 'months' => $months , 'years' =>$years , 'data' => $data] );
        }
            else{
                date_default_timezone_set('America/Bogota');
                $date_modified = date("Y-m-d h:i:sa",time());
                $modified_by = $this->user_model->getCurrentUsername($_SESSION['user_id']);
    
                if($this->staff_model->update_staffPayment(
                   
                    $this->input->post('voucher_number'),
                    $this->input->post('year_travelled'),
                    $this->input->post('month_travelled'),
                    $this->input->post('mileage_km'),
                    $this->input->post('mileage_rate'),
                    $this->input->post('passenger_km'),
                    $this->input->post('passenger_rate'),
                    $this->input->post('toll_amt'),
                    $this->input->post('subsistence_km'),
                    $this->input->post('subsistence_rate'),
                    $this->input->post('actual_expense'),
                    $this->input->post('supper_days'),
                    $this->input->post('supper_rate'),
                    $this->input->post('refreshment_days'),
                    $this->input->post('refreshment_rate'),
                    $this->input->post('taxi_out_town'),
                    $this->input->post('taxi_out_rate'),
                    $this->input->post('taxi_in_town'),
                    $this->input->post('taxi_in_rate'),
                    $this->input->post('certifier_remarks') ,
                    $date_modified,
                    $modified_by,
                    $staff_payment_id
                    ))
                    {
                        $this->session->set_flashdata('success_message','Payment Record SuccessFully Updated!');
                        redirect("staff/view_payment_records/{$staff_id}");
                    }

            }
           



    }


    public function modify_staff_records($staff_id)
    {
        $data = $this->staff_model->get_staffRecords($staff_id);
        $location = $this->staff_model->get_locations();
        $officers = $this->staff_model->get_officer_type();
        $typeofUpkeep = $this->staff_model->get_upkeep_type();
       //testarray($data);
       $this->load->view('modify_staff_view',['data' => $data , 'location' => $location , 'officers' =>$officers , 'typeofUpkeep'=>$typeofUpkeep] );
      
    }

    public function staff_records($staff_id)
    {   
        $data = $this->staff_model->get_staffRecords($staff_id);
       $staff_name = $this->staff_model->getStaffUsername($staff_id);
       $payment_records = $this->staff_model->getPaymentRecords($staff_id);
      // testarray($data);
        $this->load->view('staff_records_view',['data'=>$data , 'staff_name' => $staff_name ] );

    }


    public function update_staff_records($staff_id)
    {
           // echo $staff_id;
            $this->form_validation->set_rules('firstname','First Name','required|trim|alpha');
            $this->form_validation->set_rules('lastname','Last Name','required|trim|alpha' );
            $this->form_validation->set_rules('post_title','Post Title','required');
            $this->form_validation->set_rules('trn','TRN','required|trim|numeric|exact_length[9]');
            $this->form_validation->set_rules('officer_id','Type of Officer','required'); // Should be dropdown
            $this->form_validation->set_rules('location_id','Location','required');
            $this->form_validation->set_rules('upkeep_id','Type of Upkeep','required'); // 
            $this->form_validation->set_rules('vehicle_model','Vehicle Model'); // veh
            $this->form_validation->set_rules('vehicle_make','Vehicle Model');
            $this->form_validation->set_rules('vehicle_chasisnum','Vehicle Chasis Number','numeric');
            $this->form_validation->set_rules('vehicle_engine_num','Vehicle Engine Number','numeric');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            $data = $this->staff_model->get_staffRecords($staff_id);
           // testarray($data);

            if($this->form_validation->run() == FALSE)
            {  
                $this->load->view('modify_staff_view',['data'=> $data]);
            }

            else
            {
                date_default_timezone_set('America/Bogota');
                $date_modified = date("Y-m-d h:i:sa",time());
                $modified_by = $this->user_model->getCurrentUsername($_SESSION['user_id']);

                if($this->staff_model->update_staffMember(
              
                    $this->input->post('firstname'),
                    $this->input->post('lastname'),
                    $this->input->post('post_title'),
                    $this->input->post('trn'),
                    $this->input->post('location_id'),
                    $this->input->post('officer_id'),                 
                    $this->input->post('upkeep_id'),
                    $this->input->post('vehicle_model'),
                    $this->input->post('vehicle_make'),
                    $this->input->post('vehicle_chasisnum'),
                    $this->input->post('vehicle_engine_num') ,
                    $staff_id
                  //  $date_modified,
                  //  $modified_by,
               
                    ))
                    {
                        $this->session->set_flashdata('message',"Staff Member Details Updated!!");
                        redirect("staff/staff_records/{$staff_id}");
                       // $this->load->view('staff/staff_records_view',['data'=> $data]);
                       // redirect("staff/staff_records_view/{$staff_id}");
                    }


            }


    }


    public function insert_rate_submit()
    {
      
        if(isset($_SESSION['user_id']) && $_SESSION['role_id'] == 4 ) { // admin access removed to this page|| only account staff members should have access
            redirect('admin/dashboard');
       }
        
        $this->form_validation->set_rules('rate_name','Rates','required' ); //change from rate_id
        $this->form_validation->set_rules('rate_value','Rate Value','required' );
       
        if($this->form_validation->run() == FALSE)
        {   
            
          //  $rates = $this->staff_model-> get_enum_values('rates','rate_value');
           // testarray($rates);
        
            $this->load->view('update_rates');
        }
        else
        {

        
                        
            if($this->staff_model->insert_new_rate( $this->input->post('rate_value'),$this->input->post('rate_name'))){

                    $this->session->set_flashdata('success_message','Rate Added Successfully Added');
                    redirect("staff/staff_information");
                }
               
                else{
                    
                    
                    $this->session->set_flashdata('fail_message','Possible Database Error Contact the Administrator');
                    redirect("staff/staff_information");
                
                }
                    
                          
            }
        
    }


    public function certifier_record($staff_payment_id,$staff_id)
    {

       // echo $staff_id; die();

        $data = $this->staff_model->getCertifierEmail();

       // testarray($data);

        //$this->load->view('certifier_view',['data'=>$data] );

        date_default_timezone_set('America/Bogota');
			$this->form_validation->set_rules('certifier_email','Certifier Email','required');
	
			if($this->form_validation->run() === FALSE)
			{
				 $this->load->view('certifier_view',['data'=>$data] );
			}
			else
			{			
				//$myconfig['mailtype'] = 'html';
				//$this->load->library('email', $myconfig);
				//$this->email->set_newline( '\r\n' );
				$this->load->model('user_model');
				//use this line to find if the email address entered corresponds to an account in the system.
				$emp = $data;
	
				if(empty($emp) || $emp == array())
				{
					$data['message'] = 'No such user exists';
					$this->load->view('certifier_view', $data);
				}
				else
				{
					 $c_email = md5($this->input->post('certifier_email'));


	                $this->staff_model->saveCertifying($c_email,$staff_payment_id);

					//save the request in the database
					//if($this->staff_model->saveCertifierEmail( $this->input->post('certifier_email')))
					//{
                        
						$link = '<a href="'.base_url('staff/certified_page').'/'.$c_email.'">Certification Needed </a>';
			
						$config['mailtype'] = 'html';
						$config['protocol'] = 'smtp';
						$config['smtp_host'] = 'secure.emailsrvr.com';
						$config['smtp_port'] = '465';
						$config['smtp_user'] =  'testy@cad.gov.jm'; //'webadmin@cad.gov.jm';
						$config['smtp_pass'] = 'f*2g}fdQ324xgeBU';//'769jdYNDD9nzbJciKhmSMHZ8X4qeVXWi$8!'; //'z&IkVgc@7v9pY0VscxyB';//'P7Umw9e#4H&q'; 
						$config['smtp_crypto'] = 'ssl';
						$config['smtp_timeout'] = '20';
						$config['charset'] = 'iso-8859-1';		
	
						$this->email->initialize($config);
						
						// Set Email Variables
						$from_name = 'System Administrator';
						$from_emailaddress = 'webmaster@cad.gov.jm'; 
						$to = trim($this->input->post('certifier_email')); 
						$subject = "Certification Needed";
	
						 $message = 'Good day,<br/><br/>'
						.'Please click the link to see the payment records to certiy <br/><br/>';
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
						{           // this need to be updated
							 $data['message'] = 'Record sent for Certification.';
                             $data['staff_id'] = $staff_id;
                             $data['email_sent_page'] = 1;
                             //testarray(($data['staff_id']));
                           $date_created = date("Y-m-d h:i:sa",time());
                           $this->staff_model->saveCertifierByEmail($c_email,$date_created, $staff_payment_id);
							$this->load->view('email_sent', $data);

                            //echo 'Record sent for certification'; 
                           
						}					
						else
						{
							$data['message'] = 'Possible database error. Please try again.';
							$this->load->view('forgotPassword', $data);
						}
					//}



          }
        }
     }  

     public function authorize_records ($staff_payment_id,$staff_id)
     {

        $data = $this->staff_model->getAuthorizerEmail(); // function to retrieve Authorizer email from DB

        // testarray($data);
 
         //$this->load->view('certifier_view',['data'=>$data] );
 
         date_default_timezone_set('America/Bogota');
             $this->form_validation->set_rules('authorizer_email','Authorizer Email','required');
     
             if($this->form_validation->run() === FALSE)
             {
                  $this->load->view('authorizer_view',['data'=>$data] );
             }
             else
             {			
                 //$myconfig['mailtype'] = 'html';
                 //$this->load->library('email', $myconfig);
                 //$this->email->set_newline( '\r\n' );
                 $this->load->model('user_model');
                 //use this line to find if the email address entered corresponds to an account in the system.
                 $emp = $data;
     
                 if(empty($emp) || $emp == array())
                 {
                     $data['message'] = 'No such user exists';
                     $this->load->view('authorizer_view', $data);
                 }
                 else
                 {
                      $c_email = md5($this->input->post('authorizer_email'));
 
 
                     $this->staff_model->saveAuthorizer($c_email,$staff_payment_id);
 
                     //save the request in the database
                     //if($this->staff_model->saveCertifierEmail( $this->input->post('certifier_email')))
                     //{
                         
                         $link = '<a href="'.base_url('staff/authorized_page').'/'.$c_email.'">Authorization Needed </a>';
             
                         $config['mailtype'] = 'html';
                         $config['protocol'] = 'smtp';
                         $config['smtp_host'] = 'secure.emailsrvr.com';
                         $config['smtp_port'] = '465';
                         $config['smtp_user'] =  'testy@cad.gov.jm';//'webadmin@cad.gov.jm';
                         $config['smtp_pass'] =  'f*2g}fdQ324xgeBU'; //'769jdYNDD9nzbJciKhmSMHZ8X4qeVXWi$8!';//'ZWBDng*eL86Ys3v'; //'z&IkVgc@7v9pY0VscxyB';//'P7Umw9e#4H&q'; 
                         $config['smtp_crypto'] = 'ssl';
                         $config['smtp_timeout'] = '20';
                         $config['charset'] = 'iso-8859-1';		
     
                         $this->email->initialize($config);
                         
                         // Set Email Variables
                         $from_name = 'System Administrator';
                         $from_emailaddress = 'webmaster@cad.gov.jm'; 
                         $to = trim($this->input->post('authorizer_email')); 
                         $subject = "Certification Needed";
     
                          $message = 'Good day,<br/><br/>'
                         .'Please click the link to see the payment records to Authorize <br/><br/>';
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
                         {           // this need to be updated
                              $data['message'] = 'Please access your email to reset your password.';
                              $data['staff_id'] = $staff_id;
                              $data['email_sent_page'] = 2;
                              $date_created = date("Y-m-d h:i:sa",time());
                           $this->staff_model->saveAuthorizerByEmail($c_email,$date_created, $staff_payment_id);
                             $this->load->view('email_sent', $data);
                         }					
                         else
                         {
                             $data['message'] = 'Possible database error. Please try again.';
                             $this->load->view('forgotPassword', $data);
                         }

                    }
                }


     }

     public function certified_page()
     {
        
         if(isset($_SESSION['role_id']) && $_SESSION['role_id']==2 )
          {
            $c_email = $_SESSION['email'];
         //  
            $data = $this->staff_model->getCertifierRecords( md5($c_email ));
            $this->load->view('certified_view',['data'=>$data] );
           
          }else

          {
            $_SESSION['redirect_url'] =  uri_string(); // gets url from the certified project
            $this->load->view('login');
          }
         

           
     }

     public function authorized_page()
     {
        
         if(isset($_SESSION['role_id']) && $_SESSION['role_id']==3 )
          {
            $c_email = $_SESSION['email'];
         //  
            $data = $this->staff_model->getAuthorizedRecords( md5($c_email ));
            $this->load->view('authorized_page',['data'=>$data] );
           
          }else

          {
            $_SESSION['redirect_url'] =  uri_string(); // gets url from the certified project
            $this->load->view('login');
          }
         

           
     }


     public function authorize_payments ($voucher_number ) 
     {

        //echo $voucher_number , $firstname , $lastname;

        

        $this->load->view('payment_authorized', ['voucher_number' =>  $voucher_number] );


     }


    





}










