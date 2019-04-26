<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edificacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Edificacion_model");
        $this->load->library('session');
        $this->load->model('tipopredio_model');
        //$this->load->model("logacceso_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");
    }

    public function index()
    {
        if ($this->session->userdata("login")) {
            redirect(base_url() . "Edificacion/nuevo");
        } else {
            redirect(base_url());
        }
    }



    public function nuevo($cod_catastral = null)
    {
        if ($this->session->userdata("login")) {
            //
            //$credencial_id = $this->session->userdata("persona_perfil_id");
            //$acceso_inicio = date("Y-m-d H:i:s");

            //$ip = $this->logacceso_model->ip_publico();
            //$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);
            //$cod='123456789';
            $data['verifica'] = $this->rol_model->verifica();
            $data['result_array'] = $this->Edificacion_model->getAllData();
            $data['bloques'] = $this->Edificacion_model->get_Bloque($cod_catastral);
            $data['grupos_subgrupos'] = $this->Edificacion_model->get_grupos_subgrupos();
            $data['grupos'] = $this->Edificacion_model->get_grupos();
            $data['destino_bloque'] = $this->Edificacion_model->get_Destino_bloque();
            $data['destino_uso'] = $this->Edificacion_model->get_Uso_bloque();
            $data['tipo_planta'] = $this->Edificacion_model->get_tipo_planta();
            $data['cod_catastral'] = $cod_catastral;
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('bloque/edificacionView', $data);
            $this->load->view('bloque/validar');//footer
            //$this->load->view('admin/footer');
            $this->load->view('bloque/jtables');
            //$this->load->view('admin/wizard_js');
        } else {
            redirect(base_url());
        }
    }

    public function adicionar($cod_catastral = null)
    {
        if ($this->session->userdata("login")) {

            //$credencial_id = $this->session->userdata("persona_perfil_id");
            //$acceso_inicio = date("Y-m-d H:i:s");

            //$ip = $this->logacceso_model->ip_publico();
            //$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);
            //$cod='123456789';

            $anio_act=date("Y");//obtiene el anio actual

            $cant_bloque = $this->db->query("SELECT count(nro_bloque) as total FROM catastro.bloque where activo=1 and codcatas='$cod_catastral'");
            foreach ($cant_bloque->result() as $nro) {
                $total_bloq = $nro->total;
            }
            $total_bloq = $total_bloq + 1;
            $data['result_array'] = $this->Edificacion_model->getAllData();
            //$data['bloques'] = $this->Edificacion_model->get_Bloque($cod);
            $data['grupos_subgrupos'] = $this->Edificacion_model->get_grupos_subgrupos();
            $data['grupos'] = $this->Edificacion_model->get_grupos();
            $data['destino_bloque'] = $this->Edificacion_model->get_Destino_bloque();
            $data['destino_uso'] = $this->Edificacion_model->get_Uso_bloque();
            $data['tipo_planta'] = $this->Edificacion_model->get_tipo_planta();
            $data['cod_catastral'] = $cod_catastral;
            $data['nro_bloque'] = $total_bloq;
            $data['anio_actual'] = $anio_act;
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('bloque/bloque_nuevo', $data);
            //$this->load->view('bloque/jtables');
            $this->load->view('bloque/validar');
            $this->load->view('admin/wizard_js');
        //$this->load->view('admin/footer');
        } else {
            redirect(base_url());
        }
    }

    public function create()
    {
        //vdebug($this->input-post());
        //$this->Edificacion_model->createData();
        //comentario
        //vdebug($this->input->post());

        //captura de datos para la tabla bloque
        if ($this->session->userdata("login")) {
            $id_us = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id_us))->row();
            $usu_creacion = $resi->persona_id;

            $data = array(

            'codcatas' => $this->input->post('cod_catastral'), //input
            'nro_bloque' => $this->input->post('nro_bloque'), //crear
            'nom_bloque' => $this->input->post('nom_bloque'),
            'estado_fisico' => $this->input->post('estado_fisico'),
            'altura' => $this->input->post('altura'),
            'anio_cons' => $this->input->post('anio_cons'),
            'anio_remo' => $this->input->post('anio_remo'),
            'porcentaje_remo' => $this->input->post('porcentaje_remo'), //validar
            'destino_bloque_id' => $this->input->post('destino_bloque_id'),
            'uso_bloque_id' => $this->input->post('uso_bloque_id'),
            'activo' => '1',
            'tipolo_id' => '12', //no existe relacion en la bd
            'usu_creacion' =>$usu_creacion //aun no captura el usuario
        );
            $this->db->insert('catastro.bloque', $data);
            //fin de insercion de datos en la tabla bloque

            //captura el bloque_id del nro de bloque guardado
            $nro_bloq = $this->input->post('nro_bloque');
            $codcatas = $this->input->post('cod_catastral'); //input
            $query = $this->db->query("SELECT bloque_id FROM catastro.bloque WHERE codcatas='$codcatas' and nro_bloque='$nro_bloq'");
            foreach ($query->result() as $row) {
                $bloque_id_form = $row->bloque_id;
            }
            //captura de datos para la tabla bloque_piso

            $cont = 0;
            $id_tipo_planta = $this->input->post('id_tipo_planta');
            $nivel_a = $this->input->post('niveles');
            $superficie_a = $this->input->post('superficies');
            $altura_p = $this->input->post('alturas');
            for ($j = 0; $j < count($id_tipo_planta); $j++) {
                $bloque_piso = array(
                'nro_bloque' => $this->input->post('nro_bloque'),
                'nivel' => $nivel_a[$j],
                'tipo_planta_id' => $id_tipo_planta[$j],
                'superficie' => $superficie_a[$j],
                'altura' => $altura_p[$j],
                'bloque_id' => $bloque_id_form, //id del bloque nro x
                'usu_creacion' =>$usu_creacion  //aun no captura el usuario
            );
                $this->db->insert('catastro.bloque_piso', $bloque_piso);
            }

            //fin de insertar datos en tabla bloque_piso

            //insercion en la tabla elementos_cons
            $tam = $this->input->post('tam_grup_sub');
            for ($i = 0; $i < $tam; $i++) {
                $bloque_elem_cons = array(
                'bloque_id' => $bloque_id_form, //cargar de la BD
                'nro_bloque' => $this->input->post('nro_bloque'),
                'grupo_mat_id' => $this->input->post($i . 'a'),
                'mat_item_id' => $this->input->post($i . 'b'),
                'cantidad' => $this->input->post($i . 'c'),
                'usu_creacion' => $usu_creacion //aun no captura el usuario
            );
                $this->db->insert('catastro.bloque_elemento_cons', $bloque_elem_cons);
            }
            // fin guardamos los servicios
            redirect(base_url() . 'Edificacion/nuevo/' . $this->input->post('cod_catastral'));
        } else {
            redirect(base_url());
        }
    }

    public function next($cod_catastral = null)
    {
        if ($this->session->userdata("login")) {
            $query = $this->db->query("UPDATE catastro.predio SET activo = 2 WHERE codcatas='$cod_catastral'");
            redirect(base_url() . 'predios/nuevo/' . $cod_catastral);
        } else {
            redirect(base_url());
        }
    }

    public function update($id = null, $cod_catastral = null)
    {
        if ($this->session->userdata("login")) {
            $data['datos_bloque'] = $this->Edificacion_model->get_datos_bloque($id);
            $data['datos_bloque_piso'] = $this->Edificacion_model->get_datos_bloque_piso($id);

            $data['bloques'] = $this->Edificacion_model->get_bloque_elemnt_grupo_count($id);//numero de grupos
            $data['grupos_subgrupos'] = $this->Edificacion_model->get_grupos_subgrupos_byid($id);
            //la cantidad de grupos
            $data['grupos'] = $this->Edificacion_model->get_bloque_elemnt_grupo_count($id);
            $data['destino_bloque'] = $this->Edificacion_model->get_Destino_bloque();
            $data['destino_uso'] = $this->Edificacion_model->get_Uso_bloque();
            $data['tipo_planta'] = $this->Edificacion_model->get_tipo_planta();
            $data['cod_catastral'] = $cod_catastral;
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('bloque/bloque_edicion', $data);
            //$this->load->view('bloque/jtables');
            $this->load->view('bloque/validar');
            $this->load->view('admin/wizard_js');
        } else {
            redirect(base_url());
        }
    }
    public function delete($id = null, $cod_catastral = null)
    {
        if ($this->session->userdata("login")) {
            $id_us = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id_us))->row();
            $usu_eliminacion = $resi->persona_id;
            $fec_eliminacion = date("Y-m-d H:i:s");

            $data = array(
                'activo' => 0, //input
                'usu_eliminacion' => $usu_eliminacion, //input
                'fec_eliminacion' => $fec_eliminacion, //input
            );
            $this->db->where('bloque_id', $id);
            $this->db->update('catastro.bloque', $data);

            $data_be = array(
                'activo' => 0, //input
                'usu_eliminacion' => $usu_eliminacion, //input
                'fec_eliminacion' => $fec_eliminacion, //input
            );
            $this->db->where('bloque_id', $id);
            $this->db->update('catastro.bloque_elemento_cons', $data_be);

            $data_p = array(
                'activo' => 0, //input
                'usu_eliminacion' => $usu_eliminacion, //input
                'fec_eliminacion' => $fec_eliminacion, //input
            );
            $this->db->where('bloque_id', $id);
            $this->db->update('catastro.bloque_piso', $data_p);

            /*$query = $this->db->query("UPDATE catastro.bloque SET activo = 0  WHERE bloque_id='$id'");
            $query = $this->db->query("UPDATE catastro.bloque_elemento_cons SET activo =0  WHERE bloque_id='$id'");
            $query = $this->db->query("UPDATE catastro.bloque_piso SET activo = 0  WHERE bloque_id='$id'");*/


            redirect(base_url() . 'Edificacion/nuevo/' . $cod_catastral);
        } else {
            redirect(base_url());
        }
    }

    public function actualizar()
    {
        if ($this->session->userdata("login")) {
            $id_us = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id_us))->row();
            $usu_modificacion = $resi->persona_id;
            $fec_modificacion = date("Y-m-d H:i:s");

            $bloque_id=$this->input->post('bloque_id');

            $data = array(

            //'codcatas' => $this->input->post('cod_catastral'), //input
            'nro_bloque' => $this->input->post('nro_bloque'), //crear
            'nom_bloque' => $this->input->post('nom_bloque'),
            'estado_fisico' => $this->input->post('estado_fisico'),
            'altura' => $this->input->post('altura'),
            'anio_cons' => $this->input->post('anio_cons'),
            'anio_remo' => $this->input->post('anio_remo'),
            'porcentaje_remo' => $this->input->post('porcentaje_remo'), //validar
            'destino_bloque_id' => $this->input->post('destino_bloque_id'),
            'uso_bloque_id' => $this->input->post('uso_bloque_id'),
            'usu_modificacion' => $usu_modificacion, //input
            'fec_modificacion' => $fec_modificacion, //input
        );
            $this->db->where('bloque_id', $bloque_id);
            $this->db->update('catastro.bloque', $data);
            //fin de insercion de datos en la tabla bloque

            //borramos de la base de datos los registros de la tablas bloque_piso

            $data_bloquep = $this->db->query("SELECT * from catastro.bloque_piso WHERE bloque_id=$bloque_id limit 1");
            foreach ($data_bloquep ->result() as $row) {
                $usr_create=$row->usu_creacion;
                $fec_create=$row->fec_creacion;
            }

            $this->db->where('bloque_id', $bloque_id);
            $this->db->delete('catastro.bloque_piso');

        

            //captura el bloque_id del nro de bloque guardado
            $nro_bloq = $this->input->post('nro_bloque');
            $codcatas = $this->input->post('cod_catastral'); //input
     
            //captura de datos para la tabla bloque_piso

     
            $cont = 0;
            $id_tipo_planta = $this->input->post('id_tipo_planta');
            $nivel_a = $this->input->post('niveles');
            $superficie_a = $this->input->post('superficies');
            $altura_p = $this->input->post('alturas');
            for ($j = 0; $j < count($id_tipo_planta); $j++) {
                $bloque_piso = array(
                'nro_bloque' => $this->input->post('nro_bloque'),
                'nivel' => $nivel_a[$j],
                'tipo_planta_id' => $id_tipo_planta[$j],
                'superficie' => $superficie_a[$j],
                'altura' => $altura_p[$j],
                'bloque_id' => $bloque_id, //id del bloque nro x
                'usu_creacion' => $usr_create, //aun no captura el usuario
                'fec_creacion' => $fec_create, //aun no captura el usuario
                'usu_modificacion' => $usu_modificacion, //input
                'fec_modificacion' => $fec_modificacion, //input
            );
                $this->db->insert('catastro.bloque_piso', $bloque_piso);
            }
            //fin de insertar datos en tabla bloque_piso

            //borramos todos los datos anteriores de la tabla bloque_elemento_cons por el id
            $data_bloque_cons = $this->db->query("SELECT * from catastro.bloque_elemento_cons WHERE bloque_id=$bloque_id limit 1");
            foreach ($data_bloque_cons ->result() as $row) {
                $usr_create_c=$row->usu_creacion;
                $fec_create_c=$row->fec_creacion;
            }

            $this->db->where('bloque_id', $bloque_id);
            $this->db->delete('catastro.bloque_elemento_cons');

            //insercion en la tabla elementos_cons
            $tam = $this->input->post('tam_grup_sub');
            for ($i = 0; $i < $tam; $i++) {
                $bloque_elem_cons = array(
                'bloque_id' => $bloque_id, //cargar de la BD
                'nro_bloque' => $this->input->post('nro_bloque'),
                'grupo_mat_id' => $this->input->post($i . 'a'),
                'mat_item_id' => $this->input->post($i . 'b'),
                'cantidad' => $this->input->post($i . 'c'),
                'usu_creacion' => $usr_create_c, //aun no captura el usuario
                'fec_creacion' => $fec_create_c, //aun no captura el usuario
                'usu_modificacion' => $usu_modificacion, //input
                'fec_modificacion' => $fec_modificacion, //input
            );
                $this->db->insert('catastro.bloque_elemento_cons', $bloque_elem_cons);
            }
        
            // fin guardamos los servicios
            redirect(base_url() . 'Edificacion/nuevo/' . $this->input->post('cod_catastral'));
        } else {
            redirect(base_url());
        }
    }

    public function ficha_tecnica_pdf()
    {
        if ($this->session->userdata("login")) {

            //$credencial_id = $this->session->userdata("persona_perfil_id");
            //$acceso_inicio = date("Y-m-d H:i:s");

            //$ip = $this->logacceso_model->ip_publico();
            //$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);
            //$cod='123456789';

            $anio_act=date("Y");//obtiene el anio actual

            $total_bloq = 4;
            $data['result_array'] = $this->Edificacion_model->getAllData();
            //$data['bloques'] = $this->Edificacion_model->get_Bloque($cod);
            $data['grupos_subgrupos'] = $this->Edificacion_model->get_grupos_subgrupos();
            $data['grupos'] = $this->Edificacion_model->get_grupos();
            $data['destino_bloque'] = $this->Edificacion_model->get_Destino_bloque();
            $data['destino_uso'] = $this->Edificacion_model->get_Uso_bloque();
            $data['tipo_planta'] = $this->Edificacion_model->get_tipo_planta();
            
            $data['nro_bloque'] = $total_bloq;
            $data['anio_actual'] = $anio_act;
            //$this->load->view('bloque/header_ficha_tecnica');            
            $this->load->view('bloque/ficha_tecnica_pdf', $data);
            //$this->load->view('bloque/jtables');
            //$this->load->view('bloque/footer_ficha_tecnica');
            //$this->load->view('admin/wizard_js');
        //$this->load->view('admin/footer');
        } else {
            redirect(base_url());
        }
    }
}
