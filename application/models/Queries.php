<?php

class Queries extends CI_Model{

public function registerAdmin($data){
    return $this->db->insert('users',$data); // inserting data into users table
}


public function chkAdminExist(){
    $chkAdmin = $this->db->where(['role_id' => '1'] )->get('users');
    if($chkAdmin->num_rows()>0){
        return $chkAdmin->num_rows();
    }
}

     // if admin exist login user
    public function adminExist($email, $password){ 
     $chkAdmin = $this-> db-> where([ 'password' =>$password,'username ' =>$email])
      ->get('users');
      
      if($chkAdmin ->num_rows()>0){
          return  $chkAdmin->row();
      }
    }


   public function checkusername($username) {
   $this -> db -> select('username');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1){
     return $query->result();
   }
   else{
     return false;
   }
 }

 public function checkMail($email){
   $this -> db -> select('email');
   $this -> db -> from('users');
   $this -> db -> where('email', $email);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1){
     return $query->result();
   }
   else{
     return false;
   }
 }

 public function logme($email, $password){
  $user = $this->db->query("SELECT * FROM users WHERE email=? AND password=? AND status='active'", array($email, $password))->first_row('array');
  
  if(count($user) == 0) return false;
  else return $user;
}





 //function to login
 /*
 function logme($email,$password){

  $this -> db -> select('user_id','email','password','role_id');
  $this -> db -> from('users');
  $this->db->where('email',$email);
  $this->db->where('password',$password);
  $this -> db -> limit(1);
 
  $query = $this -> db -> get();

  if($query -> num_rows() == 1){
    return $query->row();
  }
  else {
    return false;
  }
 }
 */

 /*
 public function getUsers(){
  $query = $this->db->get('users');
  if($query->num_rows()>0){
    return $query->result();
  }
}
*/

public function getRoles(){
  $roles=$this->db->get('roles');
  if($roles->num_rows()>0){
      return $roles->result();
  }
}

public function viewAllUsers(){
$this->db->select(['users.user_id','users.email','users.firstname','users.lastname','roles.rolename']);
$this->db->from('users');
$this->db->join('roles','roles.role_id = users.role_id');
$users = $this->db->get();
return $users->result();
}

public function getUserRecords ($user_id){
  $this->db->select(['users.user_id','users.email','users.firstname','users.lastname','roles.rolename']);
  $this->db->from('users');
  $this->db->join('roles','roles.role_id = users.role_id');
  $this->db->where(['users.user_id'=>$user_id]);
  $users = $this->db->get();
  return $users->row();

}

public function updateUserProfiles($data , $user_id){ // updating users
  return $this->db->where('user_id',$user_id)
                 ->update('users',$data);
}

public function disabled_users($data , $user_id){  // deactivating users
  $data = array(
    'status' => 'deactivated'
  );

  $this->db->where('user_id',$user_id);
  $response = $this->db->update('users',$data);
      if($response)
      {
          return $user_id;
      }
      else
      {
        return FALSE;
      }
}


 //=================================================================================================================

 public function registerComputer($data){
  return $this->db->insert('tbl_computers',$data); // inserting data into computers table
}

/*
public function viewAllColleges(){
$this->db->select(['tbl_users.user_id','tbl_college.college_id','tbl_users.username','tbl_users.gender',
'tbl_college.collegename','tbl_college.branch','tbl_roles.rolename']);
$this->db->from('tbl_college');
$this->db->join('tbl_users','tbl_users.college_id = tbl_college.college_id');
$this->db->join('tbl_roles','tbl_roles.role_id = tbl_users.role_id');
$users = $this->db->get();
return $users->result();
} $device_name, $processor, $ram,$os_type,$hardrive_size
*/

public function viewAllComputers(){ //generate computer
  $this->db->select(['tbl_computers.device_id','tbl_computers.device_name','tbl_computers.processor','tbl_computers.ram','tbl_computers.os_type',
  'tbl_computers.hardrive_size','tbl_parishes.parish_name']);
  $this->db->from('tbl_computers');
  $this->db->join('tbl_parishes','tbl_parishes.parish_id=tbl_computers.parish_id');
  $users = $this->db->get();
  return $users->result();
}

public function getComputerRecord($device_id){  // editing computer record
  $this->db->select(['tbl_computers.device_id','tbl_computers.device_name','tbl_computers.processor','tbl_computers.ram'
  ,'tbl_computers.os_type','tbl_computers.hardrive_size']);
$this->db->from('tbl_computers');
$this->db->where(['tbl_computers.device_id'=>$device_id]);
$computer = $this->db->get();
return $computer->row();

}

public function updateComputer($data,$device_id){
  return $this->db->where('device_id',$device_id)->update('tbl_computers',$data);
}

public function removeComputer($device_id){
  return $this->db->delete('tbl_computers',['device_id'=>$device_id]);

}

public function getParishes(){
  $query = $this->db->get('tbl_parishes');
  if($query->num_rows()>0){
    return $query->result();
  }
}

  public function getRecords($parish){
       
    $this->db->select(['tbl_computers.device_id','tbl_computers.device_name','tbl_computers.processor','tbl_computers.ram','tbl_computers.os_type',
  'tbl_computers.hardrive_size','tbl_parishes.parish_name']); // 'tbl_parishes.parish_id as parishID'
    $this->db->from('tbl_computers');
    $this->db->join('tbl_parishes','tbl_parishes.parish_id=tbl_computers.parish_id');
    $this->db->where(['tbl_computers.parish_id'=>$parish]);
    $query = $this->db->get();
    return $query->result();
  }

 

public function getColleges(){
    $colleges=$this->db->get('tbl_college');
    if($colleges->num_rows()>0){
        return $colleges->result();
    }
}

public function getLocation(){
$parishes=$this->db->get('tbl_parishes');
if($parishes->num_rows()>0){
  return $parishes->result();
}
}

public function makeCollege($data){
  return $this->db->insert('tbl_college',$data);
}

public function registerCoadmin($data){
  return $this->db->insert('tbl_users',$data);

}

}





?>