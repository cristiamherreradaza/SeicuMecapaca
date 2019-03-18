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
        $data['grupos'] = $this->Edificacion_model->get_grupos();
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

    
    public function adicionar(){
        
	    //$credencial_id = $this->session->userdata("persona_perfil_id");
	//$acceso_inicio = date("Y-m-d H:i:s");

		//$ip = $this->logacceso_model->ip_publico();
		//$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);
        $data['result_array'] = $this->Edificacion_model->getAllData();
        $data['bloques'] = $this->Edificacion_model->get_Bloque();
        $data['grupos_subgrupos'] = $this->Edificacion_model->get_grupos_subgrupos();
        $data['grupos'] = $this->Edificacion_model->get_grupos();
        $data['destino_bloque'] = $this->Edificacion_model->get_Destino_bloque(); 
        $data['destino_uso'] = $this->Edificacion_model->get_Uso_bloque();
        $data['tipo_planta'] = $this->Edificacion_model->get_tipo_planta();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('bloque/bloque_nuevo',$data); 
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

        //captura de datos para la tabla bloque
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
        );        
       $this->db->insert('catastro.bloque', $data); 
       //fin de insercion de datos en la tabla bloque

       //captura el bloque_id del nro de bloque guardado
       $nro_bloq=$this->input->post('nro_bloque');
       $query = $this->db->query("SELECT bloque_id FROM catastro.bloque WHERE codcatas='123456789' and nro_bloque='$nro_bloq'");
       foreach ($query->result() as $row)
           {
               $bloque_id_form = $row->bloque_id;                    
           }
       //captura de datos para la tabla bloque_piso   
       $bloque_piso = array (
           'nro_bloque' =>$this->input->post('nro_bloque'),
           'nivel' => $this->input->post('nivel'),
           'tipo_planta_id' =>$this->input->post('tipo_planta_id'),  
           'superficie' => $this->input->post('superficie'),
           'bloque_id' =>$bloque_id_form,//cargar de la BD                         
           'usu_creacion' =>1 //aun no captura el usuario 
       );
       $this->db->insert('catastro.bloque_piso', $bloque_piso);
       //fin de insertar datos en tabla bloque_piso


       
       

       foreach ($this->input->post('grupos') as $key) {
        $data_grupos = array(
            'servicio_id'=>$s,
            'codcatas'=>$this->input->post('codigo_catastral'),
            'activo'=>1
        );

        $this->db->insert('catastro.bloque_elemento_cons', $data_grupos);
        }
        // fin guardamos los servicios

        $bloque_cons = array (    
            'bloque_id' =>$this->input->post('bloque_id'),//cargar de la BD
            'nro_bloque' =>$this->input->post('nro_bloque'),           
            'grupo_mat_id' => $this->input->post('grupo_mat_id'),  
            'mat_item_id'=> $this->input->post('mat_item_id'),      
            'cantidad' =>$this->input->post('cantidad'),                  
            'usu_creacion' =>1 //aun no captura el usuario      
        ); 
        //redirect(base_url().'Predios/nuevo');
        redirect(base_url().'Edificacion/nuevo');
        }

    public function propietario(){
         redirect(base_url().'Predios/nuevo');

    }
    public function update(){

    }
    



}
