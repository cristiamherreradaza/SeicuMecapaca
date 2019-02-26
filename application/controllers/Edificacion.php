<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificacion extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model("Edificacion_model");
    }
	
	public function index()	
	{	
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('EdificacionView');        
        $this->load->view('bloque/validar');
        $this->load->view('admin/wizard_js');
	}
}
