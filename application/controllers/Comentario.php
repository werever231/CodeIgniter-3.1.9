<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Comentario extends CI_Controller {	
	function __construct()
	{	// De preferencia coloca los helper en el constructor                
		parent::__construct();
		$this->load->helper('form','url');		
        $this->load->library('form_validation');
        $this->load->model('Comentario_model');
		
	}

	public function index()
	{
		$result = $this->Comentario_model->ver_comentario();
		$data = array('consulta' => $result);
		$this->load->view('Comentarios', $data);	
		
	}

	public function Agregar(){
            
            /*
             * Comente el if de submit, ya que no es necesario y no te dejaba pasar
             
            para esta validacion, va (nombre del name en el form, mensaje, reglas de validacion)
            $this->form_validation->set_rules('nombre','Nombre','required');
            $this->form_validation->set_rules('correo','Correo','required');
            $this->form_validation->set_rules('comentario','Comentario','required');*/

            /*
             * Si colocas la validacion asi, entonces esperas un true, y lo tenias al reves
             */
           
            //En caso de no validar el form, se retorna a la pagina de contacto
            $nombre=$this->input->get('nombre');
            $correo=$this->input->get('correo');
            $comentario=$this->input->get('comentario');
           	
            /*
             * Cuando inserta usa la variable para validar si se insertaron datos (en este caso $inserta_comentario)
             * si es menor a 0, entonces hubo un error y debes validar*/
                     
            $inserta_comentario= $this->Comentario_model->nuevo_comentario($nombre, $correo, $comentario);
            
            if($inserta_comentario > 0)
            {
            	echo "<script type='text/javascript'>alert('ya funciona');</script>"; 
            	redirect('Contacto');                  
            }

            else
            {
        			echo "<script type='text/javascript'>alert('No sirve :(');</script>"; 
                     redirect('Contacto');  
            }
	}

	
}
?>