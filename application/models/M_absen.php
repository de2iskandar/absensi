<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absen extends CI_Model {

	public function index()
	{
		// model guru
	}

	public function insert_absen($data)
	{
		$query = $this->db->insert('absen', $data);
		return $query;
	}

	public function delete_absen($nis)
	{
		$query = $this->db->delete('guru', array('nis' => $nis));
		return $query;
	}

	public function replace_absen($nis)
	{
		$query = $this->db->replace('guru', $data);
		return $query;

	}


	public function get_absen()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('siswa', 'absen.nis = siswa.nis');
		$this->db->join('guru', 'absen.id_guru = guru.id_guru');
		$this->db->where('guru.id_guru', $this->session->userdata('id_guru'));
		$this->db->where('absen.tanggal', date('Y-m-d'));
		$query = $this->db->get();


		return $query->result_array();
	}

	public function get_siswa()
	{
		$query = $this->db->get('siswa');
		return $query->result_array();
	}

	public function get_alpha()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('siswa', 'absen.nis = siswa.nis');
		$this->db->join('guru', 'absen.id_guru = guru.id_guru');
		$this->db->where('guru.id_guru', $this->session->userdata('id_guru'));
		$this->db->where('absen.tanggal', date('Y-m-d'));
		$this->db->where('absen.keterangan', 'Tanpa Keterangan');
		$query = $this->db->get();


		return $query->result_array();
	}
}
