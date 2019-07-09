<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_kategori');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Kategori";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola kategori";
		$this->template->views('admin/kategori/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_kategori->get_data();
		$this->load->view('admin/kategori/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan kategori";
		$this->template->views('admin/kategori/form_add', $data);
	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit menu";
		$data['getData'] 		= $this->M_kategori->get_data($id);
		$this->template->views('admin/kategori/form_edit', $data);
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 			= $post['id'];
		$nama_kategori	= $post['nama_kategori'];
		

		$data['nama_kategori']		= $nama_kategori;
		

		if($id == '') {
			$data['created_at']	= date("Y-m-d");
			$this->M_kategori->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$this->M_kategori->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}

	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];
		$this->M_kategori->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}