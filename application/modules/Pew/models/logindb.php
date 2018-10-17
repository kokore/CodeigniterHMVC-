<?php
class logindb extends CI_Model 
{
	function saverecords($name,$pass,$email)
	{
        $query="insert into user_login (user_name , user_password , user_email) values('$name','$pass','$email')";
        $this->db->query($query);
    }
    
    function displayrecords()
	{
	    $query=$this->db->query("select * from user_login");
	    return $query->result();
    }

    public function checkuser($data){
        $condition = "user_name =" . "'" . $data['name'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $query = $this->db->get();
        
        $result = $query->result_array();
        return $result;
    }

    public function checkpass($data){
        $condition = "user_password =" . "'" . $data['pass'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $query = $this->db->get();
        
        $result = $query->result_array();
        return $result;
    }
    
    public function login($data) {

        $condition = "user_name =" . "'" . $data['name'] . "' AND " . "user_password =" . "'" . $data['pass'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
        return true;
        } else {
        return false;
        }
    }
}