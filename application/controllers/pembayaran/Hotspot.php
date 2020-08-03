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

	public function print(){
		$param = $this->input->post();
		$data  = $this->Pelanggan_model->print();
		// $id             = $param['id'];
		// $kode           = $param['kode'];
		// $layanan        = $param['layanan'];
		// $nama_pelanggan = $param['nama_pelanggan'];
		// $tagihan        = $param['tagihan'];
		// $terbilang      = $param['terbilang'];

		$master['id']             = $param['id'];
		$master['kode']           = $param['kode'];
		$master['layanan'] = "";
		if($param['layanan']==1){
			$master['layanan'] = "Internet Hotspot";
		}
		else{
			$master['layanan'] = "Pemasangan Hotspot";
		}
		$master['nama_pelanggan'] = $param['nama_pelanggan'];
		$master['tagihan']        = $param['tagihan'];
		$master['terbilang']      = $param['terbilang'];
		// echo json_encode($master);die();
		$this->load->library('Pdf');
        $pdf = tcpdf();
        //initialize document
        $pdf->setMargins(5, 30, 5);
        $pdf->AddPage("P", "F4");
        $pdf->SetFont("helvetica", "", 9);
        
        $html='<div>'.$_POST['nesindo'].'</div>';
        $html.='<div>STRUK BUKTI PEMBAYARAN TAGIHAN INTERNET "REXITA HOTSPOT"</div>';
        $html.='
	        <table height="350" width="100%" boder="1px solid black">
	        	<tr>
					<td>Layanan</td>
					<td>:</td>
					<td>'.$master['layanan'].'</td>
				</tr>
				<tr>
					<td>ID Pelanggan</td>
					<td>:</td>
					<td>'.$master['kode'].'</td>
				</tr>
				<tr>
					<td>Nama Pelanggan</td>
					<td>:</td>
					<td>'.$master['nama_pelanggan'].'</td>
				</tr>
				<tr>
					<td>RF-ID.NET</td>
					<td>:</td>
					<td>1198468155104816122113412</td>
				</tr>
			</table>
		';
		// echo $html;
        $pdf->writeHTML($html, true, false, true, false);
        // $pdf->Footer();
        $pdf->Output("assets/file/".$master['kode'].".pdf", "F");
        $return["success"] = TRUE;
        echo json_encode($return);
	}

}

/* End of file Hotspot.php */
/* Location: ./application/controllers/pembayaran/Hotspot.php */