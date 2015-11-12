    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/jquery/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/datetimepicker/js/jquery.datetimepicker.full.js"></script>

    <script src="<?php echo base_url(); ?>assets/material-design/js/ripples.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/material-design/js/material.min.js"></script>
    <script>
    $(document).ready(function(){
        // DatePicker
        $.datetimepicker.setLocale('es');
        
        $('#datepicker1').datetimepicker({
            timepicker:false,
            format:'d/m/Y',
            formatDate:'d/m/Y',
        });
        $('#open_datepicker1').click(function(){
            $('#datepicker1').datetimepicker('show');
        });
        $('#close_datepicker1').click(function(){
            $('#datepicker1').datetimepicker('hide');
        });
        $('#reset_datepicker1').click(function(){
            $('#datepicker1').datetimepicker('reset');
        });

        $('#timepicker1').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:1
        });
        $('#open_timepicker1').click(function(){
            $('#timepicker1').datetimepicker('show');
        });
        $('#close_timepicker1').click(function(){
            $('#timepicker1').datetimepicker('hide');
        });
        $('#reset_timepicker1').click(function(){
            $('#timepicker1').datetimepicker('reset');
        });

        $('#timepicker2').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:1
        });
        $('#open_timepicker2').click(function(){
            $('#timepicker2').datetimepicker('show');
        });
        $('#close_timepicker2').click(function(){
            $('#timepicker2').datetimepicker('hide');
        });
        $('#reset_timepicker2').click(function(){
            $('#timepicker2').datetimepicker('reset');
        });

        $('#timepicker3').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:1
        });
        $('#open_timepicker3').click(function(){
            $('#timepicker3').datetimepicker('show');
        });
        $('#close_timepicker3').click(function(){
            $('#timepicker3').datetimepicker('hide');
        });
        $('#reset_timepicker3').click(function(){
            $('#timepicker3').datetimepicker('reset');
        });

        $('#timepicker4').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:1
        });
        $('#open_timepicker4').click(function(){
            $('#timepicker4').datetimepicker('show');
        });
        $('#close_timepicker4').click(function(){
            $('#timepicker4').datetimepicker('hide');
        });
        $('#reset_timepicker4').click(function(){
            $('#timepicker4').datetimepicker('reset');
        });

            
    });
    </script>
    <script>
        
        function ajax_Documentos_1_table_municipios(){
            var id = $('select#id_estado').val();
            $.ajax({
                type:'POST',
                url: '<?php echo site_url('documentos_1/table_municipios'); ?>',
                data: 'id_estado='+id,
                success: 
                    function(resp){
                        $('select#id_municipio').html(resp);        
                    }
            });
        } 

        function ajax_Documentos_1_table_parroquias(){
            var id = $('select#id_municipio').val();
            $.ajax({
                type:'POST',
                url: '<?php echo site_url('documentos_1/table_parroquias'); ?>',
                data: 'id_municipio='+id,
                success: 
                    function(resp){
                        $('select#id_parroquia').html(resp);        
                    }
            });
        } 

        $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
            $.material.init();
        });
    </script>

  </body>
</html>