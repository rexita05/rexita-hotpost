<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotspot extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pelanggan_model');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		// data[js] digunakan apabila dalam page tersebut butuh js, file di simpan di views/js
        $this->data['js'] = 'pembayaran/hotspot_js';

        // data['main_view] digunakan untuk mengambil isi dari content body, file disimpan di views/main
        $this->data['main_view'] = 'pembayaran/v_hotspot';

        // Load View
		$this->load->view('template', $this->data);
	}

	public function filter() {
		$object = $this->Pelanggan_model->getPelanggan();
	    echo json_encode($object);

	    // $page = !is_null($this->input->post('page')) ? $this->input->post('page') : 1;
     //    $rows = !is_null($this->input->post('rows')) ? $this->input->post('rows') : 10;

     //    $offset = ($page - 1) * $rows;
	    // $query="SELECT*FROM pelanggan";

     //    $result = array();
     //    $result['total'] = $this->db->query($query)->num_rows();

     //    $rows = array();

     //    $rows = $this->db->query($query)->result_array();
     //    $result = array_merge($result, ['rows' => $rows]);
	    // echo json_encode($result);
	}

	public function create(){
		$param=$this->input->post();
		$data=$this->Pelanggan_model->insert();
		if($data==null){
			$result['message']="Data Pelanggan berhasil ditambah.";
		}
		echo json_encode($result);
	}

	public function update(){
		$param=$this->input->post();
		$data=$this->Pelanggan_model->updateById($param['id']);
		if($data==null){
			$result['message']="Data Pelanggan berhasil diubah.";
		}
		echo json_encode($result);
	}

	public function getData(){
		$param=$this->input->post();
		$data=$this->Pelanggan_model->getById($param['id']);
		echo json_encode($data);
	}

	public function hapus(){
		$param=$this->input->post();
		$data=$this->Pelanggan_model->hapus($param['id']);
		$result['message']="Data Pelanggan berhasil dihapus.";
		echo json_encode($data);

	}

}

/* End of file Hotspot.php */
/* Location: ./application/controllers/pembayaran/Hotspot.php */