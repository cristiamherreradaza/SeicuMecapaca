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

	public function prueba()
	{
		var_dump('hola');
	}

	public function getUsuario($id) {
		$res = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
		$dato = $res->persona_id;
		$res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
		return $res;
	}
}
