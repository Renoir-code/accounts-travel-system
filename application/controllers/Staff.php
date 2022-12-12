<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

            $this->form_validation->set_rules('firstname','First Name','required|trim|alpha');
            $this->form_validation->set_rules('lastname','Last Name','required|trim|alpha' );
            $this->form_validation->set_rules('post_title','Post Title','required');
            $this->form_validation->set_rules('trn','TRN','required|trim|numeric|exact_length[9]|callback_checkTRN');
            $this->form_validation->set_rules('officer_id','Type of Officer','required'); // Should be dropdown
            $this->form_validation->set_rules('location_id','Location','required');
            $this->form_validation->set_rules('upkeep_id','Type of Upkeep','required'); // 
            $this->form_validation->set_rules('vehicle_model','Vehicle Model'); // veh
            $this->form_validation->set_rules('vehicle_make','Vehicle Model');
            $this->form_validation->set_rules('vehicle_chasisnum','Vehicle Chasis Number','numeric');
            $this->form_validation->set_rules('vehicle_engine_num','Vehicle Engine Number','numeric');
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
                    return redirect('admin/dashboard');
                }
                else
                {
                    
                    return redirect('welcome/login');
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

    public function search_staff()
    {    
        $this->load->view('search_staff');
    }

    public function staff_information()
    {
        $trn = $this->input->post('trn');
  
        $trn_records = $this->staff_model->getStaffIDbyTRN($trn );
        //testarray( $trn_records);
        $this->load->view('staff_dashboard',['trn_records' => $trn_records]);
    }


   /* public function test(){

        $months = $this->staff_model-> get_enum_values('staff_payment','month_travelled');
        $this->load->view('staff_payment',['months' => $months],);
    }
*/

/*
    public function staff_payment_submit()
    {
    //   $display =  $_GET['staff_id'];
        
         
            $this->form_validation->set_rules('voucher_number','Voucher Number','required');
            $this->form_validation->set_rules('year_travelled','Year Travelled','required' );
            $this->form_validation->set_rules('month_travelled','Month Travelled','required');
            $this->form_validation->set_rules('mileage_km','Mileage','required');
            $this->form_validation->set_rules('passenger_km','Passenger Km','required'); // Should be dropdown
            $this->form_validation->set_rules('toll_amt','Toll Amount','required');
            $this->form_validation->set_rules('subsistence_km','Subsistence Km','required'); // 
            $this->form_validation->set_rules('supper_days','Supper Days','required'); // veh
            $this->form_validation->set_rules('refreshment_days','Refreshment Days','required');
            $this->form_validation->set_rules('taxi_out_town','Taxi Out of Town','required');
            $this->form_validation->set_rules('taxi_in_town','Taxi In Town','required');
            $this->form_validation->set_rules('certifier_remarks','Certifier Remarks','required');

          
        
            if($this->form_validation->run())
            {       
                $data = [
                    'staff_id'          => $this->input->post('staff_id'),
                    'firstname'          => $this->input->post('firstname'),
                    'lastname'          => $this->input->post('lastname'),                  
                    'voucher_number'    => $this->input->post('voucher_number'),
                    'year_travalled'    => $this->input->post('year_travelled'),
                    'month_travelled'   => $this->input->post('month_travelled'),
                    'mileage_km'        => $this->input->post('mileage_km'),
                    'passenger_km'      => $this->input->post('passenger_km'),
                    'toll_amt'          => $this->input->post('toll_amt'),
                    'subsistence_km'    => $this->input->post('subsistence_km'),
                    'supper_days'       => $this->input->post('supper_days'),
                    'refreshment_days'  => $this->input->post('refreshment_days'),
                    'taxi_out_town'     => $this->input->post('taxi_out_town'),
                    'taxi_in_town'      => $this->input->post('taxi_in_town'),
                    'certifier_remarks' => $this->input->post('certifier_remarks')
                ];
               
        
            $success = $this->staff_model->add_staffPayment($data);

            if($success == True)
            {
                $this->session->set_flashdata('message','Payment Successfully Added');
                return redirect("main/index"); // return to main dashboard for staff members
            }
            else
            {
                $this->session->set_flashdata('message','Payment Not Added');
                return redirect("main/index");
            }
          
        } 
        else      
        { 
            $fname =$this->input->post('firstname');
            $staff =$this->input->post('staff_id');
            $lname =$this->input->post('lastname');
            $currentMonth =$this->input->post('month_travelled');
            $currentYear =$this->input->post('year_travalled');
            $months = $this->staff_model-> get_enum_values('staff_payment','month_travelled');
            $years = $this->staff_model-> get_enum_values('staff_payment','year_travelled');
            $this->load->view('staff_payment',['months' => $months,'years'=>$years, 'fname' => $fname, 'staff' => $staff, 'lname' => $lname ,'currentMonth' => $currentMonth ,'currentYear'=>$currentYear ]);
        }
    }
    */

         public function staff_payment_submit($staff_id)
        {
            //echo $staff_id;

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
                $this->load->view('staff_payment',['months' => $months,'years'=>$years, 'fname' => $fname, 'staff' => $staff, 'lname' => $lname ,'currentMonth' => $currentMonth ,'currentYear'=>$currentYear ]);
            }
            else
            {
                   
                date_default_timezone_set('America/Bogota');
                $date_created = date("Y-m-d h:i:sa",time());
                $added_by = $this->user_model->getCurrentUsername($_SESSION['user_id']);
           

                if($this->staff_model->insert_staffPayment(

                    $this->input->post('staff_id'),
                    $this->input->post('voucher_number'),
                    $this->input->post('year_travelled'),
                    $this->input->post('month_travelled'),
                    $this->input->post('mileage_km'),
                    $this->input->post('passenger_km'),
                    $this->input->post('toll_amt'),
                    $this->input->post('subsistence_km'),
                    $this->input->post('actual_expense'),
                    $this->input->post('supper_days'),
                    $this->input->post('refreshment_days'),
                    $this->input->post('taxi_out_town'),
                    $this->input->post('taxi_in_town'),
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
       //testarray($staff_name);
        $this->load->view('payment_list_view',['data'=>$data ,'payment_records'=> $payment_records , 'staff_name' => $staff_name ] );

    }

    public function modify_payment_records($staff_payment_id)
    {
        $data = $this->staff_model->getinserted_paymentRecords($staff_payment_id);
        $months = $this->staff_model-> get_enum_values('staff_payment','month_travelled');
        $years = $this->staff_model-> get_enum_values('staff_payment','year_travelled');
       //testarray($data);
       $this->load->view('modify_payment_view',['data' => $data , 'months' => $months , 'years' =>$years] );
      
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
                    $this->input->post('passenger_km'),
                    $this->input->post('toll_amt'),
                    $this->input->post('subsistence_km'),
                    $this->input->post('actual_expense'),
                    $this->input->post('supper_days'),
                    $this->input->post('refreshment_days'),
                    $this->input->post('taxi_out_town'),
                    $this->input->post('taxi_in_town'),
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





}










