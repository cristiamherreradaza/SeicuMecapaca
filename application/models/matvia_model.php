<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matvia_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.matvia ORDER BY matvia_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	
	}

	public function insertar_matvia($descripcion, $coeficiente)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'coeficiente' =>$coeficiente
			);
		$this->db->insert('catastro.matvia', $array);
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
      $this->db->delete('catastro.matvia', array('matvia_id' => $id));
    }

    public function actualizar($matvia_id, $descripcion, $coeficiente)
    {
        $data = array(
            'descripcion' => $descripcion,
            'coeficiente' => $coeficiente
        );
        $this->db->where('matvia_id', $matvia_id);
        return $this->db->update('catastro.matvia', $data);
    }

}
