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
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_creacion = $resi->persona_id;

		$codcatas = $this->input->post('cod_catastral');
		$nro_matricula_folio = $this->input->post('nro_matricula_folio');
		$nro_folio = $this->input->post('nro_folio');
		$fecha_folio = $this->input->post('fecha_folio');
		$superficie_legal = $this->input->post('superficie_legal');
		$nom_notario = $this->input->post('nom_notario');
		$nro_testimonio = $this->input->post('nro_testimonio');
		$fecha_testimonio = $this->input->post('fecha_testimonio');
		$partida = $this->input->post('partida');
		$partida_computarizada = $this->input->post('partida_computarizada');
		$foja = $this->input->post('foja');
		$libro = $this->input->post('libro');
		$fecha_reg_libro = $this->input->post('fecha_reg_libro');
		
		
		$datos= $this->cart->contents();
		$this->ddrr_model->insertarDDRR($codcatas, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos, $usu_creacion);
		$this->cart->destroy();
		redirect('predios/index');
		
	}

	
	public function modificar()
	{
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s");

		$ddrr_id = $this->input->post('ddrr_id');
		$codcatas = $this->input->post('cod_catastral');
		$nro_matricula_folio = $this->input->post('nro_matricula_folio');
		$nro_folio = $this->input->post('nro_folio');
		$fecha_folio = $this->input->post('fecha_folio');
		$superficie_legal = $this->input->post('superficie_legal');
		$nom_notario = $this->input->post('nom_notario');
		$nro_testimonio = $this->input->post('nro_testimonio');
		$fecha_testimonio = $this->input->post('fecha_testimonio');
		$partida = $this->input->post('partida');
		$partida_computarizada = $this->input->post('partida_computarizada');
		$foja = $this->input->post('foja');
		$libro = $this->input->post('libro');
		$fecha_reg_libro = $this->input->post('fecha_reg_libro');
		
		$datos= $this->cart->contents();
		$this->Ddrr_model->modificar_ddrr($ddrr_id, $codcatas, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos, $usu_modificacion, $fec_modificacion);
		$this->cart->destroy();
		redirect('predios/index');
		
	}
   

}

