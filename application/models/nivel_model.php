<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nivel_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.nivel ORDER BY nivel_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
		
	}

	public function insertar_nivel($descripcion, $alias, $coeficiente)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias,
			'coeficiente' =>$coeficiente
			);
		$this->db->insert('catastro.nivel', $array);
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
      $this->db->delete('catastro.nivel', array('nivel_id' => $id));
    }

    public function actualizar($nivel_id, $descripcion, $alias, $coeficiente)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias,
            'coeficiente' => $coeficiente
        );
        $this->db->where('nivel_id', $nivel_id);
        return $this->db->update('catastro.nivel', $data);
    }
}
