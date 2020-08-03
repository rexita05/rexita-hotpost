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
        $pdf->setMargins(10, 10, 5);
        $pdf->AddPage("P", "F4");
        $pdf->SetFont("fakereceipt", "", 9);
        // $pdf->SetFont($font_family = 'fakereceipt', $font_variant = ‘’, $fontsize = 11);
        
        $html='
        <style>
			.rx-size{
				font-size: 7px;
			}
			.rx-size-table{
				font-size: 8px;
			}
        </style>';
        $html.='<div class="rx-size">'.$_POST['nesindo'].'</div>';
        $html.='<div align="center"><b>STRUK BUKTI PEMBAYARAN TAGIHAN INTERNET "REXITA HOTSPOT"</b></div><br>';
        $html.='
	        <table class="rx-size-table" height="350" width="100%">
	        	<tr>
					<td width="16%;">Layanan</td>
					<td width="3%;">:</td>
					<td width="27%;">'.$master['layanan'].'</td>

					<td width="13%;">Periode</td>
					<td width="3%;">:</td>
				</tr>
				<tr>
					<td width="16%;">ID Pelanggan</td>
					<td width="3%;">:</td>
					<td width="27%;">'.$master['kode'].'</td>

					<td width="13%;">Tagihan</td>
					<td width="3%;">:</td>
					<td width="27%;">'.$master['tagihan'].'</td>
				</tr>
				<tr>
					<td width="16%;">Nama Pelanggan</td>
					<td width="3%;">:</td>
					<td width="27%;">'.$master['nama_pelanggan'].'</td>

					<td width="13%;">Denda</td>
					<td width="3%;">:</td>
					<td width="27%;">Rp 0</td>
				</tr>
				<tr>
					<td width="16%;">RF-ID.NET</td>
					<td>:</td>
					<td width="27%;">1198468155104816122113412</td>

					<td width="13%;">Total Bayar</td>
					<td width="3%;">:</td>
					<td width="27%;">'.$master['tagihan'].'</td>
				</tr>
			</table><br>
		';
		$html.='<div align="center"><b>ADMIN MENYATAKAN STRUK INI SEBAGAI BUKTI PEMBAYARAN YANG SAH</b></div><br>';
		$html.='
	        <table class="rx-size-table" height="350" width="100%">
	        	<tr>
					<td width="16%;">Terbilang</td>
					<td width="3%;">:</td>
					<td>'.$master['terbilang'].'</td>
				</tr>
				<tr>
					<td width="16%;">Dicetak DI</td>
					<td width="3%;">:</td>
					<td width="80%;">pprukiyatin_bakalan, 0923;45189;45210;45227;bakalan rt 3 rw 1</td>
				</tr>
				<tr>
					<td width="16%;">Tanggal/Kode</td>
					<td width="3%;">:</td>
				</tr>
			</table><br>
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