<?php
class Predios extends CI_Controller {

/*	public function __construct()
    {
        parent::__construct();
        // $this->load->model('news_model');
        $this->load->helper('url_helper');
    }
*/
	public function index(){
		// echo 'holas desde el controladora';
		// $crt = 'Holas';
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/contenido');
		$this->load->view('admin/footer');
		// $this->load->view('header');
		// $this->load->view('menu');
		// $this->load->view('contenido');
		// $this->load->view('footer');
		// $this->load->view('complementos');
	}

	public function nuevo(){

	}

}