<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("persona_model");
	}

	/*
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view('login');	
		}
		
	}

	public function prueba()
	{
		//var_dump('hola');
		$ejemplo = $this->db->query("select * from credencial")->result();
		foreach ($ejemplo as $eje) {
			print_r($eje->rol_id."<br>");
			print_r($eje->usuario."<br>");
			print_r($eje->contrasenia."<br>");
			print_r($eje->token."<br>");
		}
	}*/

	public function insertar()
	{
		$datos = $this->input->post();
		
		if(isset($datos))
		{

			$nombres = $datos['nombres'];
			$paterno = $datos['paterno'];
			$materno = $datos['materno'];
			$ci = $datos['ci'];
			$fec_nacimiento = $datos['fec_nacimiento'];
			$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento);
			redirect('login');

		}

	 }
}

