

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/sparklines/sparkline.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/moment/moment.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/dist/js/adminlte.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/dist/js/demo.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/dist/js/pages/dashboard.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": [
        { extend: "copy", className: "btn btn-primary", text: '<i class="fas fa-copy"></i> Copy' },
        { extend: "csv", className: "btn btn-success", text: '<i class="fas fa-file-csv"></i> CSV' },
        { extend: "excel", className: "btn btn-info", text: '<i class="fas fa-file-excel"></i> Excel' },
        { extend: "pdf", className: "btn btn-danger", text: '<i class="fas fa-file-pdf"></i> PDF' },
        { extend: "print", className: "btn btn-warning", text: '<i class="fas fa-print"></i> Print' },
        { extend: "colvis", className: "btn btn-secondary", text: '<i class="fas fa-columns"></i> Colvis' },
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  </script>
</body>
</html>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\resources\views/atribut/footer.blade.php ENDPATH**/ ?>