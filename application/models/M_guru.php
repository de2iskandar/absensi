<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	public function index()
	{
		// model guru
	}

	public function get_guru()
	{
		$query = $this->db->get('guru');
		return $query->result_array();
	}
}
