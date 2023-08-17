<?php echo $__env->make('atribut.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('atribut.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card">
  <div class="card-header">
      <h3 class="card-title text-success">Skor</h3>
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahSkorModal">
        <i class="fas fa-plus"></i> Tambah Data
    </button>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
          <tr>
              <th class="text-center">#</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Sekolah</th>
              <th class="text-center">Program</th>
              <th class="text-center">Angkatan</th>
              <th class="text-center">Rata-rata</th>
              <th class="text-center">Actions</th>
          </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
       ?>
          <?php $__currentLoopData = $skors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="text-center align-middle"><?php echo e($no++); ?></td>
              <td class="text-center align-middle fw-bold"><?php echo e($skor->nama); ?></td>
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
              <td class="text-center align-middle fw-bold">
                <?php
                $averageScore = ($skor->task1 + $skor->task2 + $skor->task3 + $skor->task4 + $skor->task5 + $skor->task6 + $skor->task7 + $skor->task8) / 8;
                ?>
                <?php if($averageScore > 75): ?>
                    <span class="text-success"><?php echo e($averageScore); ?></span>
                <?php elseif($averageScore >= 70 && $averageScore <= 74): ?>
                    <span class="text-muted"><?php echo e($averageScore); ?></span>
                <?php else: ?>
                    <span class="text-danger"><?php echo e($averageScore); ?></span>
                <?php endif; ?>
            </td>
            <td class="text-center align-middle">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihatNilaiModal<?php echo e($skor->id); ?>">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editNilaiModal<?php echo e($skor->id); ?>">
                    <i class="fa-solid fa-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target="#deleteModal<?php echo e($skor->id); ?>">
                  <i class="fa-solid fa-trash"></i>
              </button>
              </td>
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
              <th class="text-center">Rata-rata</th>
              <th class="text-center">Actions</th>
          </tr>
      </tfoot>
  </table>

  </div>
</div>

<div class="modal fade" id="tambahSkorModal" tabindex="-1" role="dialog" aria-labelledby="tambahSkorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahSkorModalLabel">Tambah Data Skor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(route('skor.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <select name="nama" id="nama" class="form-control">
                <option value="" disabled selected>Pilih Nama Siswa</option>
                <?php
                    $siswasWithoutSkor = $siswas->filter(function ($siswa) use ($skors) {
                        return !$skors->contains('nama', $siswa->nama);
                    });
                ?>
                <?php if($siswasWithoutSkor->isEmpty()): ?>
                    <option value="" disabled>Tidak ada siswa yang tersedia</option>
                <?php else: ?>
                    <?php $__currentLoopData = $siswasWithoutSkor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($siswa->nama); ?>"><?php echo e($siswa->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <?php if($siswasWithoutSkor->isEmpty()): ?>
                <p class="text-danger">Silahkan tambah data siswa terlebih dahulu.</p>
            <?php endif; ?>

          </div>
          <div class="form-group">
            <label for="sekolah">Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="program">Program</label>
            <input type="text" name="program" id="program" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="angkatan">Angkatan Ke</label>
            <input type="text" name="angkatan" id="angkatan" class="form-control" readonly>
          </div>
          <input type="hidden" name="task1" value="0">
          <input type="hidden" name="task2" value="0">
          <input type="hidden" name="task3" value="0">
          <input type="hidden" name="task4" value="0">
          <input type="hidden" name="task5" value="0">
          <input type="hidden" name="task6" value="0">
          <input type="hidden" name="task7" value="0">
          <input type="hidden" name="task8" value="0">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php $__currentLoopData = $skors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="lihatNilaiModal<?php echo e($skor->id); ?>" tabindex="-1" role="dialog" aria-labelledby="lihatNilaiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatNilaiModalLabel">Lihat Nilai Siswa: <?php echo e($skor->nama); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i = 1; $i <= 4; $i++): ?>
                                        <tr>
                                            <td>Task <?php echo e($i); ?></td>
                                            <td>
                                                <?php if($skor["task$i"] > 75): ?>
                                                    <span class="text-success"><?php echo e($skor["task$i"]); ?></span>
                                                <?php elseif($skor["task$i"] >= 70 && $skor["task$i"] <= 74): ?>
                                                    <span class="text-muted"><?php echo e($skor["task$i"]); ?></span>
                                                <?php else: ?>
                                                    <span class="text-danger"><?php echo e($skor["task$i"]); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i = 5; $i <= 8; $i++): ?>
                                        <tr>
                                            <td>Task <?php echo e($i); ?></td>
                                            <td>
                                                <?php if($skor["task$i"] > 75): ?>
                                                    <span class="text-success"><?php echo e($skor["task$i"]); ?></span>
                                                <?php elseif($skor["task$i"] >= 70 && $skor["task$i"] <= 74): ?>
                                                    <span class="text-muted"><?php echo e($skor["task$i"]); ?></span>
                                                <?php else: ?>
                                                    <span class="text-danger"><?php echo e($skor["task$i"]); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__currentLoopData = $skors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        $(document).ready(function () {
            $('#lihatNilaiModal<?php echo e($skor->id); ?>').on('show.bs.modal', function (event) {
                var modal = $(this);
                modal.find('#siswaNama').text('<?php echo e($skor->nama); ?>');
                <?php for($i = 1; $i <= 8; $i++): ?>
                    modal.find('#task<?php echo e($i); ?>').text('<?php echo e($skor["task$i"]); ?>');
                <?php endfor; ?>
            });
        });
    </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $skors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="editNilaiModal<?php echo e($skor->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editNilaiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNilaiModalLabel">Edit Nilai: <?php echo e($skor->nama); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('skor.update', $skor->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <h4>Task 1 - 4</h4>
                                <label for="task1">Task 1:</label>
                                <input type="number" class="form-control" id="task1" name="task1" value="<?php echo e($skor->task1); ?>" required max="100">
                                <label for="task2">Task 2:</label>
                                <input type="number" class="form-control" id="task2" name="task2" value="<?php echo e($skor->task2); ?>" required max="100">
                                <label for="task3">Task 3:</label>
                                <input type="number" class="form-control" id="task3" name="task3" value="<?php echo e($skor->task3); ?>" required max="100">
                                <label for="task4">Task 4:</label>
                                <input type="number" class="form-control" id="task4" name="task4" value="<?php echo e($skor->task4); ?>" required max="100">                            </div>
                            <div class="col-md-6">
                                <h4>Task 5 - 8</h4>
                                <label for="task5">Task 5:</label>
                                <input type="number" class="form-control" id="task5" name="task5" value="<?php echo e($skor->task5); ?>" required max="100">
                                <label for="task6">Task 6:</label>
                                <input type="number" class="form-control" id="task6" name="task6" value="<?php echo e($skor->task6); ?>" required max="100">
                                <label for="task7">Task 7:</label>
                                <input type="number" class="form-control" id="task7" name="task7" value="<?php echo e($skor->task7); ?>" required max="100">
                                <label for="task8">Task 8:</label>
                                <input type="number" class="form-control" id="task8" name="task8" value="<?php echo e($skor->task8); ?>" required max="100">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $skors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="deleteModal<?php echo e($skor->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa-solid fa-exclamation-triangle text-warning" style="font-size: 48px;"></i>
                        <h4 class="mt-3">Apakah Anda yakin ingin menghapus data skor?</h4>
                        <p><strong><?php echo e($skor->nama); ?></strong></p>
                        <p>Tindakan ini akan menghapus data secara permanen.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo e(route('skor.destroy', $skor->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php echo $__env->make('atribut.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(document).ready(function () {
      $('#nama').change(function () {
        var selectedNama = $(this).val();
        var selectedSiswa = <?php echo json_encode($siswas, 15, 512) ?>;
        var selectedSiswaData = selectedSiswa.find(siswa => siswa.nama === selectedNama);

        if (selectedSiswaData) {
          $('#sekolah').val(selectedSiswaData.sekolah);
          $('#program').val(selectedSiswaData.program);
          $('#angkatan').val(selectedSiswaData.angkatan);
        } else {
          $('#sekolah').val('');
          $('#program').val('');
          $('#angkatan').val('');
        }
      });
    });
  </script>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/skor/index.blade.php ENDPATH**/ ?>