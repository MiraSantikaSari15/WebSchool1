<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tag extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$response	= $this->db->get("tag")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("tag")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('tag',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('tag',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('tag');
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */