<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_guru');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Guru";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola guru";
		$this->template->views('admin/guru/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_guru->get_data();
		$this->load->view('admin/guru/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan data";
		$data['get_tag']	 	= $this->M_guru->get_tag();
		$data['getKategori'] 	= $this->M_guru->get_kategori();
		$this->template->views('admin/guru/form_add', $data);

	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit data";
		$data['getData'] 		= $this->M_guru->get_data($id);
		$this->template->views('admin/guru/form_edit', $data);
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 		= $post['id'];
		$nip 			= $post['nip'];
		$nama 	   	    = $post['nama'];
		$tanggal_lahir	= $post['tanggal_lahir'];
		$tempat_lahir 	= $post['tempat_lahir'];        
		$jk				= $post['jk'];
		$agama			= $post['agama'];
		$pendidikan		= $post['pendidikan'];
		$mata_pelajaran	= $post['mata_pelajaran'];

		$data['nip']			= $nip;
		$data['nama']			= $nama;
		$data['tanggal_lahir']	= $tanggal_lahir;
		$data['tempat_lahir']	= $tempat_lahir;
		$data['jk']				= $jk;
		$data['agama']			= $agama;
		$data['pendidikan']		= $pendidikan;
		$data['mata_pelajaran']	= $mata_pelajaran;

		$config['upload_path']          = 'assets/images/guru';
        $config['allowed_types']        = '*';
        $config['encrypt_name']         = TRUE;
    
        $this->load->library('upload', $config);

		if($id == '') {
            $data['foto']    	 = 'default.png';
	        if (!empty($_FILES['file_foto']['name'])) {
	            if ($this->upload->do_upload('file_foto')){
	                $upload_data         = $this->upload->data();                
	                $file_name           = $upload_data['file_name'];
	                $data['foto']    	 = $file_name;
	            }
	        }

			$this->M_guru->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}

		else {
			
			$getGuru 		= $this->M_guru->get_data($id);

            if (!empty($_FILES['file_foto']['name'])) {
                if ($this->upload->do_upload('file_foto')){
                    if(!empty($getGuru->foto)) {
                        $path_to_file = 'assets/images/guru/'.$getGuru->foto;
                        unlink($path_to_file);    
                    }
                    $upload_data         = $this->upload->data();                
                    $file_name           = $upload_data['file_name'];
                    $data['cover']        = $file_name;
                }
            }			

			$this->M_guru->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}
	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];
		$this->M_guru->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}