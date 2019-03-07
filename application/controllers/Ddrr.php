<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ddrr extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ddrr_model");
		$this->load->helper('form');
		$this->load->library('cart');
	}

	public function guardar()
	{
		$datos = $this->input->post();
		if(isset($datos))
		{
			$codcatas = 123456789;
			$nro_matricula_folio = $datos['nro_matricula_folio'];
			$nro_folio = $datos['nro_folio'];
			$fecha_folio = $datos['fecha_folio'];
			$superficie_legal = $datos['superficie_legal'];
			$nom_notario = $datos['nom_notario'];
			$nro_testimonio = $datos['nro_testimonio'];
			$fecha_testimonio = $datos['fecha_testimonio'];
			$partida = $datos['partida'];
			$partida_computarizada = $datos['partida_computarizada'];
			$foja = $datos['foja'];
			$libro = $datos['libro'];
			$fecha_reg_libro = $datos['fecha_reg_libro'];
			$porcen_parti = $datos['porcen_parti'];
			$ci = $datos['ci'];
			$datos= $this->cart->contents();
			$this->ddrr_model->insertarDDRR($codcatas, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos);
			$this->cart->destroy();
			redirect('predios/index');
		}
	}

	

   

}

