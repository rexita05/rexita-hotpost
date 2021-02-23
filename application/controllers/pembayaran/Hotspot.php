<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotspot extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pelanggan_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('function_helper');
	}

	public function index()
	{
        $this->data['js'] = 'pembayaran/hotspot_js';
        $this->data['main_view'] = 'pembayaran/v_hotspot';
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

	public function print_out(){
		$param = $this->input->post();
		$data  = $this->Pelanggan_model->print_out();

		$master['id'] = $param['id'];
		$master['kode'] = $param['kode'];
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
		$pdf->SetAutoPageBreak(false, 0);
        $pdf->SetFont("fakereceipt", "", 9);
        $html='
        <style>
			.rx-size{
				font-size: 7px;
			}
			.rx-size-table{
				font-size: 8px;
			}
			.rx-nesindo{
				font-size: 8px;
			}
        </style>';
        // $html.='<div align="center" class="rx-nesindo">'.$_POST['nesindo'].'</div>';
        $html.='
	        <table class="rx-nesindo" height="350" width="100%">
	        	<tr>
					<td align="center" width="48%;">'.$_POST['nesindo'].'</td>
				</tr>
			</table><br>
		';
		$html.='<div align="center" style="font-weight:bold;"><b>STRUK BUKTI PEMBAYARAN TAGIHAN INTERNET "REXITA HOTSPOT"</b></div><br>';
		$diskon=0;
		$denda=0;
		$total=$master['tagihan']+$denda-$diskon;
		// $grand_tot=$total-$diskon;
        $html.='
	        <table class="rx-size-table" height="350" width="100%">
	        	<tr>
					<td width="16%;">Layanan</td>
					<td width="3%;">:</td>
					<td width="45%;">'.$master['layanan'].'</td>

					<td width="13%;">Periode</td>
					<td width="20%;">: '.convert_date_period(date("d-m-Y")).'</td>
				</tr>
				<tr>
					<td width="16%;">ID Pelanggan</td>
					<td width="3%;">:</td>
					<td width="45%;">'.$master['kode'].'</td>

					<td width="13%;">Tagihan</td>
					<td width="6%;">: Rp </td>
					<td width="10.4%;" align="right">'.money($master['tagihan']).'</td>
				</tr>
				<tr>
					<td width="16%;">Nama Pelanggan</td>
					<td width="3%;">:</td>
					<td width="45%;">'.$master['nama_pelanggan'].'</td>

					<td width="13%;">Denda</td>
					<td width="6%;">: Rp </td>
					<td width="10.4%;" align="right">'.money($denda).'</td>
				</tr>
				<tr>
					<td width="16%;">Operasional</td>
					<td>:</td>
					<td width="45%;">FO2Core+Conv/N300RE</td>

					<td width="13%;">Diskon</td>
					<td width="6 %;">: Rp</td> 
					<td width="10.4%;" align="right">'.money($diskon).'</td>
				</tr>
				<tr>
					<td width="16%;">RF-ID.NET</td>
					<td>:</td>
					<td width="45%;">1198468155104816122113412</td>

					<td width="13%;">Total Bayar</td>
					<td width="6%;">: Rp </td>
					<td width="10.4%;" align="right">'.money($total).'</td>
				</tr>
			</table><br>
		';
		$html.='<div align="center" style="font-weight:bold;"><b>ADMIN MENYATAKAN STRUK INI SEBAGAI BUKTI PEMBAYARAN YANG SAH</b></div><br>';
		$html.='
	        <table class="rx-size-table" height="350" width="100%">
	        	<tr>
					<td width="16%;">Terbilang</td>
					<td width="3%;">:</td>
					<td width="76%;">'.$master['terbilang'].'</td>
				</tr>
				<tr>
					<td width="16%;">Dicetak Di</td>
					<td width="3%;">:</td>
					<td width="76%;">pprukiyatin_bakalan, 0923;45189;45210;45227;bakalan rt 3 rw 1</td>
				</tr>
				<tr>
					<td width="16%;">Tanggal/Kode</td>
					<td width="3%;">:</td>
					<td width="76%;">'.getDatetimeNow("d-m-Y H:i:s").' WIB/45325002/45325RUKI/2KY0Y02Ilk818517/RX</td>
				</tr>
			</table><br>
		';
		
        $pdf->writeHTML($html, true, false, true, false);
        // $pdf->IncludeJS("print();");
        $pdf->Output("assets/file/".$master['kode'].".pdf", "F");
        $return["success"] = TRUE;
        echo json_encode($return);
	}

}

/* End of file Hotspot.php */
/* Location: ./application/controllers/pembayaran/Hotspot.php */