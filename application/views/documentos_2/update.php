<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="fa fa-fw fa-edit"></i> Editar Registro [Servicios de Ambulancias]</h1>
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
                <li role="presentation"><a href="#formulario4" aria-controls="formulario4" role="tab" data-toggle="tab">Paciente</a></li>
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
                        <div class="col-sm-12">
                            <label for="uamb_desde">Desde:</label>
                            <input type="text" name="uamb_desde" id="uamb_desde" class="form-control" maxlength="255" required value="<?php echo $row['uamb_desde']; ?>">
                        </div> 
                        <div class="col-sm-12">
                            <label for="uamb_hasta">Hasta:</label>
                            <input type="text" name="uamb_hasta" id="uamb_hasta" class="form-control" maxlength="255" required value="<?php echo $row['uamb_hasta']; ?>">
                        </div>  
                        <div class="col-sm-6">
                            <label for="uamb_recibido">Recibido Por:</label>
                            <input type="text" name="uamb_recibido" id="uamb_recibido" class="form-control" maxlength="255" value="<?php echo $row['uamb_recibido']; ?>">
                        </div> 
                        <div class="col-sm-6">
                            <label for="uamb_mpps">Registro MPPS Nº:</label>
                            <input type="text" name="uamb_mpps" id="uamb_mpps" class="form-control" maxlength="30" value="<?php echo $row['uamb_mpps']; ?>">
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

                        <div class="col-sm-6">
                            <label for="paciente_apellidos">Apellidos:</label>
                            <input type="text" name="paciente_apellidos" id="paciente_apellidos" class="form-control" maxlength="255" required value="<?php echo $row['paciente_apellidos']; ?>">
                        </div> 
                        <div class="col-sm-6">
                            <label for="paciente_nombres">Nombres:</label>
                            <input type="text" name="paciente_nombres" id="paciente_nombres" class="form-control" maxlength="255" required value="<?php echo $row['paciente_nombres']; ?>">
                        </div> 
                        <div class="col-sm-4">
                            <label for="paciente_identidad">Cedula de Identidad:</label>
                            <input type="text" name="paciente_identidad" id="paciente_identidad" class="form-control" maxlength="15" value="<?php echo $row['paciente_identidad']; ?>">
                        </div> 
                        <div class="col-sm-4">
                            <label for="paciente_edad">Edad:</label>
                            <input type="text" name="paciente_edad" id="paciente_edad" class="form-control" maxlength="3" required value="<?php echo $row['paciente_edad']; ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="paciente_telefono">Tel&eacute;fono:</label>
                            <input type="text" name="paciente_telefono" id="paciente_telefono" class="form-control" maxlength="30" value="<?php echo $row['paciente_telefono']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="paciente_residencia">Residenciado en:</label>
                            <input type="text" name="paciente_residencia" id="paciente_residencia" class="form-control" maxlength="255" required value="<?php echo $row['paciente_residencia']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="paciente_tipo_traslado">Tipo de traslado:</label>
                            <input type="text" name="paciente_tipo_traslado" id="paciente_tipo_traslado" class="form-control" maxlength="255" required value="<?php echo $row['paciente_tipo_traslado']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <h3 align="center">Signos Vitales</h3>
                        </div>
                        <div class="col-sm-3">
                            <label for="paciente_sv_ppm">P.P.M.:</label>
                            <input type="text" name="paciente_sv_ppm" id="paciente_sv_ppm" class="form-control" maxlength="30" value="<?php echo $row['paciente_sv_ppm']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <label for="paciente_sv_rpm">R.P.M.:</label>
                            <input type="text" name="paciente_sv_rpm" id="paciente_sv_rpm" class="form-control" maxlength="30" value="<?php echo $row['paciente_sv_rpm']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <label for="paciente_sv_temp">TEMP:</label>
                            <input type="text" name="paciente_sv_temp" id="paciente_sv_temp" class="form-control" maxlength="30" value="<?php echo $row['paciente_sv_temp']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <label for="paciente_sv_pa">P/A:</label>
                            <input type="text" name="paciente_sv_pa" id="paciente_sv_pa" class="form-control" maxlength="30" value="<?php echo $row['paciente_sv_pa']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="paciente_dx">Dx:</label>
                            <input type="text" name="paciente_dx" id="paciente_dx" class="form-control" maxlength="30" value="<?php echo $row['paciente_dx']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="paciente_ocasionado">Ocacionado Por:</label>
                            <input type="text" name="paciente_ocasionado" id="paciente_ocasionado" class="form-control" maxlength="30" value="<?php echo $row['paciente_ocasionado']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <h3 align="center">Acompañado por:</h3>
                        </div>
                        <div class="col-sm-6">
                            <label for="paciente_ac_apellidos">Apellidos:</label>
                            <input type="text" name="paciente_ac_apellidos" id="paciente_ac_apellidos" class="form-control" maxlength="255" value="<?php echo $row['paciente_ac_apellidos']; ?>">
                        </div> 
                        <div class="col-sm-6">
                            <label for="paciente_ac_nombres">Nombres:</label>
                            <input type="text" name="paciente_ac_nombres" id="paciente_ac_nombres" class="form-control" maxlength="255" value="<?php echo $row['paciente_ac_nombres']; ?>">
                        </div> 
                        <div class="col-sm-4">
                            <label for="paciente_ac_identidad">Cedula de Identidad:</label>
                            <input type="text" name="paciente_ac_identidad" id="paciente_ac_identidad" class="form-control" maxlength="15" value="<?php echo $row['paciente_ac_identidad']; ?>">
                        </div> 
                        <div class="col-sm-4">
                            <label for="paciente_ac_edad">Edad:</label>
                            <input type="text" name="paciente_ac_edad" id="paciente_ac_edad" class="form-control" maxlength="3" value="<?php echo $row['paciente_ac_edad']; ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="paciente_ac_telefono">Tel&eacute;fono:</label>
                            <input type="text" name="paciente_ac_telefono" id="paciente_ac_telefono" class="form-control" maxlength="30" value="<?php echo $row['paciente_ac_telefono']; ?>">
                        </div>
                        <div class="col-sm-12">
                            <label for="paciente_nexo">Nexo:</label>
                            <input type="text" name="paciente_nexo" id="paciente_nexo" class="form-control" maxlength="255" value="<?php echo $row['paciente_nexo']; ?>">
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
            <input type="hidden" name="tipo_documento" value="REPORTE_SERVICIO_AMBULANCIA">
            <?php 
                echo form_close(); 
            ?>
         
        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>S