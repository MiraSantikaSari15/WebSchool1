<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_menu extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_main_menu');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Menu";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola menu";
		$this->template->views('admin/main_menu/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_main_menu->get_data();
		$this->load->view('admin/main_menu/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan menu";
		$this->template->views('admin/main_menu/form_add', $data);
	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit menu";
		$data['getData'] 		= $this->M_main_menu->get_data($id);
		$this->template->views('admin/main_menu/form_edit', $data);
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 			= $post['id'];
		$nama_menu 		= $post['nama_menu'];
		$link 			= $post['link'];
		$status_aktif 	= $post['status_aktif'];
		$admin_menu 	= $post['admin_menu'];
		$urutan 		= $post['urutan'];
		$keterangan 	= $post['keterangan'];

		$data['nama_menu']		= $nama_menu;
		$data['link']			= $link;
		$data['status_aktif']	= $status_aktif;
		$data['admin_menu']		= $admin_menu;
		$data['urutan']			= $urutan;
		$data['keterangan']		= $keterangan;

		if($id == '') {
			$data['created_at']	= date("Y-m-d");
			$this->M_main_menu->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$this->M_main_menu->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}

	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];
		$this->M_main_menu->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}