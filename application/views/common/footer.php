<!-- Jquery Core Js -->
<script src= "<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src= "<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.js'); ?>"></script>

<!-- Bootstrap Core Js -->
<script src= "<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js'); ?>"></script>

<!-- Select Plugin Js -->
<script src= "<?php echo base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js'); ?>"></script>



<!-- Slimscroll Plugin Js -->
<script src= "<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>

<!-- Waves Effect Plugin Js -->
<script src= "<?php echo base_url('assets/plugins/node-waves/waves.js'); ?>"></script>

<!-- Custom Js -->
<script src= "<?php echo base_url('assets/js/admin.js'); ?>"></script>
<script src= "<?php echo base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js'); ?>"></script>
<!-- Jquery DataTable Plugin Js -->
<script src= " <?php echo base_url('assets/plugins/jquery-datatable/jquery.dataTables.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/momentjs/moment.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js'); ?>"></script>
<script src= " <?php echo base_url('assets/plugins/autosize/autosize.js'); ?>"></script>

<!-- Custom Js -->

<!-- Demo Js -->
<script src= "<?php echo base_url('assets/js/pages/tables/jquery-datatable.js'); ?>"></script>
<script src= "<?php echo base_url('assets/js/pages/form/form-validation.js'); ?>"></script>
<script src= "<?php echo base_url('assets/js/demo.js'); ?>"></script>

<script>
  var base_url = '<?php echo base_url(); ?>';
$(document).ready(function() {
 
  $('.categories').change(function(){
    //console.log('test');
    $("#Sub_Categories").empty();
    var value=$(this).val();
   $('#sub_cate_name').val('');

     $.ajax({

     url: base_url+'/Webservice/select_data',
     
        type: 'POST',
        data:{'key' : value}, 
       
        success: function(data) {

          var j_data=JSON.parse(data);
              $.each(j_data, function(index, valueOption) {
         var option = '<option value=' + valueOption.id + '>' + valueOption.name + '</option>';
        var selector = $("#Sub_Categories");
        selector.append(option);      
   			});
               $('#sub_cate_name').val(j_data['name']);
        }
    });  
});

  $('#Sub_Categories').change(function() {
   var sub_cate = $('#Sub_Categories option:selected').text();
   $('#sub_cate_name').val(sub_cate);
  });
});
  
  $(function () {
    //Textare auto growth
    autosize($('textarea.auto-growth'));

    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
});      
</script>
</body>

</html>