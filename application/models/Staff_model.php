<?php

class Staff_model extends CI_Model{

    
    public function register_officer($officerDetails)
    {
        return $this->db->insert('staff',$officerDetails);
    }


      public function get_locations()
    {
        $location = $this->db->get('location');
        
        if($location->num_rows()>0)
        {
            return $location->result();
        }
      }




}