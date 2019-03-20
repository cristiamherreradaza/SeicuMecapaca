<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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

		$datos = $this->input->post();
		//$cod_catastral= $datos['cod_catastral'];
		//$cod_catastral = $this->input->post("cod_catastral");
		if($this->persona_model->existeci($datos['ci']))
		{
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_creacion = $resi->persona_id; 

			$nombres = $datos['nombres'];
			$paterno = $datos['paterno'];
			$materno = $datos['materno'];
			$ci = $datos['ci'];
			$fec_nacimiento = $datos['fec_nacimiento'];
			$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento, $usu_creacion);
		}

		$consulta = $this->persona_model->consulta($datos['ci']);

		$dato = array(
			'id'      => $consulta->persona_id,
			'name'    => $consulta->nombres.' '.$consulta->paterno.' '.$consulta->materno,
			'qty'     => $datos['porcen_parti'],
			'price'   => $consulta->ci
	//                'options' => array('Size' => 'L',
	//                                   'Color' => 'Red')
		);
		$this->cart->insert($dato);
		
		
		/*$datos = $this->input->post();

		if(isset($datos))
		{
			$nombres = $datos['nombres'];
			$paterno = $datos['paterno'];
			$materno = $datos['materno'];
			$ci = $datos['ci'];
			$fec_nacimiento = $datos['fec_nacimiento'];
			$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento);
			redirect('predios/nuevo');
		}*/
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

