<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('dashboard/index'); ?>">INTRAVIAL</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i> <?php echo $this->session->userdata('usuario') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('account/index'); ?>"><i class="fa fa-fw fa-user"></i> Mi Cuenta</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('account/profile'); ?>"><i class="fa fa-fw fa-edit"></i> Editar Datos</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('account/upload'); ?>"><i class="fa fa-fw fa-picture-o"></i> Subir Imagen</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('account/password'); ?>"><i class="fa fa-fw fa-gear"></i> Cambiar Clave</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url('account/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesi&oacute;n</a>
                        </li>
                    </ul>
                </li>
          </ul>
        </div>
      </div>
    </nav>