<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_planta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("tipo_planta_model");
	}

	public function tipo_planta(){
		
		$lista['tipo_planta'] = $this->tipo_planta_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/tipo_planta', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."tipo_planta/tipo_planta");
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
			$this->tipo_planta_model->insertar_tipo_planta($descripcion, $alias, $coeficiente);
			redirect('tipo_planta');

		}

	 }

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->tipo_planta_model->eliminar($u);
	    redirect('tipo_planta');
	   }

	 public function update()     
	{         
	    $tipo_planta_id = $this->input->post('tipo_planta_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->tipo_planta_model->actualizar($tipo_planta_id,$descripcion,$alias,$coeficiente);
	   redirect('Tipo_planta');
	}
}

