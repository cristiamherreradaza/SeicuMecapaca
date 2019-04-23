<?php
class Derivaciones extends CI_Controller    
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('tipopredio_model');
        $this->load->model("logacceso_model");
        $this->load->model("persona_model");
        $this->load->model("derivaciones_model");
        $this->load->model("Ddrr_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->library('cart');
        $this->load->model("rol_model");
        $this->load->library('email');
    }

    public function principal()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('derivaciones/nuevo');
        // $this->load->view('predios/registra_predio', $data);
        $this->load->view('admin/footer');
        $this->load->view('predios/registra_js');
        // echo 'Holas desde derivaciones';
    }

    public function nuevo($idTramite = null)
    {
        // $idTramite = 13;
        $data['idTramite']=$idTramite;

        if($this->session->userdata("login")){
            //$ine = $this->session->flashdata('in');

			//usuario que esta registrando
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_creacion = $resi->persona_id;

            $data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();
            // $personal = $this->derivaciones_model->get_personal();
            // vdebug($personal, false, FALSE, TRUE);
            // $data['personal'] = $this->derivaciones_model->get_personal();
            $data['personas'] = $this->derivaciones_model->personal();

            $persona_organigrama = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$data['tramite']->organigrama_persona_id))->row();

            $organi = $this->db->get_where('tramite.organigrama', array('organigrama_id'=>$persona_organigrama->organigrama_id))->row();
            // vdebug($organi);
            // $consulta = array('nivel >='=>$organi->nivel, 'unidad'=>$organi->unidad, 'organigrama_id !='=>$organi->organigrama_id);
            $consulta = array('nivel >='=>$organi->nivel, 'organigrama_id !='=>$organi->organigrama_id);
            $this->db->where($consulta);
            $per = $this->db->get('tramite.organigrama')->result();
            // vdebug($per);
            // print_r($per);
            $array_personas = array();
            forEach($per as $p){
                array_push($array_personas, $p->organigrama_id);
                // echo $p->organigrama_id.'<br />';
            }
            // $array_organigrama = $array_personas;
            $this->db->where_in('organigrama_id', $array_personas);
            $org_per = $this->db->get('tramite.organigrama_persona')->result();
            // vdebug($org_per, FALSE, FALSE, TRUE);
            $array_org_personas = array();
            foreach($org_per as $op){
                array_push($array_org_personas, $op->persona_id);
            }

            $this->db->where_in('persona_id', $array_org_personas);
            $data['personas_derivacion'] = $this->db->get('public.persona')->result();
            

            // $sql = $this->db->last_query();
            // vdebug($sql);

            $padre_org = $this->db->get_where('tramite.organigrama_persona', array('organigrama_id'=>$organi->hijo))->row();

            // $datos_padre = $this->db->select()

            // $data['inmediato_superior'] = $this->db->get_where('public.persona', array('persona_id'=>$padre_org->persona_id))->row();
            
            // vdebug($data['inmediato_superior']);\
            // $this->db->select('tramite.organigrama_persona.persona_id, tramite.cargo.descripcion');
            // $this->db->from('tramite.organigrama_persona');
            // $this->db->where('tramite.organigrama_persona.persona_id', $data['inmediato_superior']->persona_id);
            // $this->db->where('tramite.organigrama_persona.activo', 1);
            // $this->db->join('tramite.cargo', 'tramite.organigrama_persona.cargo_id = tramite.cargo.cargo_id');
            // $data['cargo_inmediato_superior'] = $this->db->get()->result();
            // vdebug($cargo);

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('derivaciones/nuevo', $data);
            // $this->load->view('predios/registra_predio', $data);
            $this->load->view('admin/footer');
            $this->load->view('predios/registra_js');
            // echo 'Holas desde derivaciones';
        }
    }

    public function guarda(){

        $perfil_persona = $this->session->userdata('persona_perfil_id');
        $datos_persona_perfil = $this->db->get_where('persona_perfil', array('persona_perfil_id'=>$perfil_persona))->result_array();
        $datos_organigrama_persona = $this->db->get_where(
            'tramite.organigrama_persona', 
            array(
                'persona_id'=>$datos_persona_perfil[0]['persona_id'],
                'activo'=>1
            ))->result_array();

        $data = array(
            'tramite_id'=>$this->input->post('idTramite'),
            // 'organigrama_persona_id'=>$datos_organigrama_persona[0]['organigrama_persona_id'],
            'fuente'=>$datos_organigrama_persona[0]['organigrama_persona_id'],
            'destino'=>$this->input->post('destino'),
            'fecha'=>date("Y-m-d H:i:s"),
            'descripcion'=>$this->input->post('descripcion'),
        );
        $this->db->insert('tramite.derivacion', $data);
        redirect(base_url().'derivaciones/listado');

        // vdebug($data, true, false, true);
        // vdebug($datos_organigrama_persona, false, false, true);
        // vdebug($this->input->post(), true, false, true);
    }

    public function listado(){

        // $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
        $perfil_persona = $this->session->userdata('persona_perfil_id');
        $datos_persona_perfil = $this->db->get_where('persona_perfil', array('persona_perfil_id'=>$perfil_persona))->result_array();
        // vdebug($datos_persona_perfil, false, false, true);
        $datos_organigrama_persona = $this->db->get_where(
            'tramite.organigrama_persona', 
            array(
                'persona_id'=>$datos_persona_perfil[0]['persona_id'],
                'activo'=>1
            ))->result_array();

        // vdebug($datos_organigrama_persona, false, false, true);
        $fuente = $datos_organigrama_persona[0]['organigrama_persona_id'];
        // vdebug($fuente, false, false, true);
        $this->db->where('tramite.derivacion.destino', $fuente);
        $this->db->order_by('tramite.derivacion.derivacion_id', 'ASC');
        $query = $this->db->get('tramite.derivacion');
        // vdebug($query, true, false, true);

        $data['mis_tramites'] = $query->result();
        $data['verifica'] = $this->rol_model->verifica();
        //var_dump($usu_creacion);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('derivaciones/listado', $data);
        $this->load->view('admin/footer');
        $this->load->view('predios/index_js');

    }

    public function ver($idTramite = null){

        $data['flujo'] = $this->db->get_where('tramite.derivacion', array('tramite_id'=>$idTramite))->result_array();

        // vdebug($tramite, true, false, true);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('derivaciones/ver', $data);
        $this->load->view('admin/footer');
        $this->load->view('predios/index_js');

    }


}
?>