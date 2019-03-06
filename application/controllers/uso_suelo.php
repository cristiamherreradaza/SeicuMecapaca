<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uso_suelo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("uso_suelo_model");
	}

	public function uso_suelo(){
		
		$lista['uso_suelo'] = $this->uso_suelo_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/uso_suelo', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."uso_suelo/uso_suelo");
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
			$this->uso_suelo_model->insertar_uso_suelo($descripcion, $alias, $coeficiente);
			redirect('uso_suelo');

		}

	 }

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->uso_suelo_model->eliminar($u);
	    redirect('uso_suelo');
	   }

	   public function update()     
	{         
	    $uso_suelo_id = $this->input->post('uso_suelo_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->uso_suelo_model->actualizar($uso_suelo_id,$descripcion,$alias,$coeficiente);
	   redirect('Uso_suelo');
	}
}

