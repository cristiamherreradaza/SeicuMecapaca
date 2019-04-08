<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipo_documento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("tipo_documento_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Tipo_documento/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo($cod_catastral = null)
    {

        if ($this->session->userdata("login")) {
			$data['data_tdoc'] = $this->tipo_documento_model->get_data();
			$data['verifica'] = $this->rol_model->verifica();
            $this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/tipo_documento', $data);
			$this->load->view('admin/footer');            
        } else {
            redirect(base_url());
        }
    }  
    public function create(){       
        $data = array(

            'documento' => $this->input->post('documento'), //input        
            'activo' => '1',           
        );
        $this->db->insert('tramite.tipo_documento', $data);
        redirect(base_url() . 'tipo_documento/nuevo/');
    }
    public function update($id = null)
    {
        if ($this->session->userdata("login")) {
            $data = array(

                'documento' => $this->input->post('documento'), //input                                 
            );
            $id_tipo_doc=$this->input->post('tipo_documento_id_e');            
            $this->db->where('tipo_documento_id', $id_tipo_doc);
            $this->db->update('tramite.tipo_documento', $data); 


            redirect(base_url() . 'tipo_documento/nuevo/');           
           
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
            $this->db->where('tipo_documento_id', $id);
            $this->db->update('tramite.tipo_documento', $data);          
            redirect(base_url() . 'tipo_documento/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    
}
