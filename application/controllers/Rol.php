<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("rol_model");
	}

	public function rol(){
		// echo 'holas desde el controladora';
		// $crt = 'Holas';
		$lista['roles'] = $this->rol_model->index();
		
		//var_dump($lista);
		//foreach ($lista as $lis) {
            //print_r($lis->rol_id."<br>");
            //print_r($lis->rol."<br>");
            //print_r($lis->activo."<br>");
            //}
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/rol', $lista);
		$this->load->view('admin/footer');
		// $this->load->view('header');
		// $this->load->view('menu');
		// $this->load->view('contenido');
		// $this->load->view('footer');
		// $this->load->view('complementos');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Rol/rol");
		}
		else{
			$this->load->view('login/login');	
		}
		
	}

	/*
	public function prueba()
	{
		//var_dump('hola');
		$ejemplo = $this->db->query("select * from credencial")->result();
		foreach ($ejemplo as $eje) {
			print_r($eje->rol_id."<br>");
			print_r($eje->usuario."<br>");
			print_r($eje->contrasenia."<br>");
			print_r($eje->token."<br>");
		}
	}*/

	public function insertar()
	{
		$datos = $this->input->post();
		
		if(isset($datos))
		{

			$nombres = $datos['nombres'];
			$paterno = $datos['paterno'];
			$materno = $datos['materno'];
			$ci = $datos['ci'];
			$fec_nacimiento = $datos['fec_nacimiento'];
			$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento);
			redirect('login');

		}

	 }

	 public function editar()
	{
		$edirol = $this->uri->segment(3);

		$consulta = $this->rol_model->editar($edirol);
		//var_dump($consulta);
//		return $consulta;

			
  	/*    


      $dc = $this->ShowEmployeeModel->EditarC($c);
      $data['idempleado']= $c;
      $data['nombre'] = $dc->nombre;
      $data['ci'] = $dc->ci;
      $data['telefono'] = $dc->telefono;
      $data['direccion'] = $dc->direccion;
      $data['cargo'] = $dc->cargo;
      $data['num_referencia'] = $dc->num_referencia;
      $data['idsupervisor'] = $dc->idsupervisor;

      $data['supervisores']= $this -> ShowEmployeeModel->Listsupervisor();
      $this->load->view('HeaderView');
      $this->load->view('EditEmployeeView', $data);
      $this->load->view('FooterView');

      */

	 }

	  public function eliminar() {
      $c = $this->uri->segment(3);
      if ($c == NULL) {
        redirect('ShowEmployeeController');
      }
      $dc = $this->ShowEmployeeModel->EditarC($c);
      $data['idempleado']= $c;
      $data['nombre'] = $dc->nombre;
      $data['ci'] = $dc->ci;
      $data['telefono'] = $dc->telefono;
      $data['direccion'] = $dc->direccion;
      $data['cargo'] = $dc->cargo;
      $data['num_referencia'] = $dc->num_referencia;
      $data['idsupervisor'] = $dc->idsupervisor;

      $data['supervisores']= $this -> ShowEmployeeModel->Listsupervisor();
      $this->load->view('HeaderView');
      $this->load->view('EditEmployeeView', $data);
      $this->load->view('FooterView');

   }
}

