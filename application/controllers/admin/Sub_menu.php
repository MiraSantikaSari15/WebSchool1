<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_menu extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_sub_menu');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Sub Menu";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola  sub menu";
		$this->template->views('admin/sub_menu/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_sub_menu->get_data();
		$this->load->view('admin/sub_menu/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan menu";
		$data['getMainMenu'] 	= $this->M_sub_menu->get_main_menu();
		$this->template->views('admin/sub_menu/form_add', $data);

	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit menu";
		$data['getData'] 		= $this->M_sub_menu->get_data($id);
		$data['getMainMenu'] 	= $this->M_sub_menu->get_main_menu();
		$this->template->views('admin/sub_menu/form_edit', $data);
	}
	public function save_data() {
		$post 				= $this->input->post(null,true);

		$id 				= $post['id'];
		$id_main_menu 		= $post['id_main_menu'];
		$nama_sub_menu 		= $post['nama_sub_menu'];
		$link_sub_menu 	    = $post['link_sub_menu'];
		$status_aktif		= $post['status_aktif'];
		$urutan				= $post['urutan'];

		$data['id_main_menu']	= $id_main_menu;
		$data['nama_sub_menu']	= $nama_sub_menu;
		$data['link_sub_menu']	= $link_sub_menu;
		$data['status_aktif']	= $status_aktif;
		$data['urutan']			= $urutan;

		if($id == '') {
			$data['created_at']	= date("Y-m-d");
			$this->M_sub_menu->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$this->M_sub_menu->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}

	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];
		$this->M_sub_menu->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}