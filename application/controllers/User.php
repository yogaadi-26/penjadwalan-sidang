<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');

		if (!$this->session->userdata['id']) {
			redirect('page');
		}

		$role = $this->session->userdata('role');
		if ($role != 'user') {
			redirect('admin');
		}
	}

	public function index()
	{
		$id = $this->session->userdata('id');

		$data['title'] = 'Halaman User';
		$data['user']  = $this->user_model->getProfile($id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/user/sidebar', $data);
		$this->load->view('templates/user/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function sidang()
	{
		$id 	  = $this->session->userdata('id');	
		$id_siswa = implode($this->user_model->getId($id));

		$data['title']  = 'Halaman User';
		$data['user']   = $this->user_model->getProfile($id);
		$data['sidang'] = $this->user_model->getSidang($id_siswa);

		if ($data['sidang']) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/user/sidebar', $data);
			$this->load->view('templates/user/topbar', $data);
			$this->load->view('user/sidang', $data);
			$this->load->view('templates/footer');
		}
		else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/user/sidebar', $data);
			$this->load->view('templates/user/topbar', $data);
			$this->load->view('templates/notfound', $data);
			$this->load->view('templates/footer');
		}
		
	}

}