<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Tipos_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $this->db->select('tipos.*, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = tipos.id_usuario','left');
	    $this->db->order_by('id_tipo', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('tipos.tipo', $search);
	    $query = $this->db->get('tipos', $start, $limit);

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

	    $this->db->join('usuarios', 'usuarios.id_usuario = tipos.id_usuario','left');
	    $this->db->order_by('id_tipo', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('tipos.tipo', $search);
	    $query = $this->db->get('tipos');

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
	   	$tipo 			= $this->input->post('tipo');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'tipo' 				=> $tipo,	   
		);

		$this->db->insert('tipos', $data);
	    
	    return true;

	} 

	function read($id_tipo)
	{			    
	    
	    $query = $this->db->get_where('tipos', array('id_tipo' => $id_tipo));	    

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
	    
	    $id_tipo = $this->input->post('id_tipo');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$tipo 			= $this->input->post('tipo');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'tipo' 				=> $tipo,	   
		);

		$query = $this->db->get_where('tipos', array('id_tipo' => $id_tipo));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_tipo', $id_tipo);
			$this->db->update('tipos', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_tipo)
	{

	    $query = $this->db->get_where('tipos', array('id_tipo' => $id_tipo));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_tipo', $id_tipo);
			$this->db->delete('tipos'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function tipo_check()
	{		
	    $tipo 	= $this->input->post('tipo');
	    $id_tipo 	= $this->input->post('id_tipo');

	    $query = $this->db->get_where('tipos', array('id_tipo !=' => $id_tipo, 'tipo' => $tipo));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

}