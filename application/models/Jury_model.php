<?php

class Jury_model extends CI_Model{



    public function insert_jury($date_received,$first_name,$last_name,
    $trn,$days_worked,$rate_paid,$location_id,$comments,$dates_worked,$reason_returned)
    {

      //testarray($dates_worked);
        $total = $days_worked * $rate_paid;
    
        
      $query = "
      INSERT INTO jury_details
      (date_received,first_name,last_name,
      trn,days_worked,rate_paid,location_id,comments,amount_paid,dates_worked,reason_returned)
      VALUES
       (?, ?, ?, ?, ?, ?, ?, ?, '$total', ? , ? )";

       
      
	  if(!$this->db->query($query,array($date_received,$first_name,$last_name,
      $trn,$days_worked,$rate_paid,$location_id,$comments,$dates_worked,$reason_returned)))
	  {
			
        return false;
	  }
       else
	   {   
        return true;
	   }

      // testarray($query);
    }


    public function getAllJuryRecords()
    {
      $query = "SELECT * FROM jury_details
      INNER JOIN location ON jury_details.location_id = location.location_id";
      return $this->db->query($query, array())->result_array(); 
    }


    public function getAllJuryRecordsbyID($jury_id)
      {
        $query = "SELECT * FROM jury_details
        INNER JOIN location ON jury_details.location_id = location.location_id
        WHERE jury_id = '$jury_id'
        ";
        return $this->db->query($query, array())->first_row('array'); 
      }


    public function getRates($name)
    {
     $query = "SELECT rate_value
     
               FROM jury_rate

               WHERE rate_name = '$name'        
     ";
     return $this->db->query($query)->result_array();     
    }



    public function update_juryDetails($date_received,$first_name,$last_name,
    $trn,$days_worked,$rate_paid,$location_id,$comments,$jury_id)
    {
      $query = "UPDATE `jury_details` "
                    . " SET `date_received`=?, "
                    . "`first_name`=?, "
                    . "`last_name`=?, "
                    . "`trn`=?, "
                    . "`days_worked`=?, "                        
                    . "`rate_paid`=?, "
                    . "`location_id`=?, "
                    . "`comments`=? "
                    . " WHERE `jury_id` =?";
            
        
            if($this->db->query($query,array($date_received,$first_name,$last_name,
            $trn,$days_worked,$rate_paid,$location_id,$comments,$jury_id))){
                return true;
            }
             else{
                return false;
             }

     }


     public function count_jury($location_id,$month){  // individual court

		//testarray($month);

        if($location_id == 77){

            $query ="
            SELECT count(date_received) AS 'Date Received' ,location_name ,SUM(amount_paid) AS 'Total Amount Per Court' 
            FROM jury_details INNER JOIN location ON location.location_id = jury_details.location_id 
            WHERE '$month' = DATE_FORMAT(date_received, '%Y-%m')
            GROUP BY location_name
		";
		$counter = $this->db->query($query, array($location_id,$month))->result_array();
        }
        else {

            $query ="
            SELECT count(date_received) AS 'Date Received' ,location_name ,SUM(amount_paid) AS 'Total Amount Per Court' 
            FROM jury_details INNER JOIN location ON location.location_id = jury_details.location_id 
            WHERE '$month' = DATE_FORMAT(date_received, '%Y-%m') AND jury_details.location_id = $location_id
            GROUP BY location_name
		";
		$counter = $this->db->query($query, array($location_id,$month))->result_array();

        }			
		//testarray($counter);
		return $counter;

    }   






















}

?>