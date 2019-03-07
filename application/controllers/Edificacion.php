<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificacion extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model("Edificacion_model");
        $this->load->library('session');
        $this->load->model('tipopredio_model');
        //$this->load->model("logacceso_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
    }
	
	public function index()	
	{	
        /*if($this->session->userdata("login"))
		{
            $credencial_id = $this->session->userdata("persona_perfil_id");
            $acceso_inicio = date("Y-m-d H:i:s");
            $this->load->view('login'); 
        }else{
			$this->load->view('login/login');	
		}*/
	}
/*
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

    }*/

    public function nuevo(){
        
	    //$credencial_id = $this->session->userdata("persona_perfil_id");
	//$acceso_inicio = date("Y-m-d H:i:s");

		//$ip = $this->logacceso_model->ip_publico();
		//$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);
        $data['result_array'] = $this->Edificacion_model->getAllData();
        $data['bloques'] = $this->Edificacion_model->get_Bloque();
        $data['grupos_subgrupos'] = $this->Edificacion_model->get_grupos_subgrupos();
        $data['destino_bloque'] = $this->Edificacion_model->get_Destino_bloque(); 
        $data['destino_uso'] = $this->Edificacion_model->get_Uso_bloque();
        $data['tipo_planta'] = $this->Edificacion_model->get_tipo_planta();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('bloque/edificacionView',$data); 
        //$this->load->view('bloque/jtables');       
        $this->load->view('bloque/validar');
        $this->load->view('admin/wizard_js');
        //$this->load->view('admin/footer'); 
    }

    public function create() {
        //vdebug($this->input-post());
        //$this->Edificacion_model->createData();
        //comentario
        //vdebug($this->input->post());

        $data = array ( 
            
            'codcatas' =>'123456789',//input
            'nro_bloque' =>$this->input->post('nro_bloque'),//crear
            'nom_bloque' =>$this->input->post('nom_bloque'),
            'estado_fisico' => $this->input->post('estado_fisico'),
            'altura'=> $this->input->post('altura'),
            'anio_cons' =>$this->input->post('anio_cons'),
            'anio_remo' =>$this->input->post('anio_remo'),
            'porcentaje_remo' =>'100',//validar
            'destino_bloque_id' =>$this->input->post('destino_bloque_id'),
            'uso_bloque_id' =>$this->input->post('uso_bloque_id'),
            'activo'=>'1',
            'tipolo_id' =>'12',//no existe en la db 
            'usu_creacion' =>1 //aun no captura el usuario 
            
            //'nivel' => $this->input->post('nivel'),//tabla bloque_piso

            //'codcatas' =>$this->input->post('codcatas'),  
        );
        /*$data = array ( 
            'codcatas' =>'123456789',//input
            'nro_bloque' =>$this->input->post('nro_bloque'),//crear
            'nom_bloque' =>$this->input->post('nom_bloque'),
            //'nro_bloque' =>2,//crear
            //'nom_bloque' =>'bloque B',
            'estado_fisico' =>'bueno',
            'altura'=> 100,
            'anio_cons' =>1920,
            'anio_remo' =>1950,
            'porcentaje_remo' =>'100',//validar
            'destino_bloque_id' =>1,
            'uso_bloque_id' =>1,
            'activo'=>1,
            'tipolo_id' =>'12',//no existe en la db            
            'usu_creacion' =>1 //aun no captura el usuario 
            
            //'nivel' => $this->input->post('nivel'),//tabla bloque_piso
           
            
           
           

            //'codcatas' =>$this->input->post('codcatas'),
            
            
              
            
        );*/
       $this->db->insert('catastro.bloque', $data); 
       
       $nro_bloq=$this->input->post('nro_bloque');

       $query = $this->db->query("SELECT bloque_id FROM catastro.bloque WHERE codcatas='123456789' and nro_bloque='$nro_bloq'");
       foreach ($query->result() as $row)
           {
               $bloque_id_form = $row->bloque_id;                    
           }
       //tabla bloque_piso   
       $bloque_piso = array (
           'nro_bloque' =>$this->input->post('nro_bloque'),
           'nivel' => $this->input->post('nivel'),
           'tipo_planta_id' =>$this->input->post('tipo_planta_id'),  
           'superficie' => $this->input->post('superficie'),
           'bloque_id' =>$bloque_id_form,//cargar de la BD                         
           'usu_creacion' =>1 //aun no captura el usuario 
       );
       $this->db->insert('catastro.bloque_piso', $bloque_piso); 
       //redirect(base_url().'Predios/nuevo');
       redirect(base_url().'Edificacion/nuevo');
    }

    public function edit(){

    }
    public function update(){

    }
    



}
