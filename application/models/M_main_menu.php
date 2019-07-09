<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_main_menu extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$response	= $this->db->get("main_menu")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("main_menu")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('main_menu',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('main_menu',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('main_menu');
	}
	 function cek_menuutama(){
        return $this->db->query("SELECT * FROM main_menu where keterangan='multiple_menu'");
    }


}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */