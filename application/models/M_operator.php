<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_operator extends CI_Model {

	public function index()
	{
		// model operator
	}

	public function get_operator()
	{
		$query = $this->db->get('siswa');
		return $query->result_array();
	}
}
