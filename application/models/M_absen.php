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
		$data = 'SELECT * FROM	absen
								INNER JOIN siswa ON absen.nis = siswa.nis
								INNER JOIN guru ON absen.id_user = guru.id_user ;';


		return $this->db->query($data)->result();
	}
	
}
