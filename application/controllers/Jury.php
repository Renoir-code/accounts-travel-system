<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 


class Jury extends MY_Controller {
 

    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('jury_model');
        $this->load->model('report_model');
        $this->load->model('staff_model');
    }

    public function jury_create()
    {
    
        $this->load->model('jury_model');
        $location = $this->staff_model->get_locations(); // gets location from staff model
        $jury_rate = $this->jury_model->getRates('daily_rate');  

        //testarray($jury_rate);
     
        $this->load->view('jury_page',['location'=>$location,'jury_rate'=>$jury_rate]);
    }


    public function jury_submit()  
    { 

        $this->form_validation->set_rules('date_received','Date Received','required');
        $this->form_validation->set_rules('first_name','First Name','required|trim|alpha');
        $this->form_validation->set_rules('last_name','Last Name','required|trim|alpha');
        $this->form_validation->set_rules('trn','Tax Registration Number','required|trim|numeric|exact_length[9]');
        $this->form_validation->set_rules('days_worked','Days Worked','required|trim|numeric');
        $this->form_validation->set_rules('dates_worked','Dates Worked','');
        $this->form_validation->set_rules('rate_paid','Rate Paid','required');
        $this->form_validation->set_rules('location_id','Location','required');
        $this->form_validation->set_rules('comments','General Comments','trim');
        $this->form_validation->set_rules('reason_returned','Reason Returned','trim');
  
        $location = $this->staff_model->get_locations();
      $jury_rate = $this->jury_model->getRates('daily_rate'); 

        //testarray($this->input->post('dates_worked'));

        if($this->form_validation->run() == FALSE){
//semd back the rate paid as well to the view
           // $this->session->set_flashdata('fail_message','Jury Data not sent');
            $this->load->view('jury_page',['location' => $location,'jury_rate'=>$jury_rate]);

        }
        else{ 
           
           // testarray($this->input->post('dates_worked'));
            if($this->jury_model->insert_jury(

                $this->input->post('date_received'),
                $this->input->post('first_name'),
                $this->input->post('last_name'),
                $this->input->post('trn'),
                $this->input->post('days_worked'),
                $this->input->post('rate_paid'),
                $this->input->post('location_id'),
                $this->input->post('comments'),
                $this->input->post('dates_worked'),
                $this->input->post('reason_returned')
            ))

               // echo 'success';die();
            {
                //echo 'success';die();
                $this->session->set_flashdata('message',"Jury Record Inserted");
                redirect("jury/jury_information");
            }


        }
    }


    public function jury_information()
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
		$all_jury_records=$this->jury_model->getAllJuryRecords();
       // testarray($all_jury_records);
        
        $this->load->view('jury_dashboard',['jury_records' => $all_jury_records]);
		
		}

        public function update_jury_information($jury_id){
            // var_dump($bail_id);die();
 
             $this->form_validation->set_rules('date_received','Date Received','required');
             $this->form_validation->set_rules('first_name','First Name','trim|alpha');
             $this->form_validation->set_rules('last_name','Last Name','trim|alpha');
             $this->form_validation->set_rules('trn','TRN','required|trim|numeric|exact_length[9]');
             $this->form_validation->set_rules('days_worked','Days Worked','');
             $this->form_validation->set_rules('rate_paid','Rate Paid','required');
             $this->form_validation->set_rules('location_id','Location','required');
             $this->form_validation->set_rules('comments','Comments','');
             $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
 
             $data = $this->jury_model->getAllJuryRecordsbyID($jury_id);
             $jury_rate = $this->jury_model->getRates('daily_rate');  
         /*      $test = $this->input->post('date_upkeep_started');
            testarray($test);  */
 
             if($this->form_validation->run() == FALSE)
             {  
                 //echo 'fail'; die();
                 $this->load->view('jury_update',['data'=> $data,'jury_rate'=>$jury_rate]);
             }
 
             else
             {
 
                 if($this->jury_model->update_juryDetails(
               
                     $this->input->post('date_received'),
                     $this->input->post('first_name'),
                     $this->input->post('last_name'),
                     $this->input->post('trn'),
                     $this->input->post('days_worked'),                 
                     $this->input->post('rate_paid'),
                     $this->input->post('location_id'),        
                     $this->input->post('comments'),  
                     $jury_id                                   
                     ))
                    
                     {
                        // echo 'success';die();
                         $this->session->set_flashdata('success_update',"Jury Details Updated");
                         redirect("jury/jury_information");
                     }
 
 
             }
         }


         public function jury_report(){
            $this->load->model('jury_model');
            $location = $this->staff_model->get_locations();
            
            $this->load->view('jury_report',['location'=>$location]);
        }


        public function jury_report_submit(){

        
      
            $date = $this->input->post('monthly_change');
            $location_id = $this->input->post('location_id');
            //testarray($date);
    
            $this->form_validation->set_rules('monthly_change','Choose Month','required');
            $this->form_validation->set_rules('location_id','Location','required');
    
        
    
            if($this->form_validation->run() == FALSE){
                
               // $staff_members = $this->staff_model->getStaffMembers();	
                $this->session->set_flashdata('message','Please Enter All Fields');	
                $this->load->view('jury_report',['data' => array($date,$location_id)]);
                }else
                {
                    $data = $this->jury_model->count_jury($location_id,$date);
                  // testarray($data);
                    $this->load->view('jury_count',['data' => $data, 'month'=>array($date)]);
                
                }
        }

       /*  public function updateTRN($jury_id){
            $data = $this->jury_model->getAllJuryRecordsbyID($jury_id);

            echo "SUCCESS::".$data['trn'];
        } */
    }

    ?>