<?php echo $__env->make('atribut.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('atribut.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card">
    <div class="card-header">
      <h3 class="card-title text-success">Siswa</h3>
      <button class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahDataModal">
        <i class="fas fa-plus-circle mr-1"></i> Tambah Data
      </button>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Sekolah</th>
            <th class="text-center">Program</th>
            <th class="text-center">Angkatan</th>
            <th class="text-center">Portofolio</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
          ?>
          <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td class="text-center align-middle"><?php echo e($no++); ?></td>
              <td class="text-center align-middle">
                  <?php if($siswa->photo): ?>
                      <img src="<?php echo e(asset('storage/' . $siswa->photo)); ?>" alt="Foto Siswa" width="50px" class="rounded">
                  <?php else: ?>
                      Tidak Ada Foto
                  <?php endif; ?>
              </td>
              <td class="text-center align-middle fw-bold"><?php echo e($siswa->nama); ?></td>
              <td class="text-center align-middle"><?php echo e($siswa->sekolah); ?></td>
              <td class="text-center align-middle">
                  <?php if($siswa->program === 'Flutter'): ?>
                      <i class="fa-brands fa-android text-success"></i> Flutter <i class="fa-brands fa-android text-success"></i>
                  <?php elseif($siswa->program === 'Kotlin'): ?>
                      <i class="fa-solid fa-robot text-success"></i> Kotlin <i class="fa-solid fa-robot text-success"></i>
                  <?php elseif($siswa->program === 'UI Design'): ?>
                      <i class="fas fa-paint-brush text-success"></i> UI Design <i class="fas fa-paint-brush text-success"></i>
                  <?php elseif($siswa->program === 'Web Developer'): ?>
                      <i class="fas fa-code text-success"></i> Web Developer <i class="fas fa-code text-success"></i>
                  <?php else: ?>
                      <?php echo e($siswa->program); ?>

                  <?php endif; ?>
              </td>
              <td class="text-center align-middle">Batch <?php echo e($siswa->angkatan); ?></td>
              <td class="text-center align-middle">
                <?php if($siswa->portofolio): ?>
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#portofolioModal<?php echo e($siswa->id); ?>">
                        <i class="fa-solid fa-video"></i> Lihat
                    </button>
                <?php else: ?>
                    Portofolio Belum Ditambahkan
                <?php endif; ?>
            </td>
              <td class="text-center align-middle">
                <button type="button" class="btn btn-info btn-sm viewPhotoButton" data-modal-id="lihatFotoModal<?php echo e($siswa->id); ?>">
                  <i class="fa-regular fa-image"></i>
              </button>
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?php echo e($siswa->id); ?>">
                      <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?php echo e($siswa->id); ?>">
                      <i class="fa-solid fa-trash"></i>
                  </button>
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
            <th class="text-center">Portofolio</th>
            <th class="text-center">Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('siswa.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="sekolah" class="form-label">Sekolah</label>
                        <input type="text" class="form-control" id="sekolah" name="sekolah" required>
                    </div>

                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <select class="form-select" id="program" name="program" required>
                            <option value="" disabled selected>Pilih Program</option>
                            <option value="flutter">Flutter</option>
                            <option value="kotlin">Kotlin</option>
                            <option value="UI Design">UI Design</option>
                            <option value="Web Developer">Web Developer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="angkatan" class="form-label">Angkatan</label>
                        <select class="form-select" id="angkatan" name="angkatan" required>
                            <option value="" disabled selected>Pilih Batch</option>
                            <?php for($batch = 1; $batch <= 12; $batch++): ?>
                                <option value="<?php echo e($batch); ?>">Batch <?php echo e($batch); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="portofolio" class="form-label">Portofolio</label>
                      <input type="text" class="form-control" id="portofolio" name="portofolio" required>
                      <small class="form-text text-muted"> Contoh Link : https://www.youtube.com/embed/dQw4w9WgXcQ</small>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <p id="sizeWarning" class="text-danger"></p>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg, image/png" required>
                        <small class="form-text text-muted">Maksimal ukuran file: 5 MB</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editModal<?php echo e($siswa->id); ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo e($siswa->id); ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel<?php echo e($siswa->id); ?>">Edit Data Siswa</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('siswa.update', $siswa->id)); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e($siswa->nama); ?>" required>
          </div>
          <div class="mb-3">
            <label for="sekolah" class="form-label">Sekolah</label>
            <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?php echo e($siswa->sekolah); ?>" required>
          </div>
          <div class="mb-3">
            <label for="program" class="form-label">Program</label>
            <select class="form-select" id="program" name="program" required>
              <option value="" disabled>Pilih Program</option>
              <option value="flutter" <?php echo e($siswa->program === 'flutter' ? 'selected' : ''); ?>>Flutter</option>
              <option value="kotlin" <?php echo e($siswa->program === 'kotlin' ? 'selected' : ''); ?>>Kotlin</option>
              <option value="UI Design" <?php echo e($siswa->program === 'UI Design' ? 'selected' : ''); ?>>UI Design</option>
              <option value="Web Developer" <?php echo e($siswa->program === 'Web Developer' ? 'selected' : ''); ?>>Web Developer</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="angkatan" class="form-label">Angkatan</label>
            <select class="form-select" id="angkatan" name="angkatan" required>
              <option value="" disabled>Pilih Batch</option>
              <?php for($batch = 1; $batch <= 12; $batch++): ?>
              <option value="<?php echo e($batch); ?>" <?php echo e($siswa->angkatan == $batch ? 'selected' : ''); ?>>
                Batch <?php echo e($batch); ?>

              </option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="portofolio" class="form-label">Portofolio</label>
            <input type="text" class="form-control" id="portofolio" name="portofolio" value="<?php echo e($siswa->portofolio); ?>" required>
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg, image/png">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="hapusModal<?php echo e($siswa->id); ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus Data Siswa</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <div class="mb-3">
            <i class="fas fa-exclamation-triangle fa-4x text-danger  fa-fade"></i>
          </div>
          <p>Anda yakin ingin menghapus data siswa:</p>
          <h4><?php echo e($siswa->nama); ?></h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <form action="<?php echo e(route('siswa.destroy', $siswa->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="lihatFotoModal<?php echo e($siswa->id); ?>" tabindex="-1" role="dialog" aria-labelledby="lihatFotoModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="lihatFotoModalLabel">Foto Siswa : <?php echo e($siswa->nama); ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                  <img src="<?php echo e(asset('storage/' . $siswa->photo)); ?>" alt="Foto Siswa" width="200px" class="rounded">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
          </div>
      </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="portofolioModal<?php echo e($siswa->id); ?>" tabindex="-1" aria-labelledby="portofolioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="portofolioModalLabel">Portofolio : <?php echo e($siswa->nama); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <?php if($siswa->portofolio): ?>
                  <iframe id="videoFrame<?php echo e($siswa->id); ?>" width="100%" height="315" src="<?php echo e($siswa->portofolio); ?>" frameborder="0" allowfullscreen></iframe>
              <?php else: ?>
                  Portofolio belum ditambahkan.
              <?php endif; ?>
              <small class="form-text text-danger">* Jangan lupa di Pause videonya jika ingin tutup modal ini</small>
          </div>
      </div>
  </div>
</div>
<script>
  $('#portofolioModal<?php echo e($siswa->id); ?>').on('hidden.bs.modal', function () {
      var iframe = document.getElementById('videoFrame<?php echo e($siswa->id); ?>');
      if (iframe) {
          var iframeSrc = iframe.src;
          iframe.src = '';
          iframe.src = iframeSrc;
      }
  });
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





<script>
  const inputPhoto = document.getElementById('photo');
  const sizeWarning = document.getElementById('sizeWarning');

  inputPhoto.addEventListener('change', function() {
      const maxSize = 5 * 1024 * 1024; // 5 MB in bytes
      const fileSize = this.files[0].size;

      if (fileSize > maxSize) {
          sizeWarning.textContent = 'Ukuran file melebihi batas maksimal 5 MB.';
          this.value = ''; // Clear the input field
      } else {
          sizeWarning.textContent = ''; // Clear the warning message
      }
  });
</script>
  <?php echo $__env->make('atribut.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/siswa/index.blade.php ENDPATH**/ ?>