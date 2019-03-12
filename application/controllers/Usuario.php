<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Usuario_model");
	}

	public function zona_urbana(){

		$lista['zona_urbana'] = $this->zona_urbana_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/zona_urbana', $lista);
		$this->load->view('admin/footer');
	}

	public function prueba(){
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('usuarios/usuarios');
		$this->load->view('admin/footer');
		
	}

	public function prueba2(){
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('usuarios/usuarioss');
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
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;

			$descripcion = $datos['descripcion'];
			$this->zona_urbana_model->insertar_zona($descripcion, $usu_creacion);
			redirect('Zona_urbana');

		}

	 }

	 public function update()     
	{   
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s"); 

	    $zonaurb_id = $this->input->post('zonaurb_id');
	    $descripcion = $this->input->post('descripcion');
	   // var_dump($zonaurb_id);

	    $actualizar = $this->zona_urbana_model->actualizar($zonaurb_id, $descripcion, $usu_modificacion, $fec_modificacion);
	  	redirect('Zona_urbana');
	}
	

	public function eliminar()
	 {
	 	//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s"); 

	    $u = $this->uri->segment(3);
	    $this->zona_urbana_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
	    redirect('Zona_urbana');
	   }

	   public function adaptar()
	{
		//$id = $this->db->get_where('persona', array('ci' => '9112739'))->row();
		//var_dump($id->nombres);
		$id = $this->db->query("SELECT * FROM persona WHERE ci = '9112739'")->row();
		$id_persona = $id->persona_id;
		$nombres = $id->nombres;
		var_dump($id_persona, $nombres);
	}

	public function registra()
	{
		$datos = $this->input->post();
		
		if(isset($datos))
		{
			$nombres = $datos['nombres'];
			$paterno = $datos['paterno'];
			$materno = $datos['materno'];
			$ci = $datos['ci'];
			$fec_nacimiento = $datos['fec_nacimiento'];
			$this->Usuario_model->insertar_usuario($nombres, $paterno, $materno, $ci, $fec_nacimiento);

			$id = $this->db->query("SELECT * FROM persona WHERE ci = '$ci'")->row();

			$persona_id = $id->persona_id;
			$perfil_id = $datos['perfil_id'];
			$this->Usuario_model->insertar_persona_perfil($persona_id, $perfil_id);

			$perfil_id = $this->db->query("SELECT MAX(persona_perfil_id) as max FROM persona_perfil")->row();

			$persona_perfil_id = $perfil_id->max;
			$rol_id = $datos['rol_id'];
			$usuario = $datos['usuario'];
			$contrasenia = $datos['contrasenia'];
			$this->Usuario_model->insertar_credencial($persona_perfil_id, $rol_id, $usuario, $contrasenia);
			
			redirect('Predios');
			

		}

	 }

	 public function abc()
	 {

	 	$persona_perfil_id = $this->db->query("SELECT MAX(persona_perfil_id) as max FROM persona_perfil")->row();
	 	var_dump($persona_perfil_id->max);


	 }

}

	