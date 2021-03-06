<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_operator','operator', TRUE);
		$this->load->model('M_guru','guru', TRUE);
		$this->load->model('M_siswa','siswa', TRUE);
	}

	public function index()
	{
		$this->home();
	}

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$level        = $this->session->userdata('level');
		if (!isset($is_logged_in) || $is_logged_in != TRUE || $level != 'admin') {
			redirect ('login');
		}
	}

	// function dasboard laporan
	public function home()
	{
		$data['data']         = $this->operator->get_absen();
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'home';
		$data['main_content'] = 'operator/home';
		$this->load->view('template/operator', $data);
	}

	// function siswa
	public function view_siswa($offset=0)
	{
		$jml                        = $this->db->get('siswa');
		$config['base_url']         = base_url().'/operator/view_siswa';
		$config['total_rows']       = $jml->num_rows();
		$config['per_page']         = 10;
		$config['uri_segment']      = 3;
		$config['full_tag_open']    = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close']   = "</ul>";
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open']    = "<li>";
		$config['next_tagl_close']  = "</li>";
		$config['prev_tag_open']    = "<li>";
		$config['prev_tagl_close']  = "</li>";
		$config['first_tag_open']   = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open']    = "<li>";
		$config['last_tagl_close']  = "</li>";

		$this->pagination->initialize($config);
		$data['halaman']      = $this->pagination->create_links();
		$data['offset']       = $offset;
		$data['data']         = $this->siswa->get_siswa($config['per_page'], $offset);
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'siswa';
		$data['main_content'] = 'operator/view_siswa';
		$this->load->view('template/operator',$data);
	}

	public function add_siswa()
	{
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'siswa';
		$data['main_content'] = 'operator/add_siswa';
		$this->load->view('template/operator',$data);
	}

	public function insert_siswa()
	{
		$nis        = $_POST['nis'];
		$nama_siswa = $_POST['nama_siswa'];
		$jk         = $_POST['jk'];
		$alamat     = $_POST['alamat'];
		$kelas      = $_POST['kelas'];
		$nama_ayah  = $_POST['nama_ayah'];
		$pekerjaan  = $_POST['pekerjaan'];
		$hp         = $_POST['hp'];
		$data_siswa = array(
			'nis'        => $nis,
			'nama_siswa' => $nama_siswa,
			'jk'         => $jk,
			'alamat'     => $alamat,
			'kelas'      => $kelas,
			'nama_ayah'  => $nama_ayah,
			'pekerjaan'  => $pekerjaan,
			'hp'         => $hp
    	);

    	$res = $this->siswa->insert_siswa($data_siswa);
    	if ($res>=1) {
    	 	$this->session->set_flashdata('tambah', 'Sukses! data berhasil ditambah');
    	 	redirect ('operator/view_siswa');
    	} 
	}

	public function edit_siswa($nis)
	{
		$siswa = $this->db->get_where('siswa', array('nis' => $nis))->result_array();
		$data  = array(
			'nis'        => $siswa[0]['nis'],
			'nama_siswa' => $siswa[0]['nama_siswa'],
			'jk'         => $siswa[0]['jk'],
			'alamat'     => $siswa[0]['alamat'],
			'kelas'      => $siswa[0]['kelas'],
			'nama_ayah'  => $siswa[0]['nama_ayah'],
			'pekerjaan'  => $siswa[0]['pekerjaan'],
			'hp'         => $siswa[0]['hp']
    	);
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'siswa';
		$data['main_content'] = 'operator/edit_siswa';
		$this->load->view('template/operator',$data);
	}

	public function update_siswa()
	{
		$nis        = $_POST['nis'];
		$nama_siswa = $_POST['nama_siswa'];
		$jk         = $_POST['jk'];
		$alamat     = $_POST['alamat'];
		$kelas      = $_POST['kelas'];
		$nama_ayah  = $_POST['nama_ayah'];
		$pekerjaan  = $_POST['pekerjaan'];
		$hp         = $_POST['hp'];
		$data_siswa = array(
			'nis'        => $nis,
			'nama_siswa' => $nama_siswa,
			'jk'         => $jk,
			'alamat'     => $alamat,
			'kelas'      => $kelas,
			'nama_ayah'  => $nama_ayah,
			'pekerjaan'  => $pekerjaan,
			'hp'         => $hp
    	);

    	$res = $this->siswa->replace_siswa($data_siswa);
    	if ($res>=1) {
    		$this->session->set_flashdata('update', 'Sukses! data berhasil diperbarui');
    		redirect ('operator/view_siswa');
    	}
	}

	public function delete_siswa($nis)
	{
		$res = $this->siswa->delete_siswa($nis);
		if ($res>=1) {
			$this->session->set_flashdata('delete', 'Sukses! data berhasil dihapus');
			redirect ('operator/view_siswa');
    	} 
	}

	public function import_siswa()
	{
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'siswa';
		$data['main_content'] = 'operator/import_siswa';
		$this->load->view('template/operator',$data);
	}

	public function do_import_siswa()
	{
		$config['upload_path']   = './temp_upload/';
		$config['allowed_types'] = 'xls';
                
		$this->load->library('upload', $config);
                

		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
			
		}
		else
		{
			$data        = array('error' => false);
			$upload_data = $this->upload->data();

			//load library phpExcel
			$this->load->library("excel");
			//here i used microsoft excel 2007
			$objReader = PHPExcel_IOFactory::createReader('Excel5');
			//set to read only
			$objReader->setReadDataOnly(true);
			//load excel file
			$file =  $upload_data['full_path'];
			$objPHPExcel = $objReader->load($file);
			$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
			//loop from first data until last data
			$highestRow = $objWorksheet->getHighestRow();
			for($i=2; $i<=$highestRow; $i++){
				$nis        = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
				$nama_siswa = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
				$jk         = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
				$alamat     = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
				$kelas      = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
				$nama_ayah  = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
				$pekerjaan  = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
				$hp         = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
				$data_siswa = array(
					'nis'        => $nis,
					'nama_siswa' => $nama_siswa,
					'jk'         => $jk,
					'alamat'     => $alamat,
					'kelas'      => $kelas,
					'nama_ayah'  => $nama_ayah,
					'pekerjaan'  => $pekerjaan,
					'hp'         => $hp
				);
				$res = $this->siswa->insert_siswa($data_siswa);
				delete_files($upload_data['file_path']);
			}
			if ($res>=1) {
				$this->session->set_flashdata('import','');
				redirect ('operator/view_siswa');
	    	} 
		}
	}

	public function export_siswa()
	{
   		$this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('siswa');
        
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'NIS');
        $this->excel->getActiveSheet()->setCellValue('B1', 'Nama Siswa');
        $this->excel->getActiveSheet()->setCellValue('C1', 'JK');
        $this->excel->getActiveSheet()->setCellValue('D1', 'Alamat');
        $this->excel->getActiveSheet()->setCellValue('E1', 'Kelas');
        $this->excel->getActiveSheet()->setCellValue('F1', 'Nama Ayah');
        $this->excel->getActiveSheet()->setCellValue('G1', 'Pekerjaan');
        $this->excel->getActiveSheet()->setCellValue('H1', 'No. HP');
        
		for($col = ord('A'); $col <= ord('H'); $col++){
	        //set column dimension
	        $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
			//change the font size
	        $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
    	}

        //retrive contries table data      
        $rs = $this->db->get('siswa');

        $exceldata=array();
        foreach ($rs->result_array() as $row){
            $exceldata[] = $row;
        }
            //Fill data 
            $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A2');

            $this->excel->getActiveSheet()->getStyle('H')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

            $filename='Student_List-'.date('d/m/y').'.xls'; //save our workbook as this file name
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache

            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');
	}

	// function guru
	public function view_guru()
	{
		
		$data['data']         = $this->guru->get_guru();
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'guru';
		$data['main_content'] = 'operator/view_guru';
		$this->load->view('template/operator',$data);
	}

	public function add_guru()
	{
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'guru';
		$data['main_content'] = 'operator/add_guru';
		$this->load->view('template/operator',$data);
	}

	public function insert_guru()
	{
		$nip       = $_POST['nip'];
		$nama_guru = $_POST['nama_guru'];
		$jk        = $_POST['jk'];
		$alamat    = $_POST['alamat'];
		$id_mapel  = $_POST['id_mapel'];
		$id_user   = $_POST['id_user'];
		$password  = $_POST['password'];
		$data_guru = array(
			'nip'       => $nip,
			'nama_guru' => $nama_guru,
			'jk'        => $jk,
			'alamat'    => $alamat,
			'id_mapel'  => $id_mapel,
			'id_user'   => $id_user,
			'password'  => md5($password)
    	);

    	$res = $this->guru->insert_guru($data_guru);
    	if ($res>=1) {
    	 	$this->session->set_flashdata('tambah', 'Sukses! data berhasil ditambah');
    	 	redirect ('operator/view_guru');
    	} 
	}

	public function edit_guru($nip)
	{
		$guru = $this->db->get_where('guru', array('nip' => $nip))->result_array();
		$data = array(
			'nip'       => $guru[0]['nip'],
			'nama_guru' => $guru[0]['nama_guru'],
			'jk'        => $guru[0]['jk'],
			'alamat'    => $guru[0]['alamat'],
			'id_mapel'  => $guru[0]['id_mapel'],
			'id_user'   => $guru[0]['id_user']
    	);
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'guru';
		$data['main_content'] = 'operator/edit_guru';
		$this->load->view('template/operator',$data);
	}

	public function update_guru()
	{
		$nip       = $_POST['nip'];
		$nama_guru = $_POST['nama_guru'];
		$jk        = $_POST['jk'];
		$alamat    = $_POST['alamat'];
		$id_mapel  = $_POST['id_mapel'];
		$id_user   = $_POST['id_user'];
		$password  = $_POST['password'];
		$data_guru = array(
			'nip'       => $nip,
			'nama_guru' => $nama_guru,
			'jk'        => $jk,
			'alamat'    => $alamat,
			'id_mapel'  => $id_mapel,
			'id_user'   => $id_user,
			'password'  => md5($password)
    	);

    	$res = $this->guru->replace_guru($data_guru);
    	if ($res>=1) {
    		$this->session->set_flashdata('update', 'Sukses! data berhasil diperbarui');
    		redirect ('operator/view_guru');
    	}
	}

	public function delete_guru($nip)
	{
		$res = $this->guru->delete_guru($nip);
		if ($res>=1) {
			$this->session->set_flashdata('delete', 'Sukses! data berhasil dihapus');
			redirect ('operator/view_guru');
    	} 
	}

	public function import_guru()
	{
		$data['nama']         = $this->session->userdata('nama');
		$data['menu']         = 'guru';
		$data['main_content'] = 'operator/import_guru';
		$this->load->view('template/operator',$data);
	}

	public function do_import_guru()
	{
		$config['upload_path'] = './temp_upload/';
		$config['allowed_types'] = 'xls';
                
		$this->load->library('upload', $config);
                

		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
			
		}
		else
		{
			$data = array('error' => false);
			$upload_data = $this->upload->data();

			//load library phpExcel
			$this->load->library("excel");
			//here i used microsoft excel 2007
			$objReader = PHPExcel_IOFactory::createReader('Excel5');
			//set to read only
			$objReader->setReadDataOnly(true);
			//load excel file
			$file =  $upload_data['full_path'];
			$objPHPExcel = $objReader->load($file);
			$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
			//loop from first data until last data
			$highestRow = $objWorksheet->getHighestRow();
			for($i=2; $i<=$highestRow; $i++){
				$nip = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
				$nama_guru = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
				$jk = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
				$alamat = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
				$data_guru = array(
					'nip' => $nip,
		    		'nama_guru' => $nama_guru,
					'jk' => $jk,
					'alamat' => $alamat
				);
				$res = $this->guru->insert_guru($data_guru);
				delete_files($upload_data['file_path']);
			}
			if ($res>=1) {
				$this->session->set_flashdata('import','');
				redirect ('operator/view_guru');
	    	} 
		}
	}

	public function export_guru()
	{
   		$this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('guru');
        
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'NIS');
        $this->excel->getActiveSheet()->setCellValue('B1', 'Nama guru');
        $this->excel->getActiveSheet()->setCellValue('C1', 'JK');
        $this->excel->getActiveSheet()->setCellValue('D1', 'Alamat');
        $this->excel->getActiveSheet()->setCellValue('E1', 'Kelas');
        $this->excel->getActiveSheet()->setCellValue('F1', 'Nama Ayah');
        $this->excel->getActiveSheet()->setCellValue('G1', 'Pekerjaan');
        $this->excel->getActiveSheet()->setCellValue('H1', 'No. HP');
        
		for($col = ord('A'); $col <= ord('H'); $col++){
	        //set column dimension
	        $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
			//change the font size
	        $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
    	}

        //retrive contries table data      
        $rs = $this->db->get('guru');

        $exceldata=array();
        foreach ($rs->result_array() as $row){
            $exceldata[] = $row;
        }
            //Fill data 
            $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A2');

            $this->excel->getActiveSheet()->getStyle('H')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

            $filename='Student_List-'.date('d/m/y').'.xls'; //save our workbook as this file name
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache

            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');
	}

	//function mapel
	public function view_mapel()
	{
		$data['nama']         = $this->session->userdata('nama');
		$data['data']         = $this->operator->get_mapel();
		$data['menu']         = 'mapel';
		$data['main_content'] = 'operator/view_mapel';
		$this->load->view('template/operator',$data);
	}
}