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

      public function getStaffMembers()
      {
        $query = "SELECT * FROM staff s inner join location l on s.location_id=l.location_id ";
        return $this->db->query($query)->result_array();
      }

      public function getOfficerType()
      {
        $query = " SELECT typeof_officer FROM staff";
        return $this->db->query($query)->result_array();
      }


      public function getStaffIDbyTRN($trn)
      {

        $query = "SELECT * FROM staff
        INNER JOIN location ON staff.location_id = location.location_id
        INNER JOIN upkeep_type ON upkeep_type.upkeep_id = staff.upkeep_id
        INNER JOIN officer_type ON officer_type.officer_id = staff.officer_id
        WHERE trn=?  ";
        return $this->db->query($query, array($trn))->first_row('array'); 
      }

      
      public function getStaff()
      {
        $query = "SELECT * from staff order by staff_id desc ";
            return $this->db->query($query)->result_array();

      }

     public function getMonths()
     {
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

    function get_years( $table, $field )
    {
      $type = $this->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
      preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
      $enum = explode("','", $matches[1]);
      return $enum;
    }

    public function insert_staffPayment($staff_id,$voucher_number,$year_travelled,$month_travelled,$mileage_km,$passenger_km,$toll_amt,$subsistence_km,$supper_days,$refreshment_days,$taxi_out_town,$taxi_in_town,$certifier_remarks,$added_by,$date_created)
    {
      $query = "
      INSERT INTO staff_payment
      (staff_id,voucher_number,year_travelled,month_travelled,mileage_km,passenger_km,toll_amt,
      subsistence_km,supper_days,refreshment_days,taxi_out_town,taxi_in_town,certifier_remarks,added_by,date_created)
      VALUES
       (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      if($this->db->query($query,array($staff_id,$voucher_number,$year_travelled,$month_travelled,$mileage_km,$passenger_km,$toll_amt,$subsistence_km,$supper_days,$refreshment_days,$taxi_out_town,$taxi_in_town,$certifier_remarks,$added_by,$date_created)))
       return true;
       else
       return false;
    }

    public function getPaymentRecords($staff_id)
    {
       $query = " SELECT * FROM staff_payment    WHERE staff_id=? order by date_modified desc";
               
        return $this->db->query($query, array($staff_id))->result_array(); 

    }

    public function getinserted_paymentRecords($staff_payment_id)
    {
       $query = " SELECT * FROM staff_payment    WHERE staff_payment_id=? order by date_modified ";
               
        return $this->db->query($query, array($staff_payment_id))->first_row('array');

    }

    public function update_staffPayment($voucher_number,$year_travelled,$month_travelled,$mileage_km,$passenger_km,$toll_amt,
    $subsistence_km,$supper_days,$refreshment_days,$taxi_out_town,$taxi_in_town,$certifier_remarks, $date_modified, $modified_by,$staff_payment_id)
    {
      $query = "UPDATE `staff_payment` "
					          . " SET `voucher_number`=?, "
                    . "`year_travelled`=?, "
                    . "`month_travelled`=?, "
                    . "`mileage_km`=?, "                     
                    . "`passenger_km`=?, "
					          . "`toll_amt`=?, "
                    . "`subsistence_km`=?, "                 
                    . "`supper_days`=?, "
                    . "`refreshment_days`=?, "
                    . "`taxi_out_town`=?, "
                    . "`taxi_in_town`=?, "
                    . "`certifier_remarks`=?, "
                    . "`date_modified`=?, "
                    . "`modified_by`=? "
                    . " WHERE staff_payment_id=?";
            
        
            if($this->db->query($query,array($voucher_number,$year_travelled,$month_travelled,$mileage_km,$passenger_km,$toll_amt,
            $subsistence_km,$supper_days,$refreshment_days,$taxi_out_town,$taxi_in_town,$certifier_remarks, $date_modified, $modified_by,$staff_payment_id)))
                return true;
                
            return false;
    }






}