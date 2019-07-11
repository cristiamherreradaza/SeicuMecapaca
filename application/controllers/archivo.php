<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("zona_urbana_model");
		$this->load->model("rol_model");
	}

	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Archivo/archivo");
		}
		else{
			redirect(base_url());
        }	
		
	}

	public function archivo(){
		if($this->session->userdata("login")){
			// $lista['verifica'] = $this->rol_model->verifica();
			// $lista['zona_urbana'] = $this->zona_urbana_model->index();
			$lista['predios'] = $this->db->query("SELECT * FROM catastro.predio")->result();

			foreach ($lista['predios'] as $val) {
					$carpeta = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id;
					$documentos = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/DOCUMENTOS';
					$imagenes = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/IMAGENES';
					$planos = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/PLANOS';
					// var_dump($carpeta);
					if (!file_exists($carpeta)) {
			    		mkdir($carpeta, 0777, true);
			    		mkdir($documentos, 0777, true);
			    		mkdir($imagenes, 0777, true);
			    		mkdir($planos, 0777, true);
					}
					$nombre = $val->codcatas.'-'.$val->predio_id;
					$array = array(
						'nombre' =>$nombre,
						'descripcion1' =>'descripcion1',
						'descripcion2' =>'descripcion2',
						'predio_id' =>$val->predio_id,
						'activo' =>1
						);
					$this->db->insert('archivo.raiz', $array);

			}
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('archivo/gestion_archivo', $lista);
			$this->load->view('admin/footer');
				// }
				
		}
		else{
			redirect(base_url());
        }	
		
	}

	public function ingresar($predio_id)
	{
		if($this->session->userdata("login")){


			$res['predios'] = $this->db->query("SELECT *
									FROM catastro.predio
									WHERE predio_id = $predio_id
									")->result();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('archivo/dentro', $res);
			$this->load->view('admin/footer');
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

				$descripcion = $datos['descripcion'];
				$this->zona_urbana_model->insertar_zona($descripcion, $usu_creacion);
				redirect('Zona_urbana');

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

}

	