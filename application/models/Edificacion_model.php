<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificacion_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function getAllData() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT * FROM catastro.tipo_predio where activo=1 ');
        return $query->result_array();
    }
    function get_Destino_bloque() {//obtiene los datos de la tabla destino_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.destino_bloque where activo=1');
        return $query->result();
    }

    function get_Uso_bloque() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.uso_bloque where activo=1');
        return $query->result();
    }
    function get_tipo_planta() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.tipo_planta WHERE activo=1');
        return $query->result();
    }

    function get_grupos_subgrupos() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT x.grupo_mat_id,x.descripcion as desc_grupo,y.mat_item_id,y.descripcion as desc_item FROM (SELECT grupo_mat_id,descripcion from catastro.bloque_grupo_mat WHERE activo=1) as x INNER JOIN (SELECT grupo_mat_id,mat_item_id,descripcion FROM catastro.bloque_mat_item WHERE activo=1) as y on x.grupo_mat_id=y.grupo_mat_id ORDER BY x.grupo_mat_id ASC');
        return $query->result_array();
    }

    function get_grupos() {//obtiene los datos de la tabla grupo_mat en array result
        $query = $this->db->query('SELECT grupo_mat_id,descripcion from catastro.bloque_grupo_mat WHERE activo=1 ORDER BY grupo_mat_id ASC');
        return $query->result_array();
    }

    function get_Bloque($cod_catastral) {//obtiene los datos de la tabla bloque en array result
        $query = $this->db->query("SELECT * FROM catastro.bloque WHERE activo=1 and codcatas='$cod_catastral'");
        return $query->result();
    }

    function get_nro_bloque() {//obtiene los datos de la tabla bloque en array result
        $query = $this->db->query('SELECT nro_bloque FROM catastro.bloque where activo=1 ORDER BY nro_bloque DESC LIMIT 1');
        return $query->result();
    }


}
