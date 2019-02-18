<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipopredio_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listado_combo(){
		$this->db->select('tipo_predio_id, descripcion');
		$query = $this->db->get('catastro.tipo_predio');

		return $query->result();
	}

	public function hola(){
		echo 'Holas desde el modelo';
	}

}