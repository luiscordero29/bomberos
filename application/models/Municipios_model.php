<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Municipios_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $this->db->select('municipios.*, estados.estado, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = municipios.id_usuario','left');
	    $this->db->join('estados', 'estados.id_estado = municipios.id_estado','left');
	    $this->db->order_by('municipios.id_municipio', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('estados.estado', $search);
	    $this->db->or_like('municipios.municipio', $search);
	    $query = $this->db->get('municipios', $start, $limit);

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_rows($search)
	{

	    $this->db->join('usuarios', 'usuarios.id_usuario = municipios.id_usuario','left');
	    $this->db->join('estados', 'estados.id_estado = municipios.id_estado','left');
	    $this->db->order_by('municipios.id_municipio', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('estados.estado', $search);
	    $this->db->or_like('municipios.municipio', $search);
	    $query = $this->db->get('municipios');

	    if($query->num_rows() > 0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return false;
	    }
	}

	function create()
	{
	    
	    $id_usuario 		= $this->input->post('id_usuario');
	    $id_estado 			= $this->input->post('id_estado');
	   	$municipio 			= $this->input->post('municipio');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'id_estado' 			=> $id_estado,
		   	'municipio' 			=> $municipio,	   
		);

		$this->db->insert('municipios', $data);
	    
	    return true;

	} 

	function read($id_municipio)
	{			    
	    
	    $query = $this->db->get_where('municipios', array('id_municipio' => $id_municipio));	    

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
	    
	    $id_municipio = $this->input->post('id_municipio');

	    $id_usuario 		= $this->input->post('id_usuario');
	    $id_estado 			= $this->input->post('id_estado');
	   	$municipio 			= $this->input->post('municipio');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'id_estado' 			=> $id_estado,
		   	'municipio' 			=> $municipio,	   
		);

		$query = $this->db->get_where('municipios', array('id_municipio' => $id_municipio));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_municipio', $id_municipio);
			$this->db->update('municipios', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_municipio)
	{

	    $query = $this->db->get_where('municipios', array('id_municipio' => $id_municipio));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_municipio', $id_municipio);
			$this->db->delete('municipios'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function municipio_check()
	{		
	    $municipio 		= $this->input->post('municipio');
	    $id_estado 		= $this->input->post('id_estado');

	    $query = $this->db->get_where('municipios', 
	    	array('municipio' => $municipio, 'id_estado' => $id_estado));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function municipio_check2()
	{		
	    $municipio 		= $this->input->post('municipio');
	    $id_municipio 	= $this->input->post('id_municipio');
	    $id_estado 		= $this->input->post('id_estado');

	    $query = $this->db->get_where('municipios', 
	    	array('id_municipio !=' => $id_municipio, 'municipio' => $municipio, 'id_estado' => $id_estado));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function table_estados()
	{
	    $this->db->order_by('estado', 'ASC'); 
	    $query = $this->db->get('estados');

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