<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Documentos_7_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $this->db->select('documentos.*, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = documentos.id_usuario','left');
	    $this->db->order_by('id_documento', 'DESC'); 
	    $this->db->where('tipo_documento','REPORTE_GUARDIA');
	    //$this->db->like('usuarios.usuario', $search); 
	    //$this->db->or_like('documentos.color', $search);
	    $query = $this->db->get('documentos', $start, $limit);

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

	    $this->db->select('documentos.*, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = documentos.id_usuario','left');
	    $this->db->order_by('id_documento', 'DESC'); 
	    $this->db->where('tipo_documento','REPORTE_GUARDIA');
	    //$this->db->like('usuarios.usuario', $search); 
	    //$this->db->or_like('documentos.color', $search);
	    $query = $this->db->get('documentos');

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
	    
	    $id_usuario 			= $this->input->post('id_usuario');	   	
	   	$tipo_documento 		= $this->input->post('tipo_documento');
	   	
	   	$date_array 			= explode('/',$this->input->post('fecha'));
		$date_array 			= array_reverse($date_array);		

	   	$aviso 					= $this->input->post('aviso');
		$fecha 					= date(implode('-', $date_array));
	   	$solicitado 			= $this->input->post('solicitado');
	   	$recibido 				= $this->input->post('recibido');
	   	$ordenado 				= $this->input->post('ordenado');
	   	$comandante_servicio 	= $this->input->post('comandante_servicio');
	   	$jefe_seccion 			= $this->input->post('jefe_seccion');
	   	$jefe_operaciones 		= $this->input->post('jefe_operaciones');
	   	$comandancia 			= $this->input->post('comandancia');
	   	$observaciones 			= $this->input->post('observaciones');   	

	   	$hora_salida 			= $this->input->post('hora_salida').':00';
	   	$hora_servicio_llegada 	= $this->input->post('hora_servicio_llegada').':00';
	   	$hora_servicio_salida 	= $this->input->post('hora_servicio_salida').':00';
	   	$hora_llegada 			= $this->input->post('hora_llegada').':00';
	   	$duracion 				= $this->RestarHoras($hora_salida,$hora_llegada);

	   	$uvir 					= $this->input->post('uvir');
	   	$uvir_cp 				= $this->input->post('uvir_cp');
	   	$uvir_am 				= $this->input->post('uvir_am');
	   	$uvir_ap 				= $this->input->post('uvir_ap');
	   	$uvir_presencia 		= $this->input->post('uvir_presencia');
	   	$uamb 					= $this->input->post('uamb');
	   	$uamb_cp 				= $this->input->post('uamb_cp');
	   	$uamb_am 				= $this->input->post('uamb_am');
	   	$traslado 				= $this->input->post('traslado');
	   	$id_estado 				= $this->input->post('id_estado');
	   	$id_municipio 			= $this->input->post('id_municipio');
	   	$id_parroquia 			= $this->input->post('id_parroquia');

	   	$servicio_tipo 					= $this->input->post('servicio_tipo');
	   	$servicio_motivacion 			= $this->input->post('servicio_motivacion');
	   	$servicio_direccion 			= $this->input->post('servicio_direccion');
	   	$servicio_persona 				= $this->input->post('servicio_persona');
	   	$servicio_persona_edad 			= $this->input->post('servicio_persona_edad');
	   	$servicio_persona_identidad 	= $this->input->post('servicio_persona_identidad');
	   	$servicio_persona_telefono 		= $this->input->post('servicio_persona_telefono');
	   	$servicio_materiales 			= $this->input->post('servicio_materiales');
	   	
	   
	   	$data = array(
		   	'id_usuario' 				=> $id_usuario,
		   	'aviso' 					=> $aviso,
		   	'tipo_documento' 			=> $tipo_documento,	  
		   	'fecha' 					=> $fecha,
		   	'solicitado' 				=> $solicitado,
		   	'recibido' 					=> $recibido,
		   	'ordenado' 					=> $ordenado,
		   	'comandante_servicio' 		=> $comandante_servicio, 
		   	'jefe_seccion' 				=> $jefe_seccion, 
		   	'jefe_operaciones' 			=> $jefe_operaciones, 
		   	'comandancia' 				=> $comandancia, 
		   	'observaciones' 			=> $observaciones, 
		   	
		   	'hora_salida' 				=> $hora_salida, 
		   	'hora_servicio_llegada' 	=> $hora_servicio_llegada, 
		   	'hora_servicio_salida' 		=> $hora_servicio_salida, 
		   	'hora_llegada' 				=> $hora_llegada, 
		   	'duracion' 					=> $duracion, 

		   	'uvir' 						=> $uvir, 
		   	'uvir_cp' 					=> $uvir_cp, 
		   	'uvir_am' 					=> $uvir_am, 
		   	'uvir_ap' 					=> $uvir_ap, 
		   	'uvir_presencia' 			=> $uvir_presencia, 
		   	'uamb' 						=> $uamb, 
		   	'uamb_cp' 					=> $uamb_cp, 
		   	'uamb_am' 					=> $uamb_am, 
		   	'traslado' 					=> $traslado,
		   	'id_estado' 				=> $id_estado,
		   	'id_municipio' 				=> $id_municipio,
		   	'id_parroquia' 				=> $id_parroquia,  

		   	'servicio_tipo' 				=> $servicio_tipo, 
		   	'servicio_motivacion' 			=> $servicio_motivacion, 
		   	'servicio_direccion' 			=> $servicio_direccion, 
		   	'servicio_persona' 				=> $servicio_persona, 
		   	'servicio_persona_edad' 		=> $servicio_persona_edad, 
		   	'servicio_persona_identidad' 	=> $servicio_persona_identidad, 
		   	'servicio_persona_telefono' 	=> $servicio_persona_telefono, 
		   	'servicio_materiales' 			=> $servicio_materiales, 
		);

		$this->db->insert('documentos', $data);
	    
	    return true;

	} 

	function read($id_documento)
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

	
	
	function update()
	{
	    
	    $id_documento = $this->input->post('id_documento');

	    $id_usuario 			= $this->input->post('id_usuario');	   	
	   	$tipo_documento 		= $this->input->post('tipo_documento');
	   	
	   	$date_array 			= explode('/',$this->input->post('fecha'));
		$date_array 			= array_reverse($date_array);		

	   	$aviso 					= $this->input->post('aviso');
		$fecha 					= date(implode('-', $date_array));
	   	$solicitado 			= $this->input->post('solicitado');
	   	$recibido 				= $this->input->post('recibido');
	   	$ordenado 				= $this->input->post('ordenado');
	   	$comandante_servicio 	= $this->input->post('comandante_servicio');
	   	$jefe_seccion 			= $this->input->post('jefe_seccion');
	   	$jefe_operaciones 		= $this->input->post('jefe_operaciones');
	   	$comandancia 			= $this->input->post('comandancia');
	   	$observaciones 			= $this->input->post('observaciones');   	

	   	$hora_salida 			= $this->input->post('hora_salida').':00';
	   	$hora_servicio_llegada 	= $this->input->post('hora_servicio_llegada').':00';
	   	$hora_servicio_salida 	= $this->input->post('hora_servicio_salida').':00';
	   	$hora_llegada 			= $this->input->post('hora_llegada').':00';
	   	$duracion 				= $this->RestarHoras($hora_salida,$hora_llegada);

	   	$uvir 					= $this->input->post('uvir');
	   	$uvir_cp 				= $this->input->post('uvir_cp');
	   	$uvir_am 				= $this->input->post('uvir_am');
	   	$uvir_ap 				= $this->input->post('uvir_ap');
	   	$uvir_presencia 		= $this->input->post('uvir_presencia');
	   	$uamb 					= $this->input->post('uamb');
	   	$uamb_cp 				= $this->input->post('uamb_cp');
	   	$uamb_am 				= $this->input->post('uamb_am');
	   	$traslado 				= $this->input->post('traslado');
	   	$id_estado 				= $this->input->post('id_estado');
	   	$id_municipio 			= $this->input->post('id_municipio');
	   	$id_parroquia 			= $this->input->post('id_parroquia');

	   	$servicio_tipo 					= $this->input->post('servicio_tipo');
	   	$servicio_motivacion 			= $this->input->post('servicio_motivacion');
	   	$servicio_direccion 			= $this->input->post('servicio_direccion');
	   	$servicio_persona 				= $this->input->post('servicio_persona');
	   	$servicio_persona_edad 			= $this->input->post('servicio_persona_edad');
	   	$servicio_persona_identidad 	= $this->input->post('servicio_persona_identidad');
	   	$servicio_persona_telefono 		= $this->input->post('servicio_persona_telefono');
	   	$servicio_materiales 			= $this->input->post('servicio_materiales');
	   
	   	$data = array(
		   	'id_usuario' 				=> $id_usuario,
		   	'aviso' 					=> $aviso,
		   	'tipo_documento' 			=> $tipo_documento,	  
		   	'fecha' 					=> $fecha,
		   	'solicitado' 				=> $solicitado,
		   	'recibido' 					=> $recibido,
		   	'ordenado' 					=> $ordenado,
		   	'comandante_servicio' 		=> $comandante_servicio, 
		   	'jefe_seccion' 				=> $jefe_seccion, 
		   	'jefe_operaciones' 			=> $jefe_operaciones, 
		   	'comandancia' 				=> $comandancia, 
		   	'observaciones' 			=> $observaciones, 
		   	
		   	'hora_salida' 				=> $hora_salida, 
		   	'hora_servicio_llegada' 	=> $hora_servicio_llegada, 
		   	'hora_servicio_salida' 		=> $hora_servicio_salida, 
		   	'hora_llegada' 				=> $hora_llegada, 
		   	'duracion' 					=> $duracion, 

		   	'uvir' 						=> $uvir, 
		   	'uvir_cp' 					=> $uvir_cp, 
		   	'uvir_am' 					=> $uvir_am, 
		   	'uvir_ap' 					=> $uvir_ap, 
		   	'uvir_presencia' 			=> $uvir_presencia, 
		   	'uamb' 						=> $uamb, 
		   	'uamb_cp' 					=> $uamb_cp, 
		   	'uamb_am' 					=> $uamb_am, 
		   	'traslado' 					=> $traslado,
		   	'id_estado' 				=> $id_estado,
		   	'id_municipio' 				=> $id_municipio,
		   	'id_parroquia' 				=> $id_parroquia, 

		   	'servicio_tipo' 				=> $servicio_tipo, 
		   	'servicio_motivacion' 			=> $servicio_motivacion, 
		   	'servicio_direccion' 			=> $servicio_direccion, 
		   	'servicio_persona' 				=> $servicio_persona, 
		   	'servicio_persona_edad' 		=> $servicio_persona_edad, 
		   	'servicio_persona_identidad' 	=> $servicio_persona_identidad, 
		   	'servicio_persona_telefono' 	=> $servicio_persona_telefono, 
		   	'servicio_materiales' 			=> $servicio_materiales, 
		   	
		);

		$query = $this->db->get_where('documentos', array('id_documento' => $id_documento));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_documento', $id_documento);
			$this->db->update('documentos', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_documento)
	{

	    $query = $this->db->get_where('documentos', array('id_documento' => $id_documento));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_documento', $id_documento);
			$this->db->delete('documentos'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function RestarHoras($horaini,$horafin)
	{

		$horai=substr($horaini,0,2);
		$mini=substr($horaini,3,2);
		$segi=substr($horaini,6,2); 

		$horaf=substr($horafin,0,2);
		$minf=substr($horafin,3,2);
		$segf=substr($horafin,6,2);

		$ini=((($horai*60)*60)+($mini*60)+$segi);
		$fin=((($horaf*60)*60)+($minf*60)+$segf);
	 
		$dif=$fin-$ini;

		$difh=floor($dif/3600);
		$difm=floor(($dif-($difh*3600))/60);
		$difs=$dif-($difm*60)-($difh*3600);

		return date("H:i:s",mktime($difh,$difm,$difs));

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

	function table_parroquias($id_municipio)
	{
	    $this->db->where('id_municipio', $id_municipio);
	    $this->db->order_by('parroquia', 'ASC'); 
	    $query = $this->db->get('parroquias');

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