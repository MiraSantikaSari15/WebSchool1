<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profil extends CI_Model {
	public function get_visi() {
		$response	= $this->db->get_where('page', ["judul_page" => 'Visi'])->row_array();			
		return $response;
	}

	public function get_misi() {
		$response	= $this->db->get_where('page', ["judul_page" => 'Misi'])->row_array();			
		return $response;
	}

	public function get_tujuan() {
		$response	= $this->db->get_where('page', ["judul_page" => 'tujuan'])->row_array();			
		return $response;
	}

	public function get_sejarah() {
		$response	= $this->db->get_where('page', ["judul_page" => 'Sejarah'])->row_array();			
		return $response;
	}

}