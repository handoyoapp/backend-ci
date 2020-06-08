<?php 

Class Mod_login extends CI_Model 
{
	function login($username, $password) 
	{
		$this -> db -> select('username, password'); 
		$this -> db -> from('login'); 
		$this -> db -> where('username', $username);
		$this -> db -> where('password', md5($password));
		$this -> db -> limit(1); 
		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result();
		}
		else {
			return false;
		}
	}
}