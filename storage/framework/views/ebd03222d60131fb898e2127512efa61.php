<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UdaCoding - Mentoring</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/summernote/summernote-bs4.min.css">
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    * {
        font-family: 'Poppins', sans-serif;
        }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="https://i.ibb.co/HhM1Qgg/image.png" alt="Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-success link-underline-success" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Leaderboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Testimonial</a>
                    </li>
                </ul>
                <button class="btn btn-success ms-5">Join Us</button>
            </div>
        </div>
    </nav>

  <div class="container">
    <h1 class="fs-2 text-success mt-5">Leaderboard Mentoring Program</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Siswa</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="program-filter" class="form-label">Filter Program:</label>
                <div class="input-group">
                    <select class="form-select" id="program-filter">
                        <option value="" selected>Semua Program</option>
                        <option value="Flutter">Flutter</option>
                        <option value="Kotlin">Kotlin</option>
                        <option value="UI Design">UI Design</option>
                        <option value="Web Developer">Web Developer</option>
                    </select>
                </div>
            </div>

            <table id="siswa" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Sekolah</th>
                        <th class="text-center">Program</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Skor</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $no = 1;

                    ?>
                    <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($no++); ?></td>
                        <td class="text-center"><?php echo e($siswa->nama); ?></td>
                        <td class="text-center"><?php echo e($siswa->sekolah); ?></td>
                        <td class="text-center"><?php echo e($siswa->program); ?></td>
                        <td class="text-center"><?php echo e($siswa->angkatan); ?></td>
                        <td class="text-center"><?php echo e($siswa->skor); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Sekolah</th>
                        <th class="text-center">Program</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Skor</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


  </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="<?php echo e(asset('assets/AdminLTE')); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

   <script>
       $(function () {
           $("#siswa").DataTable({
               "responsive": true,
               "lengthChange": true,
               "lengthMenu": [ 10, 20, 50, 100 ],
               "autoWidth": false,
           });
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
           $('#program-filter').select2({
               data: programs,
               placeholder: 'Filter Program',
               allowClear: true
           });
       });
   </script>

</body>
</html>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/welcome.blade.php ENDPATH**/ ?>