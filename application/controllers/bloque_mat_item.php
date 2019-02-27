<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloque_mat_item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("bloque_grupo_mat_model");
	}

	public function bloque_mat_item(){

		$lista['bloque_mat_item'] = $this->bloque_mat_item_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/bloque_mat_item', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."bloque_mat_item/bloque_mat_item");
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
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;

			$descripcion = $datos['descripcion'];
			$this->bloque_mat_item_model->insertar_zona($descripcion, $usu_creacion);
			redirect('bloque_mat_item');

		}

	 }

	 public function update()     
	{   
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s");

	    $grupo_mat_id = $this->input->post('grupo_mat_id');
	    $descripcion = $this->input->post('descripcion');

	    $actualizar = $this->bloque_mat_item_model->actualizar($grupo_mat_id, $descripcion, $usu_modificacion, $fec_modificacion);
	   redirect('bloque_mat_item');
	}

	 public function eliminar()
	 {
	 	//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s"); 

	    $u = $this->uri->segment(3);
	    $this->bloque_mat_item_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
	    redirect('bloque_mat_item');
	   }

}

