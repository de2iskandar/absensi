<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_absen','absen',TRUE);
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
