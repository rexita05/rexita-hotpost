<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function getPelanggan(){
        $query=$this->db->query("SELECT*FROM pelanggan");
        return $query->result();
	}

	public function print_out(){
        $query=$this->db->query("SELECT*FROM pelanggan");
        return $query->result();
	}

	public function insert(){
		$object = array
		(
			'kode'=>$this->input->post('kode'),
            'layanan'=>$this->input->post('layanan'),
            'nama_pelanggan'=>$this->input->post('nama_pelanggan'),
            'tagihan'=>$this->input->post('tagihan'),
            'terbilang'=>$this->input->post('terbilang'),
            'keterangan'=>$this->input->post('keterangan')
		);
		$this->db->insert('pelanggan',$object);
	}

	public function getById($id){
		$this->db->where("id",$id);
		$query = $this->db->get('pelanggan');
		return $query->result();
	}

	public function updateById($id){
		$object = array
		(
			'kode'=>$this->input->post('kode'),
            'layanan'=>$this->input->post('layanan'),
            'nama_pelanggan'=>$this->input->post('nama_pelanggan'),
            'tagihan'=>$this->input->post('tagihan'),
            'terbilang'=>$this->input->post('terbilang'),
            'keterangan'=>$this->input->post('keterangan')
		);

		$this->db->where('id',$id);
		$this->db->update('pelanggan',$object);
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('pelanggan');
	}
}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */