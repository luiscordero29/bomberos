  <div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
      	<li <?php if ($this->uri->segment(1, 0) === 'dashboard'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('dashboard/index'); ?>"><span class="fa fa-fw fa-home" aria-hidden="true"></span> Tablero Principal <?php if ($this->uri->segment(1, 0) === 'dashboard'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
      	<li <?php if ($this->uri->segment(1, 0) === 'constancias'): ?>class="active"<?php endif ?>><a target="_get" href="<?php echo site_url('pdf/constancia'); ?>"><span class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></span> Constancia de Trabajo <?php if ($this->uri->segment(1, 0) === 'constancias'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
      	<?php
      		if(($this->session->userdata('tipo') === 'ADMINISTRADOR'))
			{ 
		?>
			<li <?php if ($this->uri->segment(1, 0) === 'cargos'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('cargos/index'); ?>"><span class="fa fa-fw fa-table" aria-hidden="true"></span> Cargos <?php if ($this->uri->segment(1, 0) === 'cargos'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
			<li <?php if ($this->uri->segment(1, 0) === 'departamentos'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('departamentos/index'); ?>"><span class="fa fa-fw fa-table" aria-hidden="true"></span> Departamentos <?php if ($this->uri->segment(1, 0) === 'departamentos'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
			<li <?php if ($this->uri->segment(1, 0) === 'empleados'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('empleados/index'); ?>"><span class="fa fa-fw fa-table" aria-hidden="true"></span> Empleados <?php if ($this->uri->segment(1, 0) === 'empleados'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
			<li <?php if ($this->uri->segment(1, 0) === 'modulos'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('modulos/index'); ?>"><span class="fa fa-fw fa-table" aria-hidden="true"></span> Modulos <?php if ($this->uri->segment(1, 0) === 'modulos'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
			<li <?php if ($this->uri->segment(1, 0) === 'accesos'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('accesos/index'); ?>"><span class="fa fa-fw fa-gear" aria-hidden="true"></span> Acceso de Modulos <?php if ($this->uri->segment(1, 0) === 'acceso'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
			<li <?php if ($this->uri->segment(1, 0) === 'usuarios'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('usuarios/index'); ?>"><span class="fa fa-fw fa-users" aria-hidden="true"></span> Usuarios <?php if ($this->uri->segment(1, 0) === 'usuarios'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
			<li <?php if ($this->uri->segment(1, 0) === 'administradores'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('administradores/index'); ?>"><span class="fa fa-fw fa-user-plus" aria-hidden="true"></span> Administradores <?php if ($this->uri->segment(1, 0) === 'administradores'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
			<li <?php if ($this->uri->segment(1, 0) === 'backup'): ?>class="active"<?php endif ?>><a href="<?php echo site_url('dashboard/backup'); ?>"><span class="fa fa-fw fa-gears" aria-hidden="true"></span> Backup DataBase <?php if ($this->uri->segment(1, 0) === 'backup'): ?><span class="sr-only">(current)</span><?php endif ?></a></li>
		
		<?php
      		} 
		?>

		<?php
      		if(($this->session->userdata('tipo') === 'USUARIO'))
			{ 
				if (!empty($menu)) {
					# code...
					foreach ($menu as $r) {
						# menu
						$ruta = explode("/", $r['ruta']);
		?>
			<li <?php if ($this->uri->segment(1, 0) === $ruta[0]): ?>class="active"<?php endif ?>>
				<a href="<?php echo site_url($r['ruta']); ?>">
				<span class="fa fa-fw fa-table" aria-hidden="true"></span> 
				<?php echo $r['nombre']; ?> <?php if ($this->uri->segment(1, 0) === $ruta[0]): ?>
				<span class="sr-only">(current)</span>
				<?php endif ?></a>
			</li>
		<?php
					}
				}
      		} 
		?>

    </ul>

  </div>