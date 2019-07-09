<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_album');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Album";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola album";
		$this->template->views('admin/album/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_album->get_data();
		$this->load->view('admin/album/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan album";
		$this->template->views('admin/album/form_add', $data);
	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit album";
		$data['getData'] 		= $this->M_album->get_data($id);
		$this->template->views('admin/album/form_edit', $data);
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 			= $post['id'];
		$nama_album 	= $post['nama_album'];
		$seo_album 		= $post['seo_album'];
		
		
		$data['nama_album']		= $nama_album;
		$data['seo_album']		= $seo_album;

		$config['upload_path']          = 'assets/images/album';
        $config['allowed_types']        = '*';
        $config['encrypt_name']         = TRUE;
    
        $this->load->library('upload', $config);

		if($id == '') {
            $data['cover']    	 = 'default.png';
	        if (!empty($_FILES['file_foto']['name'])) {
	            if ($this->upload->do_upload('file_foto')){
	                $upload_data         = $this->upload->data();                
	                $file_name           = $upload_data['file_name'];
	                $data['cover']    	 = $file_name;
	            }
	        }

			$data['created_at']	= date("Y-m-d");
			$this->M_album->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			
			$getAlbum 		= $this->M_album->get_data($id);

            if (!empty($_FILES['file_foto']['name'])) {
                if ($this->upload->do_upload('file_foto')){
                    if(!empty($getAlbum->cover)) {
                        $path_to_file = 'assets/images/album/'.$getAlbum->cover;
                        unlink($path_to_file);    
                    }
                    $upload_data         = $this->upload->data();                
                    $file_name           = $upload_data['file_name'];
                    $data['cover']        = $file_name;
                }
            }			

			$this->M_album->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}

	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];

		$getAlbum 		= $this->M_album->get_data($id);
        if($getAlbum->cover != 'default.png') {
            $path_to_file = 'assets/images/album/'.$getAlbum->cover;
            unlink($path_to_file);    
        }

		$this->M_album->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}