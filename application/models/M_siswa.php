<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function index()
	{
		// model guru
	}

	public function get_siswa()
	{
		$query = $this->db->get('siswa');
		return $query->result_array();
	}

	public function get_where_siswa($nis)
	{
		$query = $this->db->get_where('siswa', array('nis' => $nis));
		return $query->result_array();
	}

	public function insert_siswa($data)
	{
		$query = $this->db->insert('siswa', $data);
		return $query;
	}

	public function delete_siswa($nis)
	{
		$query = $this->db->delete('siswa', array('nis' => $nis));
		return $query;
	}

	public function replace_siswa($data)
	{
		$query = $this->db->replace('siswa', $data);
		return $query;

	}
	
}
