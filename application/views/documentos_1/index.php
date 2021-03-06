<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="icon icon-table"></i> Accidentes de Transitos</h1>
            <?php $this->load->view('dashboard/template/breadcrumb'); ?>

            <div class="row">                            
            <div class="col-xs-12">

            <div class="row">
              <div class="col-md-6">                                      
              </div>
              <div align="right" class="col-md-6">                                     
                <a href="<?php echo site_url($this->controller.'/create'); ?>" class="btn btn-primary"><i class="icon icon-file-text"></i> Nuevo Registro</a>       
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
                        <th>Fecha</th>
                        <th>Aviso</th>
                        <th>Sitio del Suceso</th>
                        <th width="1%">Usuario</th>
                        <th width="1%">ID</th>
                        <th width="1px"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($table as $r) : ?>
                      <tr>
                        <td><?php echo date("d/m/Y", strtotime($r['fecha'])); ?></td>
                        <td><?php echo $r['aviso']; ?></td>
                        <td><?php echo $r['sitio_suceso']; ?></td>
                        <td>@<?php echo $r['usuario']; ?></td>
                        <td><?php echo $r['id_documento']; ?></td>
                        <td align="center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a target="_get" href="<?php echo site_url('pdf/documento_1/'.$r['id_documento']); ?>"><span class="icon icon-print"></span> Imprimir</a></li>
                              <li><a href="<?php echo site_url('vehiculos/index/'.$r['id_documento']); ?>"><span class="icon icon-folder-open"></span> Vehículos Involucrados</a></li>
                              <li><a href="<?php echo site_url('organismos/index/'.$r['id_documento']); ?>"><span class="icon icon-folder-open"></span> Organismos Actuantes</a></li>
                              <li><a href="<?php echo site_url($this->controller.'/update/'.$r['id_documento']); ?>"><span class="icon icon-edit"></span> Editar</a></li>
                              <li><a href="<?php echo site_url($this->controller.'/delete/'.$r['id_documento']); ?>"><span class="icon icon-trash"></span> Eliminar</a></li>                              
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

            <div class="row">
              <div class="col-xs-12">                           
                
                <ul class="pagination pagination-sm">

                <?php            
                  $pagination = (int)($table_rows / $table_limit);
                  for ($item=0; $item < $pagination ; $item++) { 
                ?>                                         
                    <li <?php if($item == $table_page): ?>class="active"<?php endif; ?>>
                      <a href="<?php echo site_url($this->controller.'/index/table_page/'.$item.$search_url); ?>">
                        <?php echo $item+1; ?>
                      </a>
                    </li>
                <?php                            
                  }
                ?>
                </ul>
              </div>
            </div>
            </div>
            </div> 
        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>