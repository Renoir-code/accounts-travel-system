<?php

class Report_model extends CI_Model{


    public function change_reports($date,$location_id)
    {  
        
       /*  $month = date('m',$date);
        $year  = date('y' , $date); */
        $reportdate = $date;
        $month = date('m',strtotime($reportdate));
        $year = date('Y',strtotime($reportdate));
		
		$current_date = $date = date('Y-m-d');
		//echo $current_date;
		
		//Update Query to set deactivate users whose acting has ended 
		$query = 	"UPDATE changes
					SET active = 0 
					WHERE CURDATE()  > DATE(`dateof_change_end`) ";
        
		$this->db->query($query, array());
		
		
		  $query = "SELECT changes.* 
        , staff.firstname, staff.lastname, staff.location_id
        ,upkeep_type.upkeep_name, location.location_name,location.location_id
        FROM (((changes 
        LEFT JOIN staff ON changes.staff_id = staff.staff_id)
        LEFT JOIN upkeep_type ON changes.upkeepchange_type = upkeep_type.upkeep_id)
		LEFT JOIN location ON staff.location_id = location.location_id)
        WHERE changes.active = 1 AND staff.location_id = ?";
		
				
		return $this->db->query($query, array($location_id))->result_array();

    }

	
	public function upkeepReport($location_id,$date){ //bring over month Month($date) and

		/*$reportdate = $date;
        $month = date('m',strtotime($reportdate));
        $year = date('Y',strtotime($reportdate));
		*/
		/* testarray($date); */
		//$myMonth = date('m',strtotime($date));
		$month = date("n", strtotime($date));

		//testarray($month); AND Month(custom_upkeep.date_set) = $month
		
		$query ="
		SELECT firstname,lastname,location_name,upkeep_name,upkeep_value, staff.staff_id FROM `staff` 
		INNER JOIN location ON location.location_id = staff.location_id 
		INNER JOIN upkeep_type ON staff.upkeep_id = upkeep_type.upkeep_id 
		/*LEFT JOIN custom_upkeep on staff.staff_id = custom_upkeep.staff_id */
		WHERE upkeep_type.upkeep_id != '55' AND location.location_id = $location_id 
		ORDER BY location_name	
		";

		
		$test = $this->db->query($query, array($location_id,$date))->result_array();
		//testarray($test);
		return $test;

	}

	//added 8/18/2023
	public function countCLaims ($date_from,$date_to,$location_id){

		//testarray($date_to);

		if($location_id == 77){

			$query ="
		SELECT count(date_received),staff.location_id,location_name FROM staff_payment
		INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
		INNER JOIN location ON location.location_id = staff.location_id
		WHERE date_received BETWEEN ?  AND ?
		GROUP BY location_name
		";
		$counter = $this->db->query($query, array($date_from,$date_to))->result_array();
		}
		else{
			$query ="
			SELECT count(date_received),staff.location_id,location_name FROM staff_payment
			INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
			INNER JOIN location ON location.location_id = staff.location_id
			WHERE date_received BETWEEN ?  AND ? AND staff.location_id = ?
			";
			$counter = $this->db->query($query, array($date_from,$date_to,$location_id))->result_array();

		}		
		//testarray($test);
		return $counter;
	
		}

	public function upkeepReportCustom($location_id,$date){ //bring over month Month($date) and

		/*$reportdate = $date;
        $month = date('m',strtotime($reportdate));
        $year = date('Y',strtotime($reportdate));
		*/
		/* testarray($date); */
		//$myMonth = date('m',strtotime($date));
		$month = date("n", strtotime($date));

		//testarray($month); AND Month(custom_upkeep.date_set) = $month
		
		$query ="
		SELECT custom_upkeep_value, custom_upkeep.date_set,staff_id FROM `custom_upkeep` 
		WHERE  Month(custom_upkeep.date_set) = $month
		
		";

		
		$test = $this->db->query($query, array($location_id,$date))->result_array();
		//testarray($test);
		return $test;

	}





    public function getReport ( $date_from , $date_to, $staff_members )
    {
		
		
    $from = date('Y',strtotime($date_from)).date('m',strtotime($date_from)); // assigns the year appended to the month ex 201401
   $to =date('Y',strtotime($date_to)).date('m',strtotime($date_to));
      
$values = array();
array_push($values,$from);
array_push($values,$to);
	 
if(count($staff_members)> 0){
$values = array_merge( $values,$staff_members);	
$dynamic_parameter = implode(',',array_fill(0,count($staff_members),"?"));



}else{
	
	echo 'No staff member selected';
	die();
}



	  
     $query =" SELECT staff_id, SUM(?) FROM staff_payment 
     WHERE CONCAT(`year_travelled`,LPAD(MONTH(STR_TO_DATE(CONCAT('2017-',`month_travelled`,'-12'),'%Y-%M-%d')),2,'0')) 
     BETWEEN ? AND ?  AND staff_id = 12 ";
	 
	 

	 
	 $t = '?,?';
	 $query = "
	 SELECT firstname,lastname, SUM(mileage_km) as mileage,SUM(passenger_km) as passenger_km
     ,SUM(toll_amt) as toll_amt,SUM(subsistence_km) as subsistence,SUM(actual_expense) as actual_expense,SUM(supper_days) as supper,
     SUM(refreshment_days) as refreshment,SUM(taxi_out_town) as taxi_out_town,SUM(taxi_in_town) as taxi_in_town,mileage_rate, passenger_rate,subsistence_rate,supper_rate,refreshment_rate
	 ,taxi_in_rate,taxi_out_rate
	 
	 FROM staff_payment 
	 
	 INNER JOIN staff ON staff.staff_id = staff_payment.staff_id 
	 
	 WHERE CONCAT(`year_travelled`,LPAD(MONTH(STR_TO_DATE(CONCAT('2017-',`month_travelled`,'-12'), '%Y-%M-%d')),2,'0')) 
	 BETWEEN ? AND ? AND staff_payment.staff_id IN (".$dynamic_parameter.") 
	 
	 GROUP BY staff_payment.staff_id; 
	 ";
	 
        return $this->db->query($query, $values)->result_array();
    }

	











    
}



  




?>