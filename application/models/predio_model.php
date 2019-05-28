<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predio_model extends CI_Model {

    public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->helper('vayes_helper');
        // $this->load->model("persona_model");
    }

    public function guarda_predio($data = null){

        $direccion_archivos = '/public/assets/files/predios';
        $target_file = $data["foto_plano"]["name"];
        $tipo_archivo = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $nombre_archivo = date("dmYHis") . md5($target_file) . '.' . $tipo_archivo;
        vdebug($nombre_archivo, false, false, true);   
        vdebug($tipo_archivo, false, false, true);   
        vdebug($data, false, false, true);   
        vdebug($data['foto_plano']['name'], true, false, true);   
        $this->db->insert('catastro.predio', $data);
        $id_cod_catastral = $this->db->insert_id();

        // guardamos las fotos
        $foto_plano = $_FILES['foto_plano']['tmp_name'];
        $contenido_foto_plano = file_get_contents($foto_plano);
        $contenido_tranformado_plano = pg_escape_bytea($contenido_foto_plano);

        $foto_fachada = $_FILES['foto_fachada']['tmp_name'];
        $contenido_foto_fachada = file_get_contents($foto_fachada);
        $contenido_tranformado_fachada = pg_escape_bytea($contenido_foto_fachada);

        $data_foto = array(
            'codcatas'=>$this->input->post('codigo_catastral'),
            'foto_fachada'=>$contenido_tranformado_fachada,
            'foto_plano_ubi'=>$contenido_tranformado_plano,
            'activo'=>'1',
        );

        $this->db->insert('catastro.predio_foto', $data_foto);
        // fin guarda las fotografias

    }

}