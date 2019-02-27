<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("servicio_model");
	}

	public function servicio(){
		
		$lista['servicio'] = $this->servicio_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/servicio', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."servicio/servicio");
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
			$this->servicio_model->insertar_servicio($descripcion, $alias, $coeficiente);
			redirect('servicio');

		}

	 }

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->servicio_model->eliminar($u);
	    redirect('servicio');
	   }

	public function update()     
	{         
	    $servicio_id = $this->input->post('servicio_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->servicio_model->actualizar($servicio_id,$descripcion,$alias,$coeficiente);
	   redirect('Servicio');
	}	 

}

