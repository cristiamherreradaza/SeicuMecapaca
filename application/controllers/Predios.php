<?php
class Predios extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('tipopredio_model');
        $this->load->model("logacceso_model");
        $this->load->model("persona_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
         $this->load->library('cart');
    }

    public function principal(){


		if($this->session->userdata("login"))
		{
			//insertar datos de la persona logueada en la tabla logacceso
		    $persona_perfil_id = $this->session->userdata("persona_perfil_id");
		    $usuario = $this->session->userdata("usuario");

		    $id = $this->db->query("SELECT * FROM credencial WHERE persona_perfil_id = '$persona_perfil_id' AND usuario = '$usuario'")->row();

			$credencial_id = $id->credencial_id;

			$acceso_inicio = date("Y-m-d H:i:s");

			$ip = $this->logacceso_model->ip_local();
			$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);

			//sacar el perfil de la persona logueada
			// 1 = ADMINISTRADOR  ///// 2 = OPERADOR  ///// 3 = USUARIO   ////// 4 = BENEFICIARIO
			$persona_perfil_id = $id->persona_perfil_id;
			$persona_perfil = $this->db->query("SELECT * FROM persona_perfil WHERE 
						persona_perfil_id = '$persona_perfil_id'")->row();
			$perfil = $persona_perfil->perfil_id; 
			
				if ($perfil == '1') {
					
					$this->load->view('admin/header');
					$this->load->view('admin/menu');
					$this->load->view('admin/index');
					$this->load->view('admin/footer');
				}
				elseif ($perfil == '2') {
					

					$this->load->view('admin/header');
					$this->load->view('admin/menu_operador');
					$this->load->view('admin/index');
					$this->load->view('admin/footer');
				}
				elseif ($perfil == '3') {
					$this->load->view('admin/header');
					$this->load->view('admin/menu_usuario');
					$this->load->view('admin/index');
					$this->load->view('admin/footer');
				}
				elseif ($perfil == '4') {
					$this->load->view('admin/header');
					$this->load->view('admin/menu_beneficiario');
					$this->load->view('admin/index');
					$this->load->view('admin/footer');
				}	
		}
		else{
			redirect(base_url());
		}
	}

	public function index(){


		if($this->session->userdata("login"))
		{
			//insertar datos de la persona logueada en la tabla logacceso
		    $persona_perfil_id = $this->session->userdata("persona_perfil_id");
		    $usuario = $this->session->userdata("usuario");

		    $id = $this->db->query("SELECT * FROM credencial WHERE persona_perfil_id = '$persona_perfil_id' AND usuario = '$usuario'")->row();

			$credencial_id = $id->credencial_id;

			$acceso_inicio = date("Y-m-d H:i:s");

			$ip = $this->logacceso_model->ip_local();
			$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);

			//sacar el perfil de la persona logueada
			// 1 = ADMINISTRADOR  ///// 2 = OPERADOR  ///// 3 = USUARIO   ////// 4 = BENEFICIARIO
			$persona_perfil_id = $id->persona_perfil_id;
			$persona_perfil = $this->db->query("SELECT * FROM persona_perfil WHERE 
						persona_perfil_id = '$persona_perfil_id'")->row();
			$perfil = $persona_perfil->perfil_id; 
			
				if ($perfil == '1') {
					// $this->db->select(array('catastro.predio.fec_creacion', 'catastro.predio.codcatas', 'catastro.predio.nro_inmueble', 'catastro.zona_urbana.descripcion'));
					// $this->db->join('catastro.zona_urbana', 'catastro.predio.zonaurb_id = catastro.zona_urbana.zonaurb_id');
					// $this->db->join('catastro.predio_foto', 'catastro.predio_foto.codcatas=catastro.predio.codcatas');
					$this->db->order_by('catastro.predio.fec_creacion', 'DESC');					
					$query = $this->db->get('catastro.predio');
					// vdebug($this->db->last_query());
					$data['listado_predios'] = $query->result();

					$this->load->view('admin/header');
					$this->load->view('admin/menu');
					$this->load->view('predios/index', $data);
					$this->load->view('admin/footer');
					$this->load->view('predios/index_js');
				}
				elseif ($perfil == '2') {
					$query = $this->db->get('catastro.predio');
					$data['listado_predios'] = $query->result();

					$this->load->view('admin/header');
					$this->load->view('admin/menu_operador');
					$this->load->view('predios/index', $data);
					$this->load->view('admin/footer');
					$this->load->view('predios/index_js');
				}
				elseif ($perfil == '3') {
					$this->load->view('admin/header');
					$this->load->view('admin/menu_usuario');
					
					$this->load->view('admin/footer');
					$this->load->view('predios/index_js');
				}
				elseif ($perfil == '4') {
					$this->load->view('admin/header');
					$this->load->view('admin/menu_beneficiario');
					
					$this->load->view('admin/footer');
					$this->load->view('predios/index_js');
				}	
		}
		else{
			redirect(base_url());
		}
	}

	public function registra_predio(){
		if($this->session->userdata("login")){

			if ($this->input->post()) {
				$datos = $this->input->post();
				// $data = array(
				// );
				vdebug($datos['data']['codigo_catastral']);

			}else{

				$this->db->select('tipo_predio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.tipo_predio');
				$data['dc_tipos_predio'] = $query->result();

				$this->db->select('zonaurb_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.zona_urbana');
				$data['dc_zona_urbana'] = $query->result();

				$this->db->select('via_id, codcatas');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.predio_via');
				$data['dc_predio_via'] = $query->result();

				$this->db->select('ubicacion_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.ubicacion');
				$data['dc_ubicacion'] = $query->result();

				$this->db->select('pendiente_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.pendiente');
				$data['dc_pendiente'] = $query->result();

				$this->db->select('nivel_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.nivel');
				$data['dc_nivel'] = $query->result();

				$this->db->select('forma_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.forma');
				$data['dc_forma'] = $query->result();

				$this->db->select('clase_predio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.clase_predio');
				$data['dc_clase_predio'] = $query->result();

				$this->db->select('uso_suelo_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.uso_suelo');
				$data['dc_uso_suelo'] = $query->result();

				$this->db->select('edificio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.edificio');
				$data['dc_edificio'] = $query->result();

				$this->db->select('servicio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.servicio');
				$data['listado_servicios'] = $query->result();


				// $data['dc'] = $this->tipopredio_model->listado_combo();
				// vdebug($this->tipopredio_model->hola());

				$data['hola'] = "Mi cuate es un Pillin";
				$con = $this->db->get('catastro.tipo_predio');
				// log_message('debug', print_r($con,TRUE));
				// vdebug($con);
				// $this->load->model('Tipopredio');
				// $tipos_predios = $this->db->query('SELECT * FROM catastro.tipo_predio');
				// $tp = $tipos_predios->result();
				// vdebug($tp);
				// die();
				// print_r($tipos_predios);die;
				// echo $tipos_predios; die;

				$this->load->view('admin/header');
				$this->load->view('admin/menu');
				// $this->load->view('predios/nuevo', $data);
				$this->load->view('predios/registra_predio', $data);
				$this->load->view('admin/footer');
				$this->load->view('predios/registra_js');
			}
		}
		else{
			redirect(base_url());
		}

	}

	public function guarda(){
		if($this->session->userdata("login")){

			$datos = array();
			$datos = $this->input->post();

			$this->db->select('foto_id', 'codcatas', 'foto_plano_ubi');
			$query = $this->db->get('catastro.predio_foto');
			$data['fotos'] = $query->result();

			$this->load->view('predios/guarda', $data);

			$latitud_longitud = $this->input->post('latitud').', '.$this->input->post('longitud');
			$data = array(
				'codcatas'=>$this->input->post('codigo_catastral'),
				'codcatas_anterior'=>$this->input->post('codigo_catastral_anterior'),
				'nro_inmueble'=>$this->input->post('nro_inmueble'),
				'distrito'=>$this->input->post('distrito'),
				'manzana'=>$this->input->post('manzana'),
				'predio'=>$this->input->post('predio'),
				'latlong'=>$latitud_longitud,
				'zona_econo'=>$this->input->post('zona_econo'),
				'via_id'=>1,
				'zonaurb_id'=>$this->input->post('zonaurb_id'),
				'nro_puerta'=>$this->input->post('nro_puerta'),
				'superficie_geo'=>$this->input->post('superficie_geo'),
				'superficie_campo'=>$this->input->post('superficie_campo'),
				'superficie_legal'=>$this->input->post('superficie_legal'),
				'ubicacion_id'=>$this->input->post('ubicacion_id'),
				'pendiente_id'=>$this->input->post('pendiente_id'),
				'nivel_id'=>$this->input->post('nivel_id'),
				'forma_id'=>$this->input->post('forma_id'),
				'frente'=>$this->input->post('frente'),
				'fondo'=>$this->input->post('fondo'),
				'tipo_predio_id'=>$this->input->post('tipo_predio_id'),
				'clase_predio_id'=>$this->input->post('clase_predio_id'),
				'uso_suelo_id'=>$this->input->post('uso_suelo_id'),
				'matriz_ph'=>$this->input->post('matriz_ph'),
				'edificio_id'=>$this->input->post('edificio_id'),
			);
			$this->db->insert('catastro.predio', $data);
			// fin guardamos datos del predio

			// guardamos las fotografias
			$foto_plano = $_FILES['foto_plano']['tmp_name'];
			$contenido_foto_plano = file_get_contents($foto_plano);
			$contenido_tranformado_plano = pg_escape_bytea($contenido_foto_plano);

			$foto_fachada = $_FILES['foto_fachada']['tmp_name'];
			$contenido_foto_fachada = file_get_contents($foto_fachada);
			$contenido_tranformado_fachada = pg_escape_bytea($contenido_foto_fachada);

			$data_foto = array(
				'codcatas'=>$this->input->post('codigo_catastral'),
				'foto_fachada'=>$contenido_tranformado_fachada,
				'foto_plano_ubi'=>$contenido_tranformado_plano,
				'activo'=>'1',
			);

			$this->db->insert('catastro.predio_foto', $data_foto);
			// fin guarda las fotografias

			// guardamos los servicios
			foreach ($this->input->post('servicios') as $key => $s) {
				$data_servicios = array(
					'servicio_id'=>$s,
					'codcatas'=>$this->input->post('codigo_catastral'),
					'activo'=>1
				);

				$this->db->insert('catastro.predio_servicios', $data_servicios);
			}
			// fin guardamos los servicios

			// guarda las observaciones
			$data_obs = array(
				'codcatas'=>$this->input->post('codigo_catastral'),
				'observacion'=>$this->input->post('observaciones'),
				'activo'=>1
			);
			$this->db->insert('catastro.predio_observac', $data_obs);
			redirect(base_url().'Edificacion/nuevo/'.$this->input->post('codigo_catastral'));
			// fin guarda las observaciones

			// vdebug($datos['data']['codigo_catastral']);
			// $this->db->insert('catastro.predio', $datos);

		}
		else{
			redirect(base_url());
		}
	}


	public function muestra_img(){
	if($this->session->userdata("login")){
		// $this->db->insert('catastro.predio_foto', $data_foto);
		// $this->db->select('foto_id', 'codcatas', 'foto_plano_ubi');

		$query = $this->db->get('catastro.predio_foto');
		$data['fotos'] = $query->result();

		$this->load->view('predios/muestra_img', $data);
		}
		else{
			redirect(base_url());
		}
	}

	public function nuevo($cod_catastral = null){
		if($this->session->userdata("login")){
		$data = $this->datos_combo();
		$data['cod_catastral']= $cod_catastral;
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('predios/nuevo', $data);
		$this->load->view('admin/footer');
		$this->load->view('admin/wizard_js');
		}
		else{
			redirect(base_url());
		}
	}


	public function certificado($cod_catastral = null){
		if($this->session->userdata("login")){
		
		// $data['predio']=$this->db->get_where('catastro.predio', array('codcatas'=>$cod_catastral))->result();
		$this->db->select('*');
		$this->db->from('catastro.predio');
		$this->db->where('catastro.predio.codcatas', $cod_catastral);
		$this->db->join('catastro.predio_foto', 'catastro.predio_foto.codcatas=catastro.predio.codcatas');
		$data['predio'] = $this->db->get()->result();
		// print_r($this->db->last_query());
		// vdebug($data);

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('predios/certificado', $data);
		$this->load->view('admin/footer');
		$this->load->view('predios/imprime_js');
		}
		else{
			redirect(base_url());
		}
	}

	public function ajax_verifica_cod_catastral(){
		if($this->session->userdata("login")){
			$cod_catastral = $this->input->get("param1");
			// $this->db->where()
			$this->db->where('codcatas', $cod_catastral);
			$verifica_cod = $this->db->get('catastro.predio');
			// print_r($cod_catastral);
			// print_r($verifica_cod->result());die;
			if ($verifica_cod->num_rows() > 0) {
				$respuesta = array('codigo'=>$cod_catastral, 'estado'=>'si');
				echo json_encode($respuesta);
			} else {
				$respuesta = array('codigo'=>$cod_catastral, 'estado'=>'no');
				echo json_encode($respuesta);
			}	
		}
		else{
			redirect(base_url());
		}	
	}

	public function editar($cod_catastral = null){
		
		if($this->session->userdata("login")){
			// vdebug($cod_catastral);
			$data = $this->datos_combo();
			$this->db->where('codcatas', $cod_catastral);
			$data['predio'] = $this->db->get('catastro.predio')->result();
			// vdebug($data);
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			// $this->load->view('predios/nuevo', $data);
			$this->load->view('predios/editar', $data);
			$this->load->view('admin/footer');
			$this->load->view('predios/registra_js');
		}
		else{
			redirect(base_url());
		}
	}


	private function datos_combo(){
		if($this->session->userdata("login")){
			$this->db->select('tipo_predio_id, descripcion');
			$this->db->order_by('descripcion', 'ASC');
			$query = $this->db->get('catastro.tipo_predio');
			// vdebug($this->db->last_query());
			$data['dc_tipos_predio'] = $query->result();

			$this->db->select('zonaurb_id, descripcion');
			$query = $this->db->get('catastro.zona_urbana');
			$data['dc_zona_urbana'] = $query->result();

			$this->db->select('via_id, codcatas');
			$query = $this->db->get('catastro.predio_via');
			$data['dc_predio_via'] = $query->result();

			$this->db->select('ubicacion_id, descripcion');
			$query = $this->db->get('catastro.ubicacion');
			$data['dc_ubicacion'] = $query->result();

			$this->db->select('pendiente_id, descripcion');
			$query = $this->db->get('catastro.pendiente');
			$data['dc_pendiente'] = $query->result();

			$this->db->select('nivel_id, descripcion');
			$query = $this->db->get('catastro.nivel');
			$data['dc_nivel'] = $query->result();

			$this->db->select('forma_id, descripcion');
			$query = $this->db->get('catastro.forma');
			$data['dc_forma'] = $query->result();

			$this->db->select('clase_predio_id, descripcion');
			$query = $this->db->get('catastro.clase_predio');
			$data['dc_clase_predio'] = $query->result();

			$this->db->select('uso_suelo_id, descripcion');
			$query = $this->db->get('catastro.uso_suelo');
			$data['dc_uso_suelo'] = $query->result();

			$this->db->select('edificio_id, descripcion');
			$query = $this->db->get('catastro.edificio');
			$data['dc_edificio'] = $query->result();

			$this->db->select('servicio_id, descripcion');
			$query = $this->db->get('catastro.servicio');
			$data['listado_servicios'] = $query->result();

			return $data;

		}
		else{
			redirect(base_url());
		}

	}

}