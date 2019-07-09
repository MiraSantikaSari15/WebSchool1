<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {
	public function getAll()
    {
        return $this->db->get('guru')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('guru', ['id' => $id])->row();
    }

    function data($number,$offset){
		return $query = $this->db->get('guru',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('guru')->num_rows();
	}
}