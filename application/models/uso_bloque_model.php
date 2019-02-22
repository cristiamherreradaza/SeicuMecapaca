<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uso_bloque_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.uso_bloque ORDER BY uso_bloque_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_uso_bloque($descripcion, $alias, $coeficiente)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias,
			'coeficiente' =>$coeficiente
			);
		$this->db->insert('catastro.uso_bloque', $array);
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
      $this->db->delete('catastro.uso_bloque', array('uso_bloque_id' => $id));
    }

    public function actualizar($uso_bloque_id, $descripcion, $alias, $coeficiente)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias,
            'coeficiente' => $coeficiente
        );
        $this->db->where('uso_bloque_id', $uso_bloque_id);
        return $this->db->update('catastro.uso_bloque', $data);
    }
}
