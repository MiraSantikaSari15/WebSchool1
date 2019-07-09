<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

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
		$this->load->view('template_website/berita');
	}
	public function informasi1()
	{
		$this->load->view('template_website/berita1');
	}
	public function informasi2()
	{
		$this->load->view('template_website/berita2');
	}
	public function informasi3()
	{
		$this->load->view('template_website/berita3');
	}
	public function informasi4()
	{
		$this->load->view('template_website/ekstra');
	}
	public function informasi5()
	{
		$this->load->view('template_website/prestasi');
	}
	public function pengumumanA()
	{
		$this->load->view('template_website/pengumumaan');

	}
	public function pengumumanB()
	{
		$this->load->view('template_website/pengumuman1');

	}
	public function pengumumanC()
	{
		$this->load->view('template_website/pengumuman2');

	}
	public function pengumumanD()
	{
		$this->load->view('template_website/pengumuman3');

	}
	public function pengumumanE()
	{
		$this->load->view('template_website/pengumuman4');

	}
	public function komen()
	{
		$this->load->view('template_website/komentar');
	}
	public function ekstra1()
	{
		$this->load->view('template_website/OSIS');
	}
	public function ekstra2()
	{
		$this->load->view('template_website/Pramuka');
	}
	public function ekstra3()
	{
		$this->load->view('template_website/PMR');
	}
	public function ekstra4()
	{
		$this->load->view('template_website/Paskibra');
	}
	public function ekstra5()
	{
		$this->load->view('template_website/PKS');
	}
	public function ekstra6()
	{
		$this->load->view('template_website/Silat');
	}
	public function ekstra7()
	{
		$this->load->view('template_website/Futsal');
	}
	public function ekstra8()
	{
		$this->load->view('template_website/Vollyball');
	}
	public function ekstra9()
	{
		$this->load->view('template_website/Badminton');
	}
	public function ekstra10()
	{
		$this->load->view('template_website/PA');
	}
	public function ekstra11()
	{
		$this->load->view('template_website/LPE');
	}
	public function ekstra12()
	{
		$this->load->view('template_website/Japanese');
	}
	public function ekstra13()
	{
		$this->load->view('template_website/Jurnalistik');
	}
	public function ekstra14()
	{
		$this->load->view('template_website/Karawitan');
	}
	public function ekstra15()
	{
		$this->load->view('template_website/Padus');
	}
	public function ekstra16()
	{
		$this->load->view('template_website/Marching');
	}
	public function ekstra17()
	{
		$this->load->view('template_website/DKM');
	}
}

