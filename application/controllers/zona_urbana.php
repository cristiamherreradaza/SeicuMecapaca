<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zona_urbana extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("zona_urbana_model");
	}

	public function zona_urbana(){

		$lista['zona_urbana'] = $this->zona_urbana_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/zona_urbana', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Zona_urbana/zona_urbana");
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
			$activo = $datos['activo'];
			$this->zona_urbana_model->insertar_zona($descripcion, $activo);
			redirect('Zona_urbana');

		}

	 }

	 public function update()     
	{         
	    $zonaurb_id = $this->input->post('zonaurb_id');
	    $descripcion = $this->input->post('descripcion');
	    $activo = $this->input->post('activo');

	    $actualizar = $this->zona_urbana_model->actualizar($zonaurb_id, $descripcion, $activo);
	   redirect('Zona_urbana');
	}

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->zona_urbana_model->eliminar($u);
	    redirect('Zona_urbana');
	   }

}

