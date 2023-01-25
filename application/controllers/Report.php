<?php
defined('BASEPATH') OR exit('No direct script access allowed');






class Report extends MY_Controller {


    function __construct() 
    {
        parent::__construct();
        $this->load->model('staff_model');
        $this->load->model('user_model');
        $this->load->model('report_model');
    }  


    public function chooseReport (){
        $this->load->view('choose_month_change');
    }
    

    public function changesReport ()
    {
        $date = $this->input->post('monthly_change');
		$location_id = $this->input->post('location_id');
        $data = $this->report_model->change_reports($date,$location_id);
        //testarray($data);
        $this->load->view('report_view',['data' => $data]);
       

     

       

    }
  
    
    


}



















?>