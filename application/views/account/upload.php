<?php $this->load->view('account/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="fa fa-fw fa-picture-o"></i> Subir Imagen</h1>
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
                        <div>
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
                                echo form_open_multipart('upload/do_upload',$at); 
                            ?>
                            <fieldset>
                                          
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="file">Seleccione Archivo:</label>
                                        <input type="file" name="userfile" autofocus />
                                    </div> 
                                    <div class="col-sm-6">
                                        <?php if ($img['file_name']): ?>
                                            <img src="<?php echo base_url().'assets/uploads/account/'.$row['id_usuario'].'/'.$img['file_name']; ?>" alt="<?php echo $row['usuario']; ?>" class="img-thumbnail">
                                        <?php endif ?>
                                    </div>                         
                                </div>

                                <br />
                                <button type="submit" class="btn btn-default"><i class="fa fa-fw fa-save"></i> Guardar</button>
                                <a href="<?php echo site_url('account/index'); ?>" class="btn btn-default"><i class="fa fa-fw fa-arrow-left"></i> Volver</a>
                                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
                                <input type="hidden" name="tipo" value="USUARIO">
        
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
    </div>

<?php $this->load->view('account/template/footer'); ?>