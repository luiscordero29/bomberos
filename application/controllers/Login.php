<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Login.
	 *
	 * autor: Ing. Luis Cordero
	 * site: http://www.luiscordero29.com
	 * mail: info@luiscordero29.com
	 *
	 **/
	
	public $controller = "login";

	public function __construct()
	{
		parent::__construct();		
		$this->load->driver('session'); 
		$this->load->model('Login_model');

		if($this->session->has_userdata('id_usuario'))
   		{     						
		    //If no session, redirect to login page
		    redirect('dashboard');
	
		}
	}

	public function index()
	{

		// rules
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('clave', 'Contraseña', 'required|callback_usuario_check|callback_clave_check|callback_session');
		// message
		$this->form_validation->set_message('usuario_check', 'El usuario no existe');
		$this->form_validation->set_message('clave_check', 'Contraseña invalidad');
		$this->form_validation->set_message('session', 'No tiene acceso temporalmente');
		// views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view($this->controller.'/index');	
		}
		else
		{			
	        redirect('dashboard');	     
		}

	}

	public function registrarse()
	{
		
		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		// rules
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|is_unique[usuarios.usuario]|min_length[6]|max_length[15]|alpha_numeric');
		$this->form_validation->set_rules('clave', 'Contraseña', 'required');
		$this->form_validation->set_rules('confirmar', 'Confirmar Contraseña', 'required|matches[clave]');
		$this->form_validation->set_rules('identidad', 'Cedula de Identidad', 'trim|required|is_unique[usuarios.identidad]|min_length[6]|max_length[8]|is_natural_no_zero');
		//$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
		//$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
		//$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email|is_unique[usuarios.correo]');
		//$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural|exact_length[11]');
		//$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');

		// views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view($this->controller.'/registrarse');	
		}
		else
		{			
	        $this->Login_model->registrarse();
			/*$data['alert']['info'] = 
				array( 
					$correo,				
				);*/

			$data['alert']['success'] = 
				array( 
					'Usuario Registrado Exitosamente, Revise su correo para confirmar mediante un enlace de validaci&oacute;n',				
				);

			$this->load->view($this->controller.'/registrarse',$data);    
		}

	}

	public function validar($codigo=null)
	{
		
		$data = '';
		if($codigo<>FALSE)
		{
			$result = $this->Login_model->validar($codigo);
			if($result){
				$data['alert']['success'] = 
					array( 
						'Cuenta Validada',				
					);			
			}
		}

		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		// rules
		$this->form_validation->set_rules('codigo', 'C&oacute;digo', 'trim|required');

		// views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view($this->controller.'/validar',$data);	
		}
		else
		{			
	        $result = $this->Login_model->validar($this->input->post('codigo'));
			if($result){
				$data['alert']['success'] = 
					array( 
						'Cuenta Validada',				
					);			
			}

			$this->load->view($this->controller.'/validar',$data);    
		}

	}

	public function restaurar()
	{
		
		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		// rules
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email|callback_correo_check');
		// message
		$this->form_validation->set_message('correo_check', 'El correo no existe');
		// views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view($this->controller.'/restaurar');	
		}
		else
		{			
	        $result = $this->Login_model->restaurar();
			if($result){
				$data['alert']['success'] = 
					array( 
						'Revisa tu Correo para Restaurar la Cuenta',				
					);			
			}

			$this->load->view($this->controller.'/restaurar',$data);    
		}

	}

	public function usuario_check()
	{
	    
	    $result = $this->Login_model->usuario_check();

	    if($result)
	    {
	      	return true;
	    }else{
	      	return false;
	    }
	}

	public function clave_check()
	{
	    
	    $result = $this->Login_model->clave_check();

	    if($result)
	    {
	      	return true;
	    }else{
	      	return false;
	    }
	}

	public function correo_check()
	{
	    
	    $result = $this->Login_model->correo_check();

	    if($result)
	    {
	      	return true;
	    }else{
	      	return false;
	    }
	}
	

	public function session()
	{
	     
	    $result = $this->Login_model->session();

	    if($result)
	    { 
		    $sess_array = array(
		        'id_usuario' 	=> $result['id_usuario'],
		        'usuario' 		=> $result['usuario'],
		        'identidad' 	=> $result['identidad'],
		        'apellidos' 	=> $result['apellidos'],
		        'nombres' 		=> $result['nombres'],
		        'tipo' 			=> $result['tipo'],		          	
		    );
	        $this->session->set_userdata($sess_array);
	      	return true;
	    }else{
	      	return false;
	    }
	}
}
