<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('template_website/galeri');
	}
	public function album(){
		$this->load->view('template_website/albumekstra');
	}
	public function album2(){
		$this->load->view('template_website/kegiatan');
	}
	public function album3(){
		$this->load->view('template_website/presis');
	}
	public function album4(){
		$this->load->view('template_website/albumekstra1');
	}
	public function album5(){
		$this->load->view('template_website/albumekstra2');
	}
}

