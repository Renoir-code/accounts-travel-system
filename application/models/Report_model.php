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
					WHERE DATE({$current_date}) > DATE(dateof_change_end); ";
        
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

    //   ,
    public function getReport ($date_from,$date_to) 
    {

    $from = date('Y',strtotime($date_from)).date('m',strtotime($date_from)); // assigns the year appended to the month ex 201401
   $to =date('Y',strtotime($date_to)).date('m',strtotime($date_to));

   //echo $from. '-'.$to ;
       
     $query =" SELECT firstname,lastname, SUM(mileage_km) as mileage,SUM(passenger_km) as passenger_km
     ,SUM(toll_amt) as toll_amt,SUM(subsistence_km) as subsistence,SUM(actual_expense) as actual_expense,SUM(supper_days) as supper,
     SUM(refreshment_days) as refreshment,SUM(taxi_out_town) as taxi_out_town,SUM(taxi_in_town) as taxi_in_town 
    FROM staff_payment 
     INNER JOIN staff ON staff.staff_id = staff_payment.staff_id
     WHERE (CONCAT(`year_travelled`,LPAD(MONTH(STR_TO_DATE(CONCAT('2017-',`month_travelled`,'-12'),'%Y-%M-%d')),2,'0')) 
     BETWEEN {$from} AND {$to} ) AND (staff_payment.staff_id = 13 )
   ";
              
        return $this->db->query($query, array())->result_array();
    }

    
}
  




?>