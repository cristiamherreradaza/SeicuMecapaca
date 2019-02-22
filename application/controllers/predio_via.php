<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zona_urbana extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("zona_urbana_model");
	}

	public function zona_urbana(){
		// echo 'holas desde el controladora';
		// $crt = 'Holas';
		$lista['zona_urbana'] = $this->zona_urbana_model->index();
		
		//var_dump($lista);
		//foreach ($lista as $lis) {
            //print_r($lis->rol_id."<br>");
            //print_r($lis->rol."<br>");
            //print_r($lis->activo."<br>");
            //}
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/zona_urbana', $lista);
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
			redirect(base_url()."Zona_urbana/zona_urbana");
		}
		else{
			$this->load->view('login');	
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

			$descripcion = $datos['descripcion'];
			$activo = $datos['activo'];
			$this->zona_urbana_model->insertar_zona($descripcion, $activo);
			redirect('Zona_urbana');

		}

	 }

	 public function eliminar(){
	    $u = $this->uri->segment(3);
	    $this->zona_urbana_model->eliminar($u);
	    redirect('Zona_urbana');
	   }

	 public function editar()
	{
		$edirol = $this->uri->segment(3);
		var_dump($edirol);

		//$consulta = $this->rol_model->editar($edirol);
		//var_dump($consulta);
//		return $consulta;

	}

			
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
    */

   	  
   	  
}

