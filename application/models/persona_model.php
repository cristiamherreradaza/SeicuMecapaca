<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento)
	{	
		
		$array = array(
			'nombres' =>$nombres,
			'paterno' =>$paterno,
			'materno' =>$materno,
			'ci' =>$ci,
			'fec_nacimiento' =>$fec_nacimiento
			);
		$this->db->insert('persona', $array);
	}

	public function existeci($ci)
	{
		$this->db->where('ci',$ci);
		$reg = $this->db->get('persona');
      if($reg->num_rows()>0) {

          return false;
      }else{
				return true;
			}
	}

	public function consulta($ci)
	{
		$this->db->where('ci',$ci);
		$reg = $this->db->get('persona')->row();
		return $reg;
	}

	public function insertarDDRR($codcatas, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos)
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
			'fecha_reg_libro' => $fecha_reg_libro
			);
		$this->db->insert('catastro.predio_ddrr', $array);

		$ddrr_id = $this->db->query("select ddrr_id from catastro.predio_ddrr order by ddrr_id desc limit 1")->row();

		foreach ($this->cart->contents() as $items)
		{
			//$persona_id = $this->db->query("select persona_id from persona where ci like '$items['qty']'")->row();
			$array = array(
				'ddrr_id' => (int)$ddrr_id->ddrr_id,
				'porcen_parti' => $items['price'],
				'persona_id' => $items['id']
			);
			$this->db->insert('catastro.predio_titular', $array);
		}

		
	}

	public function buscaci( $ci ){
	    $con = $this->db->get_where('persona',
	    array('ci'=>$ci));
	    if ($con->num_rows() > 0)
	        return $con->row();
	    else
	    	return null;
	  }

	  public function actualizar($persona_id, $nombres, $paterno, $materno, $ci, $fec_nacimiento, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'nombres' => $nombres,
            'paterno' => $paterno,
            'materno' => $materno,
            'ci' => $ci,
            'fec_nacimiento' => $fec_nacimiento,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('persona_id', $persona_id);
        return $this->db->update('public.persona', $data);
    }
}