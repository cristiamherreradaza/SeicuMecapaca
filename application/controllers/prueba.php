<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model("AllBloque_model");
    }
	
	public function prueba()	
	{	
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
       
	}
}