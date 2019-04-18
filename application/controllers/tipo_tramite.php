<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_tramite extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("tramite_model");
		$this->load->model("rol_model");
        $this->load->helper('vayes_helper');
	}

	public function tipo_tramite(){
		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();

            $consulta = $this->db->query("SELECT organigrama_persona_id
                                            FROM tramite.organigrama_persona
                                            WHERE fec_baja is NULL
                                            AND persona_id = '$res->persona_id'
                                            ")->row();
		            if ($consulta) {
		            	 $ids['idss'] = $consulta->organigrama_persona_id;
		            	$this->load->view('admin/header');
				        $this->load->view('admin/menu');
				        $this->load->view('tramites/tramite', $ids);
				        $this->load->view('admin/footer');
				        
		            }else
		            {
		            	redirect(base_url()."prueba/sin_permisos");
		            }
			
       		}
		else{
			redirect(base_url());
        }	
		
	}


	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."tipo_tramite/tipo_tramite");
		}
		else{
			redirect(base_url());
        }	
		
	}

	public function insertar()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			
			if(isset($datos))
			{
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

				$organigrama_persona_id = $datos['organigrama_persona_id'];
				$tipo_documento_id = $datos['tipo_documento_id'];
				$tipo_correspondencia_id = $datos['tipo_correspondencia_id'];
				$cite = $datos['cite'];
				$fecha = $datos['fecha'];
				$fojas = $datos['fojas'];
				$anexos = $datos['anexos'];
				$remitente = $datos['remitente'];
				$procedencia = $datos['procedencia'];
				$referencia = $datos['referencia'];
				$this->tramite_model->insertar_tramite($organigrama_persona_id, $tipo_documento_id, $tipo_correspondencia_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion);

				$tramite = $this->db->query("SELECT *
												FROM tramite.tramite
												WHERE cite = '$cite'")->row();
				$idTramite = $tramite->tramite_id;
				//$this->session->set_flashdata('in', $idTramite);
				
				redirect('Derivaciones/nuevo/'.$idTramite);
			}
		}
		else{
			redirect(base_url());
        }	

	 }

	 public function update()     
	{   
		if($this->session->userdata("login")){
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s"); 

		    $zonaurb_id = $this->input->post('zonaurb_id');
		    $descripcion = $this->input->post('descripcion');
		   // var_dump($zonaurb_id);

		    $actualizar = $this->zona_urbana_model->actualizar($zonaurb_id, $descripcion, $usu_modificacion, $fec_modificacion);
		  	redirect('Zona_urbana');
		}
		else{
			redirect(base_url());
        }	
	}
	

	public function eliminar()
	{
		if($this->session->userdata("login")){
		 	//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_eliminacion = $resi->persona_id;
	        $fec_eliminacion = date("Y-m-d H:i:s"); 

		    $u = $this->uri->segment(3);
		    $this->zona_urbana_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Zona_urbana');
		}
		else{
			redirect(base_url());
        }	

	}

	   public function adaptar()
	{
		//$id = $this->db->get_where('persona', array('ci' => '9112739'))->row();
		//var_dump($id->nombres);
		$id = $this->db->query("SELECT * FROM persona WHERE ci = '9112739'")->result();
	}

	public function listado()
	{
		// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
		$perfil_persona = $this->session->userdata('persona_perfil_id');
		$datos_persona_perfil = $this->db->get_where('persona_perfil', array('persona_perfil_id'=>$perfil_persona))->result_array();
		// vdebug($datos_persona_perfil, false, false, true);
		$datos_organigrama_persona = $this->db->get_where(
		    'tramite.organigrama_persona', 
		    array(
		        'persona_id'=>$datos_persona_perfil[0]['persona_id'],
		        'activo'=>1
		    ))->result_array();

		// vdebug($datos_organigrama_persona, false, false, true);
		$fuente = $datos_organigrama_persona[0]['organigrama_persona_id'];
		// vdebug($datos_organigrama_persona, true, false, true);
		$this->db->where('tramite.tramite.organigrama_persona_id', $fuente);
		$this->db->order_by('tramite.tramite.fec_creacion', 'DESC');
		$query = $this->db->get('tramite.tramite');
		// vdebug($query, false, false, true);

		$data['mis_tramites'] = $query->result();
		$data['verifica'] = $this->rol_model->verifica();
		//var_dump($usu_creacion);

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('tramites/listado', $data);
		$this->load->view('admin/footer');
		$this->load->view('predios/index_js');
	}

}

	