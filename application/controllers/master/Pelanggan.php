<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pelanggan_model');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		// data[js] digunakan apabila dalam page tersebut butuh js, file di simpan di views/js
        $this->data['js'] = 'master/pelanggan_js';
        // data['main_view] digunakan untuk mengambil isi dari content body, file disimpan di views/main
        $this->data['main_view'] = 'master/v_pelanggan';
        // Load View
		$this->load->view('template', $this->data);
	}

	public function filter(){
		$object=$this->Pelanggan_model->getPelanggan();
		echo json_encode($object);
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

	public function delete_row(){
		$param=$this->input->post();
		$data=$this->Pelanggan_model->delete($param['id']);
		$result['message']="Data Pelanggan berhasil dihapus.";
		echo json_encode($result);
	}

	public function getData(){
		$param=$this->input->post();
		$data=$this->Pelanggan_model->getById($param['id']);
		echo json_encode($data);
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/master/Pelanggan.php */