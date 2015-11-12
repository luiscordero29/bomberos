<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pdf extends CI_Controller {
		
	public $controller = "pdf";

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->driver('session');
		$this->load->model('Pdf_model','',TRUE);
		$this->load->helper('pdf_helper');
		$this->load->helper('nc_helper');

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

	public function index()
	{
		redirect('dashboard/index');		
	}	

	public function documento_1($id_documento)
	{
					    
		if($id_documento===FALSE)
		{
			redirect('dashboard/index');			
		}

		$data['r'] = $this->Pdf_model->read_documento($id_documento);
		$data['vehiculos'] = $this->Pdf_model->table_vehiculos($id_documento);
		$data['organismos'] = $this->Pdf_model->table_organismos($id_documento);
		
		if(empty($data['r']))
		{
			redirect('dashboard/index');	
		}

		$this->load->view('pdf/documento_1',$data);
	}	

	public function documento_2($id_documento)
	{
					    
		if($id_documento===FALSE)
		{
			redirect('dashboard/index');			
		}

		$data['r'] = $this->Pdf_model->read_documento($id_documento);
		$data['organismos'] = $this->Pdf_model->table_organismos($id_documento);
		
		if(empty($data['r']))
		{
			redirect('dashboard/index');	
		}

		$this->load->view('pdf/documento_2',$data);
	}

	public function documento_3($id_documento)
	{
					    
		if($id_documento===FALSE)
		{
			redirect('dashboard/index');			
		}

		$data['r'] = $this->Pdf_model->read_documento($id_documento);
		$data['organismos'] = $this->Pdf_model->table_organismos($id_documento);
		
		if(empty($data['r']))
		{
			redirect('dashboard/index');	
		}

		$this->load->view('pdf/documento_3',$data);
	}

	public function documento_4($id_documento)
	{
					    
		if($id_documento===FALSE)
		{
			redirect('dashboard/index');			
		}

		$data['r'] = $this->Pdf_model->read_documento($id_documento);
		$data['vehiculos'] = $this->Pdf_model->table_vehiculos($id_documento);
		$data['organismos'] = $this->Pdf_model->table_organismos($id_documento);
		
		if(empty($data['r']))
		{
			redirect('dashboard/index');	
		}

		$this->load->view('pdf/documento_4',$data);
	}

	public function documento_5($id_documento)
	{
					    
		if($id_documento===FALSE)
		{
			redirect('dashboard/index');			
		}

		$data['r'] = $this->Pdf_model->read_documento($id_documento);
		$data['organismos'] = $this->Pdf_model->table_organismos($id_documento);
		
		if(empty($data['r']))
		{
			redirect('dashboard/index');	
		}

		$this->load->view('pdf/documento_5',$data);
	}

	public function documento_6($id_documento)
	{
					    
		if($id_documento===FALSE)
		{
			redirect('dashboard/index');			
		}

		$data['r'] = $this->Pdf_model->read_documento($id_documento);
		$data['vehiculos'] = $this->Pdf_model->table_vehiculos($id_documento);
		$data['organismos'] = $this->Pdf_model->table_organismos($id_documento);
		
		if(empty($data['r']))
		{
			redirect('dashboard/index');	
		}

		$this->load->view('pdf/documento_6',$data);
	}

	public function documento_7($id_documento)
	{
					    
		if($id_documento===FALSE)
		{
			redirect('dashboard/index');			
		}

		$data['r'] = $this->Pdf_model->read_documento($id_documento);
		$data['vehiculos'] = $this->Pdf_model->table_vehiculos($id_documento);
		$data['organismos'] = $this->Pdf_model->table_organismos($id_documento);
		
		if(empty($data['r']))
		{
			redirect('dashboard/index');	
		}

		$this->load->view('pdf/documento_7',$data);
	}

	public function estadisticas()
	{
					    
		$data['e_years'] = $this->Pdf_model->e_years();
		$this->load->view('pdf/estadisticas',$data);  		    		    
		    
	}
}