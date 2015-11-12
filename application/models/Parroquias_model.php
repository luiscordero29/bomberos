<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Parroquias_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $this->db->select('parroquias.*, estados.estado, municipios.municipio, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = parroquias.id_usuario','left');
	    $this->db->join('municipios', 'municipios.id_municipio = parroquias.id_municipio','left');
	    $this->db->join('estados', 'estados.id_estado = municipios.id_estado','left');
	    $this->db->order_by('parroquias.id_parroquia', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('estados.estado', $search);
	    $this->db->or_like('municipios.municipio', $search);
	    $this->db->or_like('parroquias.parroquia', $search);
	    $query = $this->db->get('parroquias', $start, $limit);

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

	    $this->db->join('usuarios', 'usuarios.id_usuario = parroquias.id_usuario','left');
	    $this->db->join('municipios', 'municipios.id_municipio = parroquias.id_municipio','left');
	    $this->db->join('estados', 'estados.id_estado = municipios.id_estado','left');
	    $this->db->order_by('parroquias.id_parroquia', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('estados.estado', $search);
	    $this->db->or_like('municipios.municipio', $search);
	    $this->db->or_like('parroquias.parroquia', $search);
	    $query = $this->db->get('parroquias');

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
	    $id_municipio 			= $this->input->post('id_municipio');
	   	$parroquia 			= $this->input->post('parroquia');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'id_municipio' 			=> $id_municipio,
		   	'parroquia' 			=> $parroquia,	   
		);

		$this->db->insert('parroquias', $data);
	    
	    return true;

	} 

	function read($id_parroquia)
	{			    
	    
	    $this->db->join('municipios', 'municipios.id_municipio = parroquias.id_municipio','left');
	    $query = $this->db->get_where('parroquias', array('id_parroquia' => $id_parroquia));	    

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
	    
	    $id_parroquia = $this->input->post('id_parroquia');

	    $id_usuario 		= $this->input->post('id_usuario');
	    $id_municipio 			= $this->input->post('id_municipio');
	   	$parroquia 			= $this->input->post('parroquia');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'id_municipio' 			=> $id_municipio,
		   	'parroquia' 			=> $parroquia,	   
		);

		$query = $this->db->get_where('parroquias', array('id_parroquia' => $id_parroquia));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_parroquia', $id_parroquia);
			$this->db->update('parroquias', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_parroquia)
	{

	    $query = $this->db->get_where('parroquias', array('id_parroquia' => $id_parroquia));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_parroquia', $id_parroquia);
			$this->db->delete('parroquias'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function parroquia_check()
	{		
	    $parroquia 		= $this->input->post('parroquia');
	    $id_estado 		= $this->input->post('id_estado');
	    $id_municipio 	= $this->input->post('id_municipio');

	    $this->db->join('municipios', 'municipios.id_municipio = parroquias.id_municipio','left');
	    $this->db->join('estados', 'estados.id_estado = municipios.id_estado','left');
	    $query = 
	    $this->db->get_where('parroquias', 
	    	array('parroquia' => $parroquia, 
	    		  'estados.id_estado' => $id_estado, 
	    		  'municipios.id_municipio' => $id_municipio
	    		 ));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function parroquia_check2()
	{		
	    $parroquia 		= $this->input->post('parroquia');
	    $id_parroquia 	= $this->input->post('id_parroquia');
	    $id_estado 		= $this->input->post('id_estado');
	    $id_municipio 	= $this->input->post('id_municipio');

	    $this->db->join('municipios', 'municipios.id_municipio = parroquias.id_municipio','left');
	    $this->db->join('estados', 'estados.id_estado = municipios.id_estado','left');
	    $query = $this->db->get_where('parroquias', 
	    	array(	'id_parroquia !=' => $id_parroquia, 
	    			'parroquia' => $parroquia, 
	    			'estados.id_estado' => $id_estado, 
	    			'municipios.id_municipio' => $id_municipio
	    		));

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

	function table_municipios($id_estado)
	{
	    $this->db->where('id_estado', $id_estado);
	    $this->db->order_by('municipio', 'ASC'); 
	    $query = $this->db->get('municipios');

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