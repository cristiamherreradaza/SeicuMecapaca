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

	public function insertar_tramite($organigrama_persona_id, $tipo_documento_id, $tipo_tramite_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion, $adjunto, $correlativo, $gestion)
	{	
		$this->load->helper('vayes_helper');
		$array = array(
			'organigrama_persona_id' =>$organigrama_persona_id,
			'tipo_documento_id' =>$tipo_documento_id,
			'tipo_tramite_id' =>$tipo_tramite_id,
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
		if($tramite->tipo_tramite_id == 10){
			// $this->db->where('perfil_id', 5);
			// $inspectores = $this->db->get('persona_perfil')->result();
			// $array_inspectores = array();
			// foreach ($inspectores as $i) {
			// 	array_push($array_inspectores, $i->persona_id);
			// }
			// $azar = array_rand($array_inspectores, 1);
			// $elegido = $array_inspectores[$azar];
			/*	
			//consulta para escoger al inspector de acuerdo a la carga * antigua
			$this->db->select('persona_id, COUNT(persona_id) as total');
			$this->db->group_by('persona_id'); 
			$this->db->order_by('total', 'asc'); 
			$cantidad_asignaciones = $this->db->get('inspeccion.asignacion', 1)->result();
			//consulta para escoger al inspector de acuerdo a la carga * antigua*/

			// if($cantidad_asignaciones)
			// vdebug($cantidad_asignaciones, true, false, true);
			// $array_inspectores = array();
			// foreach ($cantidad_asignaciones as $ca) {
			// 	array_push($array_inspectores, $ca->total);
			// 	$minimo = min($array_inspectores);
			// }
			// $elegido = $this->get_where('')
			//vdebug($cantidad_asignaciones[0]->persona_id, true, false, true);

			//asignacion de inspecciones nueva usando las tablas asignacion y persona
			//asignacion usando el perfil de inspector		
			/*
			$contador_asignaciones = $this->db->query("SELECT k.*  FROM
			(SELECT j.persona_id,(CASE
			WHEN j.total IS NULL THEN 0
			ELSE j.total
			END) FROM 
			(SELECT d.*,b.total FROM 
			(SELECT p.persona_id FROM persona_perfil p
			LEFT JOIN
			perfil o
			on p.perfil_id=o.perfil_id
			WHERE o.perfil='Inspector' or o.perfil='inspector' and p.activo=1  and o.activo=1
			GROUP BY p.persona_id) as d
			LEFT JOIN
			(SELECT  A.persona_id,COUNT(A.persona_id) as total FROM inspeccion.asignacion A
			WHERE A.activo=1
			GROUP BY A.persona_id
			ORDER BY total ASC
			) as b
			on b.persona_id=d.persona_id
			ORDER BY b.total ASC) as j) as k
			ORDER BY k.total asc limit 1
			")->result();
						*/				
			//fin de la consulta para asignar inspector	


			//--------------
			//asignacion usando el cargo inspector y tambien la persona debera tener el perfil de inspector		
		
			$contador_asignaciones = $this->db->query("SELECT k.*  FROM
			(SELECT j.persona_id,(CASE
			WHEN j.total IS NULL THEN 0
			ELSE j.total
			END) FROM 
			(SELECT d.*,b.total FROM 

			(SELECT g.* FROM (SELECT persona_id FROM tramite.organigrama_persona WHERE cargo_id= (SELECT cargo_id FROM tramite.cargo WHERE descripcion in ('inspector','Inspector','INSPECTOR'))) AS g

				INNER JOIN
			(SELECT p.persona_id FROM persona_perfil p
			LEFT JOIN
			perfil o
			on p.perfil_id=o.perfil_id
			WHERE o.perfil='Inspector' or o.perfil='inspector' or o.perfil='INSPECTOR' and p.activo=1  and o.activo=1
			GROUP BY p.persona_id) as f
			on g.persona_id=f.persona_id			
			) as d
			LEFT JOIN
			(SELECT  A.persona_id,COUNT(A.persona_id) as total FROM inspeccion.asignacion A
			WHERE A.activo=1
			GROUP BY A.persona_id
			ORDER BY total ASC
			) as b
			on b.persona_id=d.persona_id
			ORDER BY b.total ASC			
			) as j) as k
			ORDER BY k.total asc limit 1
			")->result();
								
			//fin de la consulta para asignar inspector	





			
			$ditrict = $this->db->query("SELECT * FROM catastro.geo_distritos ORDER BY  random()  limit 1")->row();

			$dia_siguiente = date('Y-m-d', strtotime(' +1 day'));

			$data = array(
				'tramite_id'=>$id_tramite,
				'persona_id'=>$contador_asignaciones[0]->persona_id,
				'tipo_asignacion_id'=>1,
				'inicio'=>$dia_siguiente.' 08:30:00',
				'fin'=>$dia_siguiente.' 12:30:00',
				'activo'=>1,
				'distrito'=>$ditrict->distrito,
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

    public function insertar_proforma($cite, $fecha_proforma, $propietario1, $propietario2, $ubicacion, $lote, $superficie_total, $manzano, $urbanizacion, $jurisdicion, $seccion_municipal, $provincia, $departamento, $codigo_catastral, $fecha, $matricula_folio_real, $valido_por, $uso_predio, $tipo_tramite, $a, $ci, $metros_construidos,$total)
	{	
		$array = array(
			'cite' =>$cite,
			'fecha_proforma' =>$fecha_proforma,
			'propietario1' =>$propietario1,
			'propietario2' =>$propietario2,
			'ubicacion' =>$ubicacion,
			'lote' =>$lote,
			'superficie_total' =>$superficie_total,
			'manzano' =>$manzano,
			'urbanizacion' =>$urbanizacion,
			'jurisdicion' =>$jurisdicion,
			'seccion_municipal' =>$seccion_municipal,
			'provincia' =>$provincia,
			'departamento' =>$departamento,
			'codigo_catastral' =>$codigo_catastral,
			'fecha' =>$fecha,
			'matricula_folio_real' =>$matricula_folio_real,
			'valido_por' =>$valido_por,
			'uso_predio' =>$uso_predio,
			'tipo_tramite' =>$tipo_tramite,
			'a' =>$a,
			'ci' =>$ci,
			'metros_construidos' =>$metros_construidos,
			'total'=>$total
			);
		$this->db->insert('tramite.proforma', $array);
	}

	public function buscacite( $cite ){
		$con = $this->db->query("SELECT * FROM tramite.informe_tecnico WHERE cite = '$cite'");
	    if($con)
	        return $con->row();
	    else
	    	return null;
	 }

    
}
