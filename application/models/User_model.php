<?php

class User_model extends CI_Model{

public function registerUser($data)
{
    return $this->db->insert('users',$data); // inserting data into users table
}



public function checkusername($username) 
{
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

public function checkMail($email)
{
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

public function addUser($email,$firstname,$lastname,$encrypted_password,$role_id,$active,$modified_by)
    {
        $query = "
        INSERT INTO users
        (email,firstname,lastname,password,role_id,active,modified_by)
        VALUES
        (?, ?, ?, ?, ?, ?, ?)";

        if($this->db->query($query, array($email,$firstname,$lastname,$encrypted_password,$role_id,$active,$modified_by)))
                return true;
        else
                return false;		
    }


public function login($email,$password)
{
  $query = "Select * From users where email=? and password=? and active = 'yes' ";
  
  $result = $this->db->query($query,array($email,$password))->result_array();
  
  return $result;
}

public function isUserLoggedIn()
{
    if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']) )
        redirect( "user" );
}

public function getUserById($id)
{
    $query = "SELECT * FROM users WHERE user_id=?";
    return $this->db->query($query, array($id))->first_row('array');
}

public function getCurrentUsername($user_id)
{
    $query = "
    SELECT firstname, lastname
    FROM users
    WHERE user_id=?
    ";

    $result = $this->db->query($query, array($user_id))->first_row('array');
    return $result['firstname']. ' ' .$result['lastname'];
}





public function testPassword($id, $pass)
{
  $query = "SELECT * FROM users WHERE user_id=? AND password=?";
  return $this->db->query($query, array($id, $pass))->result_array();
}

public function changeUserPassword($id, $pass)
{
    $query = "UPDATE users SET password=? WHERE user_id=?";
    return $this->db->query($query, array($pass, $id));
}


public function checkUserFromURL($email)
{
    $query = "Select * From users where email=? and active = 'yes' ";
    
    $result = $this->db->query($query,array($email))->first_row('array');
    return $result;
}

public function getRoles()
{
  $roles=$this->db->get('roles');
  if($roles->num_rows()>0){
      return $roles->result();
  }
}


public function viewAllUsers()
{
    $this->db->select(['users.user_id','users.email','users.firstname','users.lastname','roles.rolename','users.active']);
    $this->db->from('users');
    $this->db->join('roles','roles.role_id = users.role_id');
    $users = $this->db->get();
    return $users->result();
}

public function getUserRecords ($user_id)
{
  $this->db->select(['users.user_id','users.email','users.firstname','users.lastname','roles.rolename','users.active']);
  $this->db->from('users');
  $this->db->join('roles','roles.role_id = users.role_id');
  $this->db->where(['users.user_id'=>$user_id]);
  $users = $this->db->get();
  return $users->row();
}

public function updateUserProfiles($data , $user_id)
{ 
  return $this->db->where('user_id',$user_id) ->update('users',$data);
}


public function getUserByEmailAddress($email)
{
  return $this->db->query("SELECT * FROM users WHERE email=?", array($email))->first_row('array');
}

public function saveResetEmailRequest($token, $email)
{		
  if($this->db->query("INSERT INTO `reset_email_request`(`email`, `token`, `date_created`, `status`) VALUES (?,?,?,1)", array($email, $token, date('Y-m-d H:i:s'))))
      return true;
  else
      return false;
  
}


public function getResetPasswordRequestById($reset_id)
{
    return $this->db->query("SELECT * FROM reset_email_request WHERE id=?", array($reset_id))->first_row('array');
}

public function reset_password($email, $password, $reset_id)
{
    $this->db->trans_begin();

    $this->db->query("UPDATE users SET password=? WHERE email=?", array($password, $email));

    $this->db->query("UPDATE reset_email_request SET status=2 WHERE id=?", array($reset_id));

    if($this->db->trans_status() === FALSE)
    {
        $this->db->trans_rollback();
        return false;
    }
    else
    {
        $this->db->trans_commit();
        return true;
    }
}


public function updateUser($username,$firstname, $lastname, $user_level, $location, $supervisor_email1, $supervisor_email2,$active, $last_modified,$modified_by,$user_id)
{
  $query = "UPDATE `users` "
              . "SET `username`=?, "
              . "`firstname`=?, "
              . "`lastname`=?, "
              . "`user_level`=?, "
              . "`location_id`=?, "                     
              . "`supervisor_email1`=?, "
              . "`supervisor_email2`=?, "
              . "`active`=?, "                 
              . "`last_modified`=?, "
              . "`modified_by`=? "
              . " WHERE user_id=?";
      
      if($this->db->query($query,array($username,$firstname, $lastname, $user_level, $location, $supervisor_email1, $supervisor_email2, $active, $last_modified,$modified_by,$user_id)))
          return true;
      return false;
}
    




 

}





?>