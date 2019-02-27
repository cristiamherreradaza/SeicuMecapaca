<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendiente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("pendiente_model");
	}

	public function pendiente(){
		
		$lista['pendiente'] = $this->pendiente_model->index();
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/pendiente', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Pendiente/pendiente");
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
			$coeficiente = $datos['coeficiente'];
			$this->pendiente_model->insertar_pendiente($descripcion, $alias, $coeficiente);
			redirect('pendiente');

		}

	 }

	 public function update()     
	{         
	    $pendiente_id = $this->input->post('pendiente_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->pendiente_model->actualizar($pendiente_id,$descripcion,$alias,$coeficiente);
	   redirect('Pendiente');
	}

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->pendiente_model->eliminar($u);
	    redirect('Pendiente');
	   }

	 public function editar()
	{
		$edirol = $this->uri->segment(3);
		var_dump($edirol);

	}
			
}

