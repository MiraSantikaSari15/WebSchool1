<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Berita extends CI_Model {
	public function getAll()
    {
        return $this->db->get_where('page', ['id_kategori' => '2'])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('page', ['id' => $id])->row();
    }
    
	public function maxId()
    {
      $this->db->select_max('id');
    $query  = $this->db->get_where('page', ['id_kategori' => '2'])->row_array();
    return  $query;
    }

    public function getBerita()
    {
        return $this->db->query("SELECT * FROM page WHERE id_kategori = '2' ORDER BY id DESC LIMIT 3")->result();
    }

     public function getBerita1()
    {
        return $this->db->query("SELECT * FROM page WHERE id_kategori = '2' ORDER BY id DESC LIMIT 4")->result();
    }

    function data($number,$offset){
        return $query = $this->db->get_where('page',['id_kategori' => '2'], $number,$offset)->result();       
    }
 
    function jumlah_data(){
        return $this->db->get_where('page', ['id_kategori' => '2'])->num_rows();
    }

    function row(){
        return $this->db->query("SELECT COUNT(id_kategori) FROM page WHERE id_kategori='2'")->num_rows();
    }
}