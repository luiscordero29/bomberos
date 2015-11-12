<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Organismos_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($id_documento)
	{

	    $this->db->select('organismos.*, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = organismos.id_usuario','left');
	    $this->db->order_by('id_organismo', 'DESC'); 
	    $this->db->where('organismos.id_documento', $id_documento); 
	    $query = $this->db->get('organismos');

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
	    
	    $id_usuario 		= $this->input->post('id_usuario');
	    $id_documento 		= $this->input->post('id_documento');
	   	$unidad 			= $this->input->post('unidad');
	   	$dependencia 		= $this->input->post('dependencia');
	   	$cp 				= $this->input->post('cp');
	   	$am 				= $this->input->post('am');
	   	   	
	   	$data = array(
		   	'id_usuario' 		=> $id_usuario,
		   	'id_documento' 		=> $id_documento,	  
		   	'unidad' 			=> $unidad,	   
		   	'dependencia' 		=> $dependencia,	   
		   	'cp' 				=> $cp,	
		   	'am' 				=> $am,	        
		);

		$this->db->insert('organismos', $data);
	    
	    return true;

	} 

	function read($id_organismo)
	{			    
	    
	    $query = $this->db->get_where('organismos', array('id_organismo' => $id_organismo));	    

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
	    
	    $id_organismo = $this->input->post('id_organismo');

	    $id_usuario 		= $this->input->post('id_usuario');
	    $id_documento 		= $this->input->post('id_documento');
	   	$unidad 			= $this->input->post('unidad');
	   	$dependencia 		= $this->input->post('dependencia');
	   	$cp 				= $this->input->post('cp');
	   	$am 				= $this->input->post('am');
	   	   	
	   	$data = array(
		   	'id_usuario' 		=> $id_usuario,
		   	'id_documento' 		=> $id_documento,	  
		   	'unidad' 			=> $unidad,	   
		   	'dependencia' 		=> $dependencia,	   
		   	'cp' 				=> $cp,	
		   	'am' 				=> $am,	        
		);

		$query = $this->db->get_where('organismos', array('id_organismo' => $id_organismo));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_organismo', $id_organismo);
			$this->db->update('organismos', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_organismo)
	{

	    $query = $this->db->get_where('organismos', array('id_organismo' => $id_organismo));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_organismo', $id_organismo);
			$this->db->delete('organismos'); 
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

}