<?php
class Comentario_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	//Se crea la funcion nuevo comentario para ´pasarle los datos en forma de arreglo desde el form
	//aqui se puede validar y esas cosas
	function nuevo_comentario($nombre, $correo, $comentario){
		$datos= array(
			'Nombre' => $nombre,
			'Correo' => $correo,
			'Coment' => $comentario,
			);
		//Aqui se guardan los datos en la tabla, usando el modelo para hacerlo.
		$this->db->insert('comentarios',$datos);
	}
}