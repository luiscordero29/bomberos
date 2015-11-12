<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="fa fa-fw fa-edit"></i> Editar Datos</h1>
            <?php $this->load->view('dashboard/template/breadcrumb'); ?>

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

                            <?php 
                                $at = array('role'=>'form');
                                echo form_open('',$at); 
                            ?>
                              <fieldset>
                                          
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" maxlength="15" disabled value="<?php echo $row['usuario']; ?>">
                                    </div> 
                                    <div class="col-sm-6">
                                        <label for="identidad">Cedula de Identidad:</label>
                                        <input type="text" name="identidad" id="identidad" class="form-control" maxlength="10" disabled  value="<?php echo $row['identidad']; ?>" >
                                    </div>                                 
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="apellidos">Apellidos:</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="120" autofocus required value="<?php echo $row['apellidos']; ?>" >
                                    </div>                                    
                                    <div class="col-sm-6">
                                        <label for="nombres">Nombres:</label>
                                        <input type="text" name="nombres" id="nombres" class="form-control" maxlength="120" required value="<?php echo $row['nombres']; ?>">
                                    </div>                                    
                                </div>
                                <div class="row">     
                                    <div class="col-sm-4">
                                        <label for="sexo">Sexo:</label>
                                        <select name="sexo" id="sexo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="MASCULINO" <?php if($row['sexo']=='MASCULINO'){ echo 'selected'; } ?>>MASCULINO</option>
                                            <option value="FEMENINO" <?php if($row['sexo']=='FEMENINO'){ echo 'selected'; } ?>>FEMENINO</option>
                                        </select>
                                    </div> 
                                    <div class="col-sm-4">
                                        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                        <div class="input-group date" id="datepicker" data-date="<?php echo date("d/m/Y", strtotime($row['fecha_nacimiento'])); ?>" data-date-format="dd/mm/yyyy"> 
                                        <input type="text" name="fecha_nacimiento" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y", strtotime($row['fecha_nacimiento'])); ?>"> 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
                                        </span> 
                                        </div>                                         
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" maxlength="15" required value="<?php echo $row['telefono']; ?>">
                                    </div> 
                                    <div class="col-sm-12">
                                        <label for="direccion">Dirección:</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control" maxlength="250" required value="<?php echo $row['direccion']; ?>">
                                    </div> 
                                    <div class="col-sm-12">
                                        <label for="correo">Correo:</label>
                                        <input type="text" name="correo" id="correo" class="form-control" maxlength="250" required value="<?php echo $row['correo']; ?>">
                                    </div> 
                                </div>

                              <br />
                                <button type="submit" class="btn btn-default"><i class="fa fa-fw fa-save"></i> Guardar</button>
                                <a href="<?php echo site_url($this->controller.'/index'); ?>" class="btn btn-default"><i class="fa fa-fw fa-arrow-left"></i> Volver</a>
                                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
                                <input type="hidden" name="usuario" value="<?php echo $row['usuario']; ?>">
                                <input type="hidden" name="identidad" value="<?php echo $row['identidad']; ?>">
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