-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2015 at 06:12 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2015_bomberos`
--

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
`id_clase` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `clase` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `clases`
--

INSERT INTO `clases` (`id_clase`, `id_usuario`, `clase`) VALUES
(3, 1, 'COUPE'),
(4, 1, 'SEDAN'),
(5, 1, 'CAMIONETA');

-- --------------------------------------------------------

--
-- Table structure for table `colores`
--

CREATE TABLE IF NOT EXISTS `colores` (
`id_color` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `colores`
--

INSERT INTO `colores` (`id_color`, `id_usuario`, `color`) VALUES
(3, 1, 'ROJO'),
(4, 1, 'AMARILLO');

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
`id_documento` bigint(20) unsigned zerofill NOT NULL,
  `tipo_documento` enum('REPORTE_ACCIDENTE_TRANSITO','REPORTE_SERVICIO_AMBULANCIA','REPORTE_INCENDIO_ESTRUCTURA','REPORTE_INCENDIO_VEHICULAR','REPORTE_INCENDIO_FORESTAL_VEGETACION','REPORTE_SERVICIO_ESPECIAL','REPORTE_GUARDIA') DEFAULT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `aviso` enum('TELEFONO','RADIAL','VERBAL') DEFAULT NULL,
  `solicitado` varchar(255) DEFAULT NULL,
  `recibido` varchar(255) DEFAULT NULL,
  `ordenado` varchar(255) DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `hora_servicio_llegada` time DEFAULT NULL,
  `hora_servicio_salida` time DEFAULT NULL,
  `hora_llegada` time DEFAULT NULL,
  `duracion` varchar(255) DEFAULT NULL,
  `uvir` varchar(255) DEFAULT NULL,
  `uvir_cp` varchar(255) DEFAULT NULL,
  `uvir_am` varchar(255) DEFAULT NULL,
  `uvir_ap` varchar(255) DEFAULT NULL,
  `uvir_tipo` enum('EXTRICACION','PREVENCION','ACTO DE PRESENCIA','') NOT NULL,
  `uvir_presencia` varchar(255) DEFAULT NULL,
  `uamb` varchar(255) DEFAULT NULL,
  `uamb_cp` varchar(255) DEFAULT NULL,
  `uamb_am` varchar(255) DEFAULT NULL,
  `uamb_desde` varchar(255) DEFAULT NULL,
  `uamb_hasta` varchar(255) DEFAULT NULL,
  `uamb_recibido` varchar(255) DEFAULT NULL,
  `uamb_mpps` char(30) DEFAULT NULL,
  `traslado` enum('SI','NO') DEFAULT NULL,
  `id_estado` bigint(20) DEFAULT NULL,
  `id_municipio` bigint(20) DEFAULT NULL,
  `id_parroquia` bigint(20) DEFAULT NULL,
  `sitio_suceso` text,
  `tipo_suceso` text,
  `n_lesionados` bigint(20) DEFAULT '0',
  `n_fallecidos` bigint(20) DEFAULT '0',
  `observaciones` text,
  `comandante_servicio` varchar(255) DEFAULT NULL,
  `jefe_seccion` varchar(255) DEFAULT NULL,
  `jefe_operaciones` varchar(255) DEFAULT NULL,
  `comandancia` varchar(255) DEFAULT NULL,
  `paciente_apellidos` varchar(255) DEFAULT NULL,
  `paciente_nombres` varchar(255) DEFAULT NULL,
  `paciente_identidad` char(15) DEFAULT NULL,
  `paciente_edad` int(3) DEFAULT NULL,
  `paciente_telefono` char(30) DEFAULT NULL,
  `paciente_residencia` varchar(255) DEFAULT NULL,
  `paciente_tipo_traslado` varchar(255) DEFAULT NULL,
  `paciente_sv_ppm` char(30) DEFAULT NULL,
  `paciente_sv_rpm` char(30) DEFAULT NULL,
  `paciente_sv_temp` char(30) DEFAULT NULL,
  `paciente_sv_pa` char(30) DEFAULT NULL,
  `paciente_dx` varchar(255) DEFAULT NULL,
  `paciente_ocasionado` varchar(255) DEFAULT NULL,
  `paciente_ac_apellidos` varchar(255) DEFAULT NULL,
  `paciente_ac_nombres` varchar(255) DEFAULT NULL,
  `paciente_ac_identidad` char(15) DEFAULT NULL,
  `paciente_ac_edad` int(3) DEFAULT NULL,
  `paciente_ac_telefono` char(30) DEFAULT NULL,
  `paciente_nexo` varchar(255) DEFAULT NULL,
  `inmueble_direccion` varchar(255) DEFAULT NULL,
  `inmueble_propietario` varchar(255) DEFAULT NULL,
  `inmueble_propietario_identidad` char(15) DEFAULT NULL,
  `inmueble_propietario_edad` int(3) DEFAULT NULL,
  `inmueble_tipo_estructura` varchar(255) DEFAULT NULL,
  `inmueble_oc_forma_entrada` varchar(255) DEFAULT NULL,
  `inmueble_oc_materiales` text,
  `inmueble_oc_tecnicas` text,
  `inmueble_oc_zonas` text,
  `inmueble_oc_agua` enum('SI','NO') DEFAULT NULL,
  `inmueble_oc_agua_cantidad` char(30) DEFAULT NULL,
  `inmueble_oc_espuma` enum('SI','NO') DEFAULT NULL,
  `inmueble_oc_espuma_cantidad` char(30) DEFAULT NULL,
  `inmueble_oc_extintor` enum('SI','NO') DEFAULT NULL,
  `inmueble_oc_extintor_cantidad` char(30) DEFAULT NULL,
  `vehiculo_oc_materiales` text,
  `vehiculo_oc_tecnicas` text,
  `vehiculo_oc_zonas` text,
  `vehiculo_oc_agua` enum('SI','NO') DEFAULT NULL,
  `vehiculo_oc_agua_cantidad` char(30) DEFAULT NULL,
  `vehiculo_oc_espuma` enum('SI','NO') DEFAULT NULL,
  `vehiculo_oc_espuma_cantidad` char(30) DEFAULT NULL,
  `vehiculo_oc_extintor` enum('SI','NO') DEFAULT NULL,
  `vehiculo_oc_extintor_cantidad` char(30) DEFAULT NULL,
  `terreno_direccion` varchar(255) DEFAULT NULL,
  `terreno_tipo` enum('BALDIO','EJIDO','PRIVADO') DEFAULT NULL,
  `terreno_propietario` varchar(255) DEFAULT NULL,
  `terreno_vegetacion` varchar(255) DEFAULT NULL,
  `terreno_topografia` varchar(255) DEFAULT NULL,
  `terreno_area` varchar(255) DEFAULT NULL,
  `terreno_cortafuego` char(30) DEFAULT NULL,
  `terreno_largo` char(30) DEFAULT NULL,
  `terreno_ancho` char(30) DEFAULT NULL,
  `terreno_natural` char(30) DEFAULT NULL,
  `terreno_artificial` char(30) DEFAULT NULL,
  `terreno_oc_agua` enum('SI','NO') DEFAULT NULL,
  `terreno_oc_agua_cantidad` char(30) DEFAULT NULL,
  `terreno_oc_espuma` enum('SI','NO') DEFAULT NULL,
  `terreno_oc_espuma_cantidad` char(30) DEFAULT NULL,
  `servicio_tipo` varchar(255) DEFAULT NULL,
  `servicio_motivacion` varchar(255) DEFAULT NULL,
  `servicio_direccion` varchar(255) DEFAULT NULL,
  `servicio_persona` varchar(255) DEFAULT NULL,
  `servicio_persona_edad` int(3) DEFAULT NULL,
  `servicio_persona_identidad` char(15) DEFAULT NULL,
  `servicio_persona_telefono` char(30) DEFAULT NULL,
  `servicio_materiales` text
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id_documento`, `tipo_documento`, `id_usuario`, `fecha`, `aviso`, `solicitado`, `recibido`, `ordenado`, `hora_salida`, `hora_servicio_llegada`, `hora_servicio_salida`, `hora_llegada`, `duracion`, `uvir`, `uvir_cp`, `uvir_am`, `uvir_ap`, `uvir_tipo`, `uvir_presencia`, `uamb`, `uamb_cp`, `uamb_am`, `uamb_desde`, `uamb_hasta`, `uamb_recibido`, `uamb_mpps`, `traslado`, `id_estado`, `id_municipio`, `id_parroquia`, `sitio_suceso`, `tipo_suceso`, `n_lesionados`, `n_fallecidos`, `observaciones`, `comandante_servicio`, `jefe_seccion`, `jefe_operaciones`, `comandancia`, `paciente_apellidos`, `paciente_nombres`, `paciente_identidad`, `paciente_edad`, `paciente_telefono`, `paciente_residencia`, `paciente_tipo_traslado`, `paciente_sv_ppm`, `paciente_sv_rpm`, `paciente_sv_temp`, `paciente_sv_pa`, `paciente_dx`, `paciente_ocasionado`, `paciente_ac_apellidos`, `paciente_ac_nombres`, `paciente_ac_identidad`, `paciente_ac_edad`, `paciente_ac_telefono`, `paciente_nexo`, `inmueble_direccion`, `inmueble_propietario`, `inmueble_propietario_identidad`, `inmueble_propietario_edad`, `inmueble_tipo_estructura`, `inmueble_oc_forma_entrada`, `inmueble_oc_materiales`, `inmueble_oc_tecnicas`, `inmueble_oc_zonas`, `inmueble_oc_agua`, `inmueble_oc_agua_cantidad`, `inmueble_oc_espuma`, `inmueble_oc_espuma_cantidad`, `inmueble_oc_extintor`, `inmueble_oc_extintor_cantidad`, `vehiculo_oc_materiales`, `vehiculo_oc_tecnicas`, `vehiculo_oc_zonas`, `vehiculo_oc_agua`, `vehiculo_oc_agua_cantidad`, `vehiculo_oc_espuma`, `vehiculo_oc_espuma_cantidad`, `vehiculo_oc_extintor`, `vehiculo_oc_extintor_cantidad`, `terreno_direccion`, `terreno_tipo`, `terreno_propietario`, `terreno_vegetacion`, `terreno_topografia`, `terreno_area`, `terreno_cortafuego`, `terreno_largo`, `terreno_ancho`, `terreno_natural`, `terreno_artificial`, `terreno_oc_agua`, `terreno_oc_agua_cantidad`, `terreno_oc_espuma`, `terreno_oc_espuma_cantidad`, `servicio_tipo`, `servicio_motivacion`, `servicio_direccion`, `servicio_persona`, `servicio_persona_edad`, `servicio_persona_identidad`, `servicio_persona_telefono`, `servicio_materiales`) VALUES
(00000000000000000011, 'REPORTE_ACCIDENTE_TRANSITO', 1, '2015-10-17', 'RADIAL', 'asd', 'ad', 'asd', '04:22:00', '04:23:00', '04:24:00', '04:26:00', '00:04:00', '', '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '', 4, 8, 1, 'ads', 'asd', 1, 1, 'asdasd', 'asd', 'as', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(00000000000000000012, 'REPORTE_SERVICIO_AMBULANCIA', 1, '2015-10-19', 'TELEFONO', 'LUIS ALFREDO', 'asd', 'asd', '01:52:00', '01:54:00', '01:56:00', '01:58:00', '00:06:00', NULL, NULL, NULL, NULL, 'EXTRICACION', NULL, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, 4, 8, 1, NULL, NULL, 0, 0, 'asd', 'LUIS', 'asdas', 'asd', 'asd', 'ad', 'asd', '123456789', 12, '123456789', 'asd', 'asd', '12', '12', '12', '12', NULL, 'asd', '12', '12', '12', 12, '12', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(00000000000000000013, 'REPORTE_SERVICIO_AMBULANCIA', 1, '2015-10-19', 'TELEFONO', 'ada', 'asd', 'asd', '01:57:00', '02:00:00', '02:02:00', '02:07:00', '00:10:00', NULL, NULL, NULL, NULL, '', NULL, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, 4, 8, 1, NULL, NULL, NULL, NULL, 'as', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '12346789', 12, '123456789', '12', '12', '12', '12', '12', '12', 'asdasd', '12', '12', '12', '1223456789', 12, '123456789', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(00000000000000000014, 'REPORTE_INCENDIO_ESTRUCTURA', 1, '2015-10-19', 'TELEFONO', 'asd', 'asd', 'asd', '18:25:00', '18:26:00', '18:27:00', '18:30:00', '00:05:00', 'asd', 'asd', 'asd', 'asd', 'EXTRICACION', 'SI', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, 'NO', 4, 8, 1, NULL, 'asd', 12, 12, 'asd', 'asd', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asd', 'asd', '123456789', 12, 'asd', 'asd', 'asd', 'asd', 'asd', 'NO', '12', 'SI', '12', 'SI', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(00000000000000000015, 'REPORTE_INCENDIO_VEHICULAR', 1, '2015-10-24', 'TELEFONO', 'asd', 'asd', 'asd', '00:06:00', '00:07:00', '00:08:00', '00:11:00', '00:05:00', 'asd', 'asd', 'asd', 'asd', 'EXTRICACION', 'SI', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, 'NO', 4, 8, 1, NULL, 'asd', 12, 12, 'asd', 'asd', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asd', 'asd', 'asd', 'NO', '12', 'NO', '12', 'SI', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(00000000000000000016, 'REPORTE_INCENDIO_FORESTAL_VEGETACION', 1, '2015-10-24', 'TELEFONO', 'asd', 'asd', 'asd', '04:20:00', '04:21:00', '04:23:00', '04:25:00', '00:05:00', 'asd', 'asd', 'asd', 'asd', 'EXTRICACION', 'SI', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, 'NO', 4, 8, 1, NULL, 'asd', 0, 0, 'asd', 'asd', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asd', 'BALDIO', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'NO', '12', 'NO', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(00000000000000000017, 'REPORTE_SERVICIO_ESPECIAL', 1, '2015-10-24', 'TELEFONO', 'ASD', 'ASD', 'ASD', '05:26:00', '05:27:00', '05:28:00', '05:33:00', '00:07:00', 'ASD', 'ASD', 'ASD', 'ASD', 'EXTRICACION', 'SI', 'ASD', 'ASD', 'ASD', NULL, NULL, NULL, NULL, 'NO', 4, 8, 1, NULL, NULL, 0, 0, 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ASD', 'SDA', 'AD', 'ASD', 12, '123456789', '123456', 'ASD'),
(00000000000000000018, 'REPORTE_GUARDIA', 1, '2015-10-24', 'RADIAL', 'ASD', 'ASD', 'ASD', '18:04:00', '18:06:00', '18:08:00', '18:11:00', '00:07:00', 'ASD', 'ASD', 'ASD', 'ASD', 'EXTRICACION', 'SI', 'ASD', 'ASD', 'ASD', NULL, NULL, NULL, NULL, 'NO', 4, 8, 1, NULL, NULL, 0, 0, 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ASD', 'ASD', 'ASD', 'ASD', 12, '123456789', '123456789', 'ASD'),
(00000000000000000019, 'REPORTE_ACCIDENTE_TRANSITO', 1, '2015-10-31', 'RADIAL', 'ASD', 'ASD', 'ASD', '16:26:00', '16:27:00', '16:28:00', '16:29:00', '00:03:00', 'ASD', 'ASD', 'ASD', 'ASD', 'EXTRICACION', NULL, 'ASD', 'ASD', 'ASD', NULL, NULL, NULL, NULL, 'NO', 4, 8, 1, 'ASD', 'ASD', 1, 2, '', 'ASD', 'ASD', 'ASD', 'ASD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
`id_estado` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id_estado`, `id_usuario`, `estado`) VALUES
(3, 1, 'MERIDA'),
(4, 1, 'BARINAS');

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
`id_marca` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id_marca`, `id_usuario`, `marca`) VALUES
(3, 1, 'FORD'),
(4, 1, 'CHEVROLET');

-- --------------------------------------------------------

--
-- Table structure for table `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
`id_modelo` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `id_marca` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `modelos`
--

INSERT INTO `modelos` (`id_modelo`, `id_usuario`, `modelo`, `id_marca`) VALUES
(1, 1, 'CORSA', 4);

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
`id_municipio` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `id_estado` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `id_usuario`, `municipio`, `id_estado`) VALUES
(7, 1, 'MERIDA', 3),
(8, 1, 'BARINAS', 4),
(9, 1, 'PEDRAZA', 4),
(10, 1, 'BARINITAS', 4);

-- --------------------------------------------------------

--
-- Table structure for table `organismos`
--

CREATE TABLE IF NOT EXISTS `organismos` (
`id_organismo` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `id_documento` bigint(20) unsigned zerofill DEFAULT NULL,
  `unidad` varchar(255) DEFAULT NULL,
  `dependencia` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `am` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `organismos`
--

INSERT INTO `organismos` (`id_organismo`, `id_usuario`, `id_documento`, `unidad`, `dependencia`, `cp`, `am`) VALUES
(1, 1, NULL, 'ASDadasd', 'ASDasd', 'ASDa', 'ASDsad'),
(3, 1, NULL, 'asd', 'asd', 'asd', 'asd'),
(4, 1, 00000000000000000011, 'asd', 'sd', 'as', 'ASDsad'),
(5, 1, 00000000000000000013, 'asd', 'asd', 'asd', 'asd'),
(6, 1, 00000000000000000019, 'ASD', 'ASD', 'ASD', 'ASD');

-- --------------------------------------------------------

--
-- Table structure for table `parroquias`
--

CREATE TABLE IF NOT EXISTS `parroquias` (
`id_parroquia` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `parroquia` varchar(255) DEFAULT NULL,
  `id_municipio` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `parroquias`
--

INSERT INTO `parroquias` (`id_parroquia`, `id_usuario`, `parroquia`, `id_municipio`) VALUES
(1, 1, 'BARINAS', 8),
(2, 1, 'BARINITAS', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
`id_tipo` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `id_usuario`, `tipo`) VALUES
(3, 1, 'TIPO 2'),
(4, 1, 'TIPO 1');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` bigint(20) NOT NULL,
  `usuario` char(15) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `identidad` char(10) DEFAULT NULL,
  `apellidos` varchar(120) DEFAULT NULL,
  `nombres` varchar(120) DEFAULT NULL,
  `sexo` enum('MASCULINO','FEMENINO') DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` char(15) DEFAULT NULL,
  `tipo` enum('ADMINISTRADOR','USUARIO') DEFAULT 'USUARIO',
  `activo` enum('SI','NO') DEFAULT 'NO',
  `llave` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `identidad`, `apellidos`, `nombres`, `sexo`, `fecha_nacimiento`, `correo`, `direccion`, `telefono`, `tipo`, `activo`, `llave`) VALUES
(1, 'administrador', '1db5e250b2f7d8fddc4f5e939dd33b38', '18118223', 'CORDERO', 'LUIS', 'MASCULINO', '1999-12-27', 'correo@hotmail.com', 'BARINAS', '04125269989', 'ADMINISTRADOR', 'SI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE IF NOT EXISTS `vehiculos` (
`id_vehiculo` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `id_documento` bigint(20) unsigned zerofill DEFAULT NULL,
  `placa` char(30) DEFAULT NULL,
  `id_tipo` bigint(20) DEFAULT NULL,
  `id_marca` bigint(20) DEFAULT NULL,
  `id_modelo` bigint(20) DEFAULT NULL,
  `id_clase` bigint(20) DEFAULT NULL,
  `id_color` bigint(20) DEFAULT NULL,
  `ano` char(4) DEFAULT NULL,
  `propietario` varchar(255) DEFAULT NULL,
  `propietario_identidad` char(15) DEFAULT NULL,
  `propietario_edad` tinyint(4) DEFAULT NULL,
  `conductor` varchar(255) DEFAULT NULL,
  `conductor_identidad` char(15) DEFAULT NULL,
  `conductor_edad` tinyint(4) DEFAULT NULL,
  `conductor_residencia` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `id_usuario`, `id_documento`, `placa`, `id_tipo`, `id_marca`, `id_modelo`, `id_clase`, `id_color`, `ano`, `propietario`, `propietario_identidad`, `propietario_edad`, `conductor`, `conductor_identidad`, `conductor_edad`, `conductor_residencia`) VALUES
(1, 1, 00000000000000000011, '123123123', 4, 4, 1, 4, 4, '2015', 'asd', '12456987', 78, 'asd', '78242225', 12, 'sdasd'),
(2, 1, 00000000000000000015, '12345321', 4, 4, 1, 4, 4, '1202', 'asd', '123456789', 12, 'asd', '12346987', 25, 'asd'),
(3, 1, 00000000000000000019, '123', 4, 4, 1, 5, 4, '2015', 'ASD', '123456789', 12, 'ASDA', '12345697', 23, 'ASDASD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clases`
--
ALTER TABLE `clases`
 ADD PRIMARY KEY (`id_clase`), ADD KEY `clases_id_usuario` (`id_usuario`) USING BTREE;

--
-- Indexes for table `colores`
--
ALTER TABLE `colores`
 ADD PRIMARY KEY (`id_color`), ADD KEY `colores_id_usuario` (`id_usuario`) USING BTREE;

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
 ADD PRIMARY KEY (`id_documento`), ADD KEY `documentos_id_usuario` (`id_usuario`) USING BTREE, ADD KEY `documentos_id_estado` (`id_estado`) USING BTREE, ADD KEY `documentos_id_municipio` (`id_municipio`), ADD KEY `documentos_id_parroquia` (`id_parroquia`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
 ADD PRIMARY KEY (`id_estado`), ADD KEY `estados_id_estado` (`id_usuario`) USING BTREE;

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
 ADD PRIMARY KEY (`id_marca`), ADD KEY `estados_id_usuario` (`id_usuario`) USING BTREE;

--
-- Indexes for table `modelos`
--
ALTER TABLE `modelos`
 ADD PRIMARY KEY (`id_modelo`), ADD KEY `modelos_id_usuario` (`id_usuario`) USING BTREE, ADD KEY `modelos_id_marca` (`id_marca`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
 ADD PRIMARY KEY (`id_municipio`), ADD KEY `municipios_id_usuario` (`id_usuario`) USING BTREE, ADD KEY `municipios_id_estado` (`id_estado`);

--
-- Indexes for table `organismos`
--
ALTER TABLE `organismos`
 ADD PRIMARY KEY (`id_organismo`), ADD KEY `organismos_id_usuario` (`id_usuario`) USING BTREE, ADD KEY `organismos_id_documento` (`id_documento`) USING BTREE;

--
-- Indexes for table `parroquias`
--
ALTER TABLE `parroquias`
 ADD PRIMARY KEY (`id_parroquia`), ADD KEY `parroquias_id_usuario` (`id_usuario`) USING BTREE, ADD KEY `parroquias_id_municipio` (`id_municipio`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
 ADD PRIMARY KEY (`id_tipo`), ADD KEY `tipos_id_usuario` (`id_usuario`) USING BTREE;

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`), ADD UNIQUE KEY `usuario` (`usuario`), ADD UNIQUE KEY `identidad` (`identidad`), ADD UNIQUE KEY `correo` (`correo`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
 ADD PRIMARY KEY (`id_vehiculo`), ADD KEY `vehiculos_id_usuario` (`id_usuario`) USING BTREE, ADD KEY `vehiculos_id_documento` (`id_documento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clases`
--
ALTER TABLE `clases`
MODIFY `id_clase` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `colores`
--
ALTER TABLE `colores`
MODIFY `id_color` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
MODIFY `id_documento` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
MODIFY `id_estado` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
MODIFY `id_marca` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modelos`
--
ALTER TABLE `modelos`
MODIFY `id_modelo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
MODIFY `id_municipio` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `organismos`
--
ALTER TABLE `organismos`
MODIFY `id_organismo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `parroquias`
--
ALTER TABLE `parroquias`
MODIFY `id_parroquia` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
MODIFY `id_tipo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
MODIFY `id_vehiculo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clases`
--
ALTER TABLE `clases`
ADD CONSTRAINT `clases_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `colores`
--
ALTER TABLE `colores`
ADD CONSTRAINT `colores_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documentos`
--
ALTER TABLE `documentos`
ADD CONSTRAINT `documentos_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `documentos_id_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `documentos_id_parroquia` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquias` (`id_parroquia`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `documentos_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estados`
--
ALTER TABLE `estados`
ADD CONSTRAINT `estados_id_estado` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marcas`
--
ALTER TABLE `marcas`
ADD CONSTRAINT `marcas_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modelos`
--
ALTER TABLE `modelos`
ADD CONSTRAINT `modelos_id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `modelos_id_modelo` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `municipios`
--
ALTER TABLE `municipios`
ADD CONSTRAINT `municipios_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `municipios_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organismos`
--
ALTER TABLE `organismos`
ADD CONSTRAINT `organismos_id_documento` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id_documento`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `organismos_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parroquias`
--
ALTER TABLE `parroquias`
ADD CONSTRAINT `parroquias_id_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `parroquias_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tipos`
--
ALTER TABLE `tipos`
ADD CONSTRAINT `tipos_id_tipo` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehiculos`
--
ALTER TABLE `vehiculos`
ADD CONSTRAINT `vehiculos_id_documento` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id_documento`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `vehiculos_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
