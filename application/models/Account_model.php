<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Account_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	function read()
	{			    
	    $id_usuario = $this->session->userdata('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function update()
	{
	    
	    $id_usuario = $this->input->post('id_usuario');

	    $identidad 		= $this->input->post('identidad');
	   	$apellidos 		= $this->input->post('apellidos');
	   	$nombres 		= $this->input->post('nombres');	   	
	   	$sexo 			= $this->input->post('sexo');	   	
	   	$telefono 		= $this->input->post('telefono');	   	
	   	$direccion 		= $this->input->post('direccion');	   	
	   	$correo 		= $this->input->post('correo');

	   	$date_array 		= explode('/',$this->input->post('fecha_nacimiento'));
		$date_array 		= array_reverse($date_array);		
		$fecha_nacimiento 	= date(implode('-', $date_array));
	   	   	
	   	$data = array(
			'identidad' 		=> $identidad,
			'apellidos' 		=> $apellidos,
			'nombres' 			=> $nombres,
			'sexo' 				=> $sexo,
			'fecha_nacimiento' 	=> $fecha_nacimiento,
			'telefono' 			=> $telefono,
			'direccion' 		=> $direccion,
			'correo'			=> $correo,	   
		);
	    
		$query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_usuario', $id_usuario);
			$this->db->update('usuarios', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function password()
	{
	    $id_usuario 	= $this->input->post('id_usuario');
	    $clave 			= MD5($this->input->post('pass'));

	    $data = array(
			'clave' 		=> $clave  
		);
	    
	    $query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario));

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_usuario', $id_usuario);
			$this->db->update('usuarios', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function correo_check()
	{		
	    $correo 		= $this->input->post('correo');
	    $id_usuario 	= $this->input->post('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'correo' => $correo));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function identidad_check()
	{		
	    $identidad 		= $this->input->post('identidad');
	    $id_usuario 	= $this->input->post('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'identidad' => $identidad));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}


	function table_menu()
	{
	    $id_usuario = $this->session->userdata('id_usuario');

	    $this->db->join('modulos', 'modulos.id_modulo = accesos.id_modulo','left');
	    $this->db->order_by('modulos.nombre', 'ASC'); 
	    $this->db->where('accesos.id_usuario', $id_usuario); 
	    $query = $this->db->get('accesos');

	    if($query->num_rows() > 0)
	    {
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

}