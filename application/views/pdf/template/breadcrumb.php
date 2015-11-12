<ol class="breadcrumb">
			<?php 
                if (!empty($breadcrumbs)) {
                	$i=1; $n = count($breadcrumbs);
                    foreach ($breadcrumbs as $key => $value) { 
            ?>                                                
                    <?php 
                    if($n<=$i){
                    ?>
                    	<li class="active"><?php echo $key; ?></li>
                    <?php
                    }else{
                    ?>
                    	<li><a href="<?php echo site_url($value); ?>"><?php echo $key; ?></a></li>
                    <?php 
                	}                   
                    $i++; 
                    ?>
            <?php 
                    }
                } 
            ?>							  
</ol>