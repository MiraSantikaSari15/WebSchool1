<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Galeri extends CI_Model {
	public function getAll()
    {
        return $this->db->get_where('galeri', ['id_album' => '3'])->result();
    }

    public function KegiatanSekolah()
    {
        return $this->db->get_where('galeri', ['id_album' => '4'])->result();
    }

    public function KegiatanGuru()
    {
        return $this->db->get_where('galeri', ['id_album' => '5'])->result();
    }



}