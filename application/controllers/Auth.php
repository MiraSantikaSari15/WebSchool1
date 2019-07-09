<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}
	
	public function index() {
		$data['get_log'] = $this->M_auth->get_log();
		$session = $this->session->userdata('status');
		

		if ($session == '') {
			$this->load->view('admin/login', $data);
		} else {
			redirect('admin/home');
		}
	}

	public function login() {
		$post = $this->input->post(null,true);
		$username = $post['username'];
		$password = $post['password'];
	
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {

			$data = $this->M_auth->login($username, $password);

			if ($data == false) {
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('auth');
			} 
			else {
				$this->db->where("id","1");
				$identitas = $this->db->get("identitas")->row();
				
				$session = [
					'userdata'	=> $data,
					'identitas_nama'	=> $identitas->nama,
					'identitas_logo'	=> $identitas->logo,
					'identitas_favicon'	=> $identitas->favicon,
					'status' 	=> "Loged in"
				];
				$this->session->set_userdata($session);
				redirect('admin/home');
			}
		} 
		else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function uploader()
    {
        $array      = explode('.', $_FILES['upload']['name']);
        $extension  = end($array);
        $file_name  = str_replace(".", '', $_FILES["upload"]['name']);
        $file_name 	= preg_replace('/[^A-Za-z0-9\-]/', '', $_FILES["upload"]['name'])."_".date("Y-m-d H:i:s")."_".rand().'.'.$extension;
		$location   				= str_replace(" ", "-", $file_name);

		$config['upload_path']          = 'assets/editor';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);

		if (!empty($_FILES['upload']['name'])) {
			if ($this->upload->do_upload('upload')){
				$response["fileName"] 	= $_FILES['upload']['name'];
				$response["url"] 		= base_url()."/assets/editor/".$_FILES['upload']['name'];
				$response["uploaded"] 	= 1;
			}
		}

		else {
            $response["uploaded"] 	= 0;
            $response["error"] 		= "Woops !, maaf gambar tidak bisa diunggah silahkan coba lagi";
		}
		
        echo json_encode($response);
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */