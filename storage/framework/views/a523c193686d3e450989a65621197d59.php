
<?php echo $__env->make('atribut.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('atribut.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-2">
    <div class="d-flex flex-row">
        <div class="card mr-3 flex-fill">
            <div class="card-body bg-gradient-success">
                <h3 class="text-white"><i class="fas fa-user-graduate"></i> Jumlah Siswa</h3>
                <p> <?php echo e($totalSiswas); ?></p>
            </div>
            <div class="card-body bg-white">
                <div id="countdown1"></div>
            </div>
        </div>
        <div class="card mr-3 flex-fill">
          <div class="card-body bg-gradient-danger">
              <h3 class="text-white"><i class="fas fa-book"></i> Jumlah Program</h3>
              <?php $__currentLoopData = $programCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <p><?php echo e($program); ?>: <?php echo e($count); ?></p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="card-body bg-white">
              <div id="countdown2"></div>
          </div>
      </div>

      <div class="card mr-3 flex-fill">
        <div class="card-body bg-gradient-warning">
            <h3 class="text-white"><i class="fas fa-star"></i> Total Skor</h3>
            <p class="text-white"><?php echo e($totalSkor); ?></p>
        </div>
        <div class="card-body bg-white">
            <div id="countdown3"></div>
        </div>
    </div>
        <div class="card mr-3 flex-fill">
            <div class="card-body bg-gradient-info">
                <h3 class="text-white"><i class="fas fa-calendar-alt"></i> Tanggal</h3>
                <p id="date"></p>
            </div>
            <div class="card-body bg-white">
                <div id="countdown4"></div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-user"></i> Data Siswa</h5>
          <p class="card-text">Di sini Anda dapat mengatur data siswa seperti nama, alamat, dan lain-lain.</p>
          <a href="<?php echo e(route('siswa.index')); ?>" class="btn btn-primary">Buka Data Siswa</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-chart-bar"></i> Data Skor</h5>
          <p class="card-text">Lihat dan kelola data skor siswa di sini. Analisis prestasi mereka dengan mudah.</p>
          <a href="/skor" class="btn btn-primary">Buka Data Skor</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="fa-solid fa-people-group"></i> Data Review Customer</h5>
          <p class="card-text">Lihat dan kelola data Review Customer di sini.</p>
          <a href="<?php echo e(route('review.index')); ?>" class="btn btn-primary">Buka Review Customer</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
setInterval(function() {
  var now = new Date();
  var dateString = now.toLocaleDateString();
  document.getElementById("date").innerHTML = dateString;
}, 100);

</script>

<?php echo $__env->make('atribut.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/index.blade.php ENDPATH**/ ?>