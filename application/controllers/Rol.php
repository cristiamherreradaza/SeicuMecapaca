<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("rol_model");
	}

	public function rol(){
		if($this->session->userdata("login")){

			$lista['verifica'] = $this->rol_model->verifica();
			$lista['rol'] = $this->rol_model->index();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/rol', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Rol/rol");
		}
		else{
			redirect(base_url());
		}
		
	}

	public function insertar()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			
			if(isset($datos))
			{
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

				$rol = $datos['rol'];
				$this->rol_model->insertar_rol($rol, $usu_creacion);
				redirect('Rol');

			}
		}
		else{
			redirect(base_url());
		}

	 }

	 public function update()     
	{  
		if($this->session->userdata("login")){ 
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s"); 

		    $rol_id = $this->input->post('rol_id');
		    $rol = $this->input->post('rol');
		   // var_dump($zonaurb_id);

		    $actualizar = $this->rol_model->actualizar($rol_id, $rol, $usu_modificacion, $fec_modificacion);
		  	redirect('Rol');
		}
		else{
			redirect(base_url());
		}
	}
	

	public function eliminar()
	{
		if($this->session->userdata("login")){ 
		 	//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_eliminacion = $resi->persona_id;
	        $fec_eliminacion = date("Y-m-d H:i:s"); 

		    $u = $this->uri->segment(3);
		    $this->rol_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Rol');
		}
		else{
			redirect(base_url());
		}
	}

}

