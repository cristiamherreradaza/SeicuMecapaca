<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_correspondencia_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * FROM tramite.tipo_tramite where activo=1 ORDER BY tipo_correspondencia_id ASC');
        return $query->result();
    }
}
