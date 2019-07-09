<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_main_user extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$response	= $this->db->get("users")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("users")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('users',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('users',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('users');
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */