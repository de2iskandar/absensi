<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_siswa');
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('file');
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
		$config['per_page'] = 10;
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

	public function import_siswa()
	{
		$this->load->view('operator/import_siswa');
	}

	public function do_import_siswa()
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

            $this->load->library('excel_reader');
			$this->excel_reader->setOutputEncoding('CP1251');

			$file =  $upload_data['full_path'];
			$this->excel_reader->read($file);
			error_reporting(E_ALL ^ E_NOTICE);

			// Sheet 1
			$data = $this->excel_reader->sheets[0] ;
                        $dataexcel = Array();
			for ($i = 1; $i <= $data['numRows']; $i++) {

                            if($data['cells'][$i][1] == '') break;
                            $dataexcel[$i-1]['nis'] = $data['cells'][$i][1];
                            $dataexcel[$i-1]['nama_siswa'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['jk'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['alamat'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['kelas'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['nama_ayah'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['pekerjaan'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['hp'] = $data['cells'][$i][2];

			}

            delete_files($upload_data['file_path']);
    		$this->M_siswa->import_siswa($dataexcel);
			
         
    	}
			$this->session->set_flashdata('import', '');
			redirect('operator/view_siswa');   
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
        
		for($col = ord('A'); $col <= ord('G'); $col++){
        //set column dimension
        $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
		//change the font size
        $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

        $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    	}

        //retrive contries table data      
        $rs = $this->db->get('siswa');

        $exceldata=array();
        foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A2');
                
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('I2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
               
                
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
}