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
                        <div class="col-sm-3">
                            <label for="placa">Placa:</label>
                            <input type="text" name="placa" id="placa" class="form-control" maxlength="30" autofocus required value="<?php echo $row['placa']; ?>">
                        </div> 
                        <div class="col-sm-3">
                            <label for="ano">Año:</label>
                            <input type="text" name="ano" id="ano" class="form-control" maxlength="4" required value="<?php echo $row['ano']; ?>">
                        </div> 
                        <div class="col-sm-6">
                            <label for="id_tipo">Tipos:</label>
                            <select id="id_tipo" name="id_tipo" class="form-control" required>
                                <option value="">SELECCIONE...</option>
                                <?php foreach ($table_tipos as $r): ?>
                                <option <?php if($row['id_tipo']==$r['id_tipo']){ echo 'selected'; } ?> value="<?php echo $r['id_tipo']; ?>"><?php echo $r['tipo']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="id_marca">Marca:</label>
                            <select id="id_marca" name="id_marca" class="form-control" required onchange="ajax_Vehiculos_table_modelos()">
                                <option value="">SELECCIONE...</option>
                                <?php foreach ($table_marcas as $r): ?>
                                <option <?php if($row['id_marca']==$r['id_marca']){ echo 'selected'; } ?> value="<?php echo $r['id_marca']; ?>"><?php echo $r['marca']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="id_modelo">Modelo:</label>
                            <select id="id_modelo" name="id_modelo" class="form-control" required>
                                <option value="">SELECCIONE...</option>
                                <option value="<?php echo $row['id_modelo']; ?>" selected><?php echo $row['modelo']; ?></option> 
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="id_clase">Clase:</label>
                            <select id="id_clase" name="id_clase" class="form-control" required>
                                <option value="">SELECCIONE...</option>
                                <?php foreach ($table_clases as $r): ?>
                                <option <?php if($row['id_clase']==$r['id_clase']){ echo 'selected'; } ?> value="<?php echo $r['id_clase']; ?>"><?php echo $r['clase']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="id_color">Color:</label>
                            <select id="id_color" name="id_color" class="form-control" required>
                                <option value="">SELECCIONE...</option>
                                <?php foreach ($table_colores as $r): ?>
                                <option <?php if($row['id_color']==$r['id_color']){ echo 'selected'; } ?> value="<?php echo $r['id_color']; ?>"><?php echo $r['color']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="propietario">Propietario:</label>
                            <input type="text" name="propietario" id="propietario" class="form-control" maxlength="255" required value="<?php echo $row['propietario']; ?>">
                        </div>                                                               
                        <div class="col-sm-3">
                            <label for="propietario_identidad">Identidad:</label>
                            <input type="text" name="propietario_identidad" id="propietario_identidad" class="form-control" maxlength="15" required value="<?php echo $row['propietario_identidad']; ?>">
                        </div> 
                        <div class="col-sm-3">
                            <label for="propietario_edad">Edad:</label>
                            <input type="text" name="propietario_edad" id="propietario_edad" class="form-control" maxlength="4" required value="<?php echo $row['propietario_edad']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <label for="conductor">Conductor:</label>
                            <input type="text" name="conductor" id="conductor" class="form-control" maxlength="255" value="<?php echo $row['conductor']; ?>">
                        </div>                                                               
                        <div class="col-sm-3">
                            <label for="conductor_identidad">Identidad:</label>
                            <input type="text" name="conductor_identidad" id="conductor_identidad" class="form-control" maxlength="15" value="<?php echo $row['conductor_identidad']; ?>">
                        </div> 
                        <div class="col-sm-3">
                            <label for="conductor_edad">Edad:</label>
                            <input type="text" name="conductor_edad" id="conductor_edad" class="form-control" maxlength="4" value="<?php echo $row['conductor_edad']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="conductor_residencia">Residenciado en:</label>
                            <input type="text" name="conductor_residencia" id="conductor_residencia" class="form-control" value="<?php echo $row['conductor_residencia']; ?>" >
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
            <input type="hidden" name="id_vehiculo" value="<?php echo $row['id_vehiculo']; ?>">
            <input type="hidden" name="id_documento" value="<?php echo $row_documento['id_documento']; ?>">
            <?php 
                echo form_close(); 
            ?>
         
        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>S