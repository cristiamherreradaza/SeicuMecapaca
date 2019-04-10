<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organigrama_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT x.unidad,x.hijo,x.activo,x.organigrama_id,y.organigrama_id as padre_id,y.unidad as jefe FROM tramite.organigrama x
        LEFT JOIN
        tramite.organigrama y
        on x.hijo=y.organigrama_id
        ORDER BY y.unidad asc');
        return $query->result();
    }
    function get_grupo() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from tramite.organigrama WHERE activo=1');
        return $query->result();
    }

    function get_datos($id) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT x.unidad,x.hijo,x.organigrama_id,x.url,x.imagen,y.organigrama_id as padre_id,y.unidad as jefe FROM tramite.organigrama x
        LEFT JOIN
        tramite.organigrama y
        on x.hijo=y.organigrama_id
        WHERE x.activo=1 and y.activo=1 and x.organigrama_id=$id");        
        return $query->row();
    }

    function get_last_nivel() {//obtiene el valor del ultimo nivel
        $query = $this->db->query("SELECT nivel from tramite.organigrama WHERE activo=1 ORDER BY nivel DESC LIMIT 1");        
        return $query->row();
    }
    function get_datos_chart() {//obtiene todos los datos del organigrama ordenado por niveles
        $query = $this->db->query('SELECT x.unidad,x.hijo,x.nivel,x.organigrama_id,y.organigrama_id as padre_id,y.unidad as jefe FROM tramite.organigrama x
        LEFT JOIN
        tramite.organigrama y
        on x.hijo=y.organigrama_id
        WHERE x.activo=1 and y.activo=1
        ORDER BY y.unidad asc');
        return $query->result();
    }

}
