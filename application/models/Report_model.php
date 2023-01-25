<?php

class Report_model extends CI_Model{


    public function change_reports($date,$location_id)
    {  
        
       /*  $month = date('m',$date);
        $year  = date('y' , $date); */
        $reportdate = $date;
        $month = date('m',strtotime($reportdate));
        $year = date('Y',strtotime($reportdate));
		
    
        
		
		  $query = "SELECT changes.* 
        , staff.firstname, staff.lastname 
        ,upkeep_type.upkeep_name, location.location_name
        FROM (((changes 
        INNER JOIN staff ON changes.staff_id = staff.staff_id)
        INNER JOIN upkeep_type ON changes.upkeepchange_type = upkeep_type.upkeep_id)
		INNER JOIN location ON staff.location_id = location.location_id)
        WHERE dateof_change_end ='' and staff.location_id = ?";
		
		return $this->db->query($query, array($location_id))->result_array();
    


    }

}


?>