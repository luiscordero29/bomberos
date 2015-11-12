<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>
        <?php if ($this->uri->segment(2) == 'create'): ?>  
          Crear Servicio Especial - CUERPO DE BOMBEROS Y BOMBERAS UNIVERSITARIOS “MAYOR (B) (†) EVERARDO LEÓN TORRES”
        <?php elseif ($this->uri->segment(2) == 'update'): ?>  
          Editar Servicio Especial - CUERPO DE BOMBEROS Y BOMBERAS UNIVERSITARIOS “MAYOR (B) (†) EVERARDO LEÓN TORRES”
        <?php elseif ($this->uri->segment(2) == 'delete'): ?>  
          Eliminar Servicio Especial - CUERPO DE BOMBEROS Y BOMBERAS UNIVERSITARIOS “MAYOR (B) (†) EVERARDO LEÓN TORRES”
        <?php else: ?>  
          Tabla de Servicio Especial - CUERPO DE BOMBEROS Y BOMBERAS UNIVERSITARIOS “MAYOR (B) (†) EVERARDO LEÓN TORRES”
        <?php endif ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/dashboard/css/dashboard.css" rel="stylesheet">

    <!-- font-awesome -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- datetimepiker -->
    <link href="<?php echo base_url(); ?>assets/datetimepicker/css/jquery.datetimepicker.css" rel="stylesheet">

    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="<?php echo base_url(); ?>assets/material-design/css/roboto.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/material-design/css/material.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/material-design/css/ripples.min.css" rel="stylesheet">
  </head>

  <body>