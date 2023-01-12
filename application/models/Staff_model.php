<?php

class Staff_model extends CI_Model{

    
    public function register_officer($officerDetails)
    {
        return $this->db->insert('staff',$officerDetails);
    }

  public function checktrn($trn)
{
$this -> db -> select('trn');
$this -> db -> from('staff');
$this -> db -> where('trn', $trn);
$this -> db -> limit(1);

$query = $this -> db -> get();

if($query -> num_rows() == 1){
  return $query->result();
}
else{
  return false;
}
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
        WHERE trn = ? OR firstname LIKE ? OR lastname LIKE ? ";
        return $this->db->query($query, array($trn, $trn, $trn))->first_row('array'); 
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

    public function insert_staffPayment($staff_id,$voucher_number,$year_travelled,$month_travelled,$mileage_km,
    $mileage_rate,$passenger_km,$passenger_rate,$toll_amt,$subsistence_km,	$subsistence_rate,
    $actual_expense,$supper_days,$supper_rate,$refreshment_days,$refreshment_rate,$taxi_out_town,
    $taxi_out_rate,$taxi_in_town,$taxi_in_rate,$certifier_remarks,$added_by,$date_created)
    {
      $query = "
      INSERT INTO staff_payment
      (staff_id,voucher_number,year_travelled,month_travelled,mileage_km,mileage_rate,passenger_km,passenger_rate,toll_amt,subsistence_km,subsistence_rate,actual_expense,supper_days,supper_rate,refreshment_days,refreshment_rate,taxi_out_town,taxi_out_rate,taxi_in_town,taxi_in_rate,certifier_remarks,added_by,date_created)
      VALUES
       (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      if($this->db->query($query,array($staff_id,$voucher_number,$year_travelled,$month_travelled,$mileage_km,$mileage_rate,$passenger_km,$passenger_rate,$toll_amt,$subsistence_km,	$subsistence_rate,$actual_expense,$supper_days,$supper_rate,$refreshment_days,$refreshment_rate,$taxi_out_town,$taxi_out_rate,$taxi_in_town,$taxi_in_rate,$certifier_remarks,$added_by,$date_created)))
       return true;
       else
       return false;
    }

    public function getPaymentRecords($staff_id)
    {
       $query = " SELECT * FROM staff_payment    WHERE staff_id=? order by year_travelled desc , month_travelled ";
               
        return $this->db->query($query, array($staff_id))->result_array(); 

    }

    public function getAllPaymentRecords($e,$added_by)
    {
      ;
       //$query = " SELECT * FROM staff_payment    WHERE added_by=? order by year_travelled desc , month_travelled ";
         $query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
         INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
         WHERE staff_payment.".$e." = ? ORDER BY year_travelled desc , month_travelled";      
        return $this->db->query($query, array( $added_by))->result_array(); 

    }

    public function getinserted_paymentRecords($staff_payment_id)
    {
       $query = " SELECT * FROM staff_payment    WHERE staff_payment_id=? order by date_modified ";
               
        return $this->db->query($query, array($staff_payment_id))->first_row('array');

    }

    public function update_staffPayment($voucher_number,$year_travelled,$month_travelled,$mileage_km,$mileage_rate,$passenger_km,$passenger_rate,$toll_amt,
    $subsistence_km,$subsistence_rate,$actual_expense,$supper_days,$supper_rate,$refreshment_days,$refreshment_rate,$taxi_out_town,$taxi_out_rate,$taxi_in_town,$taxi_in_rate,$certifier_remarks, $date_modified, $modified_by,$staff_payment_id)
    {
      $query = "UPDATE `staff_payment` "
					          . " SET `voucher_number`=?, "
                    . "`year_travelled`=?, "
                    . "`month_travelled`=?, "
                    . "`mileage_km`=?, "
                    . "`mileage_rate`=?, "                        
                    . "`passenger_km`=?, "
                    . "`passenger_rate`=?, "
					          . "`toll_amt`=?, "
                    . "`subsistence_km`=?, " 
                    . "`subsistence_rate`=?, " 
                    . "`actual_expense`=?, "                 
                    . "`supper_days`=?, "
                    . "`supper_rate`=?, "
                    . "`refreshment_days`=?, "
                    . "`refreshment_rate`=?, "
                    . "`taxi_out_town`=?, "
                    . "`taxi_out_rate`=?, "
                    . "`taxi_in_town`=?, "
                    . "`taxi_in_rate`=?, "
                    . "`certifier_remarks`=?, "
                    . "`date_modified`=?, "
                    . "`modified_by`=? "
                    . " WHERE staff_payment_id=?";
            
        
            if($this->db->query($query,array($voucher_number,$year_travelled,$month_travelled,$mileage_km,$mileage_rate,$passenger_km,$passenger_rate,$toll_amt,
            $subsistence_km,$subsistence_rate,$actual_expense,$supper_days,$supper_rate,$refreshment_days,$refreshment_rate,$taxi_out_town,$taxi_out_rate,$taxi_in_town,$taxi_in_rate,$certifier_remarks, $date_modified, $modified_by,$staff_payment_id)))
                return true;
                
            return false;
    }

    public function getStaffUsername($staff_id)
{
    $query = "
    SELECT firstname, lastname
    FROM staff
    WHERE staff_id=?
    ";

    $result = $this->db->query($query, array($staff_id))->first_row('array');
    return $result['firstname']. ' ' .$result['lastname'];
}

public function get_staffRecords($staff_id)
    {
     //  $query = " SELECT * FROM staff WHERE staff_id=?  ";
               
      //  return $this->db->query($query, array($staff_id))->first_row('array');

        $query = "SELECT * FROM staff
        INNER JOIN location ON staff.location_id = location.location_id
        INNER JOIN upkeep_type ON upkeep_type.upkeep_id = staff.upkeep_id
        INNER JOIN officer_type ON officer_type.officer_id = staff.officer_id
        WHERE staff_id=?  ";
        return $this->db->query($query, array($staff_id))->first_row('array'); 

    }

    public function update_staffMember($firstname , $lastname , $post_title ,$trn,$location_id,$upkeep_id,$officer_id
    ,$vehicle_model,$vehicle_make,$vehicle_chasisnum,$vehicle_engine_num,$staff_id)
    {

      $query = "UPDATE `staff` "
					          . " SET `firstname`=?, "
                    . "`lastname`=?, "
                    . "`post_title`=?, "
                    . "`trn`=?, " 
                    . "`location_id`=?, "                    
					          . "`officer_id`=?, "
                    . "`upkeep_id`=?, "
                    . "`vehicle_model`=?, "                 
                    . "`vehicle_make`=?, "
                    . "`vehicle_chasisnum`=?, "
                    . "`vehicle_engine_num`=? "
                    . " WHERE staff_id=?";
            
        
            if($this->db->query($query,array($firstname , $lastname , $post_title ,$trn,$location_id,$upkeep_id,$officer_id
            ,$vehicle_model,$vehicle_make,$vehicle_chasisnum,$vehicle_engine_num,$staff_id)))
                
            return true;

          else
          return false;


    }


    //work in progress
    public function insert_new_rate($rate_value,$rate_name)
    {


      $query = "
      INSERT INTO rate
      (rate_value , rate_name)
      VALUES
      (?,?) ";

  /*
      
      if ( ! $this->db->query($query,array($rate_value,$rate_name)))
      {
      //  echo 'jhghf';
              $error = $this->db->error(); // Has keys 'code' and 'message'
            //  testarray($error);
              if($error['code']==1062){
                echo 'Rate Already Exists Please try again';
              }
      }
      */
    
 
if($this->db->query($query,array($rate_value,$rate_name)))
       {return true;}
       else
       {
       return false;
       }




    }

    public function getRates($name)
    {
     $query = "SELECT rate_value
     
               FROM rate

               WHERE rate_name = '$name'        
     ";
     return $this->db->query($query)->result_array();
    }

    public function getCertifierEmail()
    {
        $query = " SELECT email , firstname , lastname FROM users  WHERE role_id = 2 ";
        return $this->db->query($query)->result_array();

    }

    public function getAuthorizerEmail()
    {
        $query = " SELECT email , firstname , lastname FROM users  WHERE role_id = 3 ";
        return $this->db->query($query)->result_array();

    }


  public function saveCertifying($c_email,$staff_payment_id)
  {
    $query = " UPDATE staff_payment SET view_by = ? WHERE staff_payment_id = ?";

      if($this->db->query($query,array($c_email,$staff_payment_id)))
      return true;
      else
      return false;
  }

  public function saveAuthorizer($c_email,$staff_payment_id)
  {
    $query = " UPDATE staff_payment SET view_by = ? WHERE staff_payment_id = ?";

      if($this->db->query($query,array($c_email,$staff_payment_id)))
      return true;
      else
      return false;
  }

  
  public function addCer($c_email,$staff_payment_id)
  {
    $query = " UPDATE staff_payment SET view_by = ? WHERE staff_payment_id = ?";

      if($this->db->query($query,array($c_email,$staff_payment_id)))
      return true;
      else
      return false;
  }
  
  public function getCertifierRecords ($c_email)
  {
    $query = " SELECT * FROM staff_payment    WHERE view_by=? order by date_modified ";
               
    return $this->db->query($query, array($c_email))->result_array();

  }

  public function getAuthorizedRecords ($c_email)
  {
    $query = " SELECT * FROM staff_payment    WHERE view_by=? order by date_modified ";
               
    return $this->db->query($query, array($c_email))->result_array();

  }

  public function saveCertifierByEmail ($c_email , $date_created, $staff_payment_id)
  {
    echo $c_email .$date_created . $staff_payment_id;
    $query = " UPDATE staff_payment SET certified_by = ? , date_certified = ? WHERE staff_payment_id = ? ";

      if($this->db->query($query,array($c_email,$date_created,$staff_payment_id)))
      return true;
      else
      return false;

  }

  public function saveAuthorizerByEmail ($c_email , $date_created, $staff_payment_id)
  {
    echo $c_email .$date_created . $staff_payment_id;
    $query = " UPDATE staff_payment SET authorized_by =  ? , date_authorized = ?  WHERE staff_payment_id = ? ";

      if($this->db->query($query,array($c_email,$date_created,$staff_payment_id)))
      return true;
      else
      return false;

  }










}