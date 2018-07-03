<?php
class Comentario extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Comentario_model');
                $this->load->library('form_validation');
                
                /*
                 * De preferencia coloca los helper en el constructor
                 */
		$this->load->helper('url');
	}

	function index(){
		$this->load->view('Contacto');
	}

	function Agregar(){
            //Cuando se pulsa el boton, se valida el form
            //se realizan las comprobaciones necesarias en los datos enviados desde el form.
            
            /*
             * Comente el if de submit, ya que no es necesario y no te dejaba pasar
             */
            $this->form_validation->set_rules('nombre','nombre','trim|required');
            $this->form_validation->set_rules('correo','correo','trim|required');
            $this->form_validation->set_rules('comentario','comentario','trim|required');

            //Se utiliza un msn para mostrar que no se validaron los campos, usando el CI_form de codeigniter
            $this->form_validation->set_message('required','Campo %s es obligatorio');
            //$this->form_validation->set_message('valid_email','El %s no es válido');

            /*
             * Si colocas la validacion asi, entonces esperas un true, y lo tenias al reves
             */
            if($this->form_validation->run())
            {
                    //En caso de no validar el form, se retorna a la pagina de contacto
                    $nombre= $this->input->post('nombre');
                    $correo= $this->input->post('correo');
                    $comentario= $this->input->post('comentario');			
                    /*
                     * Cuando inserta usa la variable para validar si se insertaron datos (en este caso $inserta_comentario)
                     * si es menor a 0, entonces hubo un error y debes validar
                     */
                    $inserta_comentario= $this->Comentario_model->nuevo_comentario($nombre, $correo, $comentario);
                    $this->load->view('Contacto');
            }
            else
            {
                    $this->load->view('Contacto');
            }
	}
}
?>