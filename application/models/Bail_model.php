<?php

class Bail_model extends CI_Model{


    public function insert_bail($date_received,$date_processed,$first_name,$last_name,
    $amount_paid,$trn,$location_id,$reason_returned,$returned)
    {

       // testarray($returned);

        
      $query = "
      INSERT INTO bail_details
      (date_received,date_processed,first_name,last_name,
      amount_paid,trn,location_id,reason_returned,returned)
      VALUES
       (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      
	  if(!$this->db->query($query,array($date_received,$date_processed,$first_name,
    $last_name,$amount_paid,$trn,$location_id,$reason_returned,$returned)))
	  {
			
        return false;
	  }
       else
	   {   
        return true;
	   }
    }


    public function count_bail($location_id,$month){  // individual court

		//testarray($month);

        if($location_id == 77){

            $query ="
            SELECT count(date_received) AS 'Date Received' ,location_name ,SUM(amount_paid) AS 'Total Amount Per Court' 
            FROM bail_details INNER JOIN location ON location.location_id = bail_details.location_id 
            WHERE '$month' = DATE_FORMAT(date_received, '%Y-%m')
            GROUP BY location_name
		";
		$counter = $this->db->query($query, array($location_id,$month))->result_array();
        }
        else {

            $query ="
            SELECT count(date_received) AS 'Date Received' ,location_name ,SUM(amount_paid) AS 'Total Amount Per Court' 
            FROM bail_details INNER JOIN location ON location.location_id = bail_details.location_id 
            WHERE '$month' = DATE_FORMAT(date_received, '%Y-%m') AND bail_details.location_id = $location_id
            GROUP BY location_name
		";
		$counter = $this->db->query($query, array($location_id,$month))->result_array();

        }			
		//testarray($counter);
		return $counter;

    }   

    public function getAllBailRecords()
      {
        $query = "SELECT * FROM bail_details
        INNER JOIN location ON bail_details.location_id = location.location_id";
        return $this->db->query($query, array())->result_array(); 
      }



      public function getAllBailRecordsbyTRN($bail_id)
      {
        $query = "SELECT * FROM bail_details
        INNER JOIN location ON bail_details.location_id = location.location_id
        WHERE bail_id = '$bail_id'
        ";
        return $this->db->query($query, array())->first_row('array'); 
      }



      public function update_bailDetails($date_received,$date_processed,$first_name,
      $last_name,$amount_paid,$trn,$location_id,$reason_returned,$returned,$bail_id)
    {
      $query = "UPDATE `bail_details` "
                    . " SET `date_received`=?, "
                    . "`date_processed`=?, "
                    . "`first_name`=?, "
                    . "`last_name`=?, "
                    . "`amount_paid`=?, "                        
                    . "`trn`=?, "
                    . "`location_id`=?, "
                    . "`reason_returned`=?, "
                    . "`returned`=?"
                    . " WHERE `bail_id` =?";
            
        
            if($this->db->query($query,array($date_received,$date_processed,$first_name,
            $last_name,$amount_paid,$trn,$location_id,$reason_returned,$returned,$bail_id))){
                return true;
            }
             else{
                return false;
             }
           
    }


}