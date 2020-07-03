<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function userLogin($nis, $password) 
	{
		$query = $this->db->get_where('account', ['username' => $nis, 'password' => $password ] );
		return $query->row_array();
	}

	public function adminLogin($username, $password) 
	{
		$query = $this->db->get_where('account', ['username' => $username, 'password' => $password, 'role' => 'admin' ] );
		return $query->row_array();
	}

}


?>