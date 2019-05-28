<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tramite_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.zona_urbana WHERE activo = '1' ORDER BY zonaurb_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_tramite($organigrama_persona_id, $tipo_documento_id, $tipo_correspondencia_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion, $adjunto, $correlativo, $gestion)
	{	
		$this->load->helper('vayes_helper');
		$array = array(
			'organigrama_persona_id' =>$organigrama_persona_id,
			'tipo_documento_id' =>$tipo_documento_id,
			'tipo_correspondencia_id' =>$tipo_correspondencia_id,
			'cite' =>$cite,
			'fecha' =>$fecha,
			'fojas' =>$fojas,
			'anexos' =>$anexos,
			'remitente' =>$remitente,
			'procedencia' =>$procedencia,
			'referencia' =>$referencia,
			'usu_creacion' =>$usu_creacion,
			'adjunto' =>$adjunto
			);
		$this->db->insert('tramite.tramite', $array);
		
			$tramite_id = $this->db->query("SELECT *
	                                    FROM tramite.numero_tramite
	                                    WHERE gestion = '$gestion'
	                                    AND activo = '1'")->row();
			$numero_tramite_id = $tramite_id->numero_tramite_id;

			$data = array(
            'correlativo' => $correlativo
        );
		$id_tramite = $this->db->insert_id();
		$this->db->where('numero_tramite_id', $numero_tramite_id);
		$this->db->update('tramite.numero_tramite', $data);


		$tramite = $this->db->get_where('tramite.tramite', array('tramite_id'=>$id_tramite))->row();
		if($tramite->tipo_correspondencia_id == 14){
			// $this->db->where('perfil_id', 5);
			// $inspectores = $this->db->get('persona_perfil')->result();
			// $array_inspectores = array();
			// foreach ($inspectores as $i) {
			// 	array_push($array_inspectores, $i->persona_id);
			// }
			// $azar = array_rand($array_inspectores, 1);
			// $elegido = $array_inspectores[$azar];
			$this->db->select('persona_id, COUNT(persona_id) as total');
			$this->db->group_by('persona_id'); 
			$this->db->order_by('total', 'asc'); 
			$cantidad_asignaciones = $this->db->get('inspeccion.asignacion', 1)->result();
			// if($cantidad_asignaciones)
			// vdebug($cantidad_asignaciones, true, false, true);
			// $array_inspectores = array();
			// foreach ($cantidad_asignaciones as $ca) {
			// 	array_push($array_inspectores, $ca->total);
			// 	$minimo = min($array_inspectores);
			// }
			// $elegido = $this->get_where('')
			// vdebug($cantidad_asignaciones[0]->persona_id, true, false, true);

			$dia_siguiente = date('Y-m-d', strtotime(' +1 day'));

			$data = array(
				'tramite_id'=>$id_tramite,
				'persona_id'=>$cantidad_asignaciones[0]->persona_id,
				'tipo_asignacion_id'=>1,
				'inicio'=>$dia_siguiente.' 08:30:00',
				'fin'=>$dia_siguiente.' 12:30:00',
				'activo'=>1,
			);
			$this->db->insert('inspeccion.asignacion', $data);

		}
		
/*		vdebug($dia_siguiente, false, false, true);
		vdebug($array_inspectores, false, false, true);
		vdebug($elegido, true, false, true);
*/

	}

	public function login($usuario, $contrasenia)
	{
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', $contrasenia);
		
		$resultado = $this->db->get("credencial");

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}

	}


	public function eliminar($id, $usu_eliminacion, $fec_eliminacion)
	{
		$data = array(
            'activo' => 0,
            'usu_eliminacion' => $usu_eliminacion,
            'fec_eliminacion' => $fec_eliminacion
        );
        $this->db->where('zonaurb_id', $id);
        return $this->db->update('catastro.zona_urbana', $data);
    }

    public function actualizar($zonaurb_id, $descripcion, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'descripcion' => $descripcion,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('zonaurb_id', $zonaurb_id);
        return $this->db->update('catastro.zona_urbana', $data);
    }
}
