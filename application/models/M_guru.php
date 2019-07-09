<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {
	public function get_data($id=null) {
		if($id == '') {
			$response	= $this->db->get("guru")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("guru")->row();
		}
		return $response;
	}

	public function save_data($data,$id=null) {
		if($id == '') {
			$this->db->insert('guru',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('guru',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('guru');
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

     