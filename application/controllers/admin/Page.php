<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_page');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "List Data";
		$data['judul'] 			= "Page";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengelola  page";
		$this->template->views('admin/page/index', $data);
	}

	public function search() {
		$data['listData'] = $this->M_page->get_data();
		$this->load->view('admin/page/list_data', $data);
	}

	public function add_data() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Tambah Data";
		$data['judul'] 			= "Tambah Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk menambahkan data";
		$data['get_tag']	 	= $this->M_page->get_tag();
		$data['getKategori'] 	= $this->M_page->get_kategori();
		$this->template->views('admin/page/form_add', $data);

	}

	public function edit_data($id='') {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Edit Data";
		$data['judul'] 			= "Edit Data";
		$data['deskripsi'] 		= "Menu ini digunakan untuk mengedit data";
		$data['getData'] 		= $this->M_page->get_data($id);
		$data['get_tag']	 	= $this->M_page->get_tag();
		$data['getKategori'] 	= $this->M_page->get_kategori();

		$this->template->views('admin/page/form_edit', $data);
	}
	public function save_data() {
		$post 				= $this->input->post(null,true);

		$id 				= $post['id'];
		$id_kategori 		= $post['id_kategori'];
		$judul_page 		= $post['judul_page'];
		$seo_page 	   	    = $post['seo_page'];
		$deskripsi			= $post['deskripsi'];
		$status 	   		= $post['status'];        
		$tag				= $post['tag'];

		$data['id_kategori']= $id_kategori;
		$data['judul_page']	= $judul_page;
		$data['seo_page']	= $seo_page;
		$data['link']		= "home/page/".$seo_page;
		$data['deskripsi']	= $deskripsi;
		$data['status']		= $status;
		$data['tag']		= implode(",",$tag);

		$config['upload_path']          = 'assets/images/page';
        $config['allowed_types']        = '*';
        $config['encrypt_name']         = TRUE;
	
        $this->load->library('upload', $config);

		if($id == '') {
            $data['cover']    	 = 'default.png';
            $data['link_cover'] = 'assets/images/page/default.png';
	        if (!empty($_FILES['file_foto']['name'])) {
	            if ($this->upload->do_upload('file_foto')){
	                $upload_data         = $this->upload->data();                
	                $file_name           = $upload_data['file_name'];
	                $data['cover']    	 = $file_name;
	                $data['link_cover'] =  'assets/images/page/'.$file_name;
	            }
	        }

			$data['created_at']	= date("Y-m-d");
			$this->M_page->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}

		else {
			
			$getPage 		= $this->M_page->get_data($id);

            if (!empty($_FILES['file_foto']['name'])) {
                if ($this->upload->do_upload('file_foto')){
                    if(!empty($getPage->cover)) {
                        $path_to_file = 'assets/images/page/'.$getPage->cover;
                        unlink($path_to_file);    
                    }
                    $upload_data         = $this->upload->data();                
                    $file_name           = $upload_data['file_name'];
                    $data['cover']        = $file_name;
                    $data['link_cover'] =  'assets/images/page/'.$file_name;
                }
            }			

			$this->M_page->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}

		die(json_encode($response));
	}
	public function delete_data() {
		$post 			= $this->input->post(null,true);
		$id 			= $post['id'];

		$getPage 		= $this->M_page->get_data($id);
        if($getPage->cover != 'default.png') {
            $path_to_file = 'assets/images/page/'.$getPage->cover;
            unlink($path_to_file);    
        }

		$this->M_page->delete_data($id);
		$response['status'] = "success";
		$response['message'] = "Data berhasil dihapus!";
		die(json_encode($response));
	}
}