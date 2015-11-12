<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Pdf_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function read_documento($id_documento)
	{			    
	    
	    $this->db->join('estados', 'estados.id_estado = documentos.id_estado','left');
	    $this->db->join('municipios', 'municipios.id_municipio = documentos.id_municipio','left');
	    $this->db->join('parroquias', 'parroquias.id_parroquia = documentos.id_parroquia','left');
	    $query = $this->db->get_where('documentos', array('id_documento' => $id_documento));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_vehiculos($id_documento)
	{
	    $this->db->join('tipos', 'tipos.id_tipo = vehiculos.id_tipo','left');
	    $this->db->join('marcas', 'marcas.id_marca = vehiculos.id_marca','left');
	    $this->db->join('modelos', 'modelos.id_modelo = vehiculos.id_modelo','left');
	    $this->db->join('clases', 'clases.id_clase = vehiculos.id_clase','left');
	    $this->db->join('colores', 'colores.id_color = vehiculos.id_color','left');
	    $this->db->join('usuarios', 'usuarios.id_usuario = vehiculos.id_usuario','left');
	    $this->db->order_by('id_vehiculo', 'DESC'); 
	    $this->db->where('vehiculos.id_documento', $id_documento); 
	    $query = $this->db->get('vehiculos');

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_organismos($id_documento)
	{

	    $this->db->select('organismos.*, usuarios.usuario');
	    $this->db->join('usuarios', 'usuarios.id_usuario = organismos.id_usuario','left');
	    $this->db->order_by('id_organismo', 'DESC'); 
	    $this->db->where('organismos.id_documento', $id_documento); 
	    $query = $this->db->get('organismos');

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function e_years()
	{

	    $this->db->select('year(fecha) as tyear');
	    $this->db->group_by('year(fecha)');
	    $query = $this->db->get('documentos');

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function e_months($year)
	{

	    $this->db->select('month(fecha) as tmonth');
	    $this->db->group_by('month(fecha)');
	    $this->db->where('year(fecha)',$year);
	    $query = $this->db->get('documentos');

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function e_years_months($year,$month)
	{

	    $this->db->select('*, count(*) as cantidad');
	    $this->db->group_by('documentos.tipo_documento');
	    $this->db->join('estados', 'estados.id_estado = documentos.id_estado','left');
	    $this->db->join('municipios', 'municipios.id_municipio = documentos.id_municipio','left');
	    $this->db->join('parroquias', 'parroquias.id_parroquia = documentos.id_parroquia','left');
	    $this->db->order_by('id_documento', 'DESC'); 
	    $this->db->where('year(fecha)',$year);
	    $this->db->where('month(fecha)',$month);
	    $query = $this->db->get('documentos');

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	public function mes($mes)
	{
		$meses = array('','ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');
		return $meses[$mes];	    
	}

	public function tipo_documento($tipo_documento)
	{
		switch ($tipo_documento) {
			case 'REPORTE_ACCIDENTE_TRANSITO':
				return 'Reporte Accidente Transito';
				break;

			case 'REPORTE_SERVICIO_AMBULANCIA':
				return 'Reporte de Servicio de Ambulancia';
				break;

			case 'REPORTE_INCENDIO_ESTRUCTURA':
				return 'Reporte  Incendio de Estructura';
				break;

			case 'REPORTE_INCENDIO_VEHICULAR':
				return 'Reporte de Incendio Vehicular';
				break;

			case 'REPORTE_INCENDIO_FORESTAL_VEGETACION':
				return 'Reporte  Incendio Forestal y Vegetación';
				break;

			case 'REPORTE_SERVICIO_ESPECIAL':
				return 'Reporte  Servicio Especial';
				break;

			case 'REPORTE_GUARDIA':
				return 'Reporte  Guardia de Seguridad Prevención';
				break;
			
			default:
				return $tipo_documento;
				break;
		}    
	}

}