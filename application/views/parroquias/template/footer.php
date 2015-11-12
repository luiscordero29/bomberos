    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/jquery/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="<?php echo base_url(); ?>assets/material-design/js/ripples.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/material-design/js/material.min.js"></script>
    <script>
        $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
            $.material.init();

        });
            
            function ajax_Parroquias_table_municipios(){
                var id = $('select#id_estado').val();
                $.ajax({
                    type:'POST',
                    url: '<?php echo site_url('parroquias/table_municipios'); ?>',
                    data: 'id_estado='+id,
                    success: 
                        function(resp){
                            $('select#id_municipio').html(resp);        
                        }
                });
            } 


    </script>

  </body>
</html>