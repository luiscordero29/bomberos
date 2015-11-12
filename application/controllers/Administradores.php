<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Administradores extends CI_Controller {

	/**
	 * Administradores.
	 *
	 * autor: Ing. Luis Cordero
	 * site: http://www.luiscordero29.com
	 * mail: info@luiscordero29.com
	 *
	 **/

	public $controller = "administradores";

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->driver('session');
		$this->load->model('Administradores_model','',TRUE);

		// Control de Sessión
		if($this->session->has_userdata('id_usuario'))
   		{     						
			if(!($this->session->userdata('tipo') === 'ADMINISTRADOR'))
			{
				redirect('account/logout');
			}	
		}
		else
		{
		    redirect('account/logout');
		}
		
	}
		

	public function index($table_page=null,$id=null,$search=null)
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'				=> 'dashboard/index',
	            '<i class="fa fa-fw fa-user-plus"></i> Tabla de Administradores'	=> '',        	
	        );
					
		$table_limit = 30;
		$table_page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;		

		$s = trim($this->input->post('s'));
		$search = trim($search);
		if(!empty($s)){
			$data['search'] = $s;
			$data['search_url'] = '/'.$s;					
		}elseif(!empty($search)){
			$data['search'] = urldecode($search);
			$data['search_url'] = '/'.$search;
		}else{
			$data['search'] = $s;
			$data['search_url'] = '';
		}
				
		$data['table'] = $this->Administradores_model->table($table_page*$table_limit,$table_limit,$data['search']);
		$data['table_rows'] = $this->Administradores_model->table_rows($data['search']);
		$data['table_page'] = $table_page;
		$data['table_limit'] = $table_limit;

		$this->load->view($this->controller.'/index',$data);
	}

	public function create()
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'				=> 'dashboard/index',
	            '<i class="fa fa-fw fa-user-plus"></i> Tabla de Administradores'	=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-file-text-o"></i> Nuevo Registro'			=> '',              	
	        );
	            
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|alpha_numeric|min_length[6]|max_length[15]|is_unique[usuarios.usuario]');
		$this->form_validation->set_rules('identidad', 'Cedula de Identidad', 'trim|required|is_natural_no_zero|min_length[6]|max_length[9]|is_unique[usuarios.identidad]');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('activo', 'Activo', 'trim|required');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');
		$this->form_validation->set_rules('fecha_nacimiento', 'Fecha Nacimiento', 'trim|required');
		$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural');
		$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|is_unique[usuarios.correo]|valid_email');

		if($this->form_validation->run() == FALSE)
		{				
			$this->load->view($this->controller.'/create',$data);		

		}else{

			$this->Administradores_model->create();
					
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);

			$this->load->view($this->controller.'/create',$data);
		}		
	}

	public function update($id=false)
	{			

		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'				=> 'dashboard/index',
	            '<i class="fa fa-fw fa-user-plus"></i> Tabla de Administradores'	=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-edit"></i> Editar Registro'					=> '',              	
	        );
				
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|alpha_numeric|min_length[6]|max_length[15]|callback_usuario_check');
		$this->form_validation->set_rules('identidad', 'Cedula de Identidad', 'trim|required|is_natural_no_zero|min_length[6]|max_length[9]|callback_identidad_check');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('activo', 'Activo', 'trim|required');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');
		$this->form_validation->set_rules('fecha_nacimiento', 'Fecha Nacimiento', 'trim|required');
		$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural');
		$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|callback_correo_check|valid_email');

		$this->form_validation->set_message('usuario_check', 'El campo Usuario ingresado ya se encuentra ocupado.');
		$this->form_validation->set_message('identidad_check', 'El campo Cedula de Identidad ingresado ya se encuentra ocupado.');
		$this->form_validation->set_message('correo_check', 'El campo Correo ingresado ya se encuentra ocupado.');

		if($this->form_validation->run() == FALSE)
		{
					
			$data['row'] = $this->Administradores_model->read($id);
			if($id===FALSE)
			{
				$data['alert']['danger'] = 
					array( 
						'Identificador no se a cargado correctamente.',				
					);		
				$this->load->view($this->controller.'/delete',$data);	
			}elseif($id===$this->session->userdata('id_usuario'))
			{
				$data['alert']['danger'] = 
					array( 
						'Tu Usuario No puede ser Eliminado',				
					);		
				$this->load->view($this->controller.'/delete',$data);		
			}elseif(empty($data['row']))
			{
				$data['alert']['danger'] = 
						array( 
							'No exite registro.',				
						);		
				$this->load->view($this->controller.'/delete',$data);
			}else{
				$this->load->view($this->controller.'/update',$data);		
			}

		}else{
			
			$this->Administradores_model->update();
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);

			$data['row'] = $this->Administradores_model->read($id);
			if(empty($data['row']))
			{
				$data['alert']['danger'] = 
						array( 
							'No exite registro.',				
						);		
				$this->load->view($this->controller.'/delete',$data);
			}else{
				$this->load->view($this->controller.'/update',$data);		
			}

		}		
	}

	public function delete($id=false)
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'				=> 'dashboard/index',
	            '<i class="fa fa-fw fa-user-plus"></i> Tabla de Administradores'	=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-trash"></i> Eliminar Registro'				=> '',              	
	        );

		$check = $this->Administradores_model->delete($id);
		if($id===$this->session->userdata('id_usuario'))
		{
			$data['alert']['danger'] = 
				array( 
					'Tu Usuario No puede ser Eliminado',				
				);					
		}elseif($check)
		{
		    $data['alert']['success'] = 
			array( 
				'Administrador Eliminado Exitosamente',				
			);
		}
		else
		{         
		    $data['alert']['danger'] = 
			array( 
				'No Existe Administrador ó No es posible eliminar por motivos de seguridad',				
			);
		}
				
		$this->load->view($this->controller.'/delete',$data);
		
	}

	public function identidad_check()
	{	
		$check = $this->Administradores_model->identidad_check();
		if($check)  
	    {  
	        return false;  
	    }  
	    else  
	    {  
	        return true;  
	    }		
	}

	public function usuario_check()
  	{      
      	$check = $this->Administradores_model->usuario_check();
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
      	$check = $this->Administradores_model->correo_check();
      	if($check)
      	{
           	return false;
      	}
      	else
      	{         
           	return true;
      	}
  	}

}