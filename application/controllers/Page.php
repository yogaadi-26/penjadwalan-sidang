<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller 
{

	public function __construct()
    {
       parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');

    }

    public function index()
    {
        if ($this->session->userdata('id')) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin');
            }
            else{
                redirect('user');
            }
        }

        $data['title'] = 'SIPASI SMKN 1 Cimahi';
        $this->load->view('page/index', $data);
    }

	public function user()
	{
		$data['title'] = 'Login Page';

		$this->load->view('templates/login_header', $data);
		$this->load->view('page/login');
		$this->load->view('templates/login_footer');
	}

    public function admin()
    {
        $data['title'] = 'Administrator Login';

        $this->load->view('templates/login_header', $data);
        $this->load->view('page/login_admin');
        $this->load->view('templates/login_footer');

    }

	public function login() 
	{
		$this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|min_length[9]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'SIPASI SMKN 1 Cimahi';

			$this->load->view('templates/login_header', $data);
			$this->load->view('page/login');
			$this->load->view('templates/login_footer');
    	} 

    	else {
    		$nis 		= $this->input->post('nis', TRUE);
    		$password 	= md5($this->input->post('password', TRUE));

    		$user       = $this->login_model->userLogin($nis, $password);

    		if($user) {
                $data   = [ 'id'        => $user['id'],
    		   			    'username'  => $user['username'],
    		   			    'role' 		=> $user['role'] ]; 
                
                $this->session->set_userdata($data); 
                redirect('user');
    		} 

            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">NIS atau password salah! </div>'); 
                redirect('page/user');
    		}
    	}
	}

    public function login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'SIPASI SMKN 1 Cimahi';

            $this->load->view('templates/login_header', $data);
            $this->load->view('page/login_admin');
            $this->load->view('templates/login_footer');
        } 

        else {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            $admin    = $this->login_model->adminLogin($username, $password);

            if ($admin) {
                $data =   [ 'id'          => $admin['id'], 
                            'username'    => $admin['username'], 
                            'role'        => $admin['role']  ];

                $this->session->set_userdata($data);
                redirect('admin');
            }

            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"role="alert">Username atau password salah! </div>');
                redirect('page/admin');
            }
        }
    }

    public function logout()
    {
        $destroy = ['id', 'username', 'role'];
        $this->session->unset_userdata($destroy);
        $this->session->sess_destroy();
        $this->session->set_flashdata('msg', '<div class="alert alert-success"role="alert">Logout Berhasil! </div>');
        redirect('page');
    }


}