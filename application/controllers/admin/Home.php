<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Home_model");
		$this->load->model("frontend/M_Berita");
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Administrator";
		$data['jmlberita']		= $this->Home_model->jumlah_data();
		$data['jmlguru']		= $this->Home_model->jmlguru();
		$data['jmlgaleri']		= $this->Home_model->jmlgaleri();
		$data['jmlfasilitas']	= $this->Home_model->jmlfasilitas();
		$data['berita']			= $this->M_Berita->getBerita1();
		$this->template->views('admin/home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */