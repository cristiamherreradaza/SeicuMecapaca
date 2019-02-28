<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificacion_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function getAllData() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT * FROM catastro.tipo_predio');
        return $query->result_array();
    }
    function get_Destino_bloque() {//obtiene los datos de la tabla destino_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.destino_bloque');
        return $query->result();
    }

    function get_Uso_bloque() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.uso_bloque');
        return $query->result();
    }
    function get_tipo_planta() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.tipo_planta');
        return $query->result();
    }

    function get_grupos_subgrupos() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT x.grupo_mat_id,x.descripcion as desc_grupo,y.mat_item_id,y.descripcion as desc_item FROM (SELECT grupo_mat_id,descripcion from catastro.bloque_grupo_mat) as x INNER JOIN (SELECT grupo_mat_id,mat_item_id,descripcion FROM catastro.bloque_mat_item) as y on x.grupo_mat_id=y.grupo_mat_id');
        return $query->result_array();
    }

    function get_Bloque() {//obtiene los datos de la tabla destino_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.bloque');
        return $query->result();
    }

    function createData() {
        //error_reporting([4]);
        // I don't know if you need to wrap the 1 inside of double quotes.
        //ini_set("display_startup_errors",1);
        //ini_set("display_errors",1);
        //vdebug($this->input-post());
        print_r($this->input-post());
        $data = array (             
            'anio_cons' =>$this->input->post('anio_cons'),
            'anio_remo' =>$this->input->post('anio_remo'),
            'destino_bloque_id' =>$this->input->post('destino_bloque_id'),
            'uso_bloque_id' =>$this->input->post('uso_bloque_id'),
            
            'estado_fisico' => $this->input->post('estado_fisico'),
            //'nivel' => $this->input->post('nivel'),//tabla bloque_piso
           
            'altura'=> 1,
            'nro_bloque' =>$this->input->post('nro_bloque'),//crear
            'nom_bloque' =>$this->input->post('nom_bloque'),
           

            //'codcatas' =>$this->input->post('codcatas'),
            'codcatas' =>'123456789',//input
            'porcentaje_remo' =>'100',//validar
            'tipolo_id' =>'12',//no existe en la db            
            'usu_creacion' =>1 //aun no captura el usuario   
            
        );


        //vdebug($datos['data']['codigo_catastral']);
        $this->db->insert('catastro.bloque', $data);   
        
        
        $bloque_id = 1;
            
        /*$query = $this->db->query('SELECT bloque_id FROM catastro.bloque WHERE codcatas="123" and nro_bloque=1');
        //foreach ($query->result() as $row)
            {
                $bloque_id = $row->bloque_id;
                    
            }

        //registra otros datos del bloque piso
        $databloquepiso = array (
            'nivel' => $this->input->post('nivel'),//tabla bloque_piso
            'activo' => '1',
            'nro_bloque' =>$this->input->post('nro_bloque'),//crear
            'tipo_planta_id' =>$this->input->post('tipo_planta_id'),
            'superficie' => $this->input->post('superficie'),    
           
            'bloque_id'=> $bloque_id,            
            'usu_creacion'=>'test',     
        );  
        //$this->db->insert('catastro.bloque_piso', $data); */
        //registra los elementos de construccion del bloque
        /*$data_elementos_construc = array (    
            
            'bloque_id' =>$this->input->post('anio_cons'),
            'nro_bloque' =>$this->input->post('anio_cons'),
            'grupo_mat_id' =>$this->input->post('anio_cons'),
            'mat_item_id' =>$this->input->post('anio_cons'),
            'cantidad' =>$this->input->post('anio_cons'),
            'activo' =>$this->input->post('anio_cons')            
        );*/
    }

}
