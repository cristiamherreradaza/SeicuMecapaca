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


	public function eliminar($id)
	{
      $this->db->delete('catastro.zona_urbana', array('zonaurb_id' => $id));
    }

    public function actualizar($zonaurb_id, $descripcion, $activo)
    {
        $data = array(
            'descripcion' => $descripcion,
            'activo' => $activo
        );
        $this->db->where('zonaurb_id', $zonaurb_id);
        return $this->db->update('catastro.zona_urbana', $data);
    }
}
