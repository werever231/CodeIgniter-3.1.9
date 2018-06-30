<?php
class Comentario extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Comentario_model');
	}

	function index(){
		$this->load->helper('url');
		$this->load->view('Contacto');
	}

	function Agregar(){
		//Cuando se pulsa el boton, se valida el form
		if($this->input->post('submit'))
		{
			//se realizan las comprobaciones necesarias en los datos enviados desde el form.
			$this->form_validation->set_rules('nombre','nombre','trim|required');
			$this->form_validation->set_rules('correo','correo','trim|required|valid_email');
			$this->form_validation->set_rules('comentario','comentario','trim|required');

			//Se utiliza un msn para mostrar que no se validaron los campos, usando el CI_form de codeigniter
			$this->form_validation->set_message('required','Campo %s es obligatorio');
			$this->form_validation->set_message('valid_email','El %s no es válido');

			if($this->form_validation->run())
			{
				//En caso de no validar el form, se retorna a la pagina de contacto
				$this->index();
			}
			else
			{
				$nombre= $this->input->post('nombre');
				$correo= $this->input->post('correo');
				$comentario= $this->input->post('comentario');			
				$inserta_comentario= $this->Comentario_model->nuevo_comentario($nombre, $correo, $comentario);
				$this->load->view('Contacto');
				//redirect(base_url("Contacto"), "refresh");
			}
		}

	}

}
?>