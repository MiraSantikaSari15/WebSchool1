<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_komentar');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Komentar";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola komentar";
		$this->template->views('admin/komentar/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_komentar->get_data();
		$this->load->view('admin/komentar/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan menu";
		$data['getMainMenu'] 	= $this->M_komentar->get_main_menu();
		$this->template->views('admin/komentar/form_add', $data);

	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit menu";
		$data['getData'] 		= $this->M_komentar->get_data($id);
		$data['getMainMenu'] 	= $this->M_komentar->get_main_menu();

		$this->template->views('admin/komentar/form_edit', $data);
	}
	public function save_data() {
		$post 				= $this->input->post(null,true);

		$id 				= $post['id'];
		$id_page		= $post['id_page'];
		$nama_komentar		= $post['nama_komentar'];
		$isi_komentar 	    = $post['isi_komentar'];
		$status		= $post['status'];
		
		$data['id_page']	= $id_page;
		$data['nama_komentar']	= $nama_komentar;
		$data['isi_komentar']	= $isi_komentar;
		$data['status']	= $status;
		

		if($id == '') {
			$data['created_at']	= date("Y-m-d");
			$this->M_komentar->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$this->M_komentar->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}

	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];
		$this->M_komentar->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}