<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	public function index()
	{
		// model guru
	}

	public function get_guru()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = guru.id_mapel');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_where_guru($nip)
	{
		$query = $this->db->get_where('guru', array('nip' => $nip));
		return $query->result_array();
	}

	public function insert_guru($data)
	{
		$query = $this->db->insert('guru', $data);
		return $query;
	}

	function import_guru($dataarray)
    {
        for($i=0;$i<count($dataarray);$i++){
            $data = array(
                'nip'=>$dataarray[$i]['nip'],
                'nama_guru'=>$dataarray[$i]['nama_guru'],
                'jk'=>$dataarray[$i]['jk'],
                'alamat'=>$dataarray[$i]['alamat'],
                'password'=>$dataarray[$i]['password']
            );
            $this->db->insert('guru', $data);
        }
    }

	public function delete_guru($nip)
	{
		$query = $this->db->delete('guru', array('nip' => $nip));
		return $query;
	}

	public function replace_guru($data)
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
	
}
