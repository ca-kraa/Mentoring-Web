<?php echo $__env->make('atribut.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('atribut.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Mentoring</h3>
        <button class="btn btn-primary float-right">
          <i class="fas fa-plus-circle mr-1"></i> Tambah Data
        </button>
      </div>

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Misc</td>
          <td>IE Mobile</td>
          <td>Windows Mobile 6</td>
          <td>-</td>
          <td>C</td>
        </tr>
        <tr>
          <td>Misc</td>
          <td>PSP browser</td>
          <td>PSP</td>
          <td>-</td>
          <td>C</td>
        </tr>
        <tr>
          <td>Other browsers</td>
          <td>All others</td>
          <td>-</td>
          <td>-</td>
          <td>U</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
<?php echo $__env->make('atribut.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\resources\views/siswa/siswa.blade.php ENDPATH**/ ?>