<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes_m extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //QR CODE
        //$this->load->library('phpqrcode/qrlib');
        $this->load->helper('url');
        
        //$this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "activos/nuevo");
        } else {
            redirect(base_url());
        }
    }




   

    

   

 
    public function pdftest()
    {
        $this->load->view('user_list');
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }

    public function pdf()
    {
        $this->load->view('reports/rep_nocatastro');
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 

    public function pdf_nc($id=null)

    
    {
        date_default_timezone_set('America/La_Paz');

        // Define key-value array
        $days_dias = array(
        'Monday'=>'Lunes',
        'Tuesday'=>'Martes',
        'Wednesday'=>'Miércoles',
        'Thursday'=>'Jueves',
        'Friday'=>'Viernes',
        'Saturday'=>'Sábado',
        'Sunday'=>'Domingo'
        );
        $mes=date('F');

        if ($mes == "January") $mes = "Enero";
if ($mes == "February") $mes = "Febrero";
if ($mes == "March") $mes = "Marzo";
if ($mes == "April") $mes = "Abril";
if ($mes == "May") $mes = "Mayo";
if ($mes == "June") $mes = "Junio";
if ($mes == "July") $mes = "Julio";
if ($mes == "August") $mes = "Agosto";
if ($mes == "September") $mes = "Setiembre";
if ($mes == "October") $mes = "Octubre";
if ($mes == "November") $mes = "Noviembre";
if ($mes == "December") $mes = "Diciembre";

        $data['datos_certificado'] = $this->db->query("SELECT g.*,k.*,f.*,d.* FROM tramite.informe_tecnico g
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_a,p.paterno as pat_a,p.materno as mat_a from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.a=p.persona_id
        WHERE informe_tecnico_id=1 ) as k
        on g.informe_tecnico_id=k.informe_tecnico_id
        
        LEFT JOIN
        
        (SELECT i.informe_tecnico_id,p.nombres as nom_via,p.paterno as pat_via,p.materno as mat_via from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.via=p.persona_id
        WHERE informe_tecnico_id=1) as f
        on g.informe_tecnico_id=f.informe_tecnico_id
        
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_de,p.paterno as pat_de,p.materno as mat_de from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.de=p.persona_id
        WHERE informe_tecnico_id=1) as d
        on d.informe_tecnico_id=g.informe_tecnico_id
        WHERE g.informe_tecnico_id=1")->row();   
        
        $tiempo= $this->db->query("SELECT EXTRACT(day from fecha_testimonio)as dia,EXTRACT(MONTH from fecha_testimonio)as mes,EXTRACT(YEAR from fecha_testimonio)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=1")->row();

        $data['dia_not']=$tiempo->dia;
        $mes_n=$tiempo->mes;
       


          if ($mes_n == "1") $mes_n = "Enero";
        if ($mes_n == "2") $mes_n = "Febrero";
        if ($mes_n == "3") $mes_n = "Marzo";
        if ($mes_n == "4") $mes_n = "Abril";
        if ($mes_n == "5") $mes_n = "Mayo";
        if ($mes_n == "6") $mes_n = "Junio";
        if ($mes_n == "7") $mes_n = "Julio";
        if ($mes_n == "8") $mes_n = "Agosto";
        if ($mes_n == "9") $mes_n = "Setiembre";
        if ($mes_n == "10") $mes_n = "Octubre";
        if ($mes_n == "11") $mes_n = "Noviembre";
        if ($mes_n == "12") $mes_n = "Diciembre";

        
        $data['mes_not']=$mes_n;
        $data['anio_not']=$tiempo->anio;


        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];
        $this->load->view('reports/rep_nocatastro',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }  

    public function pdf_j($id=null)    
    {
        date_default_timezone_set('America/La_Paz');
        // Define key-value array
        $days_dias = array(
        'Monday'=>'Lunes',
        'Tuesday'=>'Martes',
        'Wednesday'=>'Miércoles',
        'Thursday'=>'Jueves',
        'Friday'=>'Viernes',
        'Saturday'=>'Sábado',
        'Sunday'=>'Domingo'
        );
        $mes=date('F');
        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Setiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];

        $data['datos_certificado'] = $this->db->query("SELECT g.*,k.*,f.*,d.* FROM tramite.informe_tecnico g
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_a,p.paterno as pat_a,p.materno as mat_a from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.a=p.persona_id
        WHERE informe_tecnico_id=1 ) as k
        on g.informe_tecnico_id=k.informe_tecnico_id
        
        LEFT JOIN
        
        (SELECT i.informe_tecnico_id,p.nombres as nom_via,p.paterno as pat_via,p.materno as mat_via from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.via=p.persona_id
        WHERE informe_tecnico_id=1) as f
        on g.informe_tecnico_id=f.informe_tecnico_id
        
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_de,p.paterno as pat_de,p.materno as mat_de from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.de=p.persona_id
        WHERE informe_tecnico_id=1) as d
        on d.informe_tecnico_id=g.informe_tecnico_id
        WHERE g.informe_tecnico_id=1")->row();

        $tiempo= $this->db->query("SELECT EXTRACT(day from fecha_testimonio)as dia,EXTRACT(MONTH from fecha_testimonio)as mes,EXTRACT(YEAR from fecha_testimonio)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=1")->row();

        $data['dia_not']=$tiempo->dia;
        $mes_n=$tiempo->mes;



        if ($mes_n == "1") $mes_n = "Enero";
        if ($mes_n == "2") $mes_n = "Febrero";
        if ($mes_n == "3") $mes_n = "Marzo";
        if ($mes_n == "4") $mes_n = "Abril";
        if ($mes_n == "5") $mes_n = "Mayo";
        if ($mes_n == "6") $mes_n = "Junio";
        if ($mes_n == "7") $mes_n = "Julio";
        if ($mes_n == "8") $mes_n = "Agosto";
        if ($mes_n == "9") $mes_n = "Setiembre";
        if ($mes_n == "10") $mes_n = "Octubre";
        if ($mes_n == "11") $mes_n = "Noviembre";
        if ($mes_n == "12") $mes_n = "Diciembre";


        $data['mes_not']=$mes_n;
        $data['anio_not']=$tiempo->anio;



        $this->load->view('reports/rep_jurisdiccion',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }  




    public function html()
    {
      
        $this->load->view('reports/rep_nocatastro');    
    }  
 



}
