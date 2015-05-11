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
		$this->load->model('M_absen','absen',TRUE);
	}
	
	public function index()
	{
		$this->home();
	}

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$level        = $this->session->userdata('level');
		if (!isset($is_logged_in) || $is_logged_in != TRUE || $level != 'guru') {
			redirect ('login');
		}
	}

	public function home()
	{
		$data['data']         = $this->absen->get_absen();
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'home';
		$data['main_content'] = 'guru/home';
		$this->load->view('template/guru', $data);
	}

	public function absensi()
	{
		$data['data']         = $this->absen->get_siswa();
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'absensi';
		$data['main_content'] = 'guru/absensi';
		$this->load->view('template/guru', $data);
	}

	public function insert_absen()
	{
		$id_guru    = $this->session->userdata('id_guru');
		$nis        = $_POST['nis'];
		$tanggal    = date('Y-m-d');
		$keterangan = $_POST['keterangan'];
		$data = array(
				'tanggal'    => $tanggal,
				'nis'		 => $nis,
				'id_guru'    => $id_guru,
				'keterangan' => $keterangan
			);
		$res = $this->absen->insert_absen($data);
		redirect ('guru/home');
	}

	public function insert_absen_all()
	{
		for($i=0; $i<=num_rows(); $i++){
			$id_guru    = $this->session->userdata('id_guru');
			$nis        = $_POST['nis'][$i];
			$tanggal    = date('Y-m-d');
			$keterangan = $_POST['keterangan'][$i];
			$data = array(
				'tanggal'    => $tanggal,
				'nis'		 => $nis,
				'id_guru'    => $id_guru,
				'keterangan' => $keterangan
			);
			$res = $this->absen->insert_absen($data);
		}
    	if ($res>=1) {
    	 	redirect ('guru/home');
    	} 

	}

	public function send_sms()
	{
		
		$data = $this->absen->get_alpha();
		foreach ($data as $d) {
			$tanggal=$d['tanggal'];
			$nama_siswa=$d['nama_siswa'];
			$no_tujuan=$d['hp'];
		}
		$message = 'Kami memberitahukan bahwa pada '.$tanggal.', '.$nama_siswa.' tidak masuk sekolah dengan tanpa keterangan.';

		exec('c:\xampp\htdocs\absensi\gammu\bin\gammu-smsd-inject.exe -c c:\xampp\htdocs\absensi\gammu\bin\smsdrc EMS '.$no_tujuan.' -text "'.$message.'"');

		redirect ('guru');
	}
}
