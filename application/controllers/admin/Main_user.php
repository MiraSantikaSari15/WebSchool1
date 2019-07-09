<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_user extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_main_user');
        
	}

	public function index() {   
		$data['userdata'] 		= $this->userdata;    
		$data['page'] 			= "Manajemen User";
		$data['judul'] 			= "Manajemen User";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola user";
		$this->template->views('admin/main_user/index', $data);
	}
    
	public function search() {
		$data['listData'] = $this->M_main_user->get_data();
		$this->load->view('admin/main_user/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan user";
		$this->template->views('admin/main_user/form_add', $data);
	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit menu";
		$data['getData'] 		= $this->M_main_user->get_data($id);
		$this->template->views('admin/main_user/form_edit', $data);
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 			= $post['id'];
		$username 		= $post['username'];
		$password		= $post['password'];
		$nama 	        = $post['nama'];
		$email 			= $post['email'];
		$nomor_telepon 	= $post['nomor_telepon'];
		$level_user 	= $post['level_user'];
		
		$status_aktif	= $post['status_aktif'];

		$data['username']		= $username;
		$data['password']		= md5($password);
		$data['nama']			= $nama;
		$data['email']			= $email;
		$data['nomor_telepon']	= $nomor_telepon;
		$data['level_user']		= $level_user;
		
		$data['status_aktif']	= $status_aktif;

		$config['upload_path']          = 'assets/images/users';
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

			$data['created_at']	= date("Y-m-d");
			$this->M_main_user->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$getUsers 		= $this->M_main_user->get_data($id);

            if (!empty($_FILES['file_foto']['name'])) {
                if ($this->upload->do_upload('file_foto')){
			        if($getUsers->foto != 'default.png') {
                        $path_to_file = 'assets/images/users/'.$getUsers->foto;
                        unlink($path_to_file);    
                    }
                    $upload_data      = $this->upload->data();                
                    $file_name        = $upload_data['file_name'];
                    $data['foto']     = $file_name;
                }
            }			

			$this->M_main_user->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}

	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];

		$getUsers 		= $this->M_main_user->get_data($id);
        if($getUsers->foto != 'default.png') {
            $path_to_file = 'assets/images/users/'.$getUsers->foto;
            unlink($path_to_file);    
        }
		
		$this->M_main_user->delete_data($id);

		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
	
}