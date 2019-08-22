<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flujo_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla requisito en array result
        $query = $this->db->query('SELECT t.*,o.unidad,e.tramite from tramite.flujo  t
        LEFT JOIN 
        tramite.organigrama o
        on t.organigrama_id=o.organigrama_id
        LEFT JOIN
        tramite.tipo_tramite e
        on t.tipo_tramite_id=e.tipo_tramite_id
        
        
        WHERE t.activo=1');
        return $query->result();
    }

    function get_tipotramite() {//obtiene los datos de la tabla tipotramite en array result
        $query = $this->db->query('SELECT * FROM
        tramite.tipo_tramite');
        return $query->result();
    }
    function get_organigrama() {//obtiene los datos de la tabla tipotramite en array result
        $query = $this->db->query('SELECT * FROM
        tramite.organigrama');
        return $query->result();
    }
}
