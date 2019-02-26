<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ubicacion_model");
	}

	public function ubicacion(){
		
		$lista['ubicacion'] = $this->ubicacion_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/ubicacion', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Ubicacion/ubicacion");
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
			$this->ubicacion_model->insertar_ubicacion($descripcion, $alias, $coeficiente, $usu_creacion);
			redirect('ubicacion');
			

		}

	 }

	public function update()     
	{
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s"); 

	    $ubicacion_id = $this->input->post('ubicacion_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->ubicacion_model->actualizar($ubicacion_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
	   redirect('Ubicacion');
	}
		

	 public function eliminar()
	 {
	 	//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s"); 

	    $ubicacion_id = $this->uri->segment(3);
	    $this->ubicacion_model->eliminar($ubicacion_id, $usu_eliminacion, $fec_eliminacion);
	    redirect('Ubicacion');
	   }
   	  
}

