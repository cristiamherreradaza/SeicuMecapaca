<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper("url");
		$this->load->model("persona_model");
		$this->load->helper('form');
		$this->load->library('cart');
	}

	/*
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view('login');	
		}
		
	}
*/

	public function insertar()
	{
		/*$carrito = $this->cart->total_items();
		$porcentajeR = 100 - $carrito;
		$porcen_parti = $this->input->post('porcen_parti');
		if($porcen_parti <= $porcentajeR){
			if($this->persona_model->existeci($this->input->post('ci')))
			{
				$id = $this->session->userdata("persona_perfil_id");
		        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
		        $usu_creacion = $resi->persona_id; 

				$nombres = $this->input->post('nombres');
				$paterno = $this->input->post('paterno');
				$materno = $this->input->post('materno');
				$ci = $this->input->post('ci');
				$fec_nacimiento = $this->input->post('fec_nacimiento');
				$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento, $usu_creacion);
			}
			$consulta = $this->persona_model->consulta($this->input->post('ci'));
			$dato = array(
				'id'      => $consulta->persona_id.'-0',
				'name'    => $consulta->nombres.' '.$consulta->paterno.' '.$consulta->materno,
				'qty'     => $porcen_parti,
				'price'   => $consulta->ci
			);
			$this->cart->insert($dato);
			$data = array('estado'=>'no');
			echo json_encode($data);
		}else{
			$data = array('estado'=>'si');
			echo json_encode($data);
		}*/

			$carrito = $this->cart->total_items();
		$porcentajeR = 100 - $carrito;
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_creacion = $resi->persona_id; 

		$nombres = $this->input->post('nombres');
		$paterno = $this->input->post('paterno');
		$materno = $this->input->post('materno');
		$ci = $this->input->post('ci');
		$fec_nacimiento = $this->input->post('fec_nacimiento');
		$porcen_parti = $this->input->post('porcen_parti');

		//$this->form_validation->set_rules('nombres', 'Nombres', 'required'); 
		$this->form_validation->set_rules('paterno', 'Apellido paterno', 'required');
		$this->form_validation->set_rules('materno', 'Apellido materno', 'required');
		$this->form_validation->set_rules('ci', 'Carnet de identidad', 'required');
		$this->form_validation->set_rules('fec_nacimiento', 'Fecha de nacimiento', 'required');
		$this->form_validation->set_rules('porcen_parti', 'Porcentaje de participación', 'required');
      	
      	$this->form_validation->set_message('required', '%s es obligatorio.');


      	//Verifica que el formulario esté validado.
      	if ($this->form_validation->run() == TRUE){
         	if($porcen_parti <= $porcentajeR){
				if($this->persona_model->existeci($ci))
				{
					$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento, $usu_creacion);
				}
				$consulta = $this->persona_model->consulta($ci);
				$dato = array(
					'id'      => $consulta->persona_id.'-0',
					'name'    => $consulta->nombres.' '.$consulta->paterno.' '.$consulta->materno,
					'qty'     => $porcen_parti,
					'price'   => $consulta->ci
				);
				$this->cart->insert($dato);
				$data = array('estado'=>'guardado');
				echo json_encode($data);
			}else{
				$data = array('estado'=>'sobrepasa', 'ci'=>$ci, 'nombres' => $nombres, 'paterno' => $paterno, 'materno' => $materno, 'fec_nacimiento'=>$fec_nacimiento, 'porcen_parti'=> $porcen_parti);
				echo json_encode($data);
	     	}
      	}else{
      		$data = array('estado'=>'incorrecto', 'ci'=>$ci, 'nombres' => $nombres, 'paterno' => $paterno, 'materno' => $materno, 'fec_nacimiento'=>$fec_nacimiento, 'porcen_parti'=> $porcen_parti);
				echo json_encode($data);
      	}


	}

	public function insertar_editar()
	{
		/*$carrito = $this->cart->total_items();
		$porcentajeR = 100 - $carrito;
		$porcen_parti = $this->input->post('porcen_parti');
		$ddrr_id = $this->input->post('ddrr_id');
		if($porcen_parti <= $porcentajeR){
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_creacion = $resi->persona_id;
			if($this->persona_model->existeci($this->input->post('ci')))
			{ 
				$nombres = $this->input->post('nombres');
				$paterno = $this->input->post('paterno');
				$materno = $this->input->post('materno');
				$ci = $this->input->post('ci');
				$fec_nacimiento = $this->input->post('fec_nacimiento');
				$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento, $usu_creacion);
			}
			$consulta = $this->persona_model->consulta($this->input->post('ci'));
			$dato = array(
				'id'      => $consulta->persona_id.'-0',
				'name'    => $consulta->nombres.' '.$consulta->paterno.' '.$consulta->materno,
				'qty'     => $porcen_parti,
				'price'   => $consulta->ci
			);
			$array = array(
				'ddrr_id' => $ddrr_id,
				'porcen_parti' => $porcen_parti,
				'persona_id' => $consulta->persona_id, 
				'usu_creacion' => $usu_creacion
			);
			$this->db->insert('catastro.predio_titular', $array);
			$this->cart->insert($dato);
			$data = array('estado'=>'no');
			echo json_encode($data);
			
		}else{
			$data = array('estado'=>'si');
			echo json_encode($data);
		}*/
			$carrito = $this->cart->total_items();
		$porcentajeR = 100 - $carrito;
		$ddrr_id = $this->input->post('ddrr_id');
			$id = $this->session->userdata("persona_perfil_id");
        	$resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_creacion = $resi->persona_id;
        $nombres = $this->input->post('nombres');
		$paterno = $this->input->post('paterno');
		$materno = $this->input->post('materno');
		$ci = $this->input->post('ci');
		$fec_nacimiento = $this->input->post('fec_nacimiento');
		$porcen_parti = $this->input->post('porcen_parti');

		$this->form_validation->set_rules('nombres', 'Nombres', 'required'); 
		$this->form_validation->set_rules('paterno', 'Apellido paterno', 'required');
		$this->form_validation->set_rules('materno', 'Apellido materno', 'required');
		$this->form_validation->set_rules('ci', 'Carnet de identidad', 'required');
		$this->form_validation->set_rules('fec_nacimiento', 'Fecha de nacimiento', 'required');
		$this->form_validation->set_rules('porcen_parti', 'Porcentaje de participación', 'required');

		if ($this->form_validation->run() == TRUE){
			if($porcen_parti <= $porcentajeR){
				if($this->persona_model->existeci($ci))
				{ 
					$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento, $usu_creacion);
				}
				$consulta = $this->persona_model->consulta($ci);
				$dato = array(
					'id'      => $consulta->persona_id.'-0',
					'name'    => $consulta->nombres.' '.$consulta->paterno.' '.$consulta->materno,
					'qty'     => $porcen_parti,
					'price'   => $consulta->ci
				);
				$array = array(
					'ddrr_id' => $ddrr_id,
					'porcen_parti' => $porcen_parti,
					'persona_id' => $consulta->persona_id, 
					'usu_creacion' => $usu_creacion
				);
				$this->db->insert('catastro.predio_titular', $array);
				$this->cart->insert($dato);
				$data = array('estado'=>'guardado');
				echo json_encode($data);
			}else{
				$data = array('estado'=>'sobrepasa', 'ci'=>$ci, 'nombres' => $nombres, 'paterno' => $paterno, 'materno' => $materno, 'fec_nacimiento'=>$fec_nacimiento, 'porcen_parti'=> $porcen_parti);
				echo json_encode($data);	
			}
		}else{
			$data = array('estado'=>'incorrecto', 'ci'=>$ci, 'nombres' => $nombres, 'paterno' => $paterno, 'materno' => $materno, 'fec_nacimiento'=>$fec_nacimiento, 'porcen_parti'=> $porcen_parti);
				echo json_encode($data);
		}
	}

   	public function remove($rowid, $cod_catastral)
   	{
		if ($rowid==="all")
		{
			$this->cart->destroy();
		}else{
			$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);
			$this->cart->update($data);
		}
		redirect("predios/nuevo/$cod_catastral");
	}

	public function remove_edicion($rowid, $id, $cod_catastral)
   	{
        list($persona_id,$titular_id) = explode("-",$id);
                                
   		$id1 = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id1))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s");
        //var_dump($id);
   		if ($rowid==="all")
		{
			$this->cart->destroy();
		}else{
			$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);
			$this->cart->update($data);
			$datos = array(
            'activo' => 0,
            'usu_eliminacion' => $usu_eliminacion,
            'fec_eliminacion' => $fec_eliminacion
        	);
			$this->db->where('titular_id', $titular_id);
        	$this->db->update('catastro.predio_titular', $datos);
		}
		redirect("predios/editar_propietario/$cod_catastral");
	}

	public function ajax_verifica(){
		$ci = $this->input->get("param1");
		// $this->db->where()
		//$this->db->where('ci', $ci);
		$verifica_cod = $this->persona_model->buscaci($ci);
		// print_r($ci);
		//  print_r($verifica_cod->result());die;
		// if (count($verifica_cod) > 0) {
		if ($verifica_cod) {
			$respuesta = array('ci'=>$ci, 'nombres' => $verifica_cod->nombres, 'paterno' => $verifica_cod->paterno, 'materno' => $verifica_cod->materno, 'fec_nacimiento'=>$verifica_cod->fecha, 'persona_id'=>$verifica_cod->persona_id, 'estado'=>'si');
			echo json_encode($respuesta);
		} else {
			$respuesta = array('ci'=>$ci, 'estado'=>'no');
			echo json_encode($respuesta);
		}		
	}

	 public function update()     
	{   
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s"); 

	    $persona_id = $this->input->post('persona_id');
	    $nombres = $this->input->post('nombres');
	    $paterno = $this->input->post('paterno');
	    $materno = $this->input->post('materno');
	    $ci = $this->input->post('ci');
	    $fec_nacimiento = $this->input->post('fec_nacimiento');
	   // var_dump($zonaurb_id);

	    $actualizar = $this->persona_model->actualizar($persona_id, $nombres, $paterno, $materno, $ci, $fec_nacimiento);
	  	redirect();
	}

}

