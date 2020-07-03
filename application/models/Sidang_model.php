<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang_model extends CI_Model 
{
	function findSiswa($nama)
	{
	    $this->db->like('nama', $nama , 'both');
	    $this->db->order_by('nama', 'ASC');
	    $this->db->limit(10);
	    return $this->db->get('siswa')->result();
	}

	function getSiswa($id) 
	{
		$this->db->select('s.nama, s.kelas, p.nama AS pembimbing');
		$this->db->from('siswa s');
		$this->db->join('pembimbing p','s.id_pembimbing = p.id');
		$this->db->where('s.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function getPenguji($id)
	{
		$this->db->select('id, nama');
		$this->db->from('pembimbing');
		$this->db->where_not_in('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getTanggal()
	{
		$this->db->select('id');
		$this->db->select("DATE_FORMAT(tanggal,'%d-%m-%Y')AS tanggal");
		$this->db->from('tanggal');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getWaktu()
	{ 
		$this->db->select('id');
		$this->db->select("CONCAT_WS(' - ',DATE_FORMAT(waktu_mulai, '%H:%i'),DATE_FORMAT(waktu_akhir,'%H:%i') ) AS waktu", FALSE);
		$this->db->from('waktu');
		$query = $this->db->get();
		return $query->result_array();	
	}

	// DATA PENJADWALAN SIDANG
	function getSidang($limit, $start)
	{
		$this->db->order_by('s.nis','ASC');
		$this->db->select('s.id, s.nis, s.nama, s.kelas, p1.nama as penguji1, p2.nama as penguji2');
		$this->db->from('sidang sd');
		$this->db->join('siswa s', 's.id = sd.id_siswa');
		$this->db->join('pembimbing p1', 'p1.id = sd.id_penguji1');
		$this->db->join('pembimbing p2', 'p2.id = sd.id_penguji2');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getsidangSiswa($id)
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

	function addSidang($data)
	{
		$this->db->insert('sidang', $data);
	}

	function deleteSidang($id)
	{
		return $this->db->delete('sidang', array('id_siswa' => $id));
	}

	// CHECK (VALIDASI) PENJADWALAN SIDANG
	function cekSiswa($id)
	{
		$query = $this->db->get_where('sidang',['id_siswa' => $id]);
		return $query->num_rows();
	}

	function countTanggal($id)
	{
		$where = ['id_tanggal' => $id];
		$this->db->where($where);
		$this->db->from('sidang');
		return $this->db->count_all_results();
	}

	function countLabDasar($id, $ruangan)
	{
		$where = ['id_tanggal' => $id, 'ruangan' => $ruangan];
		$this->db->where($where);
		$this->db->from('sidang');
		return $this->db->count_all_results();
	}

	function countLabSimulasi($id, $ruangan)
	{
		$where = ['id_tanggal' => $id, 'ruangan' => $ruangan];
		$this->db->where($where);
		$this->db->from('sidang');
		return $this->db->count_all_results();
	}

	function countLabAplikasi($id, $ruangan)
	{
		$where = ['id_tanggal' => $id, 'ruangan' => $ruangan];
		$this->db->where($where);
		$this->db->from('sidang');
		return $this->db->count_all_results();
	}

	function checkJadwal($tanggal, $waktu, $ruangan)
	{
		$where = ['id_tanggal' => $tanggal ,'id_waktu' => $waktu ,'ruangan' => $ruangan];
		$this->db->where($where);
		$this->db->from('sidang');
		return $this->db->count_all_results();
	}

	/* FUNCTION COUNT DATA (Dashboard)  */
	function countSiswa()
	{
		$query = $this->db->get('siswa');
		return $query->num_rows();
	}

	function countGuru()
	{
		$query = $this->db->get('pembimbing');
		return $query->num_rows();
	}

	function countOK()
	{
		$where = ['status' => 'Terpenuhi'];
		$this->db->where($where);
		$this->db->from('siswa');
		return $this->db->count_all_results();
	}

	function countKO()
	{
		$where = ['status' => NULL ];
		$this->db->where($where);
		$this->db->from('siswa');
		return $this->db->count_all_results();
	}

	function countSidang()
	{
		$query = $this->db->get('sidang');
		return $query->num_rows();
	}

}	