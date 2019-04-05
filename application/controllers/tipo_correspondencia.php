<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipo_correspondencia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tipo_correspondencia_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");

    }
    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Tipo_correspondencia/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo($cod_catastral = null)
    {

        if ($this->session->userdata("login")) {
            
			$data['data_tcorr'] = $this->tipo_correspondencia_model->get_data();
			$data['verifica'] = $this->rol_model->verifica();
            $this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/tipo_correspondencia', $data);
			$this->load->view('admin/footer');            
        } else {
            redirect(base_url());
        }
    }  
    public function create(){       
        $data = array(

            'correspondencia' => $this->input->post('correspondencia'), //input        
            'activo' => '1',           
        );
        $this->db->insert('tramite.tipo_correspondencia', $data);
        redirect(base_url() . 'tipo_correspondencia/nuevo/');
    }
    public function update($id = null)
    {
        if ($this->session->userdata("login")) {
            $data = array(

                'correspondencia' => $this->input->post('correspondencia_e'), //input                                 
            );
            $id_tipo_corr=$this->input->post('tipo_correspondencia_e');            
            $this->db->where('tipo_correspondencia_id', $id_tipo_corr);
            $this->db->update('tramite.tipo_correspondencia', $data); 
            redirect(base_url() . 'tipo_correspondencia/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }
    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            //$query = $this->db->query("UPDATE tramite.tipo_correspondencia SET activo = 0  WHERE tipo_correspondencia_id='$id'"); 
            $data = array(
                'activo' => '0', //input                                 
            );
            $this->db->where('tipo_correspondencia_id', $id);
            $this->db->update('tramite.tipo_correspondencia', $data); 
            

            redirect(base_url() . 'tipo_correspondencia/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    
}
