<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Organismos extends CI_Controller {

	/**
	 * Organismos
	 **/

	public $controller = "organismos";

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->driver('session');
		$this->load->model('Organismos_model','',TRUE);

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
		

	public function index($id_documento=null)
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="icon icon-home"></i> Tablero Principal'		=> 'dashboard/index',
	            '<i class="icon icon-folder-open"></i> Organismos Actuantes en el Servicio'			=> '',        	
	        );

	    if($id_documento===FALSE)
		{
			$data['alert']['danger'] = 
					array( 
						'Identificador no se a cargado correctamente.',				
					);		
			$this->load->view($this->controller.'/delete',$data);		
		}

		$data['row_documento'] = $this->Organismos_model->read_documento($id_documento);
		if(empty($data['row_documento']))
		{
			$data['alert']['danger'] = 
					array( 
						'No exite registro.',				
					);		
			$this->load->view($this->controller.'/delete',$data);
		}
								
		$data['table'] = $this->Organismos_model->table($id_documento);
		
		

		$this->load->view($this->controller.'/index',$data);
	}

	public function create($id_documento=null)
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="icon icon-home"></i> Tablero Principal'				=> 'dashboard/index',
	            '<i class="icon icon-folder-open"></i> Tabla de Organismos'		=> $this->controller.'/index/'.$id_documento,
	            '<i class="icon icon-file-text-o"></i> Nuevo Registro'			=> '',              	
	        );

	    if($id_documento===FALSE)
		{
			$data['alert']['danger'] = 
					array( 
						'Identificador no se a cargado correctamente.',				
					);		
			$this->load->view($this->controller.'/delete',$data);		
		}

		$data['row_documento'] = $this->Organismos_model->read_documento($id_documento);
		if(empty($data['row_documento']))
		{
			$data['alert']['danger'] = 
					array( 
						'No exite registro.',				
					);		
			$this->load->view($this->controller.'/delete',$data);
		}
	            
		$this->form_validation->set_rules('unidad', 'Unidad', 'trim|required');
		$this->form_validation->set_rules('dependencia', 'Dependencia', 'trim|required');
		$this->form_validation->set_rules('cp', 'Conducidad Por', 'trim|required');
		$this->form_validation->set_rules('am', 'Al Mando', 'trim|required');

		

		if($this->form_validation->run() == FALSE)
		{				
			$this->load->view($this->controller.'/create',$data);		

		}else{

			$this->Organismos_model->create();
					
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);

			$this->load->view($this->controller.'/create',$data);
		}		
	}

	public function update($id_documento=null,$id=false)
	{			

		$data['breadcrumbs'] = 
			array(
	            '<i class="icon icon-home"></i> Tablero Principal'		=> 'dashboard/index',
	            '<i class="icon icon-folder-open"></i> Tabla de Organismos'		=> $this->controller.'/index/'.$id_documento,
	            '<i class="icon icon-edit"></i> Editar Registro'			=> '',              	
	        );

	    if($id_documento===FALSE)
		{
			$data['alert']['danger'] = 
					array( 
						'Identificador no se a cargado correctamente.',				
					);		
			$this->load->view($this->controller.'/delete',$data);		
		}

		$data['row_documento'] = $this->Organismos_model->read_documento($id_documento);
		if(empty($data['row_documento']))
		{
			$data['alert']['danger'] = 
					array( 
						'No exite registro.',				
					);		
			$this->load->view($this->controller.'/delete',$data);
		}
				
		$this->form_validation->set_rules('unidad', 'Unidad', 'trim|required');
		$this->form_validation->set_rules('dependencia', 'Dependencia', 'trim|required');
		$this->form_validation->set_rules('cp', 'Conducidad Por', 'trim|required');
		$this->form_validation->set_rules('am', 'Al Mando', 'trim|required');

		

		if($this->form_validation->run() == FALSE)
		{
					
			if($id===FALSE)
			{
				$data['alert']['danger'] = 
						array( 
							'Identificador no se a cargado correctamente.',				
						);		
				$this->load->view($this->controller.'/delete',$data);		
			}

			$data['row'] = $this->Organismos_model->read($id);
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

		}else{
			
			$this->Organismos_model->update();
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);

			$data['row'] = $this->Organismos_model->read($id);
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

	public function delete($id_documento=null,$id=false)
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="icon icon-home"></i> Tablero Principal'				=> 'dashboard/index',
	            '<i class="icon icon-folder-open"></i> Tabla de Organismos'		=> $this->controller.'/index/'.$id_documento,
	            '<i class="icon icon-trash"></i> Eliminar Registro'				=> '',              	
	        );

		if($id_documento===FALSE)
		{
			$data['alert']['danger'] = 
					array( 
						'Identificador no se a cargado correctamente.',				
					);		
			$this->load->view($this->controller.'/delete',$data);		
		}

		$data['row_documento'] = $this->Organismos_model->read_documento($id_documento);
		if(empty($data['row_documento']))
		{
			$data['alert']['danger'] = 
					array( 
						'No exite registro.',				
					);		
			$this->load->view($this->controller.'/delete',$data);
		}
		
		$check = $this->Organismos_model->delete($id);
		if($check)
		{
		    $data['alert']['success'] = 
			array( 
				'Registro Eliminado Exitosamente',				
			);
		}
		else
		{         
		    $data['alert']['danger'] = 
			array( 
				'No Existe Registro ó No es posible eliminar por motivos de seguridad',				
			);
		}

		
				
		$this->load->view($this->controller.'/delete',$data);
		
	}

}