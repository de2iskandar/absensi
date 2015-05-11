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

	public function get_absen()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('siswa', 'absen.nis = siswa.nis');
		$this->db->join('guru', 'guru.id_guru = absen.id_guru');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_mapel()
	{
		$this->db->select('*');
		$this->db->from('mata_pelajaran');
		$this->db->join('guru', 'mata_pelajaran.nip = guru.nip');
		$query = $this->db->get();
		return $query->result_array();
	}
}
