<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view($this->controller.'/template/navbar'); ?>

    <div class="container-fluid">
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Iniciar Sesi&oacute;n</b></div>
          </div>     

          <div style="padding-top:30px" class="panel-body">

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
              <?php 
              $at = array('id' => 'loginform', 'class' => 'form-horizontal', 'role' => 'form');
              echo form_open('login/index',$at); 
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
             
                  <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" name="usuario" class="form-control" placeholder="Usuario" autofocus required>
                  </div>
                                
                  <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input type="password" name="clave" class="form-control" placeholder="Contraseña" required>
                  </div>

                  <div style="margin-left: 2px" class="form-group">
                      <button type="submit" class="btn btn-default"><i class="fa fa-sign-in"></i> Entrar</button>
                      

                  </div>

 
              <?php echo form_close(); ?>  


          </div>                     
              <div class="panel-footer">

          
                      <a href="<?php echo site_url('login/registrarse'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i> Registrarse</a>
                      <a href="<?php echo site_url('login/validar'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-check-square"></i> Validar Cuenta</a>
                      <a href="<?php echo site_url('login/restaurar'); ?>" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Restaurar Cuenta</a>

        
              </div> 
        </div>  
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>