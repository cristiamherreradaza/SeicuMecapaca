<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificio_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.edificio ORDER BY edificio_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
		
	}

	public function insertar_edificio($descripcion, $alias)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias
			);
		$this->db->insert('catastro.edificio', $array);
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

	 public function eliminar($id){
      $this->db->delete('catastro.edificio', array('edificio_id' => $id));
    }

    public function actualizar($edificio_id, $descripcion, $alias)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias
        );
        $this->db->where('edificio_id', $edificio_id);
        return $this->db->update('catastro.edificio', $data);
    }
}
