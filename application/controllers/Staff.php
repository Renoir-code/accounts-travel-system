<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {


    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('staff_model');
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
            $this->form_validation->set_rules('trn','TRN','required|trim|numeric|exact_length[9]');
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

    public function search_staff()
    {    
        $this->load->view('search_staff');
    }

    public function staff_information()
    {
        $trn = $this->input->post('trn');
        $trn_records = $this->staff_model->getStaffIDbyTRN($trn);
        //testarray( $trn_records);
        $this->load->view('staff_dashboard',['trn_records' => $trn_records]);
    }


    public function staff_payment_view($staff_id)
    {
       // testarray($staff_id);
      //$staff_trn = $this->staff_model->getStaffIDbyTRN($trn);
     //testarray($staff_trn);
                
            
            $this->load->view('staff_payment',$staff_id);
            // send this to staff_payment table
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

          //  $staffMember = $trn_records;
        
            if($this->form_validation->run())
            {       
                $data = [
                    'staff_id'          => $$staff_id,
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


        
    }


    public function test(){


    }













}

