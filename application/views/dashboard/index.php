<?php $this->load->view($this->controller.'/template/header'); ?>

  <?php $this->load->view($this->controller.'/template/navbar'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view($this->controller.'/template/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="fa fa-fw fa-home"></i> Tablero Principal</h1>
          <?php $this->load->view('dashboard/template/breadcrumb'); ?>

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
                       
                    <?php 
                    // years inventarios
                    if(!empty($e_years)){
                        foreach ($e_years as $y) 
                        {
                            
                            echo '<table class="table table-bordered">';
                            echo '<tr><td align="center" colspan="2"><h3>'.$y['tyear'].'</h3></td></tr>';
                            
                            
                            $e_months = $this->Dashboard_model->e_months($y['tyear']);
                            if(!empty($e_months)){
                                foreach ($e_months as $m) 
                                {
                                    
                                    echo '<tr><td align="center" colspan="2"><h5>'.$this->Dashboard_model->mes($m['tmonth']).'</h5></td></tr>';
                                    echo '<tr><td>DEPARTAMENTOS DE OPERACIONES</td><td>CANIDAD</td></tr>';
              
                    
                                    $rows = $this->Dashboard_model->e_years_months($y['tyear'],$m['tmonth']);
                                    if(!empty($rows)){
                                        foreach ($rows as $r) 
                                        {
                                            echo '<tr><td>'.$this->Dashboard_model->tipo_documento($r['tipo_documento']).'</td><td>'.$r['cantidad'].'</td></tr>';
                                        }
                                    }
                                }
                            }
                            echo '</table><br />';
                        }
                    }
                    ?>

        </div>
      </div>
    </div>

<?php $this->load->view($this->controller.'/template/footer'); ?>