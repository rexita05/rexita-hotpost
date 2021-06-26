<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();
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
        $result = sendRequest("POST", "master/pelanggan/search".$criteria, [], false);
        echo json_encode($result);
	}

    public function insert(){
        $result = sendRequest("POST", "master/pelanggan/insert", $_POST['data'], true);
        echo json_encode($result);
    }

    public function update(){
        $result = sendRequest("POST", "master/pelanggan/update", $_POST['data'], false);
        echo json_encode($result);
    }

	public function drop(){
		$result = sendRequest("POST", "master/pelanggan/delete", $_POST['data'], false);
		echo json_encode($result);
	}

	public function getPerkode(){
        $result = sendRequest("GET", "master/pelanggan/getPerkode/".$_POST['id'], [], true);
        echo json_encode($result);
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/master/Pelanggan.php */