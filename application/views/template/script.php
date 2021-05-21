<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/adminlte/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/adminlte/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/adminlte/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url('assets/adminlte/') ?>dist/js/demo.js"></script> -->
<!-- DataTables -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- EasyUI -->
<script src="<?php echo base_url('assets/easyui/') ?>jquery.easyui.min.js"></script>
<script src="<?php echo base_url('assets/js/custom.global.js');?>" type="text/javascript"></script>
<!-- select2 -->
<script src="<?php echo base_url('assets/js/select2.min.js');?>" type="text/javascript"></script>
<!-- CSS Element Queries -->
<!-- terbilang -->
<script src="<?php echo base_url('assets/js/terbilang.js');?>" type="text/javascript"></script>
<!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js');?>" type="text/javascript"></script> -->
<script src="<?php echo base_url('assets/js/jquery.mask.min.js');?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/') ?>css-element-queries/src/ResizeSensor.js"></script>
<script src="<?php echo base_url('assets/') ?>css-element-queries/src/ElementQueries.js"></script>
<script src="<?php echo base_url('assets/js/utils.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/accounting.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
    var toolbar = [{
        text:'Add',
        iconCls:'icon-add',
        handler:function(){alert('add')}
    },{
        text:'Cut',
        iconCls:'icon-cut',
        handler:function(){alert('cut')}
    },'-',{
        text:'Save',
        iconCls:'icon-save',
        handler:function(){alert('save')}
    }];
</script>
<?php
    if (isset($js)) {
        $this->load->view('js/'.$js);
    }
?>