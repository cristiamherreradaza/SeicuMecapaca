<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento)
	{	
		
		$array = array(
			'nombres' =>$nombres,
			'paterno' =>$paterno,
			'materno' =>$materno,
			'ci' =>$ci,
			'fec_nacimiento' =>$fec_nacimiento
			);
		$this->db->insert('persona', $array);
	}

}
