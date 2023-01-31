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

}


?>