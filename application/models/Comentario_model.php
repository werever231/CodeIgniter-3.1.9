<?php
class Comentario_model extends CI_Model{
	public function __construct() {
      parent::__construct();
   }
	
	//Se crea la funcion nuevo comentario para ´pasarle los datos en forma de arreglo desde el form
	//aqui se puede validar y esas cosas
	function nuevo_comentario($nombre, $correo, $comentario){
		$datos=array(
			'Nombre' => $nombre,
			'Correo' => $correo,
			'Coment' => $comentario
			);
		//Aqui se guardan los datos en la tabla, usando el modelo para hacerlo.
		$this->db->insert('comentarios',$datos);
		 return $this->db->affected_rows();
                
                /*
                 * usa $this->db->insert_id() para recuperar el id que se guardo
                 * Si es -1, entonces hubo un error
                 */
                //return $this->db->insert_id();
	}

	function ver_comentarios()
	{
		//Con esta consulta, obtienes todos los datos de la tabla
		$consulta=$this->db->get('comentarios');
		return $consulta;
	}

	function comentario_id($id)//Metodo para obtener comemntario por id
	{
		$consulta=$this->db->select('*');
		$consulta=$this->db->where('ID_Coment', $id);
		$consulta=$this->db->get('comentarios');
		return $consulta;

	}

	function eliminar($id)//Metodo para eliminar desde la bd;
	{
		$consulta=$this->db->where('ID_Coment', $id);
		$consulta= $this->db->delete('comentarios');
		return $consulta;
	}

	//Consulta para poder actualizar el comentario 
	function modificar_comentario($id, $comentario)
	{
		$this->db->where('ID_Coment', $id);
    	$this->db->set('Coment', $comentario);
    	return $this->db->update('comentarios');
	}
}
