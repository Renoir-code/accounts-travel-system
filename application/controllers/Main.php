<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* if (!isset($_SESSION['user_id'])) 
{
  echo 'Please <a href ="#">log in</a> first to see this page.';
  die();
} */
class Main extends MY_Controller {

    public function __construct()
    {
        ob_start();
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('staff_model');		
        //session_start();
		
        $this->user_model->isUserLoggedIn();
        date_default_timezone_set('America/Bogota');
    }    

    public function index()
    {

        $this->load->view('main_dashboard');





    }



}