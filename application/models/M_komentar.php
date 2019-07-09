<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_komentar extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$response	= $this->db->get("komentar")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("komentar")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('komentar',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('komentar',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('komentar');
	}

	public function get_main_menu() {
		$response	= $this->db->get("main_menu")->result();			
		return $response;
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */

     