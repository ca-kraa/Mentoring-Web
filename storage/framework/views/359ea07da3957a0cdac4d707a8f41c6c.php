<?php echo $__env->make('atribut.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('atribut.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card">
  <div class="card-header">
      <h3 class="card-title text-success">Data Customer Review</h3>
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahReviewModal">
        <i class="fas fa-plus"></i> Tambah Data
    </button>
  </div>
  <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Photo</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">angkatan</th>
                  <th class="text-center">Program</th>
                  <th class="text-center">Review</th>
                  <th class="text-center">Aksi</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            ?>
              <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="text-center align-middle"><?php echo e($no++); ?></td>
                      <td class="text-center align-middle">
                        <?php if($review->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $review->photo)); ?>" alt="Foto Siswa" width="50px" class="rounded">
                    <?php else: ?>
                        Tidak Ada Foto
                    <?php endif; ?>
                  </td>
                      <td class="text-center align-middle"><?php echo e($review->nama); ?></td>
                      <td class="text-center align-middle"><?php echo e($review->angkatan); ?></td>
                      <td class="text-center align-middle">
                        <?php if($review->program === 'Flutter'): ?>
                            <i class="fa-brands fa-android text-success"></i> Flutter <i class="fa-brands fa-android text-success"></i>
                        <?php elseif($review->program === 'Kotlin'): ?>
                            <i class="fa-solid fa-robot text-success"></i> Kotlin <i class="fa-solid fa-robot text-success"></i>
                        <?php elseif($review->program === 'UI Design'): ?>
                            <i class="fas fa-paint-brush text-success"></i> UI Design <i class="fas fa-paint-brush text-success"></i>
                        <?php elseif($review->program === 'Web Developer'): ?>
                            <i class="fas fa-code text-success"></i> Web Developer <i class="fas fa-code text-success"></i>
                        <?php else: ?>
                            <?php echo e($review->program); ?>

                        <?php endif; ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php if(str_word_count($review->review) <= 20): ?>
                          <?php echo e($review->review); ?>

                      <?php else: ?>
                          <?php echo e(substr($review->review, 0, 10)); ?> ...
                          <a href="#" data-toggle="modal" data-target="#reviewModal<?php echo e($review->id); ?>">Read More</a>
                      <?php endif; ?>
                  </td>
                      <td class="text-center align-middle">
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tampilFotoModal<?php echo e($review->id); ?>"><i class="fa-solid fa-image"></i></a>
                        <a href="#" class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editReviewModal<?php echo e($review->id); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteReviewModal<?php echo e($review->id); ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <tfoot>
              <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Photo</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">angkatan</th>
                  <th class="text-center">Program</th>
                  <th class="text-center">Review</th>
                  <th class="text-center">Aksi</th>
              </tr>
          </tfoot>
      </table>
  </div>
</div>

<div class="modal fade" id="tambahReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Review</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?php echo e(route('review.store')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <select class="form-select" id="nama" name="nama" required>
                          <option value="" disabled selected>Pilih Nama Siswa</option>
                          <?php
                              $siswasWithoutReview = $siswas->filter(function ($siswa) use ($reviews) {
                                  return !$reviews->pluck('nama')->contains($siswa->nama);
                              });
                          ?>
                          <?php if($siswasWithoutReview->isEmpty()): ?>
                              <option value="" disabled>--- Silakan tambahkan data siswa terlebih dahulu. ---</option>
                          <?php else: ?>
                              <?php $__currentLoopData = $siswasWithoutReview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($siswa->nama); ?>" data-foto="<?php echo e($siswa->photo); ?>" data-angkatan="<?php echo e($siswa->angkatan); ?>" data-program="<?php echo e($siswa->program); ?>"><?php echo e($siswa->nama); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                      </select>
                      <?php if($siswasWithoutReview->isEmpty()): ?>
                          <p class="text-danger">Silakan tambahkan data siswa terlebih dahulu.</p>
                      <?php endif; ?>
                  </div>
                  <div class="mb-3">
                      <label for="review" class="form-label">Review (Maksimal 150 Kata)</label>
                      <textarea class="form-control" id="review" name="review" required maxlength="150"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="angkatan" class="form-label">Angkatan</label>
                      <input type="text" class="form-control" id="angkatan" name="angkatan" readonly>
                  </div>
                  <div class="mb-3">
                      <label for="program" class="form-label">Program</label>
                      <input type="text" class="form-control" id="program" name="program" readonly>
                  </div>
                  <div class="mb-3">
                      <input type="hidden" id="photo" name="photo">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>

<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="reviewModal<?php echo e($review->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Review Dari : <?php echo e($review->nama); ?></h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <?php echo e($review->review); ?>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
      </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="editReviewModal<?php echo e($review->id); ?>" tabindex="-1" aria-labelledby="editReviewModalLabel<?php echo e($review->id); ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReviewModalLabel<?php echo e($review->id); ?>">Edit Review</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('review.update', $review->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e($review->nama); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Review</label>
                            <textarea class="form-control" id="review" name="review" required><?php echo e($review->review); ?></textarea>
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

<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="deleteReviewModal<?php echo e($review->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="deleteReviewModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa-solid fa-exclamation-triangle text-warning" style="font-size: 48px;"></i>
                        <h4 class="mt-3">Apakah Anda yakin ingin menghapus review?</h4>
                        <p><strong><?php echo e($review->nama); ?></strong></p>
                        <p>Tindakan ini akan menghapus review secara permanen.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo e(route('review.destroy', $review->id)); ?>" method="POST">
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

<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="tampilFotoModal<?php echo e($review->id); ?>" tabindex="-1" aria-labelledby="tampilFotoModalLabel<?php echo e($review->id); ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tampilFotoModalLabel<?php echo e($review->id); ?>"><?php echo e($review->nama); ?> - Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <?php if($review->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $review->photo)); ?>" alt="Foto Siswa" class="img-fluid" style="max-height: 400px;">
                    <?php else: ?>
                        Tidak Ada Foto
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<script>
  const inputPhoto = document.getElementById('photo');
  const sizeWarning = document.getElementById('sizeWarning');

  inputPhoto.addEventListener('change', function() {
      const maxSize = 5 * 1024 * 1024;
      const fileSize = this.files[0].size;

      if (fileSize > maxSize) {
          sizeWarning.textContent = 'Ukuran file melebihi batas maksimal 5 MB.';
          this.value = '';
      } else {
          sizeWarning.textContent = '';
      }
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const namaSelect = document.getElementById('nama');
      const photoInput = document.getElementById('photo');
      const angkatanInput = document.getElementById('angkatan');
      const programInput = document.getElementById('program');

      namaSelect.addEventListener('change', function () {
          const selectedOption = namaSelect.options[namaSelect.selectedIndex];
          photoInput.value = selectedOption.getAttribute('data-foto');
          angkatanInput.value = selectedOption.getAttribute('data-angkatan');
          const programData = selectedOption.getAttribute('data-program');
          programInput.value = programData;
      });
  });
</script>

<?php echo $__env->make('atribut.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/review/index.blade.php ENDPATH**/ ?>