<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificacion extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model("Edificacion_model");
        $this->load->library('session');
        $this->load->model('tipopredio_model');
        $this->load->model("logacceso_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
    }
	
	public function index()	
	{	

        $this->load->view('login'); 
	}

    public function nuevo(){
        if($this->session->userdata("login"))
		{
	    $credencial_id = $this->session->userdata("persona_perfil_id");
		$acceso_inicio = date("Y-m-d H:i:s");

		$ip = $this->logacceso_model->ip_publico();
		$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);

        $data['result_array'] = $this->Edificacion_model->getAllData();
        $data['destino_bloque'] = $this->Edificacion_model->get_Destino_bloque(); 
        $data['destino_uso'] = $this->Edificacion_model->get_Uso_bloque();
        $data['tipo_planta'] = $this->Edificacion_model->get_tipo_planta();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('bloque/EdificacionView',$data); 
        $this->load->view('bloque/jtables');       
        $this->load->view('bloque/validar');
        $this->load->view('admin/wizard_js');        

        }else{
			$this->load->view('login/login');	
		}

    }

    public function create() {
        //vdebug($this->input-post());
        //$this->Edificacion_model->createData();
        //comentario
        vdebug($this->input->post());

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
       //$this->db->insert('catastro.bloque', $data);   



        redirect("Edificacion/nuevo");
    }
    



}
