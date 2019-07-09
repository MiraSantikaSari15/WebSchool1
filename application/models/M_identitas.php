<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_identitas extends CI_Model {
    public function get_data($id="") {
        $this->db->where("id","1");
        $response   = $this->db->get("identitas")->row();
    return $response;
    }

    public function save_data($data,$id="") {
        if($id == '') {
            $this->db->insert('identitas',$data);
        }
        else {
            $this->db->where("id",$id);
            $this->db->update('identitas',$data);
        }
    }

    public function delete_data($id) {
        $this->db->where("id",$id);
        $this->db->delete('identitas');
    }

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */