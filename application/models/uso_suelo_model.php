<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uso_suelo_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.uso_suelo ORDER BY uso_suelo_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}

	}

	public function insertar_uso_suelo($descripcion, $alias, $coeficiente)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias,
			'coeficiente' =>$coeficiente
			);
		$this->db->insert('catastro.uso_suelo', $array);
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
      $this->db->delete('catastro.uso_suelo', array('uso_suelo_id' => $id));
    }

    public function actualizar($uso_suelo_id, $descripcion, $alias, $coeficiente)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias,
            'coeficiente' => $coeficiente
        );
        $this->db->where('uso_suelo_id', $uso_suelo_id);
        return $this->db->update('catastro.uso_suelo', $data);
    }

}
