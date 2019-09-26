<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_tramite extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("tramite_model");
		$this->load->model("derivaciones_model");
		$this->load->model("rol_model");
        $this->load->helper('vayes_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library('pdf');
	}

	public function tipo_tramite(){
		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();


            $consulta = $this->db->query("SELECT organigrama_persona_id
                                            FROM tramite.organigrama_persona
                                            WHERE fec_baja is NULL
                                            AND persona_id = '$res->persona_id'
                                            ")->row();
		            if ($consulta) {
		            	$ids['idss'] = $consulta->organigrama_persona_id;
		            	$this->load->view('admin/header');
				        $this->load->view('admin/menu');
				        $this->load->view('tramites/tramite', $ids);
				        $this->load->view('admin/footer');
				        
		            }else
		            {
		            	redirect(base_url()."prueba/sin_permisos");
		            }
			
       		}
		else{
			redirect(base_url());
        }	
		
	}


	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."tipo_tramite/tipo_tramite");
		}
		else{
			redirect(base_url());
        }	
		
	}	

	 public function update()     
	{   
		if($this->session->userdata("login")){
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s"); 

		    $zonaurb_id = $this->input->post('zonaurb_id');
		    $descripcion = $this->input->post('descripcion');
		   // var_dump($zonaurb_id);

		    $actualizar = $this->zona_urbana_model->actualizar($zonaurb_id, $descripcion, $usu_modificacion, $fec_modificacion);
		  	redirect('Zona_urbana');
		}
		else{
			redirect(base_url());
        }	
	}
	

	public function eliminar()
	{
		if($this->session->userdata("login")){
		 	//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_eliminacion = $resi->persona_id;
	        $fec_eliminacion = date("Y-m-d H:i:s"); 

		    $u = $this->uri->segment(3);
		    $this->zona_urbana_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Zona_urbana');
		}
		else{
			redirect(base_url());
        }	

	}

	 
	public function listado()
	{
		// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
		$perfil_persona = $this->session->userdata('persona_perfil_id');
		$datos_persona_perfil = $this->db->get_where('persona_perfil', array('persona_perfil_id'=>$perfil_persona))->result_array();
		// vdebug($datos_persona_perfil, false, false, true);
		$datos_organigrama_persona = $this->db->get_where('tramite.organigrama_persona', 
		    array(
		        'persona_id'=>$datos_persona_perfil[0]['persona_id'],
		        'activo'=>1
		    ))->result_array();

		// vdebug($datos_organigrama_persona, false, false, true);
		$fuente = $datos_organigrama_persona[0]['organigrama_persona_id'];
		// vdebug($datos_organigrama_persona, true, false, true);
		$this->db->where('tramite.tramite.organigrama_persona_id', $fuente);
		$this->db->order_by('tramite.tramite.fec_creacion', 'DESC');
		$query = $this->db->get('tramite.tramite');
		// vdebug($query, false, false, true);

		$data['mis_tramites'] = $query->result();
		$data['verifica'] = $this->rol_model->verifica();
		//var_dump($usu_creacion);

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('tramites/listado', $data);
		$this->load->view('admin/footer');
		$this->load->view('predios/index_js');
	}


	public function do_upload()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			if(isset($datos))
			{
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

				$organigrama_persona_id = $datos['organigrama_persona_id'];
				$tipo_documento_id = $datos['tipo_documento_id'];
				$tipo_tramite_id = $datos['tipo_tramite_id'];
				$cite = $datos['cite'];
				$fecha = $datos['fecha'];
				$fojas = $datos['fojas'];
				$anexos = $datos['anexos'];
				$remitente = $datos['remitente'];
				$procedencia = $datos['procedencia'];
				$referencia = $datos['referencia'];
				$adjunto = $datos['cite_sin'];
				$correlativo = $datos['correlativo'];
				$gestion = $datos['gestion'];
				$this->tramite_model->insertar_tramite($organigrama_persona_id, $tipo_documento_id, $tipo_tramite_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion, $adjunto, $correlativo, $gestion);

				$tramite = $this->db->query("SELECT * FROM tramite.tramite WHERE cite = '$cite'")->row();
				$idTramite = $tramite->tramite_id;
				
				$config['upload_path']      = './public/assets/images/tramites';
				$config['file_name']        = $adjunto;
				$config['allowed_types']    = 'pdf';
				$config['overwrite']        = TRUE;
				$config['max_size']         = 2048;

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('adjunto'))
					{
						$error = array('error' => $this->upload->display_errors());
						redirect(base_url());
						//$this->load->view('crud/organigrama', $error);
					}
				else
					{
						$tipo_tramite = $this->db->query("SELECT tramite FROM tramite.tipo_tramite WHERE tipo_tramite_id = '$tipo_tramite_id'")->row();
						$data = array('upload_data' => $this->upload->data());
						if($tipo_tramite->tramite == 'Inspeccion'){
							redirect('Derivaciones/inspectores/'.$idTramite);
						}else{
							redirect('Derivaciones/nuevo/'.$idTramite);
						}
						
					}

				//$this->session->set_flashdata('in', $idTramite);
							
			}
			
		}
		else{
			redirect(base_url());
        }	

	}

	public function muestra_asignaciones(){
		if($this->session->userdata("login")){
		// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
			$id = $this->session->userdata("persona_perfil_id");
			$resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
			$dato = $resi->persona_id;
			$res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
			//$id_user=$resi[0]['persona_id'];
			//$data['lista'] = $this->inspecciones_model->get_lista(); 
			// $data['lista'] = $this->inspecciones_model->get_lista();  
			// $asignados = 
			$this->db->select('persona_id, COUNT(persona_id) as total');
			$this->db->where('activo',1);
			$this->db->group_by('persona_id'); 
			$this->db->order_by('total', 'desc'); 
			$data['asignados'] = $this->db->get('inspeccion.asignacion')->result();

			//vdebug($data['asignados'], true, false, true);
	
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('inspecciones/muestra_asignaciones', $data);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}
		else{
			redirect(base_url());
		}		
	}

	public function busqueda(){
		if($this->session->userdata("login")){
			$valores['cite']=NULL;
		 	$valores['fecha']=NULL;
		 	$valores['remitente']=NULL;
		 	$valores['encontrados']=NULL;
		    $this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('tramites/busqueda', $valores);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}
		else{
			redirect(base_url());
        }
	}

	public function encontrados(){
		if($this->session->userdata("login")){
		 	$cite = $this->input->post('cite');
		 	$fecha = $this->input->post('fecha');  
		 	$remitente = $this->input->post('remitente');
		 	
		 	if($cite != NULL){
		 		if($fecha != NULL){
		 			if($remitente != NULL){
		 				$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE cite like('%$cite%') AND DATE(fecha) = '$fecha' AND remitente like('%$remitente%')")->result();
		 			}else{
		 				$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE cite like('%$cite%') AND DATE(fecha) = '$fecha' ")->result();
		 			}
		 		}else{
		 			if($remitente != NULL){
		 				$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE cite like('%$cite%') AND remitente like('%$remitente%')")->result();
		 			}else{
		 				$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE cite like('%$cite%') ")->result();
		 			}
		 		}
		 	}else{
		 		if($fecha != NULL){
			 		if($remitente != NULL){
			 			$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE DATE(fecha) = '$fecha' AND remitente like('%$remitente%')")->result();
			 		}else{
			 			$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE  DATE(fecha) = '$fecha' ")->result();
			 		}
			 	}else{
			 		if($remitente != NULL){
			 			$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE remitente like('%$remitente%')")->result();
			 		}else{
			 			$encontrados= NULL;
			 		}
			 	}
			 }
		 	
		 	$valores['cite']=$cite;
		 	$valores['fecha']=$fecha;
		 	$valores['remitente']=$remitente;
		 	$valores['encontrados']=$encontrados;
		 	
		    $this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('tramites/busqueda', $valores);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}
		else{
			redirect(base_url());
        }
	}

	public function seguimiento($idTramite = null){
		$data['flujo'] = $this->db->get_where('tramite.derivacion', array('tramite_id'=>$idTramite))->result_array();

        //usuario que esta registrando
        $id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_creacion = $resi->persona_id;

        $data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('tramites/seguimiento', $data);
        $this->load->view('admin/footer');
        $this->load->view('predios/index_js');
	}

	public function proforma($id=null){
		if($this->session->userdata("login")){
			$valores['cite']=$id;
		 	$valores['fecha']=NULL;
		 	$valores['remitente']=NULL;
		 	$valores['encontrados']=NULL;
		    $this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('tramites/proforma', $valores);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}
		else{
			redirect(base_url());
        }
	}


	public function insertar()
	{
		if($this->session->userdata("login")){
			vdebug($this->input->post(), true, false, false, true);
			$datos = $this->input->post();
			if(isset($datos))
			{
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

				$cite = $datos['cite'];
				$fecha_proforma = $datos['fecha_proforma'];
				$propietario1 = $datos['propietario1'];
				$propietario2 = $datos['propietario2'];
				$ubicacion = $datos['ubicacion'];
				$lote = $datos['lote'];
				$superficie_total = $datos['superficie_total'];
				$manzano = $datos['manzano'];
				$urbanizacion = $datos['urbanizacion'];
				$jurisdicion = $datos['jurisdicion'];
				$seccion_municipal = $datos['seccion_municipal'];
				$provincia = $datos['provincia'];
				$departamento = $datos['departamento'];
				$codigo_catastral = $datos['codigo_catastral'];
				$fecha = $datos['fecha'];
				$matricula_folio_real = $datos['matricula_folio_real'];
				$valido_por = $datos['valido_por'];
				$uso_predio = $datos['uso_predio'];
				$tipo_tramite = $datos['tipo_tramite'];
				$a = $datos['a'];
				$ci = $datos['ci'];
				$metros_construidos = $datos['metros_construidos'];
				$linea_nivel = $datos['linea_nivel'];
				$autorizacion_cerco = $datos['autorizacion_cerco'];
				$aprobacion_plano = $datos['aprobacion_plano'];
				$visado_plano = $datos['visado_plano'];
				$fotocopia_plano = $datos['fotocopia_plano'];
				$resolucion = $datos['resolucion'];
				$certificacion = $datos['certificacion'];
				$aprobacion_contruccion = $datos['aprobacion_contruccion'];
				$total = $datos['total'];
				$this->tramite_model->insertar_proforma($cite, $fecha_proforma, $propietario1, $propietario2, $ubicacion, $lote, $superficie_total, $manzano, $urbanizacion, $jurisdicion, $seccion_municipal, $provincia, $departamento, $codigo_catastral, $fecha, $matricula_folio_real, $valido_por, $uso_predio, $tipo_tramite, $a, $ci, $metros_construidos, $linea_nivel, $autorizacion_cerco, $aprobacion_plano, $visado_plano, $fotocopia_plano, $resolucion, $certificacion, $aprobacion_contruccion, $total);
				redirect('tipo_tramite/consulta_proforma/'.$cite);

			}
		}
		else{
			redirect(base_url());
        }	

	 }

	 public function ajax_verifica(){
		$cite = $this->input->get("param1");
		var_dump('hola');
		// $this->db->where()
		//$this->db->where('ci', $ci);
		$verifica_cod = $this->tramite_model->buscaci($ci);
		var_dump($verifica_cod);
		// print_r($ci);
		//  print_r($verifica_cod->result());die;
		// if (count($verifica_cod) > 0) {
		if ($verifica_cod) {
			$respuesta = array('ci'=>$ci, 'nombres' => $verifica_cod->nombres, 'paterno' => $verifica_cod->paterno, 'materno' => $verifica_cod->materno, 'fec_nacimiento'=>$verifica_cod->fecha, 'persona_id'=>$verifica_cod->persona_id, 'direccion' =>$verifica_cod->direccion, 'email'=>$verifica_cod->email, 'telefono_fijo'=>$verifica_cod->telefono_fijo, 'telefono_celular'=>$verifica_cod->telefono_celular, 'estado'=>'si');
			echo json_encode($respuesta);
		}else{
			$TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhNzAzYTlhZjcxZDY0NDMzOWJiNDM3ODEyYjIwODY0MyJ9.KAXS_8G3BznwFBR0dLZHfVQc2LkZI5fiTK6TN-meAZ4';
			//configura la solicitud, también se puede usar CURLOPT_URL
			
			//echo "<br>--->".$paramnumero;
			//echo "<br>--->".$paramfecha;
			// antiguo URL
			$CURL = curl_init('https://ws.agetic.gob.bo/segip/v2/personas/'.$ci);
			// nuevo URL
			//$CURL = curl_init('https://ws.agetic.gob.bo/segip/v3/personas/'.$paramnumero.'?fechaNacimiento='.$paramfecha);
			// Devuelve los datos / resultados como una cadena en lugar de datos sin procesar
			curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
			// Una buena práctica para que la gente sepa quién está accediendo a sus servidores. Ver https://en.wikipedia.org/wiki/User_agent
			//curl_setopt($CURL, CURLOPT_USERAGENT, 'YourScript/0.1 (contact@email)');
			// Establezca sus encabezados de autenticación
			curl_setopt($CURL, CURLOPT_HTTPHEADER, array(
			    'Content-Type: application/json',
			    'Authorization: Bearer '.$TOKEN
			));
			
			// Obtener datos / resultados codificados Ver CURLOPT_RETURNTRANSFER
			$dataSEGIP = curl_exec($CURL);
			// Obtener información sobre la solicitud
			$infoSEGIP = curl_getinfo($CURL);
			// Cierre el recurso curl para liberar recursos del sistema
			curl_close($CURL);

			$arraySEGIPN0 = json_decode($dataSEGIP, true);
			$arraySEGIPN1 = $arraySEGIPN0['ConsultaDatoPersonaEnJsonResult'];
			$arraySEGIPN2 = $arraySEGIPN1['DatosPersonaEnFormatoJson'];
			$datos_persona = json_decode($arraySEGIPN2, true);
			$caso = $arraySEGIPN1['CodigoRespuesta'];
			if ($caso == 2) {
				$respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
				echo json_encode($respuesta);
			}else{
				$respuesta = array('ci'=>$ci, 'estado'=>'no');
				echo json_encode($respuesta);
			}
				
		}	
	}

	public function ver($cite){
		if($this->session->userdata("login")){
			
			$valorr = $cite;
			var_dump($valorr);
			// $valor = $this->db->query("SELECT *
			// 							FROM tramite.proforma
			// 							WHERE cite ='$cite'")->row();
			// echo json_encode($valor);

			// var_dump($cite);

		 // 	$valores['proforma']=$this->db->query("SELECT p.*, i.*
		 // 											FROM tramite.proforma p, tramite.informe_tecnico i
		 // 											WHERE p.cite = '$cite' 
		 // 											OR i.cite = '$cite'")->row();
		 // 	$valores['remitente']=NULL;
		 // 	$valores['encontrados']=NULL;
		 //    $this->load->view('admin/header');
			// $this->load->view('admin/menu');
			// $this->load->view('tramites/proforma', $valores);
			// $this->load->view('admin/footer');
			// $this->load->view('predios/index_js');
		}
		else{
			redirect(base_url());
        }
	}


	public function ajx(){

		$cite = $this->input->get("param1");

		$valor = $this->db->query("SELECT *
									FROM tramite.proforma
									WHERE cite ='$cite'")->row();
		if ($valor) {

			$respuesta = array('cite'=>$cite, 'fecha_proforma' => $valor->fecha_proforma, 'propietario1' => $valor->propietario1, 'propietario2' => $valor->propietario2, 'ubicacion'=>$valor->ubicacion, 'lote'=>$valor->lote, 'superficie_total' =>$valor->superficie_total, 'manzano'=>$valor->manzano, 'urbanizacion'=>$valor->urbanizacion, 'jurisdicion'=>$valor->jurisdicion, 'seccion_municipal'=>$valor->seccion_municipal, 'provincia'=>$valor->provincia, 'departamento'=>$valor->departamento, 'codigo_catastral'=>$valor->codigo_catastral, 'fecha'=>$valor->fecha, 'matricula_folio_real'=>$valor->matricula_folio_real, 'valido_por'=>$valor->valido_por, 'uso_predio'=>$valor->uso_predio, 'tipo_tramite'=>$valor->tipo_tramite, 'a'=>$valor->a,'ci'=>$valor->ci, 'metros_construidos'=>$valor->metros_construidos, 'linea_nivel'=>$valor->linea_nivel, 'autorizacion_cerco'=>$valor->autorizacion_cerco, 'aprobacion_plano'=>$valor->aprobacion_plano, 'visado_plano'=>$valor->visado_plano,  'fotocopia_plano'=>$valor->fotocopia_plano, 'resolucion'=>$valor->resolucion, 'certificacion'=>$valor->certificacion, 'aprobacion_contruccion'=>$valor->aprobacion_contruccion, 'total'=>$valor->total);

		echo json_encode($respuesta);
		}
		else
		{
			$valor1 = $this->db->query("SELECT *
											FROM tramite.informe_tecnico
											WHERE cite ='$cite'")->row();
			if ($valor1) {
				$respuesta = array('cite'=>$cite, 'fecha_proforma' => $valor1->fecha_informe, 'propietario1' => $valor1->solicitante, 'ubicacion' => $valor1->ubicacion, 'lote'=>$valor1->lote, 'superficie_total' =>$valor1->superficie_medicion, 'manzano'=>$valor1->manzana, 'urbanizacion'=>$valor1->urbanizacion, 'matricula_folio_real'=>$valor1->nro_folio, 'a'=>$valor1->solicitante, 'ci'=>$valor1->ci);

					echo json_encode($respuesta);
			}
			else{
				$respuesta = array();
				echo json_encode($respuesta);
			}
		}
		

	}

	public function consulta_proforma($id=null){

		if($this->input->post()){
			$datos = $this->input->post();	
			$cite = $datos['cite'];	
		}else{
			$cite=0;
		}
			
		
		
		if($id!=null){
			$cite = $id;
		}

		
		
		// var_dump($cite);

		$valores['proforma'] = $this->db->query("SELECT *
									FROM tramite.proforma
									WHERE cite ='$cite'")->row();
		if ($valores) {

			// var_dump($valores);
			$valores['cite'] = $cite;
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('tramites/proforma_prueba', $valores);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}
		else{

			$valor1['proforma1'] = $this->db->query("SELECT *
											FROM tramite.informe_tecnico
											WHERE cite ='$cite'")->row();
		}
	}

	public function ajax_verifica1(){
		$ci = $this->input->get("param1");
		// $this->db->where()
		//$this->db->where('ci', $ci);
		$respuesta = $this->db->query("SELECT requisito_id, descripcion FROM tramite.requisito WHERE tipo_tramite_id = '".$ci."'")->result();
		
		//var_dump($respuesta);
		
		// echo json_encode($respuesta);
		// $respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
		// echo json_encode($respuesta);
		
		// $respuesta = array('ci'=>$ci, 'estado'=>'no');
		echo json_encode($respuesta);
			
	}




	//**************************************INFORME TECNICO*****************************************************

	public function informe_tecnico(){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $datos['personas'] = $this->derivaciones_model->personal($resi->persona_id);
			$this->load->view('admin/header');
	        $this->load->view('admin/menu');
	        $this->load->view('tramites/informe_tecnico', $datos);
	        $this->load->view('admin/footer');
	        $this->load->view('predios/index_js');
		}
		else{
			redirect(base_url());
        }
	}

	public function guardar_informe(){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
            $consulta = $this->db->query("SELECT organigrama_persona_id FROM tramite.organigrama_persona WHERE fec_baja is NULL AND persona_id='$res->persona_id'")->row();
            $fec = date("Y-m-d"); 
            $array = array(
				'cite' => $this->input->post('cite'),
				'a' =>$this->input->post('a'),
				'via' => $this->input->post('via'),
				'de' => $consulta->organigrama_persona_id,
				'fecha_informe' => $fec,
				'solicitante' => $this->input->post('solicitante'),
				'ci' => $this->input->post('ci'),
				'tipo_tramite_id' => $this->input->post('tipo_tramite_id'),
				'ubicacion' =>$this->input->post('ubicacion'),
				'lote' =>$this->input->post('lote'),
				'urbanizacion' =>$this->input->post('urbanizacion'),
				'manzana' => $this->input->post('manzana'),
				'comunidad'=>$this->input->post('comunidad'),
				'superficie_testimonio'=>$this->input->post('superficie_testimonio'),
				'superficie_medicion'=>$this->input->post('superficie_medicion'),
				'nro_folio'=> $this->input->post('nro_folio'),
				'nro_testimonio'=> $this->input->post('nro_testimonio'),
				'notaria'=>$this->input->post('notaria'),
				'fecha_testimonio'=> $this->input->post('fecha_testimonio'),
				'notario'=> $this->input->post('notario'),
				'impuestos'=> $this->input->post('impuestos'),
				'observaciones'=>$this->input->post('observaciones'),
				'procesador'=>$this->input->post('procesador'),
				'nro_tramite'=>$this->input->post('nro_tramite'),
				'solicitante2'=>$this->input->post('solicitante2'),
				'ci2'=>$this->input->post('ci2'),
				'fecha_solicitud'=>$this->input->post('fecha_solicitud'),
				'glosa'=>$this->input->post('glosa'),
				'usu_creacion'=>$dato
			);
            $this->db->insert('tramite.informe_tecnico', $array);
			redirect('tipo_tramite/lista');
		}else{
			redirect(base_url());
        }
	}

	public function lista(){
		if($this->session->userdata("login")){
			$perfil_persona = $this->session->userdata('persona_perfil_id');
			$datos_persona_perfil = $this->db->get_where('persona_perfil', array('persona_perfil_id'=>$perfil_persona))->result_array();
			// vdebug($datos_persona_perfil, false, false, true);
			$datos_organigrama_persona = $this->db->get_where('tramite.organigrama_persona', 
			    array(
			        'persona_id'=>$datos_persona_perfil[0]['persona_id'],
			        'activo'=>1
			    ))->result_array();

			// vdebug($datos_organigrama_persona, false, false, true);
			$fuente = $datos_organigrama_persona[0]['organigrama_persona_id'];
			// vdebug($datos_organigrama_persona, true, false, true);
			$this->db->where('de', $fuente);
			$this->db->where('activo', 1);
			$this->db->order_by('fecha_informe', 'DESC');
			$query = $this->db->get('tramite.informe_tecnico');
			// vdebug($query, false, false, true);
			$data['mis_tramites'] = $query->result();
			//$data['verifica'] = $this->rol_model->verifica();
			//var_dump($usu_creacion);

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('tramites/lista_informes', $data);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}else{
			redirect(base_url());
        }
	}

	public function pdf_informe($idTramite = null){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
		    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
		    $usuario = $resi->persona_id;
		    $data['a'] = $this->db->query("SELECT ca.descripcion cargo, pe.nombres||' '|| pe.paterno||' '||pe.materno as nombre FROM tramite.informe_tecnico it JOIN tramite.organigrama_persona op ON op.organigrama_persona_id = it.a JOIN tramite.cargo ca ON op.cargo_id=ca.cargo_id JOIN persona pe ON op.persona_id= pe.persona_id 
				WHERE it.informe_tecnico_id = '$idTramite'")->row();
		    $data['via'] = $this->db->query("SELECT ca.descripcion cargo, (pe.nombres||' '||pe.paterno||' '||pe.materno) nombre FROM tramite.informe_tecnico it JOIN tramite.organigrama_persona op ON op.organigrama_persona_id = it.via JOIN tramite.cargo ca ON op.cargo_id=ca.cargo_id JOIN persona pe ON op.persona_id= pe.persona_id
				WHERE it.informe_tecnico_id = '$idTramite'")->row();
		    $data['de'] = $this->db->get_where('persona', array('persona_id' => $usuario))->row();
		    $tramite = $this->db->get_where('tramite.informe_tecnico', array('informe_tecnico_id' => $idTramite))->row();
		   	$data['cargo']=$this->db->query("SELECT ca.descripcion FROM tramite.organigrama_persona op JOIN tramite.cargo ca ON op.cargo_id=ca.cargo_id WHERE op.persona_id = '$usuario' AND op.activo=1")->row();
			$data['tramite'] = $tramite; 
			$data['procesador'] = $this->db->query("SELECT ca.descripcion cargo, (pe.nombres||' '||pe.paterno||' '||pe.materno) nombre FROM tramite.informe_tecnico it JOIN tramite.organigrama_persona op ON op.organigrama_persona_id = it.procesador JOIN tramite.cargo ca ON op.cargo_id=ca.cargo_id JOIN persona pe ON op.persona_id= pe.persona_id
				WHERE it.informe_tecnico_id = '$idTramite'")->row();
			$data['tipo_tramite']=$this->db->query("SELECT tt.tramite FROM tramite.informe_tecnico it JOIN tramite.tipo_tramite tt ON it.tipo_tramite_id=tt.tipo_tramite_id WHERE it.informe_tecnico_id='$idTramite'")->row();
			$dompdf = new Dompdf\Dompdf();

			$this->load->view('tramites/informe_tecnico_pdf', $data);
	        
	        // Get output html
	        $html = $this->output->get_output();
	        
	        // Load HTML content
	        $dompdf->loadHtml($html);
	        $dompdf->set_option('isRemoteEnabled', TRUE);
	        
	        // (Optional) Setup the paper size and orientation
	        $dompdf->setPaper('A4');
	        
	        // Render the HTML as PDF
	        $dompdf->render();
	        
	        // Output the generated PDF (1 = download and 0 = preview)
	        $dompdf->stream("Informe tecnico.pdf", array("Attachment"=>0));
		}
		else{
			redirect(base_url());
        }
	}

	public function editar($idTramite = null){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $datos['personas'] = $this->derivaciones_model->personal($resi->persona_id);
            $datos['tramites'] = $this->db->query("SELECT * FROM tramite.informe_tecnico WHERE informe_tecnico_id='$idTramite'")->row();
            $valor=(int)$datos['tramites']->a;
            $a=$this->db->query("SELECT persona_id FROM tramite.organigrama_persona WHERE organigrama_persona_id = '$valor'")->row();	          
            $datos['a']=$this->derivaciones_model->encontrado($a->persona_id);

            $valor=(int)$datos['tramites']->via;
            $via=$this->db->query("SELECT persona_id FROM tramite.organigrama_persona WHERE organigrama_persona_id = '$valor'")->row();
            $datos['via']=$this->derivaciones_model->encontrado($via->persona_id);
            $valor=(int)$datos['tramites']->procesador;
            $procesador=$this->db->query("SELECT persona_id FROM tramite.organigrama_persona WHERE organigrama_persona_id = '$valor'")->row();
            $datos['procesador']=$this->derivaciones_model->encontrado($procesador->persona_id);
			$this->load->view('admin/header');
	        $this->load->view('admin/menu');
	        $this->load->view('tramites/editar_informe', $datos);
	        $this->load->view('admin/footer');
	        $this->load->view('predios/index_js');
		}else{
			redirect(base_url());
        }
	}
	public function guardar_edicion(){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
            $consulta = $this->db->query("SELECT organigrama_persona_id FROM tramite.organigrama_persona WHERE fec_baja is NULL AND persona_id = '$res->persona_id'")->row();
            $informe =$this->input->post('informe_id'); 
            $array = array(
				'cite' => $this->input->post('cite'),
				'a' =>$this->input->post('a'),
				'via' => $this->input->post('via'),
				'nro_tramite' =>$this->input->post('nro_tramite'),
				'procesador'=>$this->input->post('procesador'),
				'fecha_solicitud'=>$this->input->post('fecha_solicitud'),
				'solicitante' => $this->input->post('solicitante'),
				'ci' => $this->input->post('ci'),
				'solicitante2' => $this->input->post('solicitante2'),
				'ci2' => $this->input->post('ci2'),
				'tipo_tramite_id' => $this->input->post('tipo_tramite_id'),
				'ubicacion' =>$this->input->post('ubicacion'),
				'lote' =>$this->input->post('lote'),
				'urbanizacion' =>$this->input->post('urbanizacion'),
				'manzana' => $this->input->post('manzana'),
				'comunidad'=>$this->input->post('comunidad'),
				'superficie_testimonio'=>$this->input->post('superficie_testimonio'),
				'superficie_medicion'=>$this->input->post('superficie_medicion'),
				'nro_folio'=> $this->input->post('nro_folio'),
				'nro_testimonio'=> $this->input->post('nro_testimonio'),
				'notaria'=>$this->input->post('notaria'),
				'fecha_testimonio'=> $this->input->post('fecha_testimonio'),
				'notario'=> $this->input->post('notario'),
				'impuestos'=> $this->input->post('impuestos'),
				'observaciones'=>$this->input->post('observaciones'),
				'glosa'=>$this->input->post('glosa'),
				'usu_modificacion' => $dato,
				'fec_modificacion' => date("Y-m-d H:i:s") 
			);
			$this->db->where('informe_tecnico_id', $informe);
        	$this->db->update('tramite.informe_tecnico', $array);
            //$this->db->insert('tramite.informe_tecnico', $array);
			redirect('tipo_tramite/lista');
		}else{
			redirect(base_url());
        }
	}

	public function eliminar_informe($idTramite = NULL){
		if($this->session->userdata("login")){
		 	//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_eliminacion = $resi->persona_id;
	        $fec_eliminacion = date("Y-m-d H:i:s"); 

		    $data = array(
	            'activo' => 0,
	            'usu_eliminacion' => $usu_eliminacion,
	            'fec_eliminacion' => $fec_eliminacion
	        );
	        $this->db->where('informe_tecnico_id', $idTramite);
	        $this->db->update('tramite.informe_tecnico', $data);
	        redirect('tipo_tramite/lista');
		}else{
			redirect(base_url());
        }	
	}

	public function nueva_proforma($informe_tecnico_id = null)
	{
		$informe = $this->db->get_where('tramite.informe_tecnico', array('informe_tecnico_id'=>$informe_tecnico_id))->row_array();
		$tramite = $this->db->get_where('tramite.tramite', array('tramite_id'=>$informe['tramite_id']))->row_array();
		$rubros = $this->db->get('tramite.rubros')->result_array();
		$data['informe']=$informe;
		$data['tramite']=$tramite;
		$data['rubros']=$rubros;

		// vdebug($tramite, true, false, true);
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('tramites/nueva_proforma', $data);
		$this->load->view('admin/footer');
		$this->load->view('predios/index_js');
		
	}

//***************************************FIN DE INFORME TECNICO***********************************************

}

	