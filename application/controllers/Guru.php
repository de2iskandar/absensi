<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_operator');
		$this->load->model('M_siswa');
		$this->load->model('M_guru');
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('file');
	}
	
	public function index()
	{
		$this->load->view('guru/home');
	}
}
