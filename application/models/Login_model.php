<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Login_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	function registrarse()
	{

	    $usuario 		= $this->input->post('usuario');
	   	$clave 			= md5($this->input->post('clave'));
	   	$identidad 		= $this->input->post('identidad');
	   	//$apellidos 		= $this->input->post('apellidos');
	   	//$nombres 		= $this->input->post('nombres');
	   	//$direccion 		= $this->input->post('direccion');	   	
	   	$correo 		= $this->input->post('correo');
	   	//$telefono 		= $this->input->post('telefono');
	   	//$sexo 			= $this->input->post('sexo');	   	
	   	$tipo 			= 'USUARIO';
	   	$activo 		= 'NO';

	   	//$date_array 		= explode('/',$this->input->post('fecha_nacimiento'));
		//$date_array 		= array_reverse($date_array);		
		//$fecha_nacimiento 	= date(implode('-', $date_array));	
	   	   	
	   	$data = array(
		   	'usuario' 			=> $usuario,
			'clave' 			=> $clave,
			'identidad' 		=> $identidad,
			//'apellidos' 		=> $apellidos,
			//'nombres' 			=> $nombres,
			//'direccion' 		=> $direccion,
			'correo'			=> $correo,	   
			//'telefono' 			=> $telefono,
			//'sexo' 				=> $sexo,
			'tipo' 				=> $tipo,
			'activo' 			=> $activo,
			//'fecha_nacimiento'	=> $fecha_nacimiento,
		);

		$this->db->insert('usuarios', $data); 

		// now key
		$id_usuario = $this->db->insert_id();
	    $data = array(
			   'llave' 		=> md5($id_usuario), 
		);
		$this->db->where('id_usuario', $id_usuario);
		$this->db->update('usuarios', $data);
	    	
	    // sent mail 
		$text = 'Bienvenido'."\r\n";
		$text .= ' usuario: '.$usuario."\r\n";
		$text .= ' clave: '.$this->input->post('clave')."\r\n";
		$text .= ' validar cuenta: '.site_url('login/validar/'.md5($id_usuario))."\r\n";
		$text .= ' codigo: '.md5($id_usuario);

		$this->load->library('email');

		$config['protocol'] = 'sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['mailtype'] = 'html';

		$this->email->from('informatica@intravialbarinas.gob.ve', 'Oficina de Informática - Dirección Regional de Salud');
		$this->email->to($correo);
		$this->email->cc($correo);	
		$this->email->bcc($correo);
		$this->email->subject('Valida tu Correo');
		$this->email->message($text);

		$this->email->send();

		return true;
		// good
		/*if (!$this->email->send())
		{
		    return 'Error al Enviar Correo Electrónico';
		}else{
			return 'Correo Enviando Exitosamente';
		}*/

	} 

	function restaurar()
	{		
	    $correo = $this->input->post('correo');

	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 8; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }

	    $data = array(
			'activo' 	=> 'NO', 
			'clave' 	=> md5($randomString), 
		);
		$this->db->where('correo', $correo);
		$this->db->update('usuarios', $data);

		$query 	= $this->db->get_where('usuarios', array('correo' => $correo));
		$data = $query->row_array();


		// sent mail 
		$text = 'Bienvenido'."\r\n";
		$text .= ' usuario: '.$data['usuario']."\r\n";
		$text .= ' clave: '.$randomString."\r\n";
		$text .= ' validar cuenta: '.site_url('login/validar/'.md5($data['id_usuario']))."\r\n";
		$text .= ' codigo: '.md5($data['id_usuario']);

		$this->load->library('email');

		$config['protocol'] = 'sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['mailtype'] = 'html';
			
		$this->email->from('informatica@intravialbarinas.gob.ve', '@'.$data['usuario'].' | '.$data['apellidos'].' '.$data['nombres']);
		$this->email->to($data['correo']);
		$this->email->to($data['correo']);
		$this->email->cc($data['correo']);	
		$this->email->bcc($data['correo']);

		$this->email->subject('Valida tu Correo');
		$this->email->message($text);

		$this->email->send();

		return true;

	}

	public function clave_check()
 	{
	    $usuario = $this->input->post('usuario');
	    $clave = md5($this->input->post('clave'));
	    $query = $this->db->get_where('usuarios', array('usuario' => $usuario,'clave' => $clave));

	    if($query->num_rows() > 0)
	    {
	    	return true;
	    }
	    else
	    {
	    	return false;
	    }
 	}

 	public function usuario_check()
 	{
	    $usuario = $this->input->post('usuario');
	    $query = $this->db->get_where('usuarios', array('usuario' => $usuario));

	    if($query->num_rows() > 0)
	    {
	    	return true;
	    }
	    else
	    {
	    	return false;
	    }
 	}

 	public function correo_check()
 	{
	    $correo = $this->input->post('correo');
	    $query = $this->db->get_where('usuarios', array('correo' => $correo));

	    if($query->num_rows() > 0)
	    {
	    	return true;
	    }
	    else
	    {
	    	return false;
	    }
 	}

 	public function session()
 	{
	    $usuario = $this->input->post('usuario');
	    $clave = md5($this->input->post('clave'));
	    $query = $this->db->get_where('usuarios', array('usuario' => $usuario,'clave' => $clave,'activo' => 'SI'));

	    if($query->num_rows() > 0)
	    {
	    	return $query->row_array();
	    }
	    else
	    {
	    	return false;
	    }
 	}

 	public function validar($codigo)
 	{
	    $query = $this->db->get_where('usuarios', array('llave' => $codigo));

	    if($query->num_rows() > 0)
	    {
	    	$data = array(
			   'activo' 		=> 'SI', 
			);
			$this->db->where('llave', $codigo);
			$this->db->update('usuarios', $data);
			return true;
	    }
	    else
	    {
	    	return false;
	    }
 	}

}