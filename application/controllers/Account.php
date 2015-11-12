<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Account.
	 *
	 * autor: Ing. Luis Cordero
	 * site: http://www.luiscordero29.com
	 * mail: info@luiscordero29.com
	 *
	 **/
	
	public $controller = "account";

	public function __construct()
	{
		parent::__construct();		
		$this->load->driver('session'); 
		$this->load->model('Account_model');
		// Control Sessión
		if(!$this->session->has_userdata('id_usuario'))
   		{     						
		    //If no session, redirect to login page
		    redirect('login');
	
		}
	}

	public function index()
	{
		
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'		=> 'dashboard/index',
	            '<i class="fa fa-fw fa-user"></i> Mi Cuenta'				=> '',          	
	        );
	    $data['row'] = $this->Account_model->read();
	    

		$this->load->view($this->controller.'/index',$data);	

	}

	public function profile()
	{
		
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'		=> 'dashboard/index',
	            '<i class="fa fa-fw fa-edit"></i> Editar Datos'				=> '',          	
	        );
	    

		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required');
		$this->form_validation->set_rules('identidad', 'Cedula de Identidad', 'trim|required|is_natural_no_zero|min_length[6]|max_length[9]|callback_identidad_check');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');
		$this->form_validation->set_rules('fecha_nacimiento', 'Fecha Nacimiento', 'trim|required');
		$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural');
		$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|callback_correo_check|valid_email');

		// message
		$this->form_validation->set_message('correo_check', 'Correo Duplicado');
		$this->form_validation->set_message('identidad_check', 'Cedula de Identidad Duplicada');

		
		
		if($this->form_validation->run() == FALSE)
		{
			$data['row'] = $this->Account_model->read();
			$this->load->view($this->controller.'/profile',$data);		

		}else{
			$this->Account_model->update();
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);
			$data['row'] = $this->Account_model->read();    
			$this->load->view($this->controller.'/profile',$data);
		}	

	}

	public function password()
	{
		
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'		=> 'dashboard/index',
	            '<i class="fa fa-fw fa-gear"></i> Cambiar Clave'			=> '',          	
	        );
	    

		$this->form_validation->set_rules('pass', 'Contraseña', 'trim|required');
		$this->form_validation->set_rules('veryfi', 'Confirmar Contraseña', 'trim|required|matches[pass]');

		
		
		if($this->form_validation->run() == FALSE)
		{
			$data['row'] = $this->Account_model->read();
			$this->load->view($this->controller.'/password',$data);		

		}else{
			$this->Account_model->read();
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);
			$data['row'] = $this->Account_model->password();    
			$this->load->view($this->controller.'/password',$data);
		}	

	}

	public function identidad_check()
  	{      
      	$check = $this->Account_model->identidad_check();
      	if($check)
      	{
           	return false;
      	}
      	else
      	{         
           	return true;
      	}
  	}

  	public function correo_check()
  	{      
      	$check = $this->Account_model->correo_check();
      	if($check)
      	{
           	return false;
      	}
      	else
      	{         
           	return true;
      	}
  	}

	public function logout()
 	{
	   	$sess_array = array(
		    'id_usuario' 	=> '',
		    'usuario' 		=> '',
		    'apellidos' 	=> '',
		    'nombres' 		=> '',
		    'tipo' 			=> '',	          	
		);

		$this->session->unset_userdata($sess_array);
	   	$this->session->sess_destroy();
	   	
	   	redirect('login');
 	}

}
