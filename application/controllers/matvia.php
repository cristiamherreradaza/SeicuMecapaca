<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matvia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("matvia_model");
	}

	public function matvia(){
		
		$lista['matvia'] = $this->matvia_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/matvia', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Matvia/matvia");
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
			$coeficiente = $datos['coeficiente'];
			$this->matvia_model->insertar_matvia($descripcion, $coeficiente);
			redirect('matvia');

		}

	 }

	public function update()     
	{         
	    $matvia_id = $this->input->post('matvia_id');
	    $descripcion = $this->input->post('descripcion');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->matvia_model->actualizar($matvia_id,$descripcion,$coeficiente);
	   redirect('Matvia');
	}
		

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->matvia_model->eliminar($u);
	    redirect('Matvia');
	   }
   	  
}

