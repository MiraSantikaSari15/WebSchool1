<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function get_menu() {
		$response	= $this->db->query("SELECT * FROM main_menu where admin_menu='no'")->result();			
		return $response;
	}
	public function get_sub_menu($id="") {
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
	public function get_logo() {
		$response	= $this->db->query("SELECT * FROM identitas")->result();			
		return $response;
	}
	public function get_judul($id="")
	{
		$response	= $this->db->query("SELECT * FROM page where status='publish'")->result();			
		return $response;
	}


}