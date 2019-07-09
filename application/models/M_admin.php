<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
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
	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("users", $data);

		return $this->db->affected_rows();
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('users');

		return $data->row();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */