<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_page extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$this->db->select("page.* , kategori.nama_kategori");
			$this->db->join("kategori","kategori.id = page.id_kategori","inner");
			$response	= $this->db->get("page")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("page")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('page',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('page',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('page');
	}

	public function get_kategori() {
		$response	= $this->db->get("kategori")->result();			
		return $response;
	}
	public function get_tag() {
		$response	= $this->db->get("tag")->result();			
		return $response;
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */

     