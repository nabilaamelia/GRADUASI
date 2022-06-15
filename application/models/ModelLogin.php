<?php  

class ModelLogin extends CI_Model {

	public function cekuser($username)
	{
		$query = $this->db->query("SELECT * FROM petugas WHERE username = '$username' ");

		if ($query->num_rows()==1)
		{
			return $query->result();
		} else 
		{
			return false;
		}
	}

	public function ceklogin($username,$password)
	{
		$query = $this->db->query("SELECT * FROM petugas WHERE username = '$username' and password = '$password' ");

		if ($query->num_rows()==1)
		{
			return $query->result();
		} else 
		{
			return false;
		}
	}

	
}

?>