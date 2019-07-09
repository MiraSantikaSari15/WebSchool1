<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_galeri');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Galeri";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola  galeri";
		$this->template->views('admin/galeri/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_galeri->get_data();
		$this->load->view('admin/galeri/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan menu";
		$data['get_album']	 	= $this->M_galeri->get_album();
		$this->template->views('admin/galeri/form_add', $data);

	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit menu";
		$data['getData'] 		= $this->M_galeri->get_data($id);
		$data['get_album'] 		= $this->M_galeri->get_album();

		$this->template->views('admin/galeri/form_edit', $data);
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 			= $post['id'];
		$id_album		= $post['id_album'];
		$nama_foto 		= $post['nama_foto'];
		$seo 	    	= $post['seo'];
		$deskripsi		= $post['deskripsi'];

		$data['id_album']	= $id_album;
		$data['nama_foto']	= $nama_foto;
		$data['seo']		= $seo;
		$data['deskripsi']	= $deskripsi;

		$config['upload_path']          = 'assets/images/galeri';
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
			$this->M_galeri->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}

		else {
			
			$getGaleri 		= $this->M_galeri->get_data($id);

            if (!empty($_FILES['file_foto']['name'])) {
                if ($this->upload->do_upload('file_foto')){
                    if(!empty($getGaleri->cover)) {
                        $path_to_file = 'assets/images/galeri/'.$getGaleri->cover;
                        unlink($path_to_file);    
                    }
                    $upload_data         = $this->upload->data();                
                    $file_name           = $upload_data['file_name'];
                    $data['cover']        = $file_name;
                }
            }			

			$this->M_galeri->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}
	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];
		$this->M_galeri->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}