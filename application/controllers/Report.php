<?php
defined('BASEPATH') OR exit('No direct script access allowed');






class Report extends MY_Controller {


    function __construct() 
    {
        parent::__construct();
        $this->load->model('staff_model');
        $this->load->model('user_model');
        $this->load->model('report_model');
    
	//if user is not logged in unset session variables and load login screen	 
if (!isset($_SESSION['user_id'])) 
{
  session_unset(); 
  $this->load->view('login');
  exit();
}

//if user has not done any action in 20 minutes, unset session variables and load login screen 
$current_time = time();
$time_since_last_action = (time() - $_SESSION['timeout']) / 60;
if($time_since_last_action > 45 ){
 session_unset();
$this->session->set_flashdata('timeout','Session timed out.'); 
$this->load->view('login');
}else{
$_SESSION['timeout'] = time();
}	
	
	
	
	}  


    public function chooseReport (){
        //get staff members
		$staff_members = $this->staff_model->getStaffMembers();
		
		
		$this->load->view('choose_month_change',['staff'=>$staff_members]);
    }
    

    public function changesReport ()
    {
        $date = $this->input->post('monthly_change');
		$location_id = $this->input->post('location_id');
		
		$this->form_validation->set_rules('monthly_change','Choose Month','required');
		$this->form_validation->set_rules('location_id','Location','required');
		
		if($this->form_validation->run() == FALSE){
			
		$staff_members = $this->staff_model->getStaffMembers();	
		$this->session->set_flashdata('message','Please Enter All Fields');	
        
        $this->load->view('choose_month_change',['data' => array($date,$location_id),'staff'=>$staff_members]);
		}else
		{
			$data = $this->report_model->change_reports($date,$location_id);
			$this->load->view('report_view',['data' => $data, 'month'=>array($date)]);
		//$this->session->set_flashdata('message','Please Enter All Fields');
		
		}
        
    }

    public function generalReport()
    {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');

		$staff_members = $this->input->post('staff_member_report');

        $this->form_validation->set_rules('date_from','Choose Start Date','');
		$this->form_validation->set_rules('date_to','Choose End Date','');
        $this->form_validation->set_rules('staff_member_report[]','Staff','required');
       

        if($this->form_validation->run() == FALSE){
        //testarray($data);
        $staff_members = $this->staff_model->getStaffMembers();
		$this->session->set_flashdata('message','Please Enter All Fields');	
		$this->load->view('choose_month_change',['data' => array($date_from,$date_to),'staff'=>$staff_members]);
		}else
		
        {  
			$data = $this->report_model->getReport( $date_from,$date_to,$staff_members);

			$this->load->view('test',['data' => $data, 'month'=>array($date_from,$date_to)]);

		
		
		}



    }


    
    
    


}



















?>