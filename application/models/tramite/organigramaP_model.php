<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganigramaP_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function lista(){
		$lista = $this->db->query("SELECT op.fec_alta, op.vigencia, p.nombres, p.paterno, p.materno, o.unidad FROM tramite.organigrama_persona as op JOIN persona as p ON op.persona_id = p.persona_id JOIN tramite.organigrama as o ON op.organigrama_id = o.organigrama_id WHERE op.activo = '1' ORDER BY op.organigrama_persona_id ASC")->result();
		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}
}
