<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="icon icon-folder-open"></i> Organismos Actuantes en el Servicio</h1>
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

            <div class="row">
              <div class="col-md-6">                                      
              </div>
              <div align="right" class="col-md-6">                                     
                <a href="<?php echo site_url($this->controller.'/create/'.$row_documento['id_documento']); ?>" class="btn btn-primary"><i class="icon icon-file-text"></i> Nuevo Registro</a>       
              </div>
            </div>
            <div><p></p></div>

            <div class="row">
              <div class="col-sm-12">
                <div class="separador">
                <?php if($table){ ?>
                  <table class="table table-bordered">
                  <thead>
                      <tr>
                        <th>Unidad</th>
                        <th>Dependencia</th>
                        <th>Conducida Por</th>
                        <th>Al Mando</th>
                        <th width="1%">Usuario</th>
                        <th width="1%">ID</th>
                        <th width="1px"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($table as $r) : ?>
                      <tr>
                        <td><?php echo $r['unidad']; ?></td>
                        <td><?php echo $r['dependencia']; ?></td>
                        <td><?php echo $r['cp']; ?></td>
                        <td><?php echo $r['am']; ?></td>
                        <td>@<?php echo $r['usuario']; ?></td>
                        <td><?php echo $r['id_organismo']; ?></td>
                        <td align="center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="<?php echo site_url($this->controller.'/update/'.$row_documento['id_documento'].'/'.$r['id_organismo']); ?>"><span class="icon icon-edit"></span> Editar</a></li>
                              <li><a href="<?php echo site_url($this->controller.'/delete/'.$row_documento['id_documento'].'/'.$r['id_organismo']); ?>"><span class="icon icon-trash"></span> Eliminar</a></li>                              
                          </ul>
                        </div>
                        
                        </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                  </table>
                <?php } ?>
                </div>
              </div>
            </div>

            </div>
            </div> 
        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>