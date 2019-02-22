<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendiente_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.pendiente ORDER BY pendiente_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}

	}

	public function insertar_pendiente($descripcion, $alias, $coeficiente)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias,
			'coeficiente' =>$coeficiente
			);
		$this->db->insert('catastro.pendiente', $array);
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
      $this->db->delete('catastro.pendiente', array('pendiente_id' => $id));
    }

    public function actualizar($pendiente_id, $descripcion, $alias, $coeficiente)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias,
            'coeficiente' => $coeficiente
        );
        $this->db->where('pendiente_id', $pendiente_id);
        return $this->db->update('catastro.pendiente', $data);
    }

}
