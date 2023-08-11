<?php echo $__env->make('atribut.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('atribut.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Mentoring</h3>
    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahDataModal">
      <i class="fas fa-plus-circle mr-1"></i> Tambah Data
   </button>

  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Sekolah</th>
                <th>Program</th>
                <th>Angkatan</th>
                <th>Skor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
      ?>
            <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($no++); ?></td>
                <td><?php echo e($siswa->nama); ?></td>
                <td><?php echo e($siswa->sekolah); ?></td>
                <td><?php echo e($siswa->program); ?></td>
                <td><?php echo e($siswa->angkatan); ?></td>
                <td><?php echo e($siswa->skor); ?></td>
                <td>
                  <button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal">
                      <i class="bi bi-pencil"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" data-mdb-toggle="modal" data-mdb-target="#hapusModal">
                      <i class="bi bi-trash"></i>
                  </button>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Sekolah</th>
                <th>Program</th>
                <th>Angkatan</th>
                <th>Skor</th>
                <th>Aksi</th>
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
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('siswa.store')); ?>" method="POST">
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
                  <input type="text" class="form-control" id="angkatan" name="angkatan"  value="Batch " required>
              </div>
              <input type="hidden" id="skor" name="skor" value="0">
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
      </div>

      </div>
    </div>
  </div>

<?php echo $__env->make('atribut.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\resources\views/siswa/index.blade.php ENDPATH**/ ?>