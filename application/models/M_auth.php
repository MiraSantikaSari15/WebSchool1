<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	public function login($user, $pass) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $user);
		$this->db->where('password', md5($pass));

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}
	public function get_log($id="")
	{
		$response	= $this->db->query("SELECT * FROM identitas")->result();			
		return $response;
	}
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */