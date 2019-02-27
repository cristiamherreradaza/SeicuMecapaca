<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nivel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("nivel_model");
	}

	public function nivel(){
		
		$lista['nivel'] = $this->nivel_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/nivel', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Nivel/nivel");
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
			$this->nivel_model->insertar_nivel($descripcion, $alias, $coeficiente);
			redirect('nivel');

		}

	 }

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->nivel_model->eliminar($u);
	    redirect('Nivel');
	   }

   	 public function update()     
	{         
	    $nivel_id = $this->input->post('nivel_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->nivel_model->actualizar($nivel_id,$descripcion,$alias,$coeficiente);
	   redirect('nivel');
	} 
}

