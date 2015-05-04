<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_operator','operator',TRUE);
		$this->load->model('M_siswa','siswa',TRUE);
		$this->load->model('M_guru','guru',TRUE);
	}
	
	public function index()
	{
		$this->home();
	}

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$level = $this->session->userdata('level');
		if (!isset($is_logged_in) || $is_logged_in != TRUE || $level != 'guru') {
			redirect ('login');
		}
	}

	public function home()
	{
		$data['data'] = $this->operator->get_absen();
		$data['nama'] = $this->session->userdata('nama');
		$data['main_content'] = 'guru/home';
		$this->load->view('template/guru', $data);
	}
}
