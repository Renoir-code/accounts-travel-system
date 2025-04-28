<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 


class Bail extends MY_Controller {
 

    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('bail_model');
        $this->load->model('report_model');
        $this->load->model('staff_model');
    }

    public function bail_create()
    {
    
        $this->load->model('staff_model');
        $location = $this->staff_model->get_locations();
     
        $this->load->view('bail_page',['location'=>$location]);

    }



    public function bail_submit(){ //somethign

        $this->form_validation->set_rules('date_received','Date Received','required');
        $this->form_validation->set_rules('date_processed','Date Processed','');
        $this->form_validation->set_rules('first_name','First Name','required|trim|alpha');
        $this->form_validation->set_rules('last_name','Last Name','required|trim|alpha');
        $this->form_validation->set_rules('amount_paid','Amount Paid','numeric');
        $this->form_validation->set_rules('trn','Tax Registration Number','required|trim|numeric|exact_length[9]');
        $this->form_validation->set_rules('location_id','Location','required');
        $this->form_validation->set_rules('reason_returned','Reason Returned','');
        $this->form_validation->set_rules('returned','Returned','');
  
        $location = $this->staff_model->get_locations();

        if($this->form_validation->run() == FALSE){

            //$this->session->set_flashdata('fail_message','Bail Data not sent');
            $this->load->view('bail_page',['location' => $location]);

        }
        else{ 
           
            
            if($this->bail_model->insert_bail(

                $this->input->post('date_received'),
                $this->input->post('date_processed'),
                $this->input->post('first_name'),
                $this->input->post('last_name'),
                $this->input->post('amount_paid'),
                $this->input->post('trn'),
                $this->input->post('location_id'),
                $this->input->post('reason_returned'),
                $this->input->post('returned')
            ))


            {
                $this->session->set_flashdata('message',"Bail Record Inserted");
                redirect("bail/bail_information");
            }


        }
    }


    public function bail_report(){
        $this->load->model('bail_model');
        $location = $this->staff_model->get_locations();
        
        $this->load->view('bail_report',['location'=>$location]);
    }

    public function bail_report_submit(){

        
      
        $date = $this->input->post('monthly_change');
		$location_id = $this->input->post('location_id');
        //testarray($date);

        $this->form_validation->set_rules('monthly_change','Choose Month','required');
		$this->form_validation->set_rules('location_id','Location','required');

    

        if($this->form_validation->run() == FALSE){
			
           // $staff_members = $this->staff_model->getStaffMembers();	
            $this->session->set_flashdata('message','Please Enter All Fields');	
            $this->load->view('bail_report',['data' => array($date,$location_id)]);
            }else
            {
                $data = $this->bail_model->count_bail($location_id,$date);
                $return_count = $this->bail_model->countReturns($location_id,$date);
              // testarray($return_count);
                $this->load->view('bail_count',['data' => $data, 'month'=>array($date) , 'return_count' => $return_count]);
            
            }
    }

    public function bail_information()
    {
      /* 
	   if(isset($_SESSION['user_id']) && $_SESSION['role_id'] == 6 ) { // admin access removed to this page|| only account staff members should have access
            redirect('admin/dashboard');
       }
        
		if(isset($_POST['trn'])){
		$trn = $this->input->post('trn');
        $trn_records = $this->staff_model->getStaffIDbyTRN($trn );
        $this->load->view('staff_dashboard',['trn_records' => $trn_records]);
		}else{
		//load default view for user */
		//$this->view_all_payment_records( $_SESSION['role_id'], 1 );
		$all_bail_records=$this->bail_model->getAllBailRecords();
        
        $this->load->view('bail_dashboard',['bail_records' => $all_bail_records]);
		
		}


        public function modify_bail_information($bail_id){

            $data = $this->bail_model->getAllBailRecordsbyTRN($bail_id);
            $location = $this->staff_model->get_locations();
           $this->load->view('bail_update',['data' => $data , 'location' => $location ] );


        }

        public function update_bail_information($bail_id){
           // var_dump($bail_id);die();

            $this->form_validation->set_rules('date_received','Date Received','');
            $this->form_validation->set_rules('date_processed','Date Processed','');
            $this->form_validation->set_rules('first_name','First Name','alpha');
            $this->form_validation->set_rules('last_name','Last Name','');
            $this->form_validation->set_rules('amount_paid','Amount Paid','');
            $this->form_validation->set_rules('trn','Tax Registration Number','');
            $this->form_validation->set_rules('location_id','Location','');
            $this->form_validation->set_rules('reason_returned','Reason Returned','');
            $this->form_validation->set_rules('returned','Returned','');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            $data = $this->bail_model->getAllBailRecordsbyTRN($bail_id);
        /*      $test = $this->input->post('date_upkeep_started');
           testarray($test);  */

            if($this->form_validation->run() == FALSE)
            {  
                //echo 'fail'; die();
                $this->load->view('bail_update',['data'=> $data]);
            }

            else
            {
                //echo 'success';die();
             
               /*  date_default_timezone_set('America/Bogota');
                $date_modified = date("Y-m-d h:i:sa",time());
                $modified_by = $this->user_model->getCurrentUsername($_SESSION['user_id']); */

              //  testarray(                      $bail_id        );

                if($this->bail_model->update_bailDetails(
              
                    $this->input->post('date_received'),
                    $this->input->post('date_processed'),
                    $this->input->post('first_name'),
                    $this->input->post('last_name'),
                    $this->input->post('amount_paid'),
                    $this->input->post('trn'),                 
                    $this->input->post('location_id'),
                    $this->input->post('reason_returned'),        
                    $this->input->post('returned'),  
                    $bail_id                                   
                    ))
                   
                    {
                       // echo 'success';die();
                        $this->session->set_flashdata('success_update',"Bail Details Updated");
						redirect("bail/bail_information");
                    }


            }


        }
		
    }





