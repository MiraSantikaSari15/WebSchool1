<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fasilitas extends CI_Model {
	public function getAll()
    {
        return $this->db->get_where('page', ['id_kategori' => '5'])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('page', ['id' => $id])->row();
    }
    public function getFasilitas()
    {
        return $this->db->query("SELECT * FROM page WHERE id_kategori = '5' ORDER BY id DESC LIMIT 3")->result();
    }

    function data($number,$offset){
        return $query = $this->db->get_where('page',['id_kategori' => '5'], $number,$offset)->result();       
    }
    function jumlah_data(){
        return $this->db->get_where('page', ['id_kategori' => '5'])->num_rows();
    }

}