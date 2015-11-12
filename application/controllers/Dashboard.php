<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Dashboard.
	 *
	 * autor: Ing. Luis Cordero
	 * site: http://www.luiscordero29.com
	 * mail: info@luiscordero29.com
	 *
	 **/
	
	public $controller = "dashboard";

	public function __construct()
	{
		parent::__construct();		
		$this->load->driver('session');
		$this->load->model('Dashboard_model','',TRUE); 
		// Control Sessión
		if(!$this->session->has_userdata('id_usuario'))
   		{     						
		    //If no session, redirect to login page
		    redirect('account/logout');
	
		}
	}

	public function index()
	{
		$data['breadcrumbs'] = 
			array(
	            '<i class="fa fa-fw fa-home"></i> Tablero Principal'			=> 'dashboard/index',
	            'Panel de Control'		=> '',        	
	        );

		$data['e_years'] = $this->Dashboard_model->e_years();
		
		$this->load->view($this->controller.'/index',$data);	

	}

	public function backup()
	{
		if($this->session->userdata('tipo')==='ADMINISTRADOR')
   		{

   			$prefs = array(
                'format'      => 'txt',             // gzip, zip, txt
                'filename'    => 'backup-'.date("Y-m-d_H-m-s").'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

   			$this->load->dbutil();

   			// Backup your entire database and assign it to a variable
			$backup =& $this->dbutil->backup($prefs);

			// Load the file helper and write the file to your server
			$this->load->helper('file');
			write_file('./assets/uploads/backup/backup-'.date("Y-m-d_H-m-s").'.sql', $backup);

			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('backup-'.date("Y-m-d_H-m-s").'.sql', $backup);         
	        
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('login');
	   	}

	}

}
