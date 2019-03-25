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
        if($this->session->userdata("login")){

            redirect(base_url()."Edificacion/nuevo");
		}
		else{
            redirect(base_url());
		}
		
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
    public function nuevo($cod_catastral = null ){   

    if($this->session->userdata("login"))
        {  
        //  
	    //$credencial_id = $this->session->userdata("persona_perfil_id");
	    //$acceso_inicio = date("Y-m-d H:i:s");

		//$ip = $this->logacceso_model->ip_publico();
        //$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);
        //$cod='123456789';
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
        $this->load->view('bloque/edificacionView',$data); 
        //$this->load->view('bloque/jtables');       
        $this->load->view('bloque/validar');
        $this->load->view('admin/wizard_js');
        //$this->load->view('admin/footer'); 
        }
        else{
            redirect(base_url());
        }
    }

    public function adicionar($cod_catastral = null){

        if($this->session->userdata("login"))
        {  
        
	    //$credencial_id = $this->session->userdata("persona_perfil_id");
	//$acceso_inicio = date("Y-m-d H:i:s");

		//$ip = $this->logacceso_model->ip_publico();
        //$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);
        //$cod='123456789';

        $cant_bloque = $this->db->query("SELECT count(nro_bloque) as total FROM catastro.bloque where activo=1 and codcatas='$cod_catastral'");
        foreach ($cant_bloque->result() as $nro)
            {
                $total_bloq = $nro->total;                    
            }
            $total_bloq=$total_bloq+1;
        $data['result_array'] = $this->Edificacion_model->getAllData();
        //$data['bloques'] = $this->Edificacion_model->get_Bloque($cod);
        $data['grupos_subgrupos'] = $this->Edificacion_model->get_grupos_subgrupos();
        $data['grupos'] = $this->Edificacion_model->get_grupos();
        $data['destino_bloque'] = $this->Edificacion_model->get_Destino_bloque(); 
        $data['destino_uso'] = $this->Edificacion_model->get_Uso_bloque();
        $data['tipo_planta'] = $this->Edificacion_model->get_tipo_planta();
        $data['cod_catastral'] = $cod_catastral;  
        $data['nro_bloque'] = $total_bloq;
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('bloque/bloque_nuevo',$data); 
        //$this->load->view('bloque/jtables');       
        $this->load->view('bloque/validar');
        $this->load->view('admin/wizard_js');
        //$this->load->view('admin/footer'); 

        }
        else{
            redirect(base_url());
        }
    }

    public function create() {
        //vdebug($this->input-post());
        //$this->Edificacion_model->createData();
        //comentario
        //vdebug($this->input->post());

        //captura de datos para la tabla bloque
        $data = array ( 
            
            'codcatas' =>$this->input->post('cod_catastral'),//input
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
       $codcatas =$this->input->post('cod_catastral');//input
       $query = $this->db->query("SELECT bloque_id FROM catastro.bloque WHERE codcatas='$codcatas' and nro_bloque='$nro_bloq'");
       foreach ($query->result() as $row)
           {
               $bloque_id_form = $row->bloque_id;                    
           }
       //captura de datos para la tabla bloque_piso

       /*$bloque_piso = array (
           'nro_bloque' =>$this->input->post('nro_bloque'),
           'nivel' => $this->input->post('nivel'),
           'tipo_planta_id' =>$this->input->post('tipo_planta_id'),  
           'superficie' => $this->input->post('superficie'),
           'bloque_id' =>$bloque_id_form,//id del bloque nro x                       
           'usu_creacion' =>1 //aun no captura el usuario 
       );
       $this->db->insert('catastro.bloque_piso', $bloque_piso);*/
            $cont = 0;
            $id_tipo_planta = $this->input->post('id_tipo_planta');
            $nivel_a = $this->input->post('niveles');
            $superficie_a = $this->input->post('superficies');
            for ($j = 0; $j < count($id_tipo_planta) ; $j++) {
                $bloque_piso = array(
                    'nro_bloque' => $this->input->post('nro_bloque'),
                    'nivel' => $nivel_a[$j],
                    'tipo_planta_id' => $id_tipo_planta[$j],
                    'superficie' => $superficie_a[$j],
                    'bloque_id' => $bloque_id_form, //id del bloque nro x                       
                    'usu_creacion' => 1 //aun no captura el usuario 
                );
                $this->db->insert('catastro.bloque_piso', $bloque_piso);               
            }


			/*while($cont < count($id_tipo_planta)){
                $bloque_piso = array(
                    'nro_bloque' => $this->input->post('nro_bloque'),
                    'nivel' => $nivel_a[$cont],
                    'tipo_planta_id' => $id_tipo_planta[$cont],
                    'superficie' => $superficie_a[$cont],
                    'bloque_id' => $bloque_id_form, //id del bloque nro x                       
                    'usu_creacion' => 1 //aun no captura el usuario 
                );
                $this->db->insert('catastro.bloque_piso', $bloque_piso);
                $cont=$cont++;
            }*/

       //fin de insertar datos en tabla bloque_piso

       //insercion en la tabla elementos_cons
       $tam=$this->input->post('tam_grup_sub');
       for ($i = 0; $i < $tam ; $i++) {
            $bloque_elem_cons = array (    
                'bloque_id' =>$bloque_id_form,//cargar de la BD
                'nro_bloque' =>$this->input->post('nro_bloque'),           
                'grupo_mat_id' => $this->input->post($i.'a'),  
                'mat_item_id'=> $this->input->post($i.'b'),      
                'cantidad' =>$this->input->post($i.'c'),                  
                'usu_creacion' =>1 //aun no captura el usuario      
            );
            $this->db->insert('catastro.bloque_elemento_cons', $bloque_elem_cons);
       }        
        // fin guardamos los servicios        
        redirect(base_url().'Edificacion/nuevo/'.$this->input->post('cod_catastral'));
        }

        public function next($cod_catastral = null ){
            $query = $this->db->query("UPDATE catastro.predio SET activo = 2 WHERE codcatas='$cod_catastral'");            
            redirect(base_url().'predios/nuevo/'.$$cod_catastral);
        }

    

    public function update(){
    }
    public function delete(){
    }
    



}
