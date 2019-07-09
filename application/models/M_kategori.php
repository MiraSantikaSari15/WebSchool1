<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$response	= $this->db->get("kategori")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("kategori")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('kategori',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('kategori',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('kategori');
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */