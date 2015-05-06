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
		$data = $this->absen->get_absen();
		foreach ($data as $d) {
		$tanggal=$d['tanggal'];
		$nama_siswa=$d['nama_siswa'];
		$keterangan=$d['keterangan'];
		$no_tujuan=$d['hp'];
		$message = 'Kami Memberitahukan bahwa pada tanggal '.$tanggal.', '.$nama_siswa.'tidak masuk sekolah dengan alasan '.$keterangan;
		}

		for($i=0; $i<=$numb_rows(); $i++){

 
		exec('\bin\gammu-smsd-inject.exe -c \bin\smsdrc EMS '.$no_tujuan.' -text "'.$message.'"');
		}

		redirect ('guru');
	}
}
