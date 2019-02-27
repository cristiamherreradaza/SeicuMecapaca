<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("edificio_model");
	}

	public function edificio(){
		
		$lista['edificio'] = $this->edificio_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/edificio', $lista);
		$this->load->view('admin/footer');
	}
	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Edificio/edificio");
		}
		else{
			$this->load->view('login/login');	
		}
		
	}

	public function insertar()
	{
		$datos = $this->input->post();
		
		if(isset($datos))
		{

			$descripcion = $datos['descripcion'];
			$alias = $datos['alias'];
			$this->edificio_model->insertar_edificio($descripcion, $alias);
			redirect('edificio');

		}

	 }

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->edificio_model->eliminar($u);
	    redirect('edificio');
	   }

	 public function update()     
	{         
	    $edificio_id = $this->input->post('edificio_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');

	    $actualizar = $this->edificio_model->actualizar($edificio_id,$descripcion,$alias);
	   redirect('Edificio');
	}

}

