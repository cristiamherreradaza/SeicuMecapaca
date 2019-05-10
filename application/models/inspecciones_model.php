<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspecciones_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}

	function get_data_act() {
        $query = $this->db->query('SELECT * FROM inspeccion.tipo_actuacion WHERE activo=1');
        return $query->result();
	}
	
	function get_data_inf() {
        $query = $this->db->query('SELECT * FROM inspeccion.tipo_infraccion WHERE activo=1');
        return $query->result();
    }








}
