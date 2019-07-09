<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Eskul extends CI_Model {
	public function getAll()
    {
        return $this->db->get_where('page', ['id_kategori' => '4'])->result();
    }


}