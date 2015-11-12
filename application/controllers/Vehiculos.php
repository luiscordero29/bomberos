<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos extends CI_Controller {

	/**
	 * Vehiculos
	 **/

	public $controller = "vehiculos";

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->driver('session');
		$this->load->model('Vehiculos_model','',TRUE);

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
	            '<i class="icon icon-folder-open"></i> Vehiculos Actuantes en el Servicio'			=> '',        	
	        );

	    if($id_documento===FALSE)
		{
			$data['alert']['danger'] = 
					array( 
						'Identificador no se a cargado correctamente.',				
					);		
			$this->load->view($this->controller.'/delete',$data);		
		}

		$data['row_documento'] = $this->Vehiculos_model->read_documento($id_documento);
		if(empty($data['row_documento']))
		{
			$data['alert']['danger'] = 
					array( 
						'No exite registro.',				
					);		
			$this->load->view($this->controller.'/delete',$data);
		}
								
		$data['table'] = $this->Vehiculos_model->table($id_documento);
		
		

		$this->load->view($this->controller.'/index',$data);
	}

	public function create($id_documento=null)
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="icon icon-home"></i> Tablero Principal'				=> 'dashboard/index',
	            '<i class="icon icon-folder-open"></i> Tabla de Vehiculos'		=> $this->controller.'/index/'.$id_documento,
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

		$data['row_documento'] = $this->Vehiculos_model->read_documento($id_documento);
		if(empty($data['row_documento']))
		{
			$data['alert']['danger'] = 
					array( 
						'No exite registro.',				
					);		
			$this->load->view($this->controller.'/delete',$data);
		}
	            
		$this->form_validation->set_rules('placa', 'Placa', 'trim|required');
		$this->form_validation->set_rules('id_tipo', 'Tipo', 'trim|required');
		$this->form_validation->set_rules('id_marca', 'Marca', 'trim|required');
		$this->form_validation->set_rules('id_modelo', 'Modelo', 'trim|required');
		$this->form_validation->set_rules('id_clase', 'Clase', 'trim|required');
		$this->form_validation->set_rules('id_color', 'Color', 'trim|required');
		$this->form_validation->set_rules('ano', 'Año', 'trim|required|is_natural_no_zero|exact_length[4]');
		$this->form_validation->set_rules('propietario', 'Propietario', 'trim|required');
		$this->form_validation->set_rules('propietario_identidad', 'Identidad', 'trim|required|is_natural_no_zero|min_length[6]|max_length[10]');
		$this->form_validation->set_rules('propietario_edad', 'Edad', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('conductor', 'Propietario', 'trim');
		$this->form_validation->set_rules('conductor_identidad', 'Identidad', 'trim|is_natural_no_zero|min_length[6]|max_length[10]');
		$this->form_validation->set_rules('conductor_edad', 'Edad', 'trim|is_natural_no_zero');
		$this->form_validation->set_rules('conductor_residencia', 'Residencia', 'trim');

		
		$data['table_tipos'] 	= $this->Vehiculos_model->table_tipos();
		$data['table_marcas'] 	= $this->Vehiculos_model->table_marcas();
		$data['table_clases'] 	= $this->Vehiculos_model->table_clases();
		$data['table_colores'] 	= $this->Vehiculos_model->table_colores();

		if($this->form_validation->run() == FALSE)
		{				
			$this->load->view($this->controller.'/create',$data);		

		}else{

			$this->Vehiculos_model->create();
					
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
	            '<i class="icon icon-folder-open"></i> Tabla de Vehiculos'		=> $this->controller.'/index/'.$id_documento,
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

		$data['row_documento'] = $this->Vehiculos_model->read_documento($id_documento);
		if(empty($data['row_documento']))
		{
			$data['alert']['danger'] = 
					array( 
						'No exite registro.',				
					);		
			$this->load->view($this->controller.'/delete',$data);
		}
				
		$this->form_validation->set_rules('placa', 'Placa', 'trim|required');
		$this->form_validation->set_rules('id_tipo', 'Tipo', 'trim|required');
		$this->form_validation->set_rules('id_marca', 'Marca', 'trim|required');
		$this->form_validation->set_rules('id_modelo', 'Modelo', 'trim|required');
		$this->form_validation->set_rules('id_clase', 'Clase', 'trim|required');
		$this->form_validation->set_rules('id_color', 'Color', 'trim|required');
		$this->form_validation->set_rules('ano', 'Año', 'trim|required|is_natural_no_zero|exact_length[4]');
		$this->form_validation->set_rules('propietario', 'Propietario', 'trim|required');
		$this->form_validation->set_rules('propietario_identidad', 'Identidad', 'trim|required|is_natural_no_zero|min_length[6]|max_length[10]');
		$this->form_validation->set_rules('propietario_edad', 'Edad', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('conductor', 'Propietario', 'trim');
		$this->form_validation->set_rules('conductor_identidad', 'Identidad', 'trim|is_natural_no_zero|min_length[6]|max_length[10]');
		$this->form_validation->set_rules('conductor_edad', 'Edad', 'trim|is_natural_no_zero');
		$this->form_validation->set_rules('conductor_residencia', 'Residencia', 'trim');

		
		$data['table_tipos'] 	= $this->Vehiculos_model->table_tipos();
		$data['table_marcas'] 	= $this->Vehiculos_model->table_marcas();
		$data['table_clases'] 	= $this->Vehiculos_model->table_clases();
		$data['table_colores'] 	= $this->Vehiculos_model->table_colores();

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

			$data['row'] = $this->Vehiculos_model->read($id);
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
			
			$this->Vehiculos_model->update();
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);

			$data['row'] = $this->Vehiculos_model->read($id);
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
	            '<i class="icon icon-folder-open"></i> Tabla de Vehiculos'		=> $this->controller.'/index/'.$id_documento,
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

		$data['row_documento'] = $this->Vehiculos_model->read_documento($id_documento);
		if(empty($data['row_documento']))
		{
			$data['alert']['danger'] = 
					array( 
						'No exite registro.',				
					);		
			$this->load->view($this->controller.'/delete',$data);
		}
		
		$check = $this->Vehiculos_model->delete($id);
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

	public function table_modelos()
    {	     	
	    $rows = array();
	        
	    $id_marca = $this->input->post('id_marca');
	    $rows = $this->Vehiculos_model->table_modelos($id_marca);
	    	
	    	echo '<option value="">SELECCIONAR</option>';
	        
	    foreach($rows as $row)
	    {	
	        echo '<option value="'.$row['id_modelo'].'">'.$row['modelo'].'</option>';
	    }
    }

}