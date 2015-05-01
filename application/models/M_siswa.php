<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function index()
	{
		// model guru
	}

	public function get_siswa($num, $offset)
	{
		$query = $this->db->get('siswa', $num, $offset);
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

	function import_siswa($dataarray)
    {
        for($i=0;$i<count($dataarray);$i++){
            $data = array(
                'nis'=>$dataarray[$i]['nis'],
                'nama_siswa'=>$dataarray[$i]['nama_siswa'],
                'jk'=>$dataarray[$i]['jk'],
                'alamat'=>$dataarray[$i]['alamat'],
                'kelas'=>$dataarray[$i]['kelas'],
                'nama_ayah'=>$dataarray[$i]['nama_ayah'],
                'pekerjaan'=>$dataarray[$i]['pekerjaan'],
                'hp'=>$dataarray[$i]['hp']
            );
            $this->db->insert('siswa', $data);
        }
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
