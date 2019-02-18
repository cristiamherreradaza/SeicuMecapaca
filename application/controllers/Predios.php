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
		$this->load->view('admin/contenidos');
		$this->load->view('admin/footer');
		// $this->load->view('header');
		// $this->load->view('menu');
		// $this->load->view('contenido');
		// $this->load->view('footer');
		// $this->load->view('complementos');
	}

	public function nuevo(){
		// $data = 'Demo';

/*		$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";
*/		$data['hola'] = "Mi cuate es un Pillin";
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('predios/nuevo', $data);
		$this->load->view('admin/footer');
		$this->load->view('admin/wizard_js');
	}

}