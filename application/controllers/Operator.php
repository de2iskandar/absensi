<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_siswa');
	}

	public function index()
	{
		$this->view_siswa();
	}

	public function view_siswa($offset=0)
	{
		$jml = $this->db->get('siswa');
		$config['base_url'] = base_url().'/operator/view_siswa';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;
		$data['data'] = $this->M_siswa->get_siswa($config['per_page'], $offset);
		$this->load->view('operator/view_siswa',$data);
	}

	public function add_siswa()
	{
		$this->load->view('operator/add_siswa');
	}

	public function insert_siswa()
	{
		$nis = $_POST['nis'];
		$nama_siswa = $_POST['nama_siswa'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$kelas = $_POST['kelas'];
    	$nama_ayah = $_POST['nama_ayah'];
    	$pekerjaan = $_POST['pekerjaan'];
    	$hp = $_POST['hp'];
    	$data = array(
    		'nis' => $nis,
    		'nama_siswa' => $nama_siswa,
			'jk' => $jk,
			'alamat' => $alamat,
			'kelas' => $kelas,
	    	'nama_ayah' => $nama_ayah,
	    	'pekerjaan' => $pekerjaan,
	    	'hp' => $hp
    	);

    	$res = $this->M_siswa->insert_siswa($data);
    	if ($res>=1) {
    	 	$this->session->set_flashdata('tambah', 'Sukses! data berhasil ditambah');
    	 	redirect('operator/view_siswa');
    	} 
	}

	public function edit_siswa($nis)
	{
		$siswa = $this->db->get_where('siswa', array('nis' => $nis))->result_array();
		$data = array(
    		'nis' => $siswa[0]['nis'],
    		'nama_siswa' => $siswa[0]['nama_siswa'],
			'jk' => $siswa[0]['jk'],
			'alamat' => $siswa[0]['alamat'],
			'kelas' => $siswa[0]['kelas'],
	    	'nama_ayah' => $siswa[0]['nama_ayah'],
	    	'pekerjaan' => $siswa[0]['pekerjaan'],
	    	'hp' => $siswa[0]['hp']
    	);

		$this->load->view('operator/edit_siswa', $data);
	}

	public function update_siswa()
	{
		$nis = $_POST['nis'];
		$nama_siswa = $_POST['nama_siswa'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$kelas = $_POST['kelas'];
    	$nama_ayah = $_POST['nama_ayah'];
    	$pekerjaan = $_POST['pekerjaan'];
    	$hp = $_POST['hp'];
    	$data = array(
    		'nis' => $nis,
    		'nama_siswa' => $nama_siswa,
			'jk' => $jk,
			'alamat' => $alamat,
			'kelas' => $kelas,
	    	'nama_ayah' => $nama_ayah,
	    	'pekerjaan' => $pekerjaan,
	    	'hp' => $hp
    	);

    	$res = $this->M_siswa->replace_siswa($data);
    	if ($res>=1) {
    		$this->session->set_flashdata('update', 'Sukses! data berhasil diperbarui');
    	 	redirect('operator/view_siswa');
    	}
	}

	public function delete_siswa($nis)
	{
		$res = $this->M_siswa->delete_siswa($nis);
		if ($res>=1) {
			$this->session->set_flashdata('delete', 'Sukses! data berhasil dihapus');
    	 	redirect('operator');
    	} 
	}
}