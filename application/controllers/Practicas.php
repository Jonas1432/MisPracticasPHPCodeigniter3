<?php

class Practicas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function viewEjemplo(){
        $this->load->view('template/head');
		$this->load->view('template/navbar');
        $this->load->view('view_practica');
		$this->load->view('template/footer');
    }
}