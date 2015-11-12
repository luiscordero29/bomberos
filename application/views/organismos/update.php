<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="icon icon-edit"></i> Editar Registro [Organismos Actuantes en el Servicio]</h1>
            <?php $this->load->view('dashboard/template/breadcrumb'); ?>

            <div class="row">
              <div class="col-xs-12">
              <div class="panel panel-default">
              <div class="panel-body">

                <h3>Documento [<?php echo $row_documento['id_documento']; ?>]</p></h3>
                <p><b>Fecha:</b> <?php echo date("d/m/Y", strtotime($row_documento['fecha'])); ?></p>
                <p><b>Aviso:</b> <?php echo $row_documento['aviso']; ?></p>
                <p><b>Sitio del Suceso:</b> <?php echo $row_documento['sitio_suceso']; ?></p>
              </div>
              </div>
              </div>
            </div>

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

        <!-- TAPS -->
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#formulario" aria-controls="formulario" role="tab" data-toggle="tab">Formulario</a></li>
              
            </ul>


            <?php 
                $at = array('role'=>'form');
                echo form_open('',$at); 
            ?>
            <!-- Tab panes -->
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="formulario">

                <div class="row">                            
                <div class="col-sm-12">

                    <fieldset>                                   
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="unidad">Unidad:</label>
                            <input type="text" name="unidad" id="unidad" class="form-control" maxlength="255" autofocus value="<?php echo $row['unidad']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="dependencia">Dependencia:</label>
                            <input type="text" name="dependencia" id="dependencia" class="form-control" maxlength="255" required value="<?php echo $row['dependencia']; ?>">
                        </div>                                                               
                        <div class="col-sm-12">
                            <label for="cp">Conducida Por:</label>
                            <input type="text" name="cp" id="cp" class="form-control" maxlength="255" value="<?php echo $row['cp']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="am">Al Mando:</label>
                            <input type="text" name="am" id="am" class="form-control" maxlength="255" value="<?php echo $row['am']; ?>">
                        </div>                                                               
                    </div>
                    </fieldset>   
                </div>  
                </div>
            </div>
            </div>

            </div>
            <!-- END TAPS-->
            <br />
            <button type="submit" class="btn btn-default"><i class="icon icon-save"></i> Guardar</button>
            <a href="<?php echo site_url($this->controller.'/index/'.$row_documento['id_documento']); ?>" class="btn btn-default"><i class="icon icon-arrow-left"></i> Volver</a>
            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id_usuario'); ?>">
            <input type="hidden" name="id_organismo" value="<?php echo $row['id_organismo']; ?>">
            <input type="hidden" name="id_documento" value="<?php echo $row_documento['id_documento']; ?>">
            <?php 
                echo form_close(); 
            ?>
         
        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>S