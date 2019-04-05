<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organigrama_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT x.unidad,x.hijo,x.organigrama_id,y.organigrama_id as padre_id,y.unidad as jefe FROM tramite.organigrama x
        LEFT JOIN
        tramite.organigrama y
        on x.hijo=y.organigrama_id
        WHERE x.activo=1 and y.activo=1
        ORDER BY y.unidad asc');
        return $query->result();
    }
    function get_grupo() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from tramite.organigrama WHERE activo=1');
        return $query->result();
    }
}
