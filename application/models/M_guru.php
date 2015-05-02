<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	public function index()
	{
		// model guru
	}

	public function get_guru($num, $offset)
	{
		$query = $this->db->get('guru', $num, $offset);
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
	
}
