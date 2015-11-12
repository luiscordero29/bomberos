<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="fa fa-fw fa-file-text-o"></i> Crear Registro [Tabla de Administradores]</h1>
            <?php $this->load->view('dashboard/template/breadcrumb'); ?>

            <div class="row">
                <div class="col-xs-12">
                    
                    <?php 
                    if (!empty($alert['success'])) {
                    foreach ($alert['success'] as $key => $value) { 
                    ?>                            
                        <div class="alert alert-success"><?php echo $value; ?></div>
                    <?php 
                        }} 
                    ?>

                    <?php 
                    if (!empty($alert['info'])) {
                    foreach ($alert['info'] as $key => $value) { ?>                            
                        <div class="alert alert-info"><?php echo $value; ?></div>
                    <?php 
                        }} 
                    ?>

                    <?php 
                    if (!empty($alert['warning'])) {
                    foreach ($alert['warning'] as $key => $value) { 
                    ?>                            
                        <div class="alert alert-warning"><?php echo $value; ?></div>
                    <?php 
                        }} 
                    ?>

                    <?php 
                    if (!empty($alert['danger'])) {
                    foreach ($alert['danger'] as $key => $value) { 
                    ?>                            
                        <div class="alert alert-danger"><?php echo $value; ?></div>
                    <?php 
                        }} 
                    ?>

                    <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                </div>
            </div>

            <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Formulario</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="information">

                <div class="row">                            
                <div class="col-sm-12">                        

                            	<?php 
                                    $at = array('role'=>'form');
                                    echo form_open('',$at); 
                                ?>

                            	<fieldset>                                   
                               <div class="row">
                                    <div class="col-sm-6">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" required maxlength="15" autofocus >
                                    </div> 
                                    <div class="col-sm-6">
                                        <label for="identidad">Cedula de Identidad:</label>
                                        <input type="text" name="identidad" id="identidad" class="form-control" maxlength="10" required>
                                    </div>                                 
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="apellidos">Apellidos:</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="120" required>
                                    </div>                                    
                                    <div class="col-sm-6">
                                        <label for="nombres">Nombres:</label>
                                        <input type="text" name="nombres" id="nombres" class="form-control" maxlength="120" required>
                                    </div>                                    
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-3">
                                        <label for="activo">Activo:</label>
                                        <select name="activo" id="activo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>     
                                    <div class="col-sm-3">
                                        <label for="sexo">Sexo:</label>
                                        <select name="sexo" id="sexo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="MASCULINO">MASCULINO</option>
                                            <option value="FEMENINO">FEMENINO</option>
                                        </select>
                                    </div> 
                                    <div class="col-sm-3">
                                        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                        <div class="input-group date" id="datepicker" data-date="<?php echo date("d/m/Y"); ?>" data-date-format="dd/mm/yyyy"> 
                                        <input type="text" name="fecha_nacimiento" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y"); ?>"> 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
                                        </span> 
                                        </div>                                         
                                    </div>                                    
                                    <div class="col-sm-3">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" maxlength="15" required>
                                    </div> 
                                    <div class="col-sm-12">
                                        <label for="direccion">Dirección:</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control" maxlength="250" required>
                                    </div> 
                                    <div class="col-sm-12">
                                        <label for="correo">Correo:</label>
                                        <input type="text" name="correo" id="correo" class="form-control" maxlength="250" required>
                                    </div> 
                                </div>

                                <br />
                                <button type="submit" class="btn btn-default"><i class="fa fa-fw fa-save"></i> Guardar</button>
                                <a href="<?php echo site_url($this->controller.'/index'); ?>" class="btn btn-default"><i class="fa fa-fw fa-arrow-left"></i> Volver</a>
                                <input type="hidden" name="tipo" value="ADMINISTRADOR">
                                
                                </fieldset>   
                                
                                <?php 
                                    echo form_close(); 
                                ?>

                </div>                            
                </div>

            </div>
            </div>

          </div>
         
        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>