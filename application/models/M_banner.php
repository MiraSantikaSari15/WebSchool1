<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_banner extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$response	= $this->db->get("banner")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("banner")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('banner',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('banner',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('banner');
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */