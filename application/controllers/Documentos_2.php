<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos_2 extends CI_Controller {

	/**
	 * Documentos_2
	 **/

	public $controller = "documentos_2";

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->driver('session');
		$this->load->model('Documentos_2_model','',TRUE);

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
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'			=> 'dashboard/index',
	            '<i class="fa fa-fw fa-table"></i> Servicios de Ambulancias'			=> '',        	
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
				
		$data['table'] = $this->Documentos_2_model->table($table_page*$table_limit,$table_limit,$data['search']);
		$data['table_rows'] = $this->Documentos_2_model->table_rows($data['search']);
		$data['table_page'] = $table_page;
		$data['table_limit'] = $table_limit;
		

		$this->load->view($this->controller.'/index',$data);
	}

	public function create()
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'			=> 'dashboard/index',
	            '<i class="fa fa-fw fa-table"></i> Servicios de Ambulancias'			=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-file-text-o"></i> Nuevo Registro'		=> '',              	
	        );
	            
		$this->form_validation->set_rules('aviso', 'Clase de Aviso', 'trim|required');
		$this->form_validation->set_rules('fecha', 'Clase de Aviso', 'trim|required');
		$this->form_validation->set_rules('solicitado', 'Solicitado Por', 'trim|required');
		$this->form_validation->set_rules('recibido', 'Recibido Por', 'trim|required');
		$this->form_validation->set_rules('ordenado', 'Ordenado Por', 'trim|required');
		$this->form_validation->set_rules('comandante_servicio', 'Comandante del Servicio', 'trim|required');
		$this->form_validation->set_rules('jefe_seccion', 'Jefe de Sección', 'trim|required');
		$this->form_validation->set_rules('jefe_operaciones', 'Jefe de Operaciones', 'trim|required');
		$this->form_validation->set_rules('comandancia', 'Comandancia', 'trim|required');
		$this->form_validation->set_rules('observaciones', 'Observaciones', 'trim');

		$this->form_validation->set_rules('hora_salida', 'Hora de salida H.L.V.', 'trim|required');
		$this->form_validation->set_rules('hora_servicio_llegada', 'Llegada al sitio H.L.V.', 'trim|required|callback_hora_servicio_llegada_check');
		$this->form_validation->set_rules('hora_servicio_salida', 'Salida del sitio H.L.V.', 'trim|required|callback_hora_servicio_salida_check');
		$this->form_validation->set_rules('hora_llegada', 'Hora de llegada H.L.V.', 'trim|required|callback_hora_llegada_check');
		
		$this->form_validation->set_rules('uamb', 'Unidad/Ambulancia', 'trim|required');
		$this->form_validation->set_rules('uamb_cp', 'Conducida Por', 'trim|required');
		$this->form_validation->set_rules('uamb_am', 'Al Mando', 'trim|required');
		$this->form_validation->set_rules('uamb_desde', 'Traslado', 'trim|required');
		$this->form_validation->set_rules('uamb_hasta', 'Traslado', 'trim|required');
		$this->form_validation->set_rules('uamb_recibido', 'Recibido Por', 'trim');
		$this->form_validation->set_rules('uamb_mpps', 'Registro MPPS Nº', 'trim');
		$this->form_validation->set_rules('id_estado', 'Estado', 'trim|required');
		$this->form_validation->set_rules('id_municipio', 'Municipio', 'trim|required');
		$this->form_validation->set_rules('id_parroquia', 'Parroquia', 'trim|required');

		$this->form_validation->set_rules('paciente_apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('paciente_nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('paciente_identidad', 'Identidad', 'trim');
		$this->form_validation->set_rules('paciente_edad', 'Edad', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('paciente_telefono', 'Edad', 'trim');
		$this->form_validation->set_rules('paciente_residencia', 'Residenciado en', 'trim|required');
		$this->form_validation->set_rules('paciente_tipo_traslado', 'Tipo de traslado', 'trim|required');
		$this->form_validation->set_rules('paciente_sv_ppm', 'P.P.M.', 'trim');
		$this->form_validation->set_rules('paciente_sv_rpm', 'R.P.M.', 'trim');
		$this->form_validation->set_rules('paciente_sv_temp', 'TEMP.', 'trim');
		$this->form_validation->set_rules('paciente_sv_pa', 'P/A', 'trim');
		$this->form_validation->set_rules('paciente_ocasionado', 'Ocacionado Por', 'trim');
		$this->form_validation->set_rules('paciente_ac_apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('paciente_ac_nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('paciente_ac_identidad', 'Identidad', 'trim');
		$this->form_validation->set_rules('paciente_ac_edad', 'Edad', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('paciente_ac_telefono', 'Edad', 'trim');
		$this->form_validation->set_rules('paciente_nexo', 'Nexo', 'trim');


		// message
		$this->form_validation->set_message('hora_servicio_llegada_check', 'Corriga: Llegada al sitio H.L.V. debe ser mayor a Hora de salida H.L.V.');
		$this->form_validation->set_message('hora_servicio_salida_check', 'Corriga: Salida del sitio H.L.V. debe ser mayor a Llegada al sitio H.L.V.');
		$this->form_validation->set_message('hora_llegada_check', 'Corriga: Hora de llegada H.L.V. debe ser mayor a Salida del sitio H.L.V.');

		
		$data['table_estados'] = $this->Documentos_2_model->table_estados();

		if($this->form_validation->run() == FALSE)
		{				
			$this->load->view($this->controller.'/create',$data);		

		}else{

			$this->Documentos_2_model->create();
					
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
	            '<i class="fa fa-fw fa-table"></i> Servicios de Ambulancias'		=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-edit"></i> Editar Registro'			=> '',              	
	        );
				
		$this->form_validation->set_rules('aviso', 'Clase de Aviso', 'trim|required');
		$this->form_validation->set_rules('fecha', 'Clase de Aviso', 'trim|required');
		$this->form_validation->set_rules('solicitado', 'Solicitado Por', 'trim|required');
		$this->form_validation->set_rules('recibido', 'Recibido Por', 'trim|required');
		$this->form_validation->set_rules('ordenado', 'Ordenado Por', 'trim|required');
		$this->form_validation->set_rules('comandante_servicio', 'Comandante del Servicio', 'trim|required');
		$this->form_validation->set_rules('jefe_seccion', 'Jefe de Sección', 'trim|required');
		$this->form_validation->set_rules('jefe_operaciones', 'Jefe de Operaciones', 'trim|required');
		$this->form_validation->set_rules('comandancia', 'Comandancia', 'trim|required');
		$this->form_validation->set_rules('observaciones', 'Observaciones', 'trim');

		$this->form_validation->set_rules('hora_salida', 'Hora de salida H.L.V.', 'trim|required');
		$this->form_validation->set_rules('hora_servicio_llegada', 'Llegada al sitio H.L.V.', 'trim|required|callback_hora_servicio_llegada_check');
		$this->form_validation->set_rules('hora_servicio_salida', 'Salida del sitio H.L.V.', 'trim|required|callback_hora_servicio_salida_check');
		$this->form_validation->set_rules('hora_llegada', 'Hora de llegada H.L.V.', 'trim|required|callback_hora_llegada_check');
		
		$this->form_validation->set_rules('uamb', 'Unidad/Ambulancia', 'trim|required');
		$this->form_validation->set_rules('uamb_cp', 'Conducida Por', 'trim|required');
		$this->form_validation->set_rules('uamb_am', 'Al Mando', 'trim|required');
		$this->form_validation->set_rules('uamb_desde', 'Traslado', 'trim|required');
		$this->form_validation->set_rules('uamb_hasta', 'Traslado', 'trim|required');
		$this->form_validation->set_rules('uamb_recibido', 'Recibido Por', 'trim');
		$this->form_validation->set_rules('uamb_mpps', 'Registro MPPS Nº', 'trim');
		$this->form_validation->set_rules('id_estado', 'Estado', 'trim|required');
		$this->form_validation->set_rules('id_municipio', 'Municipio', 'trim|required');
		$this->form_validation->set_rules('id_parroquia', 'Parroquia', 'trim|required');

		$this->form_validation->set_rules('paciente_apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('paciente_nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('paciente_identidad', 'Identidad', 'trim');
		$this->form_validation->set_rules('paciente_edad', 'Edad', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('paciente_telefono', 'Edad', 'trim');
		$this->form_validation->set_rules('paciente_residencia', 'Residenciado en', 'trim|required');
		$this->form_validation->set_rules('paciente_tipo_traslado', 'Tipo de traslado', 'trim|required');
		$this->form_validation->set_rules('paciente_sv_ppm', 'P.P.M.', 'trim');
		$this->form_validation->set_rules('paciente_sv_rpm', 'R.P.M.', 'trim');
		$this->form_validation->set_rules('paciente_sv_temp', 'TEMP.', 'trim');
		$this->form_validation->set_rules('paciente_sv_pa', 'P/A', 'trim');
		$this->form_validation->set_rules('paciente_ocasionado', 'Ocacionado Por', 'trim');
		$this->form_validation->set_rules('paciente_ac_apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('paciente_ac_nombres', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('paciente_ac_identidad', 'Identidad', 'trim');
		$this->form_validation->set_rules('paciente_ac_edad', 'Edad', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('paciente_ac_telefono', 'Edad', 'trim');
		$this->form_validation->set_rules('paciente_nexo', 'Nexo', 'trim');

		// message
		$this->form_validation->set_message('hora_servicio_llegada_check', 'Corriga: Llegada al sitio H.L.V. debe ser mayor a Hora de salida H.L.V.');
		$this->form_validation->set_message('hora_servicio_salida_check', 'Corriga: Salida del sitio H.L.V. debe ser mayor a Llegada al sitio H.L.V.');
		$this->form_validation->set_message('hora_llegada_check', 'Corriga: Hora de llegada H.L.V. debe ser mayor a Salida del sitio H.L.V.');

		
		$data['table_estados'] = $this->Documentos_2_model->table_estados();

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

			$data['row'] = $this->Documentos_2_model->read($id);
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
			
			$this->Documentos_2_model->update();
			$data['alert']['success'] = 
				array( 
					'Guardado Exitosamente',				
				);

			$data['row'] = $this->Documentos_2_model->read($id);
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
	            '<i class="fa fa-fw fa-table"></i> Servicios de Ambulancias'				=> $this->controller.'/index',
	            '<i class="fa fa-fw fa-trash"></i> Eliminar Registro'				=> '',              	
	        );

		$check = $this->Documentos_2_model->delete($id);
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

	public function table_municipios()
    {	     	
	    $rows = array();
	        
	    $id_estado = $this->input->post('id_estado');
	    $rows = $this->Documentos_2_model->table_municipios($id_estado);
	    	
	    	echo '<option value="">SELECCIONAR</option>';
	        
	    foreach($rows as $row)
	    {	
	        echo '<option value="'.$row['id_municipio'].'">'.$row['municipio'].'</option>';
	    }
    }

    public function table_parroquias()
    {	     	
	    $rows = array();
	        
	    $id_municipio = $this->input->post('id_municipio');
	    $rows = $this->Documentos_2_model->table_parroquias($id_municipio);
	    	
	    	echo '<option value="">SELECCIONAR</option>';
	        
	    foreach($rows as $row)
	    {	
	        echo '<option value="'.$row['id_parroquia'].'">'.$row['parroquia'].'</option>';
	    }
    }

    public function hora_servicio_llegada_check()
    {	     	
	    $hora_salida = $this->input->post('hora_salida');
	    $hora_servicio_llegada = $this->input->post('hora_servicio_llegada');

	    if ($hora_salida<$hora_servicio_llegada) {
	    	return true;
	    }else{
	    	return false;
	    }
    }

    public function hora_servicio_salida_check()
    {	     	
	    $hora_servicio_llegada = $this->input->post('hora_servicio_llegada');
	    $hora_servicio_salida = $this->input->post('hora_servicio_salida');
	    if ($hora_servicio_llegada<$hora_servicio_salida) {
	    	return true;
	    }else{
	    	return false;
	    }
    }

    public function hora_llegada_check()
    {	     	
	    $hora_llegada = $this->input->post('hora_llegada');
	    $hora_servicio_salida = $this->input->post('hora_servicio_salida');
	    if ($hora_servicio_salida<$hora_llegada) {
	    	return true;
	    }else{
	    	return false;
	    }
    }

}