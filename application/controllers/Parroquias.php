<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Parroquias extends CI_Controller {

	/**
	 * Parroquias
	 **/

	public $controller = "parroquias";

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->driver('session');
		$this->load->model('Parroquias_model','',TRUE);

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
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'		=> 'dashboard/index',
	            '<i class="fa fa-fw fa-table"></i> Tabla de Parroquias'			=> '',        	
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
				
		$data['table'] = $this->Parroquias_model->table($table_page*$table_limit,$table_limit,$data['search']);
		$data['table_rows'] = $this->Parroquias_model->table_rows($data['search']);
		$data['table_page'] = $table_page;
		$data['table_limit'] = $table_limit;
		

		$this->load->view($this->controller.'/index',$data);
	}

	public function create()
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'			=> 'dashboard/index',
	            '<i class="fa fa-fw fa-table"></i> Tabla de Parroquias'			=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-file-text-o"></i> Nuevo Registro'		=> '',              	
	        );
	            
		$this->form_validation->set_rules('id_estado', 'Estado', 'trim|required'); 
		$this->form_validation->set_rules('id_municipio', 'Municipio', 'trim|required'); 
		$this->form_validation->set_rules('parroquia', 'Parroquia', 'trim|required|callback_parroquia_check');

		$this->form_validation->set_message('parroquia_check', 'El campo Estado ingresado ya se encuentra ocupado.');

		
		$data['table_estados'] = $this->Parroquias_model->table_estados();

		if($this->form_validation->run() == FALSE)
		{				
			$this->load->view($this->controller.'/create',$data);		

		}else{

			$this->Parroquias_model->create();
					
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
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'		=> 'dashboard/index',
	            '<i class="fa fa-fw fa-table"></i> Tabla de Parroquias'		=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-edit"></i> Editar Registro'			=> '',              	
	        );
				
		$this->form_validation->set_rules('id_estado', 'Estado', 'trim|required'); 
		$this->form_validation->set_rules('id_municipio', 'Municipio', 'trim|required'); 
		$this->form_validation->set_rules('parroquia', 'Parroquia', 'trim|required|callback_parroquia_check2');

		$this->form_validation->set_message('parroquia_check2', 'El campo Estado ingresado ya se encuentra ocupado.');

		
		$data['table_estados'] = $this->Parroquias_model->table_estados();

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

			$data['row'] = $this->Parroquias_model->read($id);
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
			
			$this->Parroquias_model->update();
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);

			$data['row'] = $this->Parroquias_model->read($id);
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
	            '<i class="fa fa-fw fa-table"></i> Tabla de Parroquias'				=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-trash"></i> Eliminar Registro'				=> '',              	
	        );

		$check = $this->Parroquias_model->delete($id);
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

	public function parroquia_check()
	{	
		$check = $this->Parroquias_model->parroquia_check();
		if($check)  
	    {  
	        return false;  
	    }  
	    else  
	    {  
	        return true;  
	    }		
	}

	public function parroquia_check2()
	{	
		$check = $this->Parroquias_model->parroquia_check2();
		if($check)  
	    {  
	        return false;  
	    }  
	    else  
	    {  
	        return true;  
	    }		
	}

	public function table_municipios()
    {	     	
	    $rows = array();
	        
	    $id_estado = $this->input->post('id_estado');
	    $rows = $this->Parroquias_model->table_municipios($id_estado);
	    	
	    	echo '<option value="">SELECCIONAR</option>';
	        
	    foreach($rows as $row)
	    {	
	        echo '<option value="'.$row['id_municipio'].'">'.$row['municipio'].'</option>';
	    }
    }

}