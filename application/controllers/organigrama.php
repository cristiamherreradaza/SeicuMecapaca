<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organigrama extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("organigrama_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");
        $this->load->helper(array('form', 'url'));

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Organigrama/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo($cod_catastral = null)
    {

        if ($this->session->userdata("login")) {
            $data['data_org'] = $this->organigrama_model->get_data();
            $data['data_grupo'] = $this->organigrama_model->get_grupo();
            $data['verifica'] = $this->rol_model->verifica();           
            $this->load->view('admin/header');
			$this->load->view('admin/menu');
            $this->load->view('crud/organigrama', $data);
           
			$this->load->view('organigrama/footer_js');            
        } else {
            redirect(base_url());
        }
    }  

    public function do_uploads()
        {
                $config['upload_path']          = './public/assets/images/organigrama';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['overwrite']        = TRUE;
                $config['max_size']             = 100000000;
                $config['max_width']            = 100024;
                $config['max_height']           = 700068;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto_org'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        //$this->load->view('crud/organigrama', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        redirect(base_url() . 'organigrama/nuevo/');

                        //$this->load->view('crud/organigrama', $data);
                }
        }
    public function do_upload(){

        if ($this->session->userdata("login")) {

        $img=strtolower($this->input->post('unidad'));        

                $config['upload_path']          = './public/assets/images/organigrama';
                $config['file_name']        = $img;
                $config['allowed_types']        = 'png';
                $config['overwrite']        = TRUE;
                $config['max_size']             = 100000000;
                $config['max_width']            = 100024;
                $config['max_height']           = 700068;
                $sw = $this->input->post('opcion');

        if($sw==1){//opcion 1 insertar
            $id = $this->input->post('organigrama_id');
            $query = $this->db->query("SELECT * from tramite.organigrama WHERE organigrama_id='$id'");
            foreach ($query->result() as $row) {
                $unidad = $row->unidad;
                $nivel = $row->nivel;
                $hijo = $row->hijo;
            } 
            $nivel=$nivel+1;           
            $img=$img.'.png';
    
            $data = array(            
                'nivel' => $nivel, //input 
                'hijo' => $id, //input          
                'unidad' => ucwords(strtolower($this->input->post('unidad'))), //input        
                'url' => 'public/assets/images/organigrama', //input 
                'imagen' => $img, //input 
                'activo' => '1',           
            );
    
            $this->db->insert('tramite.organigrama', $data);

        }else{//opcion 2 modificar
            $id = $this->input->post('padre_id_e');
            $query = $this->db->query("SELECT * from tramite.organigrama WHERE organigrama_id=$id");
            foreach ($query->result() as $row) {
                $unidad = $row->unidad;
                $nivel = $row->nivel;
                $hijo = $row->hijo;
            } 
            $nivel=$nivel+1;
            $unidad_old=$this->input->post('unidad_old');
            $unidad_new=$this->input->post('unidad');            
            if($unidad_new!=$unidad_old){
                $img=strtolower($this->input->post('unidad_old'));
            }              
            $img = str_replace(" ", "_", $img);
            
            $img=$img.'.png';
    
                $data = array(                
                    'nivel' => $nivel, //input 
                    'hijo' => $id, //input          
                    'unidad' => ucwords($this->input->post('unidad')), //input
                    'imagen' => $img, //input                                                        
                );
                $organigrama_id=$this->input->post('organigrama_id_e');            
                $this->db->where('organigrama_id', $organigrama_id);
                $this->db->update('tramite.organigrama', $data);

        }    



        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto_org'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
               
        }
        redirect(base_url() . 'organigrama/nuevo/');
        }else {
            redirect(base_url());
        }   
    }


    public function update()
    {
        
        if ($this->session->userdata("login")) {
            $img=strtolower($this->input->post('unidad_e'));
            $config['upload_path']          = './public/assets/images/organigrama';
        $config['file_name']        =$img;
        $config['allowed_types']        = 'png';
        $config['overwrite']        = TRUE;
        $config['max_size']             = 100000000;
        $config['max_width']            = 100024;
        $config['max_height']           = 700068;

        $id = $this->input->post('padre_id_e');
        $query = $this->db->query("SELECT * from tramite.organigrama WHERE organigrama_id=$id");
        foreach ($query->result() as $row) {
            $unidad = $row->unidad;
            $nivel = $row->nivel;
            $hijo = $row->hijo;
        } 
        $nivel=$nivel+1;
        
        $img=$img.'.png';

            $data = array(                
                'nivel' => $nivel, //input 
                'hijo' => $id, //input          
                'unidad' => $this->input->post('unidad_e'), //input
                'imagen' => $img, //input                                                        
            );
            $organigrama_id=$this->input->post('organigrama_id_e');            
            $this->db->where('organigrama_id', $organigrama_id);
            $this->db->update('tramite.organigrama', $data);
            $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto_org'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                redirect(base_url() . 'organigrama/nuevo/');
        }
            

                    
           
        } else {
            redirect(base_url());
        }   
        
    }
    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from tramite.organigrama WHERE organigrama_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;

            $data = array(

                'activo' => $valor, //input                                 
            );
            $this->db->where('organigrama_id', $id);
            $this->db->update('tramite.organigrama', $data);          
            redirect(base_url() . 'organigrama/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function edit($id) {
        if ($this->session->userdata("login")) {
            $data['datos'] = $this->organigrama_model->get_datos($id);
            $data['data_grupo'] = $this->organigrama_model->get_grupo();
            $this->load->view('admin/header');
			$this->load->view('admin/menu');
            $this->load->view('crud/organigrama_edicion', $data);            
			$this->load->view('organigrama/footer_js');            
        } else {
            redirect(base_url());
        }
    }

    public function chart() {
        if ($this->session->userdata("login")) {
            $data['nivel'] = $this->organigrama_model->get_last_nivel();   
            $data['data_chart'] = $this->organigrama_model->get_datos_chart();
            $data['data_chart_nombre'] = $this->organigrama_model->get_datos_nombre_chart();
            $this->load->view('charts/header');
			$this->load->view('admin/menu');
            $this->load->view('charts/organigrama_chart', $data);
            $this->load->view('charts/footer');
                       			       
        } else {
            redirect(base_url());
        }
    }
}
