<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zona_urbana_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.zona_urbana ORDER BY zonaurb_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
		/*
		foreach ($lista as $lis) {
			print_r($lis->rol_id."<br>");
			print_r($lis->rol."<br>");
			print_r($lis->activo."<br>");
		}

		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', $contrasenia);
		
		$resultado = $this->db->get("credencial");

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}
		*/

	}

	public function insertar_zona($descripcion, $activo)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'activo' =>$activo
			);
		$this->db->insert('catastro.zona_urbana', $array);
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

	public function Editar($rol_id) {
      $consulta = $this->db->get_where('rol', array('rol_id' => $rol_id))->row();
	  return $consulta;
    }

	public function getRol($rol_id) {
		$res = $this->db->get_where('rol', array('rol_id' => $rol_id))->row();
		var_dump($res);
		//return $res;
	}

	 public function eliminar($id){
      $this->db->delete('catastro.zona_urbana', array('zonaurb_id' => $id));
    }
}
