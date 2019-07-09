<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		cek_session_admin();		
		$this->load->model('M_identitas');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Identitas";
		$data['judul'] 			= "Identitas Website";
		
		$data['getData'] 		= $this->M_identitas->get_data();
		$this->template->views('admin/identitas/index', $data);
	}

	public function update() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$id = $this->userdata->id;
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/images/identitas';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('logo')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_logo = $this->upload->data();
				$data['logo'] = $data_logo['file_name'];
			}

			$result = $this->M_identitas->update($data, $id);
			if ($result > 0) {
				$this->updateProfil();
				$this->session->set_flashdata('msg', show_succ_msg('Data Identitas Berhasil diubah'));
				redirect('Identitas');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Identitas Gagal diubah'));
				redirect('Identitas');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Identitas');
		}
	}
	public function save_data() {
		$post 			= $this->input->post(null,true);

		$id 			= $post['id'];
		$nama 		 	= $post['nama'];
		$alamat 		= $post['alamat'];
		$meta_deskripsi = $post['meta_deskripsi'];
		$meta_keyword 	= $post['meta_keyword'];
		$nomor_telepon 	= $post['nomor_telepon'];
		$email = $post['email'];
		$sambutan = $post['sambutan'];
		$link_facebook 	= $post['link_facebook'];
		$link_twitter 	= $post['link_twitter'];
		$link_instagram = $post['link_instagram'];
		
		

		$data['nama']			= $nama;
		$data['alamat']			= $alamat;
		$data['meta_deskripsi']	= $meta_deskripsi;
		$data['meta_keyword']	= $meta_keyword;
		$data['nomor_telepon']	= $nomor_telepon;
		$data['link_facebook']	= $link_facebook;
		$data['link_twitter']	= $link_twitter;
		$data['link_instagram']	= $link_instagram;
		$data['email'] = $email;
		$data['sambutan'] = $sambutan;
		

		
		$config['upload_path']          = 'assets/images/identitas';
        $config['allowed_types']        = '*';
        $config['encrypt_name']         = TRUE;

		$this->load->library('upload', $config);
		if($id == '') {
            $data['logo']    	 = 'default.png';
        if (!empty($_FILES['logo']['name'])) {
            if ($this->upload->do_upload('logo')){
                $upload_data                 = $this->upload->data();                
                $file_name                   = $upload_data['file_name'];
                $data['logo']     			 = $file_name;
            }
        }
			$data['created_at']	= date("Y-m-d");
			$this->M_identitas->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$getIdentitas 		= $this->M_identitas->get_data($id);

            if (!empty($_FILES['logo']['name'])) {
                if ($this->upload->do_upload('logo')){
                    if(!empty($getIdentitas->logo)) {
                        $path_to_file = 'assets/images/identitas/'.$getIdentitas->logo;
                        unlink($path_to_file);    
                    }
                    $upload_data         = $this->upload->data();                
                    $file_name           = $upload_data['file_name'];
                    $data['logo']        = $file_name;
                }
            }			
			$this->M_identitas->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}
		$config1['upload_path']          = 'assets/images/identitas';
        $config1['allowed_types']        = '*';
        $config1['encrypt_name']         = TRUE;

		$this->load->library('upload', $config1);
		if($id == '') {
            $data['foto']    	 = 'default.jpg';
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')){
                $upload_data                 = $this->upload->data();                
                $file_name                   = $upload_data['file_name'];
                $data['foto']     			 = $file_name;
            }
        }
			$data['created_at']	= date("Y-m-d");
			$this->M_identitas->save_data($data);
			$response['status'] = "success";
			$response['message'] = "Data berhasil disimpan!";
		}
		else {
			$getIdentitas 		= $this->M_identitas->get_data($id);

            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')){
                    if(!empty($getIdentitas->foto)) {
                        $path_to_file = 'assets/images/identitas/'.$getIdentitas->foto;
                        unlink($path_to_file);    
                    }
                    $upload_data         = $this->upload->data();                
                    $file_name           = $upload_data['file_name'];
                    $data['foto']        = $file_name;
                }
            }			
			$this->M_identitas->save_data($data,$id);
			$response['status'] = "success";
			$response['message'] = "Data berhasil ubah!";
		}
		
		
		
		die(json_encode($response));
	}

}