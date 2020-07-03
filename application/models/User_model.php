<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{

	public function getProfile($id)
	{
		$this->db->select('a.username, s.*, p.nama as pembimbing');
		$this->db->from('account a');
		$this->db->join('siswa s', 'a.id = s.id_account');
		$this->db->join('pembimbing p', 'p.id = s.id_pembimbing');
		$this->db->where('a.id', $id);
		$query= $this->db->get();
		return $query->row_array();
	}

	public function getId($id)
	{
		$this->db->select('s.id');
		$this->db->from('account a');
		$this->db->join('siswa s', 'a.id = s.id_account');
		$this->db->where('a.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getSidang($id)
	{
		$this->db->select('s.id, s.nis, s.nama, s.kelas, p.nama as pembimbing, p1.nama as penguji1, p2.nama as penguji2, t.tanggal, w.waktu_mulai, w.waktu_akhir, sd.ruangan');
		$this->db->select("DATE_FORMAT(t.tanggal,'%d %M %Y') as tanggal");
		$this->db->select("CONCAT_WS(' - ',DATE_FORMAT(w.waktu_mulai, '%H:%i'),DATE_FORMAT(w.waktu_akhir,'%H:%i') ) AS waktu");
		$this->db->from('sidang sd');
		$this->db->join('siswa s', 's.id = sd.id_siswa');
		$this->db->join('pembimbing p', 'p.id = s.id_pembimbing');
		$this->db->join('pembimbing p1', 'p1.id = sd.id_penguji1');
		$this->db->join('pembimbing p2', 'p2.id = sd.id_penguji2'); 
		$this->db->join('tanggal t', 't.id = sd.id_tanggal');
		$this->db->join('waktu w', 'w.id = sd.id_waktu');
		$this->db->where('sd.id_siswa', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
}