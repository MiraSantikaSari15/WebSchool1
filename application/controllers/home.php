<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

		public function __construct() {
		parent::__construct();
		$this->load->model("frontend/M_identitas");
		$this->load->model("frontend/M_Profil");
		$this->load->model("frontend/Home_model");
		$this->load->model("frontend/M_Berita");
		$this->load->model("frontend/M_Eskul");
		$this->load->model("frontend/M_Galeri");
		$this->load->model("frontend/M_fasilitas");
		$this->load->model("frontend/M_guru");
	}

	public function index() {
		$data['identitas'] 		= $this->M_identitas->get_data();
		$data['banner']			= $this->db->get("banner")->result();
		$data['logo'] 			= $this->Home_model->get_logo();
		$data["berita"]			= $this->M_Berita-> maxId();
		$data["berita1"] 		= $this->M_Berita->getBerita();
		$data["eskul"]			= $this->M_Galeri->getAll();
		$data["sekolah"]		= $this->M_Galeri->KegiatanSekolah();
		$data["kguru"]			= $this->M_Galeri->KegiatanGuru();
		$data["fasilitas"]		= $this->M_fasilitas->getAll();
		$data["fas"]		= $this->M_fasilitas->getFasilitas();
		$data['guru'] = $this->M_guru->getAll();
		$this->template_frontend->views('frontend/home', $data);
	}

	public function visimisi() {
		$data['identitas'] = $this->M_identitas->get_data();
		$data['visi'] 		= $this->M_Profil->get_visi();
		$data['misi'] 		= $this->M_Profil->get_misi();
		$this->template_frontend->views('frontend/visimisi', $data);
	}

	public function tujuan() {
		$data['identitas'] = $this->M_identitas->get_data();
		$data['tujuan'] 		= $this->M_Profil->get_tujuan();
		$this->template_frontend->views('frontend/tujuan', $data);
	}

	public function sejarah() {
		$data['sejarah'] 		= $this->M_Profil->get_sejarah();
		$data['identitas'] = $this->M_identitas->get_data();
		$this->template_frontend->views('frontend/sejarah', $data);
	}

	public function eskul() {
		$data['identitas'] = $this->M_identitas->get_data();
		$data['eskul'] 		= $this->M_Eskul->getAll();
		$this->template_frontend->views('frontend/eskul',$data);
	}

	public function kontak() {
		$data['identitas'] = $this->M_identitas->get_data();
		$this->template_frontend->views('frontend/kontak', $data);
	}

	public function detail_berita($id) {
		$data['identitas']  = $this->M_identitas->get_data();
		$data['berita_terkini'] 	= $this->M_Berita->getBerita1();
		$data['berita'] = $this->M_Berita->getById($id);
		$this->template_frontend->views('frontend/detail-berita', $data);
	}

	public function berita() {
		$data['identitas'] = $this->M_identitas->get_data();
		$jumlah_data = $this->M_Berita->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = site_url('home/berita'); //site url
        $config['total_rows'] = $this->M_Berita->jumlah_data(); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" style=" background: white; color: #84bed6; border-color:#84bed6; ">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link" style="background: white;">';
        $config['next_tagl_close']  = '</span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link" style="background: white;">';
        $config['prev_tagl_close']  = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['berita'] = $this->M_Berita->data($config['per_page'],$from);
        $data['pagination'] = $this->pagination->create_links(); 
        // echo $jumlah_data;
		$this->template_frontend->views('frontend/berita', $data);
	}

	public function fasilitas() {
		$data['identitas'] = $this->M_identitas->get_data();
		$this->load->library('pagination');
		$config['base_url'] = site_url('home/fasilitas'); //site url
        $config['total_rows'] = $this->M_fasilitas->jumlah_data(); //total row
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" style=" background: white; color: #84bed6; border-color:#84bed6; ">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link" style="background: white;">';
        $config['next_tagl_close']  = '</span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link" style="background: white;">';
        $config['prev_tagl_close']  = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['fasilitas'] = $this->M_fasilitas->data($config['per_page'],$from);
        $data['pagination'] = $this->pagination->create_links();
		$this->template_frontend->views('frontend/fasilitas', $data);
	}

	public function detail_fasilitas($id) {
		$data['identitas'] = $this->M_identitas->get_data();
		$data['fasilitas'] = $this->M_fasilitas->getById($id);
		$data['berita_terkini'] 	= $this->M_Berita->getAll();
		$this->template_frontend->views('frontend/detail-fasilitas', $data);
	}

	public function guru() {
		$data['identitas'] = $this->M_identitas->get_data();
		$jumlah_data = $this->M_guru->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = site_url('home/guru'); //site url
        $config['total_rows'] = $this->db->count_all('guru'); //total row
        $config['per_page'] = 8;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" style=" background: white; color: #84bed6; border-color:#84bed6; ">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link" style="background: white;">';
        $config['next_tagl_close']  = '</span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link" style="background: white;">';
        $config['prev_tagl_close']  = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['guru'] = $this->M_guru->data($config['per_page'],$from);
        $data['pagination'] = $this->pagination->create_links(); 
		$this->template_frontend->views('frontend/guru', $data);
	}

	public function galeri() {
		$data['identitas'] = $this->M_identitas->get_data();
		$data["eskul"]			= $this->M_Galeri->getAll();
		$data["sekolah"]		= $this->M_Galeri->KegiatanSekolah();
		$data["kguru"]			= $this->M_Galeri->KegiatanGuru();
		$this->template_frontend->views('frontend/galeri', $data);
	}

	public function detail_guru($id) {
		$data['identitas'] = $this->M_identitas->get_data();
		$data['guru'] = $this->M_guru->getById($id);
		$this->template_frontend->views('frontend/detail-guru', $data);
	}
}
	