<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Clases_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $this->db->select('clases.*, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = clases.id_usuario','left');
	    $this->db->order_by('id_clase', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('clases.clase', $search);
	    $query = $this->db->get('clases', $start, $limit);

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

	    $this->db->join('usuarios', 'usuarios.id_usuario = clases.id_usuario','left');
	    $this->db->order_by('id_clase', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('clases.clase', $search);
	    $query = $this->db->get('clases');

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
	   	$clase 			= $this->input->post('clase');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'clase' 				=> $clase,	   
		);

		$this->db->insert('clases', $data);
	    
	    return true;

	} 

	function read($id_clase)
	{			    
	    
	    $query = $this->db->get_where('clases', array('id_clase' => $id_clase));	    

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
	    
	    $id_clase = $this->input->post('id_clase');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$clase 			= $this->input->post('clase');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'clase' 				=> $clase,	   
		);

		$query = $this->db->get_where('clases', array('id_clase' => $id_clase));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_clase', $id_clase);
			$this->db->update('clases', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_clase)
	{

	    $query = $this->db->get_where('clases', array('id_clase' => $id_clase));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_clase', $id_clase);
			$this->db->delete('clases'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function clase_check()
	{		
	    $clase 	= $this->input->post('clase');
	    $id_clase 	= $this->input->post('id_clase');

	    $query = $this->db->get_where('clases', array('id_clase !=' => $id_clase, 'clase' => $clase));

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