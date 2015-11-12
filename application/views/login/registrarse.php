<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view($this->controller.'/template/navbar'); ?>

    <div class="container-fluid">
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Registrarse</b></div>
          </div>     

          <div style="padding-top:30px" class="panel-body">

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
              <?php 
              $at = array('id' => 'loginform', 'class' => 'form-horizontal', 'role' => 'form');
              echo form_open('login/registrarse',$at); 
              ?> 

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
             
                  <div class="row">
                    <div class="col-sm-12">
                        <label for="usuario">Usuario:</label>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-user" aria-hidden="true"></span></div>
                        <input type="text" name="usuario" id="usuario" class="form-control" maxlength="15" required autofocus>
                        </div>  
                    </div>                                 
                    <div class="col-sm-12">
                        <label for="clave">Contrase&nacute;a:</label>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-lock" aria-hidden="true"></span></div>
                        <input type="password" name="clave" id="clave" class="form-control" maxlength="15" required>
                        </div>  
                    </div>                                 
                    <div class="col-sm-12">
                        <label for="confirmar">Confirmar Contrase&nacute;a:</label>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-lock" aria-hidden="true"></span></div>
                        <input type="password" name="confirmar" id="confirmar" class="form-control" maxlength="15" required autofocus>
                        </div> 
                    </div>                                  
                  </div>

                  <div class="row">
                      <div class="col-sm-12">
                          <label for="identidad">Cedula de Identidad:</label>
                          <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-edit" aria-hidden="true"></span></div>
                          <input type="number" name="identidad" id="identidad" class="form-control" maxlength="8" required>
                          </div> 
                      </div> 
                      <?php /* ?>
                      <div class="col-sm-12">
                          <label for="apellidos">Apellidos:</label>
                          <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-edit" aria-hidden="true"></span></div>
                          <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="120" required>
                          </div> 
                      </div>                                    
                      <div class="col-sm-12">
                          <label for="nombres">Nombres:</label>
                          <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-edit" aria-hidden="true"></span></div>
                          <input type="text" name="nombres" id="nombres" class="form-control" maxlength="120" required>
                          </div> 
                      </div>  
                      */ ?>                                  
                  </div>

                  <div class="row">     
                      <?php /* ?>
                      <div class="col-sm-12">
                          <label for="direccion">Dirección:</label>
                          <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-location-arrow" aria-hidden="true"></span></div>
                          <input type="text" name="direccion" id="direccion" class="form-control" maxlength="250" required>
                          </div> 
                      </div> 
                      */ ?>
                      <div class="col-sm-12">
                          <label for="correo">Correo:</label>
                          <div class="input-group">
                          <div class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
                          <input type="email" name="correo" id="correo" class="form-control" maxlength="250" required>
                          </div>
                      </div>
                      <?php /* ?> 
                      <div class="col-sm-4">
                          <label for="telefono">Teléfono:</label>
                          <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-mobile" aria-hidden="true"></span></div>
                          <input type="number" name="telefono" id="telefono" class="form-control" maxlength="11" required>
                          </div>
                      </div> 
                      <div class="col-sm-4">
                          <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                          <div class="input-group date" id="datepicker" data-date="<?php echo date("d/m/Y"); ?>" data-date-format="dd/mm/yyyy"> 
                          <input type="text" name="fecha_nacimiento" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y"); ?>"> 
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
                          </span> 
                          </div>                                         
                      </div> 
                      <div class="col-sm-4">
                          <label for="sexo">Sexo:</label>
                          <select name="sexo" id="sexo" class="form-control" required>
                              <option value="">SELECCIONE...</option>
                              <option value="MASCULINO">MASCULINO</option>
                              <option value="FEMENINO">FEMENINO</option>
                          </select>
                      </div>
                      */ ?>
                    </div> 

                    <div class="row">
                      <div class="col-sm-12">
                        <div style="padding-top: 20px; ">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-info-circle"></i> Registrarse</button>
                        </div>
                      </div>
                    </div>

              <?php echo form_close(); ?>  

          </div>                     
              <div class="panel-footer">

                <a href="<?php echo site_url('login/index'); ?>" class="btn btn-default btn-sm"><i class="fa fa-sign-in"></i> Iniciar Sesi&oacute;n</a>
                <a href="<?php echo site_url('login/validar'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-check-square"></i> Validar Cuenta</a>
                <a href="<?php echo site_url('login/restaurar'); ?>" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Restaurar Cuenta</a>

              </div> 
        </div>  
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>