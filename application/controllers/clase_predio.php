<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clase_predio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("clase_predio_model");
	}

	public function clase_predio(){
		
		$lista['clase_predio'] = $this->clase_predio_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/clase_predio', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Clase_predio/clase_predio");
		}
		else{
			$this->load->view('login');	
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
			$this->clase_predio_model->insertar_clase_predio($descripcion, $alias, $coeficiente);
			redirect('clase_predio');

		}

	 }

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->clase_predio_model->eliminar($u);
	    redirect('Clase_predio');
	   }

	   public function update()     
	{         
	    $clase_predio_id = $this->input->post('clase_predio_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->clase_predio_model->actualizar($clase_predio_id,$descripcion,$alias,$coeficiente);
	   redirect('Clase_predio');
	}
	   	  
}

