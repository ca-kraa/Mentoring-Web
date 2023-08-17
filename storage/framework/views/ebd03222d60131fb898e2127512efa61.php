<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UdaCoding - Leaderboard</title>
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
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
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
                    <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item">
                                <a class="nav-link text-success link-underline-success" href="/dashboard"><?php echo e("Hai, " . Auth::user()->name); ?></a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>">Log in</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
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
                    <select class="form-select" id="program-filter">
                        <option value="" selected>Semua Program</option>
                        <option value="Flutter">Flutter</option>
                        <option value="Kotlin">Kotlin</option>
                        <option value="UI Design">UI Design</option>
                        <option value="Web Developer">Web Developer</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="batch-filter" class="form-label">Filter Batch:</label>
                    <select class="form-control" id="batch-filter">
                        <option value="" selected>Semua Batch</option>
                        <?php for($i = 1; $i <= 12; $i++): ?>
                            <option value="Batch <?php echo e($i); ?>">Batch <?php echo e($i); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <table id="siswa" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Sekolah</th>
                            <th class="text-center">Program</th>
                            <th class="text-center">Angkatan</th>
                            <th class="text-center">Skor</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php $__currentLoopData = $sortedSiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center align-middle"><?php echo e($loop->iteration); ?></td>
                                <td class="text-center align-middle">
                                    <?php if($siswa->photo): ?>
                                        <img src="<?php echo e(asset('storage/' . $siswa->photo)); ?>" alt="Foto Siswa" width="60" class="rounded">
                                    <?php else: ?>
                                        Tidak Ada Foto
                                    <?php endif; ?>
                                </td>
                                <td class="text-center align-middle fw-bold"><?php echo e($siswa->nama); ?></td>
                                <td class="text-center align-middle"><?php echo e($siswa->sekolah); ?></td>
                                <td class="text-center align-middle"><?php echo e($siswa->program); ?></td>
                                <td class="text-center align-middle"> Batch <?php echo e($siswa->angkatan); ?></td>
                                <td class="text-center align-middle fw-bold">
                                    <?php if($siswa->skors): ?>
                                        <?php
                                        $totalScore = $siswa->skors->task1 + $siswa->skors->task2 + $siswa->skors->task3 + $siswa->skors->task4 +
                                                      $siswa->skors->task5 + $siswa->skors->task6 + $siswa->skors->task7 + $siswa->skors->task8;
                                        $averageScore = $totalScore / 8;
                                        ?>
                                        <?php if($averageScore > 75): ?>
                                            <span class="text-success"><?php echo e(number_format($averageScore, 2)); ?></span>
                                        <?php elseif($averageScore >= 70 && $averageScore <= 74): ?>
                                            <span class="text-muted"><?php echo e(number_format($averageScore, 2)); ?></span>
                                        <?php else: ?>
                                            <span class="text-danger"><?php echo e(number_format($averageScore, 2)); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Foto</th>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#program-filter, #batch-filter').select2({
            allowClear: true
        });
        var table = $('#siswa').DataTable({
            responsive: true,
            lengthChange: true,
            lengthMenu: [10, 20, 50, 100],
            autoWidth: false,
        });
        $('#program-filter, #batch-filter').on('change', function () {
            applyFilters();
        });

        function applyFilters() {
            var program = $('#program-filter').val();
            var batch = $('#batch-filter').val();

            if (program === '' && batch === '') {
                table.search('').columns().search('').draw();
            } else {
                if (program !== '') {
                    table.column(4).search(program).draw();
                } else {
                    table.column(4).search('').draw();
                }

                if (batch !== '') {
                    table.column(5).search(batch).draw();
                } else {
                    table.column(5).search('').draw();
                }
            }
        }
    });
</script>

</body>
</html>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/welcome.blade.php ENDPATH**/ ?>