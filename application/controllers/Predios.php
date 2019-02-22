<?php
class Predios extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('tipopredio_model');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
    }

	public function index(){
		// echo 'holas desde el controladora';
		// $crt = 'Holas';
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/contenidos');
		$this->load->view('admin/footer');
		// $this->load->view('header');
		// $this->load->view('menu');
		// $this->load->view('contenido');
		// $this->load->view('footer');
		// $this->load->view('complementos');
	}

	public function registra_predio(){

		if ($this->input->post()) {
			$datos = $this->input->post();
			// $data = array(
			// );
			vdebug($datos['data']['codigo_catastral']);
				
		}else{

			$this->db->select('tipo_predio_id, descripcion');
			$query = $this->db->get('catastro.tipo_predio');
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
			$this->load->view('admin/predios_js');
		}
		
	}

	public function guarda(){

		$datos = array();
		$datos = $this->input->post('data');
		$latitud_longitud = $this->input->post('latitud').' '.$this->input->post('longitud');
		$data = array(
			'codcatas'=>$this->input->post('codigo_catastral'),
			'codcatas_anterior'=>$this->input->post('codigo_catastral_anterior'),
			'nro_inmueble'=>$this->input->post('nro_inmueble'),
			'distrito'=>$this->input->post('distrito'),
			'manzana'=>$this->input->post('manzana'),
			'predio'=>$this->input->post('predio'),
			'latlong'=>$this->input->post('latitud_longitud'),
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
		// vdebug($datos['data']['codigo_catastral']);
		// $this->db->insert('catastro.predio', $datos);
	}


	public function nuevo(){

		$this->db->select('tipo_predio_id, descripcion');
		$query = $this->db->get('catastro.tipo_predio');
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

		// $this->db->select('via_id, descripcion');
		// $query = $this->db->get('catastro.servicio');
		// $data['listado_servicios'] = $query->result();

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
		$this->load->view('predios/nuevo', $data);
		$this->load->view('admin/footer');
		$this->load->view('admin/wizard_js');
	}

}