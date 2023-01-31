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
	
	 public function checkVoucherNum($voucher)
    {
        $this -> db -> select('voucher_number');
        $this -> db -> from('staff_payment');
        $this -> db -> where('voucher_number', $voucher);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1){
          return true;
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
       $trn = strtolower($trn); // lowercase characters OR characters (like)
        $query = "SELECT * FROM staff
        INNER JOIN location ON staff.location_id = location.location_id
        INNER JOIN upkeep_type ON upkeep_type.upkeep_id = staff.upkeep_id
        INNER JOIN officer_type ON officer_type.officer_id = staff.officer_id
        WHERE trn = ? OR firstname LIKE ? OR lastname LIKE ? OR CONCAT(firstname,' ',lastname) LIKE ? ";
        //return $this->db->query($query, array($trn, $trn, $trn, $trn))->first_row('array'); 
		return $this->db->query($query, array($trn, $trn, $trn, $trn))->result_array();
      }

      public function getAllStaffRecords()
      {
      
        $query = "SELECT * FROM staff
        INNER JOIN location ON staff.location_id = location.location_id
        INNER JOIN upkeep_type ON upkeep_type.upkeep_id = staff.upkeep_id
        INNER JOIN officer_type ON officer_type.officer_id = staff.officer_id";
        return $this->db->query($query, array())->result_array(); 
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
      (staff_id,voucher_number,year_travelled,month_travelled,mileage_km,mileage_rate,passenger_km,passenger_rate,toll_amt,subsistence_km,subsistence_rate,actual_expense,supper_days,supper_rate,refreshment_days,refreshment_rate,taxi_out_town,taxi_out_rate,taxi_in_town,taxi_in_rate,certifier_remarks,added_by,date_created, view_by)
      VALUES
       (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
      
	//$db_debug = $this->db->db_debug; //save setting
	//$this->db->db_debug = FALSE; //disable debugging for queries
	  if(!$this->db->query($query,array($staff_id,$voucher_number,$year_travelled,$month_travelled,$mileage_km,$mileage_rate,$passenger_km,$passenger_rate,$toll_amt,$subsistence_km,	$subsistence_rate,$actual_expense,$supper_days,$supper_rate,$refreshment_days,$refreshment_rate,$taxi_out_town,$taxi_out_rate,$taxi_in_town,$taxi_in_rate,$certifier_remarks,$added_by,$date_created)))
	  {
		//$error = $this->db->error(); // Has keys 'code' and 'message'
		//$this->db->db_debug = $db_debug; //restore debug setting
			

			return false;

	  }
       else
	   {
		   
       return true;
	   }
    }

    public function getPaymentRecords($staff_id)
    {
       $query = " SELECT * FROM staff_payment    WHERE staff_id=? order by year_travelled desc , month_travelled ";
               
        return $this->db->query($query, array($staff_id))->result_array(); 

    }

    public function getAllPaymentRecords($staff_role,$show_certified_only)
    {
     
	 //Inserter Default View
         if($staff_role == 1 && $show_certified_only == 1){
			 $query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
         INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
		 WHERE staff_payment.view_by = 1
         ORDER BY year_travelled desc , month_travelled ";      
       	return $this->db->query($query, array())->result_array(); 
		}
		 
		  else if($staff_role == 1)
		 {
		 $query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
         INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
         ORDER BY year_travelled desc , month_travelled";      
       	return $this->db->query($query, array())->result_array(); 
		 }
		 
		 //////Certifier Default View
		   else if($staff_role == 2 && $show_certified_only == 1){
			  
			   
			 $query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
         INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
		 WHERE staff_payment.view_by = 2
         ORDER BY year_travelled desc , month_travelled ";      
       	return $this->db->query($query, array())->result_array(); 
			 
			 
		 }
		 
		  else if($staff_role == 2)
		 {
		 $query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
         INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
         ORDER BY year_travelled desc , month_travelled";      
       	return $this->db->query($query, array())->result_array(); 
		 }

//////Authorizer Default View
		   else if($staff_role == 3 && $show_certified_only == 1){
			  
			   
			 $query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
         INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
		 WHERE staff_payment.view_by = 3
         ORDER BY year_travelled desc , month_travelled ";      
       	return $this->db->query($query, array())->result_array(); 
			 
			 
		 }
		 
		  else if($staff_role == 3)
		 {
		 $query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
         INNER JOIN staff ON staff.staff_id = staff_payment.staff_id
		 WHERE staff_payment.view_by = 4
         ORDER BY year_travelled desc , month_travelled";      
       	return $this->db->query($query, array())->result_array(); 
		 }		 
		 
		 
		 
		 
		 else if(strlen($staff_role)>3) // this fetches payment records for a single user
		 {
			 
		$query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
        INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
        WHERE staff_payment.staff_id = ?  ORDER BY year_travelled desc , month_travelled";      
		$result = $this->db->query($query, array(substr($staff_role, 3)))->result_array(); 
		
		if (count($result)== 0 ){
			$query = 	"SELECT staff.firstname, staff.lastname, staff.staff_id 
						FROM staff
						WHERE staff.staff_id = ?";      
			$result = $this->db->query($query, array(substr($staff_role, 3)))->result_array(); 
		}

		return $result;
		 
		 
		 
		 
		 }
		 
		 
		 else
		 {
		$query = "SELECT staff_payment.*, staff.firstname, staff.lastname FROM staff_payment 
         INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
         WHERE staff_payment.view_by = ?  ORDER BY year_travelled desc , month_travelled";      
       	return $this->db->query($query, array($staff_role))->result_array(); 
		 }
		 
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

        $query = "SELECT staff.*, changes.dateof_change, changes.post_change FROM staff
        LEFT JOIN location ON staff.location_id = location.location_id
        LEFT JOIN upkeep_type ON upkeep_type.upkeep_id = staff.upkeep_id
        LEFT JOIN officer_type ON officer_type.officer_id = staff.officer_id
		LEFT JOIN changes ON changes.staff_id = staff.staff_id
        WHERE staff.staff_id=?  ";
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

     public function getInserterEmail()
    {
        $query = " SELECT email  FROM users  WHERE role_id = 1 ";
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

//--------------------------------------------------------------------------------------------------------------
  public function saveCertifying($c_email,$staff_payment_id)
  {
    $query = " UPDATE staff_payment SET view_by = ? WHERE staff_payment_id = ?";

      if($this->db->query($query,array($c_email,$staff_payment_id)))
      return true;
      else
      return false;
   }

 public function updateViewBy($authorizer_or_certifier,$staff_payment_id)
  {
 
  $query = "UPDATE staff_payment SET view_by = ? WHERE staff_payment_id = ?";
      if($this->db->query($query,array($authorizer_or_certifier,$staff_payment_id)))
      return true;
      else
      return false;
  }
  
  public function updateCertifyAuthorizeBy($authorizer_or_certifier,$staff_payment_id,$column)
  {
 
  $query = "UPDATE staff_payment SET ".$column. " = ?  WHERE staff_payment_id = ?";
      if($this->db->query($query,array($authorizer_or_certifier,$staff_payment_id)))
      return true;
      else
      return false;
  }
  
  public function updateRemarks($certifier_remarks,$staff_payment_id,$remarks_column)
  {
 
  $query = "UPDATE staff_payment SET ".$remarks_column." = ? WHERE staff_payment_id = ?";
      
	  
	  
	  if($this->db->query($query,array($certifier_remarks,$staff_payment_id)))
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

  public function saveAuthorizerByEmail ($c_email , $staff_payment_id)
  {
   // echo $c_email . $staff_payment_id;
    $query = " UPDATE staff_payment SET authorized_by =  ?  WHERE staff_payment_id = ? ";

      if($this->db->query($query,array($c_email,$staff_payment_id)))
      return true;
      else
      return false;

  }

 public function insertChanges($staff_id , $monthly_allotment , $arrears , $travel_recovery , $upkeepchange_type ,  $post_change , $dateof_change ,$changes_remarks, $dateof_change_end, $changes_type)
 {


if($changes_type == 'submit'){
  $query = " INSERT INTO changes
  (staff_id , monthly_allotment , arrears , travel_recovery , upkeepchange_type , post_change , dateof_change ,changes_remarks,dateof_change_end, active )
  VALUES
  (? , ? , ? , ? , ? , ? , ? , ? , ?, ?)
  ";
 
  $result = $this->db->query($query,array($staff_id , $monthly_allotment , $arrears , $travel_recovery , $upkeepchange_type , $post_change , $dateof_change ,$changes_remarks, $dateof_change_end,1));
}else
{
	$query = " UPDATE changes
				
				SET monthly_allotment = ? , arrears = ? , travel_recovery = ? , upkeepchange_type = ? 
				, post_change = ? , dateof_change = ? ,changes_remarks = ?,dateof_change_end = ?
				WHERE staff_id = ? AND active = 1
				";
				
				$result = ($this->db->query($query,array($monthly_allotment ,$arrears, $travel_recovery
							,$upkeepchange_type, $post_change ,$dateof_change 
							,$changes_remarks, $dateof_change_end, $staff_id)));
	
}
  
  
  
  //if($this->db->query($query,array($staff_id , $monthly_allotment , $arrears , $travel_recovery , $upkeepchange_type , $post_change , $dateof_change ,$changes_remarks, $dateof_change_end)))
if($result)
return true;
  else
  return false;



 }

public function getNotifications(){
	
	$role = $_SESSION['role_id'];
	
	$query = "
	SELECT COUNT(view_by) FROM staff_payment WHERE view_by = ?; 
	";
	
	return $this->db->query($query,array($role));

	
}

public function get_changes_to_staff($staff_id){
	
	$query = "	SELECT * FROM changes 
				WHERE active = 1 AND staff_id = ?";
	
	return $this->db->query($query,array($staff_id))->row_array();
}







}