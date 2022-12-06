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

      public function get_officer_type()
    {
        $officer = $this->db->get('officer_type');
        
        if($officer->num_rows()>0)
        {
            return $officer->result();
        }
      }

      public function get_upkeep_type()
      {
          $typeofUpkeep = $this->db->get('upkeep_type');
          
          if($typeofUpkeep->num_rows()>0)
          {
              return $typeofUpkeep->result();
          }
        }

      public function getStaffMembers(){

        $query = "SELECT * FROM staff s inner join location l on s.location_id=l.location_id ";
        return $this->db->query($query)->result_array();

      }

      public function getOfficerType(){
        $query = " SELECT typeof_officer FROM staff";
        return $this->db->query($query)->result_array();
      }

/*
      public function getStaffIDbyTRN($trn)
      {
        $query = "SELECT * FROM staff s INNER JOIN location l WHERE s.location_id=l.location_id and trn=?"; // test with OR firstname/lastname
        return $this->db->query($query, array($trn))->first_row('array');
      }
      */

      public function getStaffIDbyTRN($trn){

        $query = "SELECT * FROM staff
        INNER JOIN location ON staff.location_id = location.location_id
        INNER JOIN upkeep_type ON upkeep_type.upkeep_id = staff.upkeep_id
        INNER JOIN officer_type ON officer_type.officer_id = staff.officer_id
        WHERE trn=?  ";
        return $this->db->query($query, array($trn))->first_row('array'); 
      }

      public function add_staffPayment($data)
      {
        return $this->db->insert('staff_payment',$data); // inserting data into users table
      }

      public function getStaff()
      {
        $query = "SELECT * from staff order by staff_id desc ";
            return $this->db->query($query)->result_array();

      }

     public function getMonths(){

      $query = "SELECT month_travelled from staff_payment";
      return $this->db->query($query)->result_array();

     }

     function get_enum_values( $table, $field )
{
    $type = $this->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
    $enum = explode("','", $matches[1]);
    return $enum;
}



      /*
       // WHERE trn= '". $entry ."' OR firstname= '". $entry ."' OR lastname= '". $entry ."'";
         //return $this->db->query($query)->result_array();

      $this->db->select(['staff.staff_id','staff.location_id','staff.firstname',
    'staff.lastname','staff.post_title','staff.trn','staff.vehicle_model']);
    $this->db->from('staff');
    $this->db->join('location','location.location_id = staff.location_id');
    $this->db->where(['staff.trn'=>$trn]);
    $x = $this->db->get();
    return $x->row();
  }
  */



}