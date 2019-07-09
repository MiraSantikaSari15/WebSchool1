<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model {
	public function get_data($id="") {
		if($id == '') {
			$this->db->select("galeri.* , album.nama_album");
			$this->db->join("album","album.id = galeri.id_album","inner");
			$response	= $this->db->get("galeri")->result();
		}
		else {
			$this->db->where("id",$id);
			$response	= $this->db->get("galeri")->row();
		}
		return $response;
	}

	public function save_data($data,$id="") {
		if($id == '') {
			$this->db->insert('galeri',$data);
		}
		else {
			$this->db->where("id",$id);
			$this->db->update('galeri',$data);
		}
	}

	public function delete_data($id) {
		$this->db->where("id",$id);
		$this->db->delete('galeri');
	}

	public function get_album() {
		$response	= $this->db->get("album")->result();			
		return $response;
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */

     