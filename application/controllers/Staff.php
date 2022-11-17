<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {


    /*
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }    
    */



    public function staff_create(){
        $this->load->model('staff_model');
        $location = $this->staff_model->get_locations();
        $this->load->view('create_staff',['location'=>$location]);
      

    }

    public function staff_submit(){

            $this->form_validation->set_rules('firstname','First Name','required|trim|alpha');
            $this->form_validation->set_rules('lastname','Last Name','required|trim|alpha' );
            $this->form_validation->set_rules('post_title','Post Title','required');
            $this->form_validation->set_rules('trn','TRN','required|trim|numeric|exact_length[9]');
            $this->form_validation->set_rules('typeof_milage','Type of Mileage'); // Should be dropdown
            $this->form_validation->set_rules('location_id','Location','required');
            $this->form_validation->set_rules('typeof_upkeep','Type of Upkeep'); // 
            $this->form_validation->set_rules('vehicle_model','Vehicle Model'); // veh
            $this->form_validation->set_rules('vehicle_make','Vehicle Model');
            $this->form_validation->set_rules('vehicle_chasisnum','Vehicle Chasis Number','numeric');
            $this->form_validation->set_rules('vehicle_engine_num','Vehicle Engine Number','numeric');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if($this->form_validation->run())
        {
            $officerData = [
                
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'post_title' => $this->input->post('post_title'),
                'trn' => $this->input->post('trn'),
                'location_id' => $this->input->post('location_id'),
                'typeof_upkeep' => $this->input->post('typeof_upkeep'),
                'vehicle_model' => $this->input->post('vehicle_model'),
                'vehicle_make' => $this->input->post('vehicle_make'),
                'vehicle_chasisnum' => $this->input->post('vehicle_chasisnum'),
                'vehicle_engine_num' => $this->input->post('vehicle_engine_num')
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
}

