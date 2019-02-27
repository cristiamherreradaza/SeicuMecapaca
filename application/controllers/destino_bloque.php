<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destino_bloque extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("destino_bloque_model");
	}

	public function destino_bloque(){
		
		$lista['destino_bloque'] = $this->destino_bloque_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/destino_bloque', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Destino_bloque/destino_bloque");
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
			$this->destino_bloque_model->insertar_destino_bloque($descripcion, $alias, $coeficiente);
			redirect('destino_bloque');

		}

	 }

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->destino_bloque_model->eliminar($u);
	    redirect('destino_bloque');
	   }

	public function update()     
	{         
	    $destino_bloque_id = $this->input->post('destino_bloque_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->destino_bloque_model->actualizar($destino_bloque_id,$descripcion,$alias,$coeficiente);
	   redirect('Destino_bloque');
	}
}

