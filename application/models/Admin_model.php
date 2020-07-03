<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{

	public function getProfile($id) 
	{
		$query = $this->db->from('account')->join('admin', 'account.id = admin.id_account')->where('account.id', $id)->get();
		return $query->row_array();
	}

	public function getallSiswa($limit, $start)
	{
		$this->db->order_by('nama', 'ASC');
		$query = $this->db->get('siswa', $limit, $start);
		return $query->result_array();
	}

	public function getallGuru()
	{
		$query = $this->db->get('pembimbing');
		return $query->result_array();
	}

	public function getSiswa($id)
	{
		$query = $this->db->get_where('siswa', ['id' => $id]);	
		return $query->row_array();
	}

	public function getdataSiswa($id)
	{
		$this->db->select('a.username, siswa.*, p.nip, p.nama AS pembimbing');
		$this->db->from('account a');
		$this->db->join('siswa', 'a.id = siswa.id_account');
		$this->db->join('pembimbing p', 'p.id = siswa.id_pembimbing');
		$this->db->where('siswa.id', $id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function deleteSiswa($id)
	{
		return $this->db->delete('account', array('id' => $id)); 
	}

	public function tambahSiswa($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function updateSiswa($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('siswa', $data); 
	}

	
}