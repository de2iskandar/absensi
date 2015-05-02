<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_operator extends CI_Model {

	public function index()
	{
		// model operator
	}

	public function get_operator()
	{
		$query = $this->db->get('operator');
		return $query->result_array();
	}

	public function get_absen($num, $offset)
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('siswa', 'siswa.nis = absen.nis');
		$query = $this->db->get();
		return $query->result_array();
	}
}
