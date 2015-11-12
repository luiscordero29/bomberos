<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Colores_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $this->db->select('colores.*, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = colores.id_usuario','left');
	    $this->db->order_by('id_color', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('colores.color', $search);
	    $query = $this->db->get('colores', $start, $limit);

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

	    $this->db->join('usuarios', 'usuarios.id_usuario = colores.id_usuario','left');
	    $this->db->order_by('id_color', 'DESC'); 
	    $this->db->like('usuarios.usuario', $search); 
	    $this->db->or_like('colores.color', $search);
	    $query = $this->db->get('colores');

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
	   	$color 			= $this->input->post('color');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'color' 				=> $color,	   
		);

		$this->db->insert('colores', $data);
	    
	    return true;

	} 

	function read($id_color)
	{			    
	    
	    $query = $this->db->get_where('colores', array('id_color' => $id_color));	    

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
	    
	    $id_color = $this->input->post('id_color');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$color 			= $this->input->post('color');
	   	   	
	   	$data = array(
		   	'id_usuario' 			=> $id_usuario,
		   	'color' 				=> $color,	   
		);

		$query = $this->db->get_where('colores', array('id_color' => $id_color));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_color', $id_color);
			$this->db->update('colores', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_color)
	{

	    $query = $this->db->get_where('colores', array('id_color' => $id_color));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_color', $id_color);
			$this->db->delete('colores'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function color_check()
	{		
	    $color 	= $this->input->post('color');
	    $id_color 	= $this->input->post('id_color');

	    $query = $this->db->get_where('colores', array('id_color !=' => $id_color, 'color' => $color));

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