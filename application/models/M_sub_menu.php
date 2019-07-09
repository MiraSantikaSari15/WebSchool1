<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sub_menu extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$this->db->select("sub_menu.* , main_menu.nama_menu as nama_main_menu");
			$this->db->join("main_menu","main_menu.id = sub_menu.id_main_menu","inner");
			$response	= $this->db->get("sub_menu")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("sub_menu")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('sub_menu',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('sub_menu',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('sub_menu');
	}

	public function get_main_menu() {
		$response	= $this->db->query("SELECT * FROM main_menu where keterangan='multiple_menu'")->result();			
		return $response;
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */

     