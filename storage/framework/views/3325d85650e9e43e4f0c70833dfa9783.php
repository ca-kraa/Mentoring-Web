

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
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
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<script>
  $(function () {
  $("#example1").DataTable({
    "responsive": true,
    "lengthChange": true,
    "lengthMenu": [ 10, 20, 50, 100 ],
    "autoWidth": false,
    "buttons": [
      { extend: "copy", className: "btn btn-primary", text: '<i class="fas fa-copy"></i> Copy' },
      { extend: "csv", className: "btn btn-success", text: '<i class="fas fa-file-csv"></i> CSV' },
      { extend: "excel", className: "btn btn-info", text: '<i class="fas fa-file-excel"></i> Excel' },
      { extend: "pdf", className: "btn btn-danger", text: '<i class="fas fa-file-pdf"></i> PDF' },
      { extend: "print", className: "btn btn-warning", text: '<i class="fas fa-print"></i> Print' },
      { extend: "colvis", className: "btn btn-light", text: '<i class="fas fa-columns"></i> Colvis' },
    ]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>

<script>
  $(function () {
    $("#siswa").DataTable({
      "responsive": true,
      "lengthChange": true,
      "lengthMenu": [ 10, 20, 50, 100 ],
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // Buat select filter untuk kolom "Program"
    var table = $('#siswa').DataTable();
    var programs = ['Flutter', 'Kotlin', 'UI Design', 'Web Developer'];

    $('#program-filter').on('change', function () {
      var program = $(this).val();
      if (program === 'Semua Program') {
        table.column(3).search('').draw();
      } else {
        table.column(3).search(program).draw();
      }
    });

    // Inisialisasi select2 filter
    $('#program-filter').select2({
      data: programs,
      placeholder: 'Filter Program',
      allowClear: true
    });
  });
</script>

<script>
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#preview-image').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#photo").change(function () {
      readURL(this);
  });
</script>




<script>
  $(document).ready(function () {
      $('#lihatNilaiModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Tombol yang memicu modal
          var modal = $(this);

          var nama = button.data('nama');
          var task1 = button.data('task1');
          var task2 = button.data('task2');
          var task3 = button.data('task3');
          var task4 = button.data('task4');
          var task5 = button.data('task5');
          var task6 = button.data('task6');
          var task7 = button.data('task7');
          var task8 = button.data('task8');

          modal.find('#siswaNama').text(nama);
          modal.find('#task1').text(task1);
          modal.find('#task2').text(task2);
          modal.find('#task3').text(task3);
          modal.find('#task4').text(task4);
          modal.find('#task5').text(task5);
          modal.find('#task6').text(task6);
          modal.find('#task7').text(task7);
          modal.find('#task8').text(task8);
      });
  });
</script>

<script>
  function lihatNilai(nama, task1, task2, task3, task4, task5, task6, task7, task8) {
      document.getElementById('siswaNama').textContent = nama;
      document.getElementById('task1').textContent = task1;
      document.getElementById('task2').textContent = task2;
      document.getElementById('task3').textContent = task3;
      document.getElementById('task4').textContent = task4;
      document.getElementById('task5').textContent = task5;
      document.getElementById('task6').textContent = task6;
      document.getElementById('task7').textContent = task7;
      document.getElementById('task8').textContent = task8;
      $('#lihatNilaiModal').modal('show');
  }
</script>

<script>
  $(document).ready(function () {
      $('.viewPhotoButton').click(function () {
          const modalId = $(this).data('modal-id');
          $(`#${modalId}`).modal('show');
      });
  });
</script>

</body>
</html>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/atribut/footer.blade.php ENDPATH**/ ?>