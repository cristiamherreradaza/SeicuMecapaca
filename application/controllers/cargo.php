<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cargo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("cargo_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Cargo/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo($cod_catastral = null)
    {

        if ($this->session->userdata("login")) {
			$data['data_cargo'] = $this->cargo_model->get_data();
			$data['verifica'] = $this->rol_model->verifica();
            $this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/cargo', $data);
			$this->load->view('admin/footer');            
        } else {
            redirect(base_url());
        }
    }  
    public function create(){       
        $data = array(

            'descripcion' => $this->input->post('descripcion'), //input        
            'activo' => '1',           
        );
        $this->db->insert('tramite.cargo', $data);
        redirect(base_url() . 'cargo/nuevo/');
    }
    public function update($id = null)
    {
        if ($this->session->userdata("login")) {
            $data = array(

                'descripcion' => $this->input->post('descripcion_e'), //input                                 
            );
            $id_cargo=$this->input->post('cargo_id');            
            $this->db->where('cargo_id', $id_cargo);
            $this->db->update('tramite.cargo', $data); 


            redirect(base_url() . 'cargo/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }
    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from tramite.cargo WHERE cargo_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;
            $data = array(

                'activo' => $valor, //input                                 
            );
            $this->db->where('cargo_id', $id);
            $this->db->update('tramite.cargo', $data);          
            redirect(base_url() . 'cargo/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    
}
