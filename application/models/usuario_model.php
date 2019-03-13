<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function login($usuario, $contrasenia)
	{
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', $contrasenia);
		
		$resultado = $this->db->get("credencial");

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}

	}

	public function insertar_usuario($nombres, $paterno, $materno, $ci, $fec_nacimiento)
	{	
		
		$array = array(
			'nombres' =>$nombres,
			'paterno' =>$paterno,
			'materno' =>$materno,
			'ci' =>$ci,
			'fec_nacimiento' =>$fec_nacimiento
			);
		$this->db->insert('public.persona', $array);
	}

	public function insertar_persona_perfil($persona_id, $perfil_id)
	{	
		
		$array = array(
			'persona_id' =>$persona_id,
			'perfil_id' =>$perfil_id
			);
		$this->db->insert('public.persona_perfil', $array);
	}

	public function insertar_credencial($persona_perfil_id, $rol_id, $usuario, $contrasenia)
	{	
		
		$array = array(
			'persona_perfil_id' =>$persona_perfil_id,
			'rol_id' =>$rol_id,
			'usuario' =>$usuario,
			'contrasenia' =>$contrasenia,
			'token' => 0
			);
		$this->db->insert('public.credencial', $array);
	}

}
