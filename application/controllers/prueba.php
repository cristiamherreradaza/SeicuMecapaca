<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model("AllBloque_model");
    }
	
	public function prueba()	
	{	
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
       
	}

    public function index()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index1()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index2()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index3()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index4()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index5()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index6()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function menu()    
    {  
        $this->load->view('admin/header');
        $this->load->view('admin/menuprueba');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

     public function tramite()    
    {  
        $this->load->view('admin/header');
        $this->load->view('admin/menuprueba');
        $this->load->view('tramites/tramite');
        $this->load->view('admin/footer');
       
    }

     public function sin_permisos()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso1');
        $this->load->view('admin/footer');
       
    }

    public function probar()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/prueba_menu');
        $this->load->view('admin/footer');


    }
}