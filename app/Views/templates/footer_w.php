

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- jQuery -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url() ?>asset/dist/js/pages/dashboard.js"></script> -->
<script src="<?php echo base_url() ?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#tableProfile").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "print"]
    }).buttons().container().appendTo('#tableProfile_wrapper .col-md-6:eq(0)');
  });
</script>