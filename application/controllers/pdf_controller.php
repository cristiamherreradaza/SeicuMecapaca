<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('htmltopdf_model');
		$this->load->library('pdf');
	}

	public function index()
	{
		//$data['customer_data'] = $this->htmltopdf_model->fetch();
		$this->load->view('derivaciones/RutaPDF');
	}

	public function details()
	{
		
			$this->load->view('derivaciones/RutaPDF');
		
	}

	public function pdf()
	{

		$dompdf = new Dompdf\Dompdf();
 
        $html = $this->load->view('derivaciones/RutaPDF',[],true);
 
        $dompdf->loadHtml($html);
 
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');
 
        // Render the HTML as PDF
        $dompdf->render();
 
        // Get the generated PDF file contents
        $pdf = $dompdf->output();
 
        // Output the generated PDF to Browser
        $dompdf->stream("reporte.pdf", array("Attachment"=>1));
	}

}

?>
