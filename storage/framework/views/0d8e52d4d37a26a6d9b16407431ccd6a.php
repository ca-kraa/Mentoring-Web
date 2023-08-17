<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UdaCoding</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/dist/css/adminlte.min.css">

</head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    * {
        font-family: 'Poppins', sans-serif;
        }

  .dataTables_wrapper .btn {
    border-radius: 5px;
    margin-right: 5px;
  }

  .dataTables_wrapper .btn:hover {
    opacity: 0.8;
  }

  .dt-button-collection .buttons-collection {
    background-color: #28a745 !important;
    border: none !important;
  }

  </style>
  <body>
    <div class="wrapper">

<h1>Detail Nilai Siswa</h1>
    <p>Nama Siswa: <?php echo e($siswaNama); ?></p>
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 1; $i <= 8; $i++): ?>
            <tr>
                <td>Task <?php echo e($i); ?></td>
                <td><?php echo e($nilaiTasks[$i]); ?></td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    </div>
  </body>
</html>

<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/skor/cetak-nilai.blade.php ENDPATH**/ ?>