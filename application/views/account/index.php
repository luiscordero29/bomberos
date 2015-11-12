<?php $this->load->view('account/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="fa fa-fw fa-user"></i> Mi Cuenta</h1>
            <?php $this->load->view('dashboard/template/breadcrumb'); ?>

            <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Informaci&oacute;n</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="information">
                <div class="row">
                  <div class="col-xs-8">
                    <p><b>Usuario:</b> <?php echo $row['usuario']; ?></p>
                    <p><b>Cedula de Identidad:</b> <?php echo $row['identidad']; ?></p>
                    <p><b>Apellidos:</b> <?php echo $row['apellidos']; ?></p>
                    <p><b>Nombres:</b> <?php echo $row['nombres']; ?></p>
                    <p><b>Fecha de Nacimiento:</b> <?php echo $row['fecha_nacimiento']; ?></p>
                    <p><b>Sexo:</b> <?php echo $row['sexo']; ?></p>
                    <p><b>Tel&eacute;fono:</b> <?php echo $row['telefono']; ?></p>
                    <p><b>Correo:</b> <?php echo $row['correo']; ?></p>
                    <p><b>Activo:</b> <?php echo $row['activo']; ?></p>


                  </div>

                  
                </div>
              </div>
            </div>

          </div>
         
        </div>
      </div>
    </div>

<?php $this->load->view('account/template/footer'); ?>