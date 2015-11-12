<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="fa fa-fw fa-edit"></i> Editar Registro [Servicio Especial]</h1>
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
                <li role="presentation" class="active"><a href="#formulario1" aria-controls="formulario1" role="tab" data-toggle="tab">Formulario</a></li>
                <li role="presentation"><a href="#formulario2" aria-controls="formulario2" role="tab" data-toggle="tab">Servicio</a></li>
                <li role="presentation"><a href="#formulario3" aria-controls="formulario3" role="tab" data-toggle="tab">Transporte</a></li>
                <li role="presentation"><a href="#formulario4" aria-controls="formulario4" role="tab" data-toggle="tab">Servicio</a></li>
            </ul>


            <?php 
                $at = array('role'=>'form');
                echo form_open('',$at); 
            ?>
            <!-- Tab panes -->
            <div class="tab-content">
            <!-- formulario -->
            <div role="tabpanel" class="tab-pane active" id="formulario1">

                <div class="row">                            
                <div class="col-sm-12">                      

                    <fieldset>                                   
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="aviso">Clase de Aviso:</label>
                            <select name="aviso" id="aviso" class="form-control" required autofocus>
                                <option value="">SELECCIONE...</option>
                                <option <?php if($row['aviso']=='TELEFONO'){ echo 'selected'; } ?> value="TELEFONO">TELEFONO</option>
                                <option <?php if($row['aviso']=='RADIAL'){ echo 'selected'; } ?> value="RADIAL">RADIAL</option>
                                <option <?php if($row['aviso']=='VERBAL'){ echo 'selected'; } ?> value="VERBAL">VERBAL</option>
                            </select>
                        </div>  
                        <div class="col-sm-6">
                            <label for="fecha">Fecha:</label>
                            <div class="input-group">
                            <input id="datepicker1" type="text" name="fecha" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y", strtotime($row['fecha'])); ?>"> 
                            <span class="input-group-addon">
                            <button type="button" class="btn btn-primary" id="open_datepicker1"><i class="glyphicon glyphicon-calendar"></i></button>
                            <button type="button" class="btn btn-danger" id="close_datepicker1"><i class="glyphicon glyphicon-remove"></i></button>
                            <button type="button" class="btn btn-info" id="reset_datepicker1"><i class="glyphicon glyphicon-refresh"></i></button>                           
                            </span> 
                            </div>                                         
                        </div> 
                        <div class="col-sm-12">
                            <label for="solicitado">Solicitado Por:</label>
                            <input type="text" name="solicitado" id="solicitado" class="form-control" maxlength="255" required value="<?php echo $row['solicitado']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="recibido">Recibido Por:</label>
                            <input type="text" name="recibido" id="recibido" class="form-control" maxlength="255" required value="<?php echo $row['recibido']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="ordenado">Ordenado Por:</label>
                            <input type="text" name="ordenado" id="ordenado" class="form-control" maxlength="255" required value="<?php echo $row['ordenado']; ?>">
                        </div>  
                        <div class="col-sm-12">
                            <label for="comandante_servicio">Comandante del Servicio:</label>
                            <input type="text" name="comandante_servicio" id="comandante_servicio" class="form-control" maxlength="255" required value="<?php echo $row['comandante_servicio']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="jefe_seccion">Jefe de Sección:</label>
                            <input type="text" name="jefe_seccion" id="jefe_seccion" class="form-control" maxlength="255" required value="<?php echo $row['jefe_seccion']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="jefe_operaciones">Jefe de Operaciones:</label>
                            <input type="text" name="jefe_operaciones" id="jefe_operaciones" class="form-control" maxlength="255" required value="<?php echo $row['jefe_operaciones']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="comandancia">Comandancia:</label>
                            <input type="text" name="comandancia" id="comandancia" class="form-control" maxlength="255" required value="<?php echo $row['comandancia']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="observaciones">Observaciones:</label>
                            <textarea name="observaciones" class="form-control" rows="10"><?php echo $row['observaciones']; ?></textarea>
                        </div>                                                              

                    </div>
                    </fieldset>   
                </div>  
                </div>
            </div>
            <!--  formulario2 -->
            <div role="tabpanel" class="tab-pane" id="formulario2">

                <div class="row">                            
                <div class="col-sm-12">

                       

                    <fieldset>                                   
                    <div class="row">
                    
                        <div class="col-sm-6">
                            <label for="timepicker1">Hora de salida H.L.V.:</label>
                            <div class="input-group"> 
                            <input id="timepicker1" type="text" name="hora_salida" class="form-control" type="text" readonly="" value="<?php echo date("H:i", strtotime($row['hora_salida'])); ?>"> 
                            <span class="input-group-addon">
                            <button type="button" class="btn btn-primary" id="open_timepicker1"><i class="glyphicon glyphicon-time"></i></button>
                            <button type="button" class="btn btn-danger" id="close_timepicker1"><i class="glyphicon glyphicon-remove"></i></button>
                            <button type="button" class="btn btn-info" id="reset_timepicker1"><i class="glyphicon glyphicon-refresh"></i></button>                           
                            </span> 
                            </div>                                         
                        </div> 
                        <div class="col-sm-6">
                            <label for="timepicker2">Llegada al sitio H.L.V.:</label>
                            <div class="input-group">
                            <input id="timepicker2" type="text" name="hora_servicio_llegada" class="form-control" type="text" readonly="" value="<?php echo date("H:i", strtotime($row['hora_servicio_llegada'])); ?>"> 
                            <span class="input-group-addon">
                            <button type="button" class="btn btn-primary" id="open_timepicker2"><i class="glyphicon glyphicon-time"></i></button>
                            <button type="button" class="btn btn-danger" id="close_timepicker2"><i class="glyphicon glyphicon-remove"></i></button>
                            <button type="button" class="btn btn-info" id="reset_timepicker2"><i class="glyphicon glyphicon-refresh"></i></button>                           
                            </span> 
                            </div>                                         
                        </div> 
                        <div class="col-sm-6">
                            <label for="timepicker3">Salida del sitio H.L.V.:</label>
                            <div class="input-group">
                            <input id="timepicker3" type="text" name="hora_servicio_salida" class="form-control" type="text" readonly="" value="<?php echo date("H:i", strtotime($row['hora_servicio_salida'])); ?>"> 
                            <span class="input-group-addon">
                            <button type="button" class="btn btn-primary" id="open_timepicker3"><i class="glyphicon glyphicon-time"></i></button>
                            <button type="button" class="btn btn-danger" id="close_timepicker3"><i class="glyphicon glyphicon-remove"></i></button>
                            <button type="button" class="btn btn-info" id="reset_timepicker3"><i class="glyphicon glyphicon-refresh"></i></button>                           
                            </span> 
                            </div>                                         
                        </div> 
                        <div class="col-sm-6">
                            <label for="timepicker4">Hora de llegada H.L.V.:</label>
                            <div class="input-group">
                            <input id="timepicker4" type="text" name="hora_llegada" class="form-control" type="text" readonly="" value="<?php echo date("H:i", strtotime($row['hora_llegada'])); ?>"> 
                            <span class="input-group-addon">
                            <button type="button" class="btn btn-primary" id="open_timepicker4"><i class="glyphicon glyphicon-time"></i></button>
                            <button type="button" class="btn btn-danger" id="close_timepicker4"><i class="glyphicon glyphicon-remove"></i></button>
                            <button type="button" class="btn btn-info" id="reset_timepicker4"><i class="glyphicon glyphicon-refresh"></i></button>                           
                            </span> 
                            </div>                                         
                        </div>

                    </div>
                    </fieldset>   
                </div>  
                </div>
            </div>
             <!--  formulario3 -->
            <div role="tabpanel" class="tab-pane" id="formulario3">

                <div class="row">                            
                <div class="col-sm-12">                       

                    <fieldset>                                   
                    <div class="row">
                    
                       
                        <div class="col-sm-12">
                            <label for="uvir">Unidad/Vehiculo de Intervención Rápida:</label>
                            <input type="text" name="uvir" id="uvir" class="form-control" maxlength="255" value="<?php echo $row['uvir']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="uvir_cp">Conducida Por:</label>
                            <input type="text" name="uvir_cp" id="uvir_cp" class="form-control" maxlength="255" value="<?php echo $row['uvir_cp']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="uvir_am">Al Mando:</label>
                            <input type="text" name="uvir_am" id="uvir_am" class="form-control" maxlength="255" value="<?php echo $row['uvir_am']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="uvir_ap">Acompañado Por:</label>
                            <input type="text" name="uvir_ap" id="uvir_ap" class="form-control" maxlength="255" value="<?php echo $row['uvir_ap']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="uvir_presencia">Acto de Presencia:</label>
                            <select name="uvir_presencia" id="uvir_presencia" class="form-control">
                                <option value="">SELECCIONE</option>
                                <option <?php if($row['uvir_presencia']=='SI'){ echo 'selected'; } ?> value="SI">SI</option>
                                <option <?php if($row['uvir_presencia']=='NO'){ echo 'selected'; } ?> value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label for="uamb">Unidad/Ambulancia:</label>
                            <input type="text" name="uamb" id="uamb" class="form-control" maxlength="255" value="<?php echo $row['uamb']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="uamb_cp">Conducida Por:</label>
                            <input type="text" name="uamb_cp" id="uamb_cp" class="form-control" maxlength="255" value="<?php echo $row['uamb_cp']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="uamb_am">Al Mando:</label>
                            <input type="text" name="uamb_am" id="uamb_am" class="form-control" maxlength="255" value="<?php echo $row['uamb_am']; ?>">
                        </div> 
                        <div class="col-sm-6">
                            <label for="traslado">Taslado:</label>
                            <select name="traslado" id="traslado" class="form-control">
                                <option value="">SELECCIONE</option>
                                <option <?php if($row['traslado']=='NO'){ echo 'selected'; } ?> value="NO">NO</option>
                                <option <?php if($row['traslado']=='SI'){ echo 'selected'; } ?> value="SI">SI</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label for="id_estado">Estado:</label>
                            <select id="id_estado" name="id_estado" class="form-control" required onchange="ajax_Documentos_1_table_municipios()">
                                <option value="">SELECCIONE...</option>
                                <?php foreach ($table_estados as $r): ?>
                                <option <?php if($row['id_estado']==$r['id_estado']){ echo 'selected'; } ?> value="<?php echo $r['id_estado']; ?>"><?php echo $r['estado']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> 
                        <div class="col-sm-12">
                            <label for="id_municipio">Municipio:</label>
                            <select name="id_municipio" id="id_municipio" class="form-control"  required onchange="ajax_Documentos_1_table_parroquias()">
                                <option value="">SELECCIONAR...</option>   
                                <option value="<?php echo $row['id_municipio']; ?>" selected><?php echo $row['municipio']; ?></option>                                            
                            </select>                                        
                        </div> 
                        <div class="col-sm-12">
                            <label for="id_parroquia">Parroquia:</label>
                            <select name="id_parroquia" id="id_parroquia" class="form-control"  required>
                                <option value="">SELECCIONAR...</option> 
                                <option value="<?php echo $row['id_parroquia']; ?>" selected><?php echo $row['parroquia']; ?></option>                                           
                            </select>                                        
                        </div> 


                    </div>
                    </fieldset>   
                </div>  
                </div>
            </div>
            <!--  formulario4 -->
            <div role="tabpanel" class="tab-pane" id="formulario4">

                <div class="row">                            
                <div class="col-sm-12">                       

                    <fieldset>                                   
                    <div class="row"> 

                        <div class="col-sm-12">
                            <h3 align="center">Datos de Servicio</h3>
                        </div>
                        <div class="col-sm-9">
                            <label for="servicio_tipo">Tipo de Servicio:</label>
                            <input type="text" name="servicio_tipo" id="servicio_tipo" class="form-control" required maxlength="255" required value="<?php echo $row['servicio_tipo']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="servicio_motivacion">Motivado a:</label>
                            <input type="text" name="servicio_motivacion" id="servicio_motivacion" class="form-control" maxlength="255" required value="<?php echo $row['servicio_motivacion']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="servicio_direccion">Dirección:</label>
                            <input type="text" name="servicio_direccion" id="servicio_direccion" class="form-control" maxlength="255" required value="<?php echo $row['servicio_direccion']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="servicio_persona">Nombre y Apellido:</label>
                            <input type="text" name="servicio_persona" id="servicio_persona" class="form-control" maxlength="255" required value="<?php echo $row['servicio_persona']; ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="servicio_persona_edad">Edad:</label>
                            <input type="text" name="servicio_persona_edad" id="servicio_persona_edad" class="form-control" maxlength="3" required value="<?php echo $row['servicio_persona_edad']; ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="servicio_persona_identidad">C.I:</label>
                            <input type="text" name="servicio_persona_identidad" id="servicio_persona_identidad" class="form-control" maxlength="15" required value="<?php echo $row['servicio_persona_identidad']; ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="servicio_persona_telefono">Tel&eacute;fono:</label>
                            <input type="text" name="servicio_persona_telefono" id="servicio_persona_telefono" class="form-control" maxlength="30" value="<?php echo $row['servicio_persona_telefono']; ?>">
                        </div>  
                        <div class="col-sm-12">
                            <label for="servicio_materiales">Materiales Utilizados:</label>
                            <input type="text" name="servicio_materiales" id="servicio_materiales" class="form-control" value="<?php echo $row['servicio_materiales']; ?>">
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
            <input type="hidden" name="id_documento" value="<?php echo $row['id_documento']; ?>">
            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id_usuario'); ?>">
            <input type="hidden" name="tipo_documento" value="REPORTE_SERVICIO_ESPECIAL">
            <?php 
                echo form_close(); 
            ?>
         
        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>S