<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predio_model extends CI_Model {

    public function __construct(){
		parent::__construct();
        $this->load->database();
        // $this->load->model("persona_model");
    }

}