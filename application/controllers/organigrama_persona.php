<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organigrama_persona extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("tramite/organigramaP_model");
	}

	public function inicio(){
		$lista['datos'] = $this->organigramaP_model->lista();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('organigrama/asignacion_organigrama', $lista);
		$this->load->view('admin/footer');
	}

	

}

