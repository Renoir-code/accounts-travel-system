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
			
			
		$this->session->set_flashdata('message','Please Enter All Fields');	
        //testarray($data);
        $this->load->view('choose_month_change',['data' => array($date,$location_id)]);
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
        $trn = $this->input->post('trn');
        $report_type = $this->input->post('report_type');

       //  $this->form_validation->set_rules('date_from','Choose Start Date','');
		//$this->form_validation->set_rules('date_to','Choose End Date','');
       /*  $this->form_validation->set_rules('trn','TRN Number','');
        $this->form_validation->set_rules('report_type','Report Type','');  */

        /*if($this->form_validation->run() == FALSE){
        //testarray($data);
        $this->load->view('choose_month_change',['data' => array($date_from,$date_to,$trn,$report_type)]);
		}else
		*/
        {  
			$data = $this->report_model->getReport($date_from,$date_to,$trn,$report_type);
            testarray($data);
			$this->load->view('report_view',['data' => $data, 'month'=>array($date_from,$date_to)]);
		
        */{  
        $data = $this->report_model->getReport($date_from,$date_to);
        // testarray($data);
        $this->load->view('test',['data' => $data, 'month'=>array($date_from,$date_to)]);	
		}



    }


    
    
    


}



















?>