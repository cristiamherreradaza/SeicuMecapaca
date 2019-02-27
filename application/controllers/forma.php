<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forma extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("forma_model");
	}

	public function forma(){
		
		$lista['forma'] = $this->forma_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/forma', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Forma/forma");
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
			$this->forma_model->insertar_forma($descripcion, $alias, $coeficiente);
			redirect('forma');

		}

	 }

	public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->forma_model->eliminar($u);
	    redirect('Forma');
	   }

	public function update()     
	{         
	    $forma_id = $this->input->post('forma_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->forma_model->actualizar($forma_id,$descripcion,$alias,$coeficiente);
	   redirect('Forma');
	}   	  
}

