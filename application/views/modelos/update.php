<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="fa fa-fw fa-edit"></i> Editar Registro [Tabla de Modelos]</h1>
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
                            <label for="id_marca">Marca:</label>
                            <select id="id_marca" name="id_marca" class="form-control" required autofocus>
                                <option value="">SELECCIONE...</option>
                                <?php foreach ($table_marcas as $r): ?>
                                <option <?php if($row['id_marca']==$r['id_marca']){ echo 'selected'; } ?> value="<?php echo $r['id_marca']; ?>"><?php echo $r['marca']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>                                  
                        <div class="col-sm-12">
                            <label for="modelo">Nombre del Modelo:</label>
                            <input type="text" name="modelo" id="modelo" class="form-control" maxlength="255" required value="<?php echo $row['modelo']; ?>">
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
            <button type="submit" class="btn btn-default"><i class="fa fa-fw fa-save"></i> Guardar</button>
            <a href="<?php echo site_url($this->controller.'/index'); ?>" class="btn btn-default"><i class="fa fa-fw fa-arrow-left"></i> Volver</a>
            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id_usuario'); ?>">
            <input type="hidden" name="id_modelo" value="<?php echo $row['id_modelo'] ?>">
            <?php 
                echo form_close(); 
            ?>
         
        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>S