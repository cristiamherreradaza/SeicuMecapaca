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

	public function guardar(){
		vdebug($data);
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