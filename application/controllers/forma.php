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
			$this->forma_model->insertar_forma($descripcion, $alias, $coeficiente, $usu_creacion);
			redirect('forma');

		}

	 }


	 public function update()     
	{         
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s"); 

	    $forma_id = $this->input->post('forma_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->forma_model->actualizar($forma_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
	   redirect('Forma');
	} 

	public function eliminar()
	{
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s");
        
	    $u = $this->uri->segment(3);
	    $this->forma_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
	    redirect('Forma');
	   }

	  	  
}

