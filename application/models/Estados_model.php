<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Estados_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $this->db->select('estados.*, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = estados.id_usuario','left');
	    $this->db->order_by('id_estado', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('estados.estado', $search);
	    $query = $this->db->get('estados', $start, $limit);

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

	    $this->db->join('usuarios', 'usuarios.id_usuario = estados.id_usuario','left');
	    $this->db->order_by('id_estado', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('estados.estado', $search);
	    $query = $this->db->get('estados');

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
	   	$estado 			= $this->input->post('estado');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'estado' 				=> $estado,	   
		);

		$this->db->insert('estados', $data);
	    
	    return true;

	} 

	function read($id_estado)
	{			    
	    
	    $query = $this->db->get_where('estados', array('id_estado' => $id_estado));	    

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
	    
	    $id_estado = $this->input->post('id_estado');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$estado 			= $this->input->post('estado');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'estado' 				=> $estado,	   
		);

		$query = $this->db->get_where('estados', array('id_estado' => $id_estado));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_estado', $id_estado);
			$this->db->update('estados', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_estado)
	{

	    $query = $this->db->get_where('estados', array('id_estado' => $id_estado));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_estado', $id_estado);
			$this->db->delete('estados'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function estado_check()
	{		
	    $estado 	= $this->input->post('estado');
	    $id_estado 	= $this->input->post('id_estado');

	    $query = $this->db->get_where('estados', array('id_estado !=' => $id_estado, 'estado' => $estado));

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