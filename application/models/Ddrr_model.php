<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ddrr_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertarDDRR($codcatas, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos, $usu_creacion)
	{
		$array = array(
			'codcatas' => $codcatas,
			'nro_matricula_folio' => $nro_matricula_folio,
			'nro_folio' => $nro_folio,
			'fecha_folio' => $fecha_folio,
			'superficie_legal' => $superficie_legal,
			'nom_notario' => $nom_notario,
			'nro_testimonio' => $nro_testimonio,
			'fecha_testimonio' => $fecha_testimonio,
			'partida' => $partida,
			'partida_computarizada' => $partida_computarizada,
			'foja' => $foja,
			'libro' => $libro,
			'fecha_reg_libro' => $fecha_reg_libro,
			'usu_creacion' => $usu_creacion
			);
		$this->db->insert('catastro.predio_ddrr', $array);
		$ddrr_id = $this->db->query("select ddrr_id from catastro.predio_ddrr order by ddrr_id desc limit 1")->row();
		foreach ($datos as $items)
		{
			list($persona_id,$titular_id) = explode("-",$items['id']);
			$array = array(
				'ddrr_id' => (int)$ddrr_id->ddrr_id,
				'porcen_parti' => $items['qty'],
				'persona_id' => $persona_id, 
				'usu_creacion' => $usu_creacion
			);
			$this->db->insert('catastro.predio_titular', $array);
		}
		$query = $this->db->query("UPDATE catastro.predio SET activo = 3 WHERE codcatas='$codcatas'");
	}

	public function carrito_ddrr($ddrr_id){
		// $this->db->select('p.*, pd.porcen_parti');
		// $this->db->from('catastro.predio_titular as pd');
		// $this->db->where('pd.ddrr_id', $ddrr_id);
		// $this->db->join(' persona as p', 'pd.persona_id = p.persona_id');
		// $carrito = $this->db->get()->result();
		$carrito = $this->db->query("SELECT p.*, pd.porcen_parti, pd.titular_id FROM catastro.predio_titular as pd INNER JOIN persona as p ON pd.persona_id = p.persona_id where pd.ddrr_id = '$ddrr_id' and pd.activo = 1")->result();
		return $carrito;
	}

	public function modificar_ddrr($ddrr_id, $codcatas, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos, $usu_modificacion, $fec_modificacion)
	{
		$array = array(
			'codcatas' => $codcatas,
			'nro_matricula_folio' => $nro_matricula_folio,
			'nro_folio' => $nro_folio,
			'fecha_folio' => $fecha_folio,
			'superficie_legal' => $superficie_legal,
			'nom_notario' => $nom_notario,
			'nro_testimonio' => $nro_testimonio,
			'fecha_testimonio' => $fecha_testimonio,
			'partida' => $partida,
			'partida_computarizada' => $partida_computarizada,
			'foja' => $foja,
			'libro' => $libro,
			'fecha_reg_libro' => $fecha_reg_libro,
			'usu_modificacion' => $usu_modificacion,
			'fec_modificacion' => $fec_modificacion
			);

		$this->db->where('ddrr_id', $ddrr_id);
        $this->db->update('catastro.predio_ddrr', $array);
        foreach ($datos as $items)
		{
			list($persona_id,$titular_id) = explode("-",$items['id']);
			$this->db->where('titular_id',$titular_id);
			$reg = $this->db->get('catastro.predio_titular');
		    if($reg->num_rows()<1) {
		        $array = array(
				'ddrr_id' => $ddrr_id,
				'porcen_parti' => $items['qty'],
				'persona_id' => $persona_id, 
				'usu_creacion' => $usu_modificacion
				);
				$this->db->insert('catastro.predio_titular', $array);
		    }
		}

	}
}