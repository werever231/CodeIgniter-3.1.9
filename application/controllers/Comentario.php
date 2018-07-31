<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/*
    Algunas notas
    a)Las alert no funcionan, solo se redirigen a las paginas sin mandar el alert.
    b)El post no funciona en el metodo agregar, solo funciona en los otros :(
*/
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
        //Se obtienen los datos de la tabla Comentarios y se mandan a la vista Comentarios. El array es el que se utiliza
        //en LA VISTA para obtener los datos de la tabla. 
		$result = $this->Comentario_model->ver_comentarios();
		$data = array('consulta' => $result);
		$this->load->view('Comentarios', $data);	
		
	}

    //Controller para actualizar comentario
    public function actualizar_comentario()
    {
        $id=$this->uri->segment(2);//obtienes el id desde la url sin utilizar el get.
        $coment=$this->input->post('comentario');
        //echo $id;
        //echo $coment;
        
        $mod_com= $this->Comentario_model->modificar_comentario($id,$coment);
        //echo $mod_com;
        if($mod_com > 0)
        {
            echo "<script type='text/javascript'>alert('Comentario Actualizado');</script>"; 
            redirect('VerComentario');   
        }
        else
        {
            echo "<script type='text/javascript'>alert('Nel mijo');</script>"; 
            redirect('Modificar');    
        }
              
    }

    //Controller para eliminar el comentario
    public function eliminar()
    {
        $id=$this->input->get('id');
        $result=$this->Comentario_model->eliminar($id);
        
        if($result > 0)
        {
            echo "<script type='text/javascript'>alert('Comentario Eliminado');</script>"; 
            redirect('VerComentario');   
        }
        else
        {
            echo "<script type='text/javascript'>alert('Nel mijo');</script>"; 
            redirect('VerComentario');    
        }

    }
    
    //Controller para mostrar los datos del comentario a actualizar
    public function Modificar()
    {   
        //Metes el id de la url usando el array asociativo para enviar los datos a la vista     
        $data['id']=$this->input->get('id');
        $data['comentario']=$this->Comentario_model->comentario_id($data['id']);       
        $this->load->view('Modificar_Contacto', $data);

    }
    
    //Controller para agregar un nuevo comentario
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