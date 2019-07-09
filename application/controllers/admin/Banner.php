<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_banner');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Banner";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola banner";
		$this->template->views('admin/banner/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_banner->get_data();
		$this->load->view('admin/banner/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan banner";
		$this->template->views('admin/banner/form_add', $data);
	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit banner";
		$data['getData'] 		= $this->M_banner->get_data($id);
		$this->template->views('admin/banner/form_edit', $data);
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 			= $post['id'];
		$nama_banner 	= $post['nama_banner'];
		

		$data['nama_banner']		= $nama_banner;
// config untuk pengaturan foto
		$config['upload_path']          = 'assets/images/banner';
        $config['allowed_types']        = '*';
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);
// untuk menampilkan foto
		if($id == '') {
            $data['foto']    	 = 'default.png';
	        if (!empty($_FILES['file_foto']['name'])) {
	            if ($this->upload->do_upload('file_foto')){
	                $upload_data         = $this->upload->data();                
	                $file_name           = $upload_data['file_name'];
	                $data['foto']    	 = $file_name;
	            }
	        }
		
			$data['created_at']	= date("Y-m-d");
			$this->M_banner->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$getBanner 		= $this->M_banner->get_data($id);

            if (!empty($_FILES['file_foto']['name'])) {
                if ($this->upload->do_upload('file_foto')){
                    if(!empty($getBanner->foto)) {
                        $path_to_file = 'assets/images/banner/'.$getBanner->foto;
                        unlink($path_to_file);    
                    }
                    $upload_data         = $this->upload->data();                
                    $file_name           = $upload_data['file_name'];
                    $data['foto']        = $file_name;
                }
            }			

			$this->M_banner->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}

	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];
		$getBanner 		= $this->M_banner->get_data($id);
        if($getBanner->foto != 'default.png') {
            $path_to_file = 'assets/images/banner/'.$getBanner->foto;
            unlink($path_to_file);    
        }
		
		$this->M_banner->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}