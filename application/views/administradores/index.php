<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view('dashboard/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('dashboard/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            
            <h1 class="page-header"><i class="fa fa-fw fa-user-plus"></i> Tabla de Administradores</h1>
            <?php $this->load->view('dashboard/template/breadcrumb'); ?>

            <div class="row">                            
            <div class="col-xs-12">

            <div class="row">
              <div class="col-md-6">                                      
                <?php 
                $at = array('role'=>'form','class'=>'form-inline');
                echo form_open('',$at); 
                ?>
                  <div class="form-group">
                    <input type="text" name="s" class="form-control" maxlength="120" value="<?php echo $search; ?>">
                    
                  </div> 
                  <div class="form-group">
                  <button type="submit" class="btn btn-default">Buscar</button>
                  <a href="<?php echo site_url($this->controller.'/index'); ?>" class="btn btn-default"> Limpiar</a>         
                  </div>                                     
                <?php 
                echo form_close(); 
                ?>
              </div>
              <div align="right" class="col-md-6">                                     
                <a href="<?php echo site_url($this->controller.'/create'); ?>" class="btn btn-primary"><i class="fa fa-fw fa-file-text-o"></i> Nuevo Registro</a>       
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
                        <th width="1%">Usuario</th>
                        <th>Correo</th>
                        <th>Cedula de Identidad</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th width="1px">Activo</th>                                 
                        <th width="1px"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($table as $r) : ?>
                      <tr>
                        <td><?php echo $r['usuario']; ?></td>
                        <td><?php echo $r['correo']; ?></td>
                        <td><?php echo $r['identidad']; ?></td>
                        <td><?php echo $r['apellidos']; ?></td>
                        <td><?php echo $r['nombres']; ?></td>
                        <td><?php echo $r['activo']; ?></td> 
                        <td align="center">
                        <?php if($this->session->userdata('id_usuario')<>$r['id_usuario']){ ?>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="<?php echo site_url($this->controller.'/update/'.$r['id_usuario']); ?>"><span class="fa fa-fw fa-edit"></span> Editar</a></li>
                              <li><a href="<?php echo site_url($this->controller.'/delete/'.$r['id_usuario']); ?>"><span class="fa fa-fw fa-trash"></span> Eliminar</a></li>                              
                          </ul>
                        </div>
                        <?php } ?>       

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