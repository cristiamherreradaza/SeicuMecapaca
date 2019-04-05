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
            //$this->load->view('predios/registra_js'); 
			$this->load->view('organigrama/footer_js');            
        } else {
            redirect(base_url());
        }
    }  
    public function create(){

        $id = $this->input->post('organigrama_id');
        $query = $this->db->query("SELECT * from tramite.organigrama WHERE organigrama_id='$id'");
        foreach ($query->result() as $row) {
            $unidad = $row->unidad;
            $nivel = $row->nivel;
            $hijo = $row->hijo;
        } 
        $nivel=$nivel+1;
        $img=strtolower($this->input->post('unidad'));
        $img=$img.'.png';

        $data = array(            
            'nivel' => $nivel, //input 
            'hijo' => $id, //input          
            'unidad' => $this->input->post('unidad'), //input        
            'url' => 'public/assets/documentos', //input 
            'imagen' => $img, //input 
            'activo' => '1',           
        );
        $this->db->insert('tramite.organigrama', $data);
        redirect(base_url() . 'organigrama/nuevo/');
    }
    public function update($id = null)
    {
        $id = $this->input->post('padre_id_e');
        $query = $this->db->query("SELECT * from tramite.organigrama WHERE organigrama_id='$id'");
        foreach ($query->result() as $row) {
            $unidad = $row->unidad;
            $nivel = $row->nivel;
            $hijo = $row->hijo;
        } 
        $nivel=$nivel+1;
        if ($this->session->userdata("login")) {
            $data = array(                
                'nivel' => $nivel, //input 
                'hijo' => $id, //input          
                'unidad' => $this->input->post('unidad_e'), //input                                                       
            );
            $organigrama_id=$this->input->post('organigrama_id_e');            
            $this->db->where('organigrama_id', $organigrama_id);
            $this->db->update('tramite.organigrama', $data); 


            redirect(base_url() . 'organigrama/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }
    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            //$query = $this->db->query("UPDATE tramite.tipo_documento SET activo = 0  WHERE tipo_documento_id='$id'");
            $data = array(

                'activo' => '0', //input                                 
            );
            $this->db->where('organigrama_id', $id);
            $this->db->update('tramite.organigrama', $data);          
            redirect(base_url() . 'organigrama/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    
}
