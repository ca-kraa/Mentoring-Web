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
    <p>Nama Siswa: <?php echo e($skor->nama); ?></p>
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $skor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <?php
            $no = 1;
           ?>
            <td class="text-center align-middle"><?php echo e($no++); ?></td>
              <td class="text-center align-middle"><?php echo e($skor->nama); ?></td>
              <td class="text-center align-middle"><?php echo e($skor->sekolah); ?></td>
              <td class="text-center align-middle">
            <?php if($skor->program === 'Flutter'): ?>
                <i class="fa-brands fa-android text-success"></i> Flutter <i class="fa-brands fa-android text-success"></i>
            <?php elseif($skor->program === 'Kotlin'): ?>
                <i class="fa-solid fa-robot text-success"></i> Kotlin <i class="fa-solid fa-robot text-success"></i>
            <?php elseif($skor->program === 'UI Design'): ?>
                <i class="fas fa-paint-brush text-success"></i> UI Design <i class="fas fa-paint-brush text-success"></i>
            <?php elseif($skor->program === 'Web Developer'): ?>
                <i class="fas fa-code text-success"></i> Web Developer <i class="fas fa-code text-success"></i>
            <?php else: ?>
                <?php echo e($skor->program); ?>

            <?php endif; ?></td>
              <td class="text-center align-middle">Batch <?php echo e($skor->angkatan); ?></td>
              <td class="text-center align-middle"><?php echo e(($skor->task1 + $skor->task2 + $skor->task3 + $skor->task4 + $skor->task5 + $skor->task6 + $skor->task7 + $skor->task8) / 8); ?></td>
              <td class="text-center align-middle">
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#lihatNilaiModal" data-nama="<?php echo e($skor->nama); ?>" data-id="<?php echo e($skor->id); ?>"
                  data-task1="<?php echo e($skor->task1); ?>" data-task2="<?php echo e($skor->task2); ?>" data-task3="<?php echo e($skor->task3); ?>" data-task4="<?php echo e($skor->task4); ?>"
                  data-task5="<?php echo e($skor->task5); ?>" data-task6="<?php echo e($skor->task6); ?>" data-task7="<?php echo e($skor->task7); ?>" data-task8="<?php echo e($skor->task8); ?>">
                   <i class="fa-solid fa-eye"></i>
               </a>
                  <a href="<?php echo e(route('skor.edit', $skor->id)); ?>" class="btn btn-info"><i class="fa-solid fa-pencil"></i></a>
                  <form action="<?php echo e(route('skor.destroy', $skor->id)); ?>" method="POST" style="display: inline-block;">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                          <i class="fa-solid fa-trash"></i>
                      </button>
                  </form>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    </div>
  </body>
</html>

<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/cetak-nilai.blade.php ENDPATH**/ ?>