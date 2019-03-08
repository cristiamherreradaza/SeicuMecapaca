<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipopredio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("tipopredio_model");
	}

	public function tipopredio(){
		
		$lista['tipopredio'] = $this->tipopredio_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/tipopredio', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Tipopredio/tipopredio");
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
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;

			$descripcion = $datos['descripcion'];
			$alias = $datos['alias'];
			$coeficiente = $datos['coeficiente'];
			
			$this->tipopredio_model->insertar_tipredio($descripcion, $alias, $coeficiente, $usu_creacion);
			//var_dump($array);
			redirect('tipopredio');

		}

	 }

	 public function update()     
	{         
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s"); 

	    $tipo_predio_id = $this->input->post('tipo_predio_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->tipopredio_model->actualizar($tipo_predio_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
	   redirect('Tipopredio');
	}

	 public function eliminar()
	 {

	 	//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s"); 

	    $u = $this->uri->segment(3);
	    $this->tipopredio_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
	    redirect('Tipopredio');
	   }

	
}

