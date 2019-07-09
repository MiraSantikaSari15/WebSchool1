<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_album extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$response	= $this->db->get("album")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("album")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('album',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('album',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('album');
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */