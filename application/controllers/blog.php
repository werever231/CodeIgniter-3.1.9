<?php
class Blog extends CI_Controller {
	
	function index(){
		$this->load->helper('url');
		$this->load->view('inicio');
	}

	function Contacto(){
		$this->load->helper('url');
		$this->load->view('Contacto');
	}

}
?>