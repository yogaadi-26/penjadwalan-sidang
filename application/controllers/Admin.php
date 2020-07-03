<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('sidang_model');
		$this->load->library('form_validation');
		$this->load->library('pagination');

		if (!$this->session->userdata('id')) {
			redirect('page');
		}

		$role = $this->session->userdata('role');
		if ($role != 'admin') {
			redirect('user');
		}

	}

	public function index()
	{
		
		$id = $this->session->userdata('id');
		$data['admin'] = $this->admin_model->getProfile($id);
		/* Card Dashboard (Data User) */
		$data['siswa'] = $this->sidang_model->countSiswa();
		$data['guru']  = $this->sidang_model->countGuru();

		/* Card Dashboard (Data Status) */
		$data['status_ok'] 	   = $this->sidang_model->countOK();
		$data['status_failed'] = $this->sidang_model->countKO();
		/* Card Dashboard (Data Sidang) */
		$data['sidang'] = $this->sidang_model->countSidang();
		$data['title'] = 'Dashboard Admin';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}	

	public function data_guru()
	{
		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$data['title'] = 'Data Guru';
		$data['guru']  = $this->admin_model->getallGuru();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/data_guru', $data);
		$this->load->view('templates/footer');
	}
	

	public function data_siswa()
	{
		/* Pagination Configuration */
        $config['base_url'] 	= site_url('admin/data_siswa'); 
        $config['total_rows'] 	= $this->sidang_model->countSiswa();
        $config['per_page'] 	= 5;  //show record per halaman
        $config["uri_segment"] 	= 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] 	= floor($choice);

        /* Pagination Style Boostrap */
       $config['first_link']       = 'First';
       $config['last_link']        = 'Last';
       $config['next_link']        = 'Next';
       $config['prev_link']        = 'Prev';
       $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
       $config['full_tag_close']   = '</ul></nav></div>';
       $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
       $config['num_tag_close']    = '</span></li>';
       $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
       $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
       $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
       $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['prev_tagl_close']  = '</span>Next</li>';
       $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
       $config['first_tagl_close'] = '</span></li>';
       $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
	    $data['page']  = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$data['title'] = 'Data Siswa';
		$data['siswa'] = $this->admin_model->getallSiswa($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/data_siswa', $data);
		$this->load->view('templates/footer');
	}


	public function tambah()
	{
		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$data['title'] = 'Tambah Data Siswa';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/tambah_siswa', $data);
		$this->load->view('templates/footer');		
	}

	public function tambah_siswa()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|numeric|min_length[9]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|min_length[9]|matches[username]');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('pembimbing', 'Pembimbing', 'required');

		if ($this->form_validation->run() == FALSE) {
		    $id = $this->session->userdata['id'];
		    $data['admin'] = $this->admin_model->getProfile($id);

		    $data['title'] = 'Tambah Data Siswa';
		    $this->load->view('templates/header', $data);
		    $this->load->view('templates/admin/sidebar', $data);
		    $this->load->view('templates/admin/topbar', $data);
		    $this->load->view('admin/tambah_siswa', $data);
		    $this->load->view('templates/footer');
		} 
		else {
			// Data Akun Siswa
			$username 	= $this->input->post('username', TRUE);
			$password 	= md5($this->input->post('password', TRUE));

			//Data Profil Siswa 
			$nama 		= $this->input->post('nama', TRUE);
			$nis 		= $this->input->post('nis', TRUE);
			$kelas 		= $this->input->post('kelas', TRUE);
			$pembimbing = $this->input->post('pembimbing', TRUE);
			$status 	= $this->input->post('status', TRUE);

			// INSERT AKUN SISWA
			$data 	= 	['username' => $username, 'password' => $password, 'role' => 'user' ]; 
			$id_account = $this->admin_model->tambahSiswa('account', $data);

			// INSERT PROFIL SISWA
			$data2 	= 	['id_account' => $id_account, 'id_pembimbing' => $pembimbing, 'nis'=> $nis, 'nama' => $nama,  'kelas'=> $kelas, 
						 'status'=> $status, 'gambar' => 'user.png' ]; 
			$this->admin_model->tambahSiswa('siswa', $data2);	

			$this->session->set_flashdata('msg', '<div class="alert alert-success"role="alert">Data berhasil ditambah! </div>');
			redirect('admin/data_siswa');		 
		}
	}	

	public function edit($idsiswa)
	{
		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$data['title'] = 'Edit Data Siswa';
		$data['user']  = $this->admin_model->getSiswa($idsiswa);
		if ($data['user']) {
		   $this->load->view('templates/header', $data);
		   $this->load->view('templates/admin/sidebar', $data);
		   $this->load->view('templates/admin/topbar', $data);
		   $this->load->view('admin/edit_siswa', $data);
		   $this->load->view('templates/footer');
		}
		else {
		   $this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Data tidak ditemukan! </div>');
		   redirect('admin/data_siswa');
		}
	}	

	public function siswa_edit()
	{
		$id = $this->input->post('id', TRUE);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|min_length[9]');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('pembimbing', 'Pembimbing', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		}

		else {
		// Data Update 
		$id 		= $this->input->post('id', TRUE);
		$nama 		= $this->input->post('nama', TRUE);
		$nis 		= $this->input->post('nis', TRUE);
		$kelas 		= $this->input->post('kelas', TRUE);
		$pembimbing = $this->input->post('pembimbing', TRUE);
		$status 	= $this->input->post('status', TRUE);

		// UPDATE PROFIL SISWA
		$data 	= 	['id_pembimbing' => $pembimbing, 'nis'=> $nis, 'nama' => $nama,  'kelas'=> $kelas, 
					 'status'=> $status, 'gambar' => 'user.png' ];
		$this->admin_model->updateSiswa($id, $data);
		
		$this->session->set_flashdata('msg', '<div class="alert alert-success"role="alert">Data berhasil diupdate! </div>');
		redirect('admin/data_siswa');
		}			 
	}

	public function hapus_siswa()
	{	
		$id = $this->input->post('id');
		$id_account = $this->admin_model->deleteSiswa($id);

		$this->session->set_flashdata('msg', '<div class="alert alert-success"role="alert">Data berhasil dihapus! </div>');
		redirect('admin/data_siswa');
		
	}

	public function detail_siswa($idsiswa)
	{
		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$data['title'] = 'Detail Siswa';
		$data['siswa'] = $this->admin_model->getdataSiswa($idsiswa);
		if ($data['siswa']) {
		   $this->load->view('templates/header', $data);
		   $this->load->view('templates/admin/sidebar', $data);
		   $this->load->view('templates/admin/topbar', $data);
		   $this->load->view('admin/detail_siswa', $data);
		   $this->load->view('templates/footer');
		}
		else {
		   $this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Data tidak ditemukan! </div>');
		   redirect('admin/data_siswa');
		}
	}

	/* Function Penjadwalan Sidang */

	public function jadwal_sidang()
	{
		/* Pagination Configuration */
        $config['base_url'] 	= site_url('admin/jadwal_sidang'); 
        $config['total_rows'] 	= $this->sidang_model->countSidang();
        $config['per_page'] 	= 5;  
        $config["uri_segment"] 	= 3;  
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] 	= floor($choice);

         /* Pagination Style Boostrap */
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
	    $data['page']  = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;        

		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$data['title']  = 'Jadwal Sidang';
		$data['sidang'] = $this->sidang_model->getSidang($config['per_page'], $data['page']);
		$data['pagination'] = $this->pagination->create_links();

	    $this->load->view('templates/header', $data);
	    $this->load->view('templates/admin/sidebar', $data);
	    $this->load->view('templates/admin/topbar', $data);
	    $this->load->view('admin/jadwal_sidang', $data);
	    $this->load->view('templates/footer');
	}

	public function detail_sidang($idsiswa)
	{
		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$data['title']  = 'Detail Sidang';
		$data['sidang'] = $this->sidang_model->getsidangSiswa($idsiswa);
		if ($data['sidang']) {
		   $this->load->view('templates/header', $data);
		   $this->load->view('templates/admin/sidebar', $data);
		   $this->load->view('templates/admin/topbar', $data);
		   $this->load->view('admin/detail_sidang', $data);
		   $this->load->view('templates/footer');
		}
		else {
		   $this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Data tidak ditemukan! </div>');
		   redirect('admin/jadwal_sidang');
		}
	}

	public function sidang()
	{
		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$data['title'] = 'Manajemen Sidang';
	    $this->load->view('templates/header', $data);
	    $this->load->view('templates/admin/sidebar', $data);
	    $this->load->view('templates/admin/topbar', $data);
	    $this->load->view('admin/sidang', $data);
	    $this->load->view('templates/footer');
	}

	public function autocomplete()
	{
		if (isset($_GET['term'])) {
        $result = $this->sidang_model->findSiswa($_GET['term']);
	        if (count($result) > 0) {
		        foreach ($result as $row)
		            $arr_result[] = array(
		            	'label'			=> $row->nama,
		            	'nama' 			=> $row->nama,
		            	'nis'  			=> $row->nis,
		            	'kelas'  		=> $row->kelas,
		            	'status'  		=> $row->status,
		            	'id'  			=> $row->id,
		            	'pembimbing'  	=> $row->id_pembimbing
		            );
        echo json_encode($arr_result);
        }	
      }
	}

	public function add_sidang()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$id = $this->session->userdata['id'];
			$data['admin'] = $this->admin_model->getProfile($id);

			$data['title'] = 'Manajemen Sidang';
		    $this->load->view('templates/header', $data);
		    $this->load->view('templates/admin/sidebar', $data);
		    $this->load->view('templates/admin/topbar', $data);
		    $this->load->view('admin/sidang', $data);
		    $this->load->view('templates/footer');
		}
		else {
			$id 	= $this->input->post('id');
			$status = $this->input->post('status');
			
			/* Cek siswa jika sudah ada jadwal  */
			$cek	= $this->sidang_model->cekSiswa($id);
			if ($cek == 1) {
			 	$this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Siswa telah terjadwal! </div>');
			 	redirect('admin/sidang');
			}	
			/* Cek Siswa Telah Memenuhi Syarat atau belum */
			if (!$status) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Siswa tidak memenuhi syarat! </div>');
				redirect('admin/sidang');
			}
			
			else {
				$id 		= $this->input->post('id');
				$pembimbing = $this->input->post('pembimbing');
				$kelas      = $this->input->post('kelas');
				$nama       = $this->input->post('nama', TRUE);

				$data = [ 'id_siswa' => $id, 'id_pembimbing' => $pembimbing];
				$this->session->set_userdata($data);
				redirect('admin/tambah_sidang');
			}
	   	}
	}

	public function tambah_sidang()
	{
		if(!$this->session->userdata('id_siswa')) {
			redirect('admin/sidang');
		}

		$id = $this->session->userdata['id'];
		$data['admin'] = $this->admin_model->getProfile($id);

		$id_siswa		= $this->session->userdata('id_siswa');
		$id_pembimbing  = $this->session->userdata('id_pembimbing');

		$data['title'] 	 = 'Manajemen Sidang';
		$data['siswa']	 = $this->sidang_model->getSiswa($id_siswa);
		$data['penguji'] = $this->sidang_model->getPenguji($id_pembimbing);
		$data['tanggal'] = $this->sidang_model->getTanggal();
		$data['waktu'] 	 = $this->sidang_model->getWaktu();

	    $this->load->view('templates/header', $data);
	    $this->load->view('templates/admin/sidebar', $data);
	    $this->load->view('templates/admin/topbar', $data);
	    $this->load->view('admin/tambah_sidang', $data);
	    $this->load->view('templates/footer');
	}

	public function proses_sidang()
	{
		$this->form_validation->set_rules('penguji1', 'Penguji 1', 'required');
		$this->form_validation->set_rules('penguji2', 'Penguji 2', 'required|differs[penguji1]',
		array('differs'=> 'Penguji 1 dan Penguji 2 tidak boleh sama') );
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		$this->form_validation->set_rules('ruangan', 'Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->session->userdata['id'];
			$data['admin'] = $this->admin_model->getProfile($id);

			$id_siswa		= $this->session->userdata('id_siswa');
			$id_pembimbing  = $this->session->userdata('id_pembimbing');

			$data['title'] 	 = 'Manajemen Sidang';
			$data['siswa']	 = $this->sidang_model->getSiswa($id_siswa);
			$data['penguji'] = $this->sidang_model->getPenguji($id_pembimbing);
			$data['tanggal'] = $this->sidang_model->getTanggal();
			$data['waktu'] 	 = $this->sidang_model->getWaktu();

		    $this->load->view('templates/header', $data);
		    $this->load->view('templates/admin/sidebar', $data);
		    $this->load->view('templates/admin/topbar', $data);
		    $this->load->view('admin/tambah_sidang', $data);
		    $this->load->view('templates/footer');
		}
		else {
			$id 		= $this->input->post('id_siswa');
			$penguji1 	= $this->input->post('penguji1');
			$penguji2 	= $this->input->post('penguji2');
			$tanggal 	= $this->input->post('tanggal');
			$waktu 		= $this->input->post('waktu');
			$ruangan 	= $this->input->post('ruangan');

		// Validasi Jumlah Sidang Per Hari = 15
		$cek_tanggal 	= $this->sidang_model->countTanggal($tanggal);
		if ($cek_tanggal == 15 ) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Tanggal telah mencapai batas maksimum jumlah sidang ! Pilih tanggal lain </div>');
			redirect('admin/tambah_sidang');
		}

		// Validasi Penggunaan Ruangan Per Hari = 5
		if ($ruangan == "Lab Dasar") {
		$cek_rdasar  	= $this->sidang_model->countLabDasar($tanggal, $ruangan);
			if ($cek_rdasar == 5) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Ruang telah mencapai batas maksimum jumlah sidang ! Pilih ruangan lain</div>');
			redirect('admin/tambah_sidang');
			}	
		} 
		if ($ruangan == "Lab Simulasi" ) {
		$cek_rsimulasi   = $this->sidang_model->countLabSimulasi($tanggal, $ruangan);
			if ($cek_rsimulasi == 5) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Ruang telah mencapai batas maksimum jumlah sidang ! Pilih ruangan lain</div>');
				redirect('admin/tambah_sidang');
			}
		}
		if ($ruangan == "Lab Aplikasi" ) {
		$cek_raplikasi  = $this->sidang_model->countLabAplikasi($tanggal, $ruangan);
		if ($cek_raplikasi == 5) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Ruang telah mencapai batas maksimum jumlah sidang ! Pilih ruangan lain</div>');
			redirect('admin/tambah_sidang');
			}
		}

		
		// Cek Jadwal apakah sudah terpakai atau belum
		$cek_jadwal = $this->sidang_model->checkJadwal($tanggal, $waktu, $ruangan);
		if ($cek_jadwal == 1) {
		 	$this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Jadwal telah terdaftar ! Pilih opsi tanggal, waktu, dan ruangan yang lain</div>');
			redirect('admin/tambah_sidang');
		 } 

			$data = ['id_siswa' 	=> $id,
					 'id_penguji1' 	=> $penguji1,	
					 'id_penguji2' 	=> $penguji2,	
					 'id_tanggal' 	=> $tanggal,	
					 'id_waktu' 	=> $waktu,	
					 'ruangan' 		=> $ruangan ];
			$this->sidang_model->addSidang($data);

			$destroy = ['id_siswa', 'id_pembimbing'];
			$this->session->unset_userdata($destroy);
			$this->session->set_flashdata('msg', '<div class="alert alert-success"role="alert">Jadwal berhasil ditambah! </div>');
			redirect('admin/jadwal_sidang');
		}
	}   	

	public function delete_sidang()
	{
		$id = $this->input->post('id');
		$this->sidang_model->deleteSidang($id);

		$this->session->set_flashdata('msg', '<div class="alert alert-success"role="alert">Data berhasil dihapus! </div>');
		redirect('admin/jadwal_sidang');
	}
}