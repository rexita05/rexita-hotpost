<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pelanggan_model');
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->helper('api_helper');
	}

	public function index()
	{
        $this->data['js'] = 'master/pelanggan_js';
        $this->data['main_view'] = 'master/v_pelanggan';
		$this->load->view('template', $this->data);
	}

	public function filter(){
        $param=$this->input->post();
        $criteria="";
        if($param['criteria']!=null || $param['criteria']!=""){
            $criteria="/".$param['criteria'];
        }
        $result = sendRequest("POST", "http://localhost/slim-api/master/pelanggan/search".$criteria, [], false);
        echo json_encode($result);
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

	public function getPerkode(){
        $result = sendRequest("GET", "http://localhost/slim-api/master/pelanggan/getPerkode/".$_POST['id'], [], false);
        echo json_encode($result);
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/master/Pelanggan.php */