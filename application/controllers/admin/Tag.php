<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_tag');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Tag";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola tag";
		$this->template->views('admin/tag/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_tag->get_data();
		$this->load->view('admin/tag/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan menu";
		$this->template->views('admin/tag/form_add', $data);
	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit menu";
		$data['getData'] 		= $this->M_tag->get_data($id);
		$this->template->views('admin/tag/form_edit', $data);
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 			= $post['id'];
		$nama_tag 		= $post['nama_tag'];
		$seo_tag 		= $post['seo_tag'];
		
		$data['nama_tag']		= $nama_tag;
		$data['seo_tag']		= $seo_tag;
		

		if($id == '') {
			$data['created_at']	= date("Y-m-d");
			$this->M_tag->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$this->M_tag->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}

	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];
		$this->M_tag->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}