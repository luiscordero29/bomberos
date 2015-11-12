<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Administradores_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $sql = 
	    "SELECT * FROM usuarios 
	     WHERE (tipo = 'ADMINISTRADOR') 
	     AND (
	     	usuario LIKE '%".$search."%' ESCAPE '!' 
	     	OR correo LIKE '%".$search."%' ESCAPE '!' 
	     	OR identidad LIKE '%".$search."%' ESCAPE '!' 
	     	OR apellidos LIKE '%".$search."%' ESCAPE '!' 
	     	OR nombres LIKE '%".$search."%' ESCAPE '!' 
	     	OR activo LIKE '%".$search."%'  
	     	)
	     ORDER BY id_usuario DESC
	     LIMIT  ".$limit.",".$start."
	    ";
	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_rows($search)
	{

	    $sql = 
	    "SELECT * FROM usuarios 
	     WHERE (tipo = 'ADMINISTRADOR') 
	     AND (
	     	usuario LIKE '%".$search."%' ESCAPE '!' 
	     	OR correo LIKE '%".$search."%' ESCAPE '!' 
	     	OR identidad LIKE '%".$search."%' ESCAPE '!' 
	     	OR apellidos LIKE '%".$search."%' ESCAPE '!' 
	     	OR nombres LIKE '%".$search."%' ESCAPE '!' 
	     	OR activo LIKE '%".$search."%'  
	     	)
	     ORDER BY id_usuario DESC
	    ";
	    $query = $this->db->query($sql);

	    /* for foro
	    $this->db->order_by('id_usuario', 'DESC'); 
	    $this->db->like('usuario', $search); 
	    $this->db->or_like('correo', $search); 
	    $this->db->or_like('identidad', $search); 
	    $this->db->or_like('usuario', $search); 
	    $this->db->or_like('apellidos', $search); 
	    $this->db->or_like('nombres', $search);
	    $this->db->or_like('activo', $search);
	    $query = $this->db->get('usuarios');

	    SQL:
	    -- phpMyAdmin SQL Dump
		-- version 4.0.10deb1
		-- http://www.phpmyadmin.net
		--
		-- Servidor: localhost
		-- Tiempo de generaciÃ³n: 28-07-2015 a las 00:43:50
		-- VersiÃ³n del servidor: 5.5.43-0ubuntu0.14.04.1
		-- VersiÃ³n de PHP: 5.5.9-1ubuntu4.11

		SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
		SET time_zone = "+00:00";


		/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
		/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
		/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
		/*!40101 SET NAMES utf8 

		--
		-- Base de datos: `20151_dirsaludbarinas`
		--

		-- --------------------------------------------------------

		--
		-- Estructura de tabla para la tabla `usuarios`
		--

		CREATE TABLE IF NOT EXISTS `usuarios` (
		  `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
		  `usuario` varchar(15) DEFAULT NULL,
		  `clave` varchar(255) DEFAULT NULL,
		  `identidad` varchar(10) NOT NULL,
		  `apellidos` varchar(120) DEFAULT NULL,
		  `nombres` varchar(120) DEFAULT NULL,
		  `sexo` enum('MASCULINO','FEMENINO') DEFAULT NULL,
		  `fecha_nacimiento` date DEFAULT NULL,
		  `direccion` varchar(250) DEFAULT NULL,
		  `telefono` varchar(15) DEFAULT NULL,
		  `correo` varchar(255) DEFAULT NULL,
		  `activo` enum('SI','NO') DEFAULT 'NO',
		  `tipo` enum('USUARIO','ADMINISTRADOR') DEFAULT 'USUARIO',
		  `twitter` text NOT NULL,
		  `facebook` text NOT NULL,
		  `gplus` text NOT NULL,
		  `biografia` text NOT NULL,
		  `llave` text NOT NULL,
		  PRIMARY KEY (`id_usuario`),
		  UNIQUE KEY `identidad` (`identidad`),
		  UNIQUE KEY `user` (`usuario`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

		--
		-- Volcado de datos para la tabla `usuarios`
		--

		INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `identidad`, `apellidos`, `nombres`, `sexo`, `fecha_nacimiento`, `direccion`, `telefono`, `correo`, `activo`, `tipo`, `twitter`, `facebook`, `gplus`, `biografia`, `llave`) VALUES
		(1, 'administrador', '91f5167c34c400758115c2a6826ec2e3', '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, 'SI', 'ADMINISTRADOR', '', '', '', '', ''),
		(2, 'luiscordero29', 'de24d9153c776d6587ad0df708c8c1d2', '18118222', 'Cordero', 'Luis', NULL, '1990-01-01', 'Barinas', '04125269989', 'pastorluiscordero@gmail.com', 'SI', 'USUARIO', '', '', '', '', ''),
		(4, 'iralisgoyo', 'b3727bd830814adb6c61bbf7df32da7b', '0000000000', 'iralisgoyo', 'iralisgoyo', 'FEMENINO', '2000-01-01', 'BARINAS', '000000', 'iralisgoyo@gmail.com', 'SI', 'ADMINISTRADOR', '', '', '', '', ''),
		(6, 'saravane', 'c7a3c9257585e3dbad4295e6563db121', '18290222', 'colmenares angel', 'Sarahi Vanessa', 'FEMENINO', '2000-01-01', 'barinas', '04245353821', 'saravane_ca@hotmail.com', 'SI', 'ADMINISTRADOR', '', '', '', '', ''),
		(8, 'isabelherrera', '7a0b7848a963a7dc6f41a06ed8a3c8ee', '14377400', 'HERRERA', 'ISABEL', 'FEMENINO', '2000-01-01', 'BARINAS', '000000000000000', 'isajperiodista@gmail.com', 'SI', 'ADMINISTRADOR', '', '', '', '', ''),
		(10, 'kely1212', '0ab0096ed947f557e64c06749060f495', '18289407', 'DUGARTE', 'KELY', 'FEMENINO', '2015-07-18', 'BARINAS', '04125253951', 'KELYDUGATE@GMAIL.COM', 'SI', 'USUARIO', '', '', '', '', 'd3d9446802a44259755d38e6d163e820');

		/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT 
		/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS 
		/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION 
	    */

	    if($query->num_rows() > 0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return false;
	    }
	}

	function create()
	{
	    
	    $usuario 		= $this->input->post('usuario');
	    $clave 			= md5($this->input->post('identidad'));
	    $identidad 		= $this->input->post('identidad');
	   	$apellidos 		= $this->input->post('apellidos');
	   	$nombres 		= $this->input->post('nombres');
	   	$activo 		= $this->input->post('activo');	   	
	   	$sexo 			= $this->input->post('sexo');	   	
	   	$telefono 		= $this->input->post('telefono');	   	
	   	$direccion 		= $this->input->post('direccion');	   	
	   	$correo 		= $this->input->post('correo');
	   	$tipo 			= $this->input->post('tipo');

	   	$date_array 		= explode('/',$this->input->post('fecha_nacimiento'));
		$date_array 		= array_reverse($date_array);		
		$fecha_nacimiento 	= date(implode('-', $date_array));
	   	   	
	   	$data = array(
			'usuario' 			=> $usuario,
			'clave' 			=> $clave,
			'identidad' 		=> $identidad,
			'apellidos' 		=> $apellidos,
			'nombres' 			=> $nombres,
			'activo' 			=> $activo,
			'sexo' 				=> $sexo,
			'fecha_nacimiento' 	=> $fecha_nacimiento,
			'telefono' 			=> $telefono,
			'direccion' 		=> $direccion,
			'correo'			=> $correo,	 
			'tipo'				=> $tipo,	  
		);

		$this->db->insert('usuarios', $data); 
	    
	    return true;

	} 

	function read($id_usuario)
	{			    
	    
	    $query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario, 'tipo' => 'ADMINISTRADOR'));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function update()
	{
	    
	    $id_usuario = $this->input->post('id_usuario');

	    $usuario 		= $this->input->post('usuario');
	    $identidad 		= $this->input->post('identidad');
	   	$apellidos 		= $this->input->post('apellidos');
	   	$nombres 		= $this->input->post('nombres');
	   	$activo 		= $this->input->post('activo');	   	
	   	$sexo 			= $this->input->post('sexo');	   	
	   	$telefono 		= $this->input->post('telefono');	   	
	   	$direccion 		= $this->input->post('direccion');	   	
	   	$correo 		= $this->input->post('correo');
	   	$tipo 			= $this->input->post('tipo');

	   	$date_array 		= explode('/',$this->input->post('fecha_nacimiento'));
		$date_array 		= array_reverse($date_array);		
		$fecha_nacimiento 	= date(implode('-', $date_array));
	   	   	
	   	$data = array(
			'usuario' 			=> $usuario,
			'identidad' 		=> $identidad,
			'apellidos' 		=> $apellidos,
			'nombres' 			=> $nombres,
			'activo' 			=> $activo,
			'sexo' 				=> $sexo,
			'fecha_nacimiento' 	=> $fecha_nacimiento,
			'telefono' 			=> $telefono,
			'direccion' 		=> $direccion,
			'correo'			=> $correo,	 
			'tipo'				=> $tipo,	  
		);
	    
		$query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario, 'tipo' => 'ADMINISTRADOR'));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_usuario', $id_usuario);
			$this->db->update('usuarios', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_usuario)
	{
	   
	    $query = $this->db->get_where('categorias', array('id_usuario' => $id_usuario));	

	    if($query->num_rows() > 0)
	    {	      
	      	return false;
	    }

	    $query = $this->db->get_where('contenidos', array('id_usuario' => $id_usuario));	

	    if($query->num_rows() > 0)
	    {	      
	      	return false;
	    }

	    $query = $this->db->get_where('comentarios', array('id_usuario' => $id_usuario));	

	    if($query->num_rows() > 0)
	    {	      
	      	return false;
	    }

	    $query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario, 'tipo' => 'ADMINISTRADOR'));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_usuario', $id_usuario);
			$this->db->delete('usuarios'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}	

	function usuario_check()
	{		
	    $usuario 		= $this->input->post('usuario');
	    $id_usuario 	= $this->input->post('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'tipo' => 'ADMINISTRADOR', 'usuario' => $usuario));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function correo_check()
	{		
	    $correo 		= $this->input->post('correo');
	    $id_usuario 	= $this->input->post('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'tipo' => 'ADMINISTRADOR', 'correo' => $correo));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function identidad_check()
	{		
	    $identidad 		= $this->input->post('identidad');
	    $id_usuario 	= $this->input->post('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'tipo' => 'ADMINISTRADOR', 'identidad' => $identidad));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

}