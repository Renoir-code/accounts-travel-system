<?php

class Report_model extends CI_Model{


    public function change_reports($date)
    {  
        
       /*  $month = date('m',$date);
        $year  = date('y' , $date); */
        $reportdate = $date;
        $month = date('m',strtotime($reportdate));
        $year = date('Y',strtotime($reportdate));
        /* echo $month. '<br>';
        echo $year;
        die(); */

        $query = "SELECT changes.* 
        , staff.firstname, staff.lastname 
        ,upkeep_type.upkeep_name
        FROM ((changes 
        INNER JOIN staff ON changes.staff_id = staff.staff_id)
        INNER JOIN upkeep_type ON changes.upkeepchange_type = upkeep_type.upkeep_id)
        WHERE MONTH (dateof_change)  = ? AND YEAR (dateof_change) =? ";
        return $this->db->query($query, array($month,$year))->result_array();
    


    }

}


?>