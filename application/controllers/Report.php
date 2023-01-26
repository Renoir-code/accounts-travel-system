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
        $this->load->view('choose_month_change');
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
  
    
    


}



















?>