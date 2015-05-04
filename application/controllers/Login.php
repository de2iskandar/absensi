<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('M_login', 'login', TRUE);
	}
	
	public function index()
	{
		$this->load->view('view_login');
	}

	public function cek_login()
	{
		if($this->login->cek_login())
		{
			if ($this->session->userdata('level')=='admin')
			{
				redirect('operator/home');
			}
			else
			{
				redirect('guru/home');
			}
			
		}
		else
		{
			redirect ('login');
		}
	}

	public function logout()
    {
        $this->session->unset_userdata(array('nama'=> '', 'level'=> '', 'login' => FALSE));
        $this->session->sess_destroy();
		redirect('login');
    }
}
