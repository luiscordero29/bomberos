<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Vehiculos_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($id_documento)
	{
	    $this->db->join('tipos', 'tipos.id_tipo = vehiculos.id_tipo','left');
	    $this->db->join('marcas', 'marcas.id_marca = vehiculos.id_marca','left');
	    $this->db->join('modelos', 'modelos.id_modelo = vehiculos.id_modelo','left');
	    $this->db->join('clases', 'clases.id_clase = vehiculos.id_clase','left');
	    $this->db->join('colores', 'colores.id_color = vehiculos.id_color','left');
	    $this->db->join('usuarios', 'usuarios.id_usuario = vehiculos.id_usuario','left');
	    $this->db->order_by('id_vehiculo', 'DESC'); 
	    $this->db->where('vehiculos.id_documento', $id_documento); 
	    $query = $this->db->get('vehiculos');

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function create()
	{
	
		$id_usuario 					= $this->input->post('id_usuario');
	    $id_documento 					= $this->input->post('id_documento');
	   	$placa 							= $this->input->post('placa');
	   	$id_tipo 						= $this->input->post('id_tipo');
	   	$id_marca 						= $this->input->post('id_marca');
	   	$id_modelo 						= $this->input->post('id_modelo');
	   	$id_clase 						= $this->input->post('id_clase');
	   	$id_color 						= $this->input->post('id_color');
	   	$ano 							= $this->input->post('ano');
	   	$propietario 					= $this->input->post('propietario');
	   	$propietario_identidad 			= $this->input->post('propietario_identidad');
	   	$propietario_edad 				= $this->input->post('propietario_edad');
	   	$conductor 						= $this->input->post('conductor');
	   	$conductor_identidad 			= $this->input->post('conductor_identidad');
	   	$conductor_edad 				= $this->input->post('conductor_edad');
	   	$conductor_residencia 			= $this->input->post('conductor_residencia');

	   	   	
	   	$data = array(
		   	'id_usuario' 				=> $id_usuario,
		   	'id_documento' 				=> $id_documento,	  
		   	'placa' 					=> $placa,	   
		   	'id_tipo' 					=> $id_tipo,	   
		   	'id_marca' 					=> $id_marca,	
		   	'id_modelo' 				=> $id_modelo,	  
		   	'id_clase' 					=> $id_clase,	   
		   	'id_color' 					=> $id_color,	   
		   	'ano' 						=> $ano,	
		   	'propietario' 				=> $propietario,	  
		   	'propietario_identidad' 	=> $propietario_identidad,	   
		   	'propietario_edad' 			=> $propietario_edad,	   
		   	'conductor' 				=> $conductor,	
		   	'conductor_identidad' 		=> $conductor_identidad,	
		   	'conductor_edad' 			=> $conductor_edad,
		   	'conductor_residencia' 		=> $conductor_residencia,        
		);

		$this->db->insert('vehiculos', $data);
	    
	    return true;

	} 

	function read($id_vehiculo)
	{			    
	    $this->db->join('tipos', 'tipos.id_tipo = vehiculos.id_tipo','left');
	    $this->db->join('marcas', 'marcas.id_marca = vehiculos.id_marca','left');
	    $this->db->join('modelos', 'modelos.id_modelo = vehiculos.id_modelo','left');
	    $this->db->join('clases', 'clases.id_clase = vehiculos.id_clase','left');
	    $this->db->join('colores', 'colores.id_color = vehiculos.id_color','left');
	    $query = $this->db->get_where('vehiculos', array('id_vehiculo' => $id_vehiculo));	    

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
	    
	    $id_vehiculo = $this->input->post('id_vehiculo');

	    $id_usuario 					= $this->input->post('id_usuario');
	    $id_documento 					= $this->input->post('id_documento');
	   	$placa 							= $this->input->post('placa');
	   	$id_tipo 						= $this->input->post('id_tipo');
	   	$id_marca 						= $this->input->post('id_marca');
	   	$id_modelo 						= $this->input->post('id_modelo');
	   	$id_clase 						= $this->input->post('id_clase');
	   	$id_color 						= $this->input->post('id_color');
	   	$ano 							= $this->input->post('ano');
	   	$propietario 					= $this->input->post('propietario');
	   	$propietario_identidad 			= $this->input->post('propietario_identidad');
	   	$propietario_edad 				= $this->input->post('propietario_edad');
	   	$conductor 						= $this->input->post('conductor');
	   	$conductor_identidad 			= $this->input->post('conductor_identidad');
	   	$conductor_edad 				= $this->input->post('conductor_edad');
	   	$conductor_residencia 			= $this->input->post('conductor_residencia');

	   	   	
	   	$data = array(
		   	'id_usuario' 				=> $id_usuario,
		   	'id_documento' 				=> $id_documento,	  
		   	'placa' 					=> $placa,	   
		   	'id_tipo' 					=> $id_tipo,	   
		   	'id_marca' 					=> $id_marca,	
		   	'id_modelo' 				=> $id_modelo,	  
		   	'id_clase' 					=> $id_clase,	   
		   	'id_color' 					=> $id_color,	   
		   	'ano' 						=> $ano,	
		   	'propietario' 				=> $propietario,	  
		   	'propietario_identidad' 	=> $propietario_identidad,	   
		   	'propietario_edad' 			=> $propietario_edad,	   
		   	'conductor' 				=> $conductor,	
		   	'conductor_identidad' 		=> $conductor_identidad,	
		   	'conductor_edad' 			=> $conductor_edad,
		   	'conductor_residencia' 		=> $conductor_residencia,        
		);

		$query = $this->db->get_where('vehiculos', array('id_vehiculo' => $id_vehiculo));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_vehiculo', $id_vehiculo);
			$this->db->update('vehiculos', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_vehiculo)
	{

	    $query = $this->db->get_where('vehiculos', array('id_vehiculo' => $id_vehiculo));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_vehiculo', $id_vehiculo);
			$this->db->delete('vehiculos'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function read_documento($id_documento)
	{			    
	    
	    $this->db->join('estados', 'estados.id_estado = documentos.id_estado','left');
	    $this->db->join('municipios', 'municipios.id_municipio = documentos.id_municipio','left');
	    $this->db->join('parroquias', 'parroquias.id_parroquia = documentos.id_parroquia','left');
	    $query = $this->db->get_where('documentos', array('id_documento' => $id_documento));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_tipos()
	{
	    $this->db->order_by('tipo', 'ASC'); 
	    $query = $this->db->get('tipos');

	    if($query->num_rows() > 0)
	    {
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

	function table_marcas()
	{
	    $this->db->order_by('marca', 'ASC'); 
	    $query = $this->db->get('marcas');

	    if($query->num_rows() > 0)
	    {
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

	function table_modelos($id_marca)
	{
	    $this->db->order_by('modelo', 'ASC');
	    $this->db->where('id_marca', $id_marca); 
	    $query = $this->db->get('modelos');

	    if($query->num_rows() > 0)
	    {
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

	function table_clases()
	{
	    $this->db->order_by('clase', 'ASC'); 
	    $query = $this->db->get('clases');

	    if($query->num_rows() > 0)
	    {
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

	function table_colores()
	{
	    $this->db->order_by('color', 'ASC'); 
	    $query = $this->db->get('colores');

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