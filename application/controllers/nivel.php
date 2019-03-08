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
			$this->nivel_model->insertar_nivel($descripcion, $alias, $coeficiente, $usu_creacion);
			redirect('nivel');

		}

	 }

	 public function update()     
	{     
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s"); 
    
	    $nivel_id = $this->input->post('nivel_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->nivel_model->actualizar($nivel_id, $descripcion, $alias, $coeficiente, $usu_modificacion, $fec_modificacion);
	   redirect('nivel');
	}

	 public function eliminar()
	 {
	 	//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s");
        
	    $u = $this->uri->segment(3);
	    $this->nivel_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
	    redirect('Nivel');
	   }

   	  
}

