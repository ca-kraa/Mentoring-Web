@include('atribut.header')
@include('atribut.navbar')

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
        @php
        $no = 1;
       @endphp
          @foreach ($skors as $skor)
          <tr>
            <td class="text-center align-middle">{{ $no++ }}</td>
              <td class="text-center align-middle">{{ $skor->nama }}</td>
              <td class="text-center align-middle">{{ $skor->sekolah }}</td>
              <td class="text-center align-middle">
            @if ($skor->program === 'Flutter')
                <i class="fa-brands fa-android text-success"></i> Flutter <i class="fa-brands fa-android text-success"></i>
            @elseif ($skor->program === 'Kotlin')
                <i class="fa-solid fa-robot text-success"></i> Kotlin <i class="fa-solid fa-robot text-success"></i>
            @elseif ($skor->program === 'UI Design')
                <i class="fas fa-paint-brush text-success"></i> UI Design <i class="fas fa-paint-brush text-success"></i>
            @elseif ($skor->program === 'Web Developer')
                <i class="fas fa-code text-success"></i> Web Developer <i class="fas fa-code text-success"></i>
            @else
                {{ $skor->program }}
            @endif</td>
              <td class="text-center align-middle">Batch {{ $skor->angkatan }}</td>
              <td class="text-center align-middle">{{ ($skor->task1 + $skor->task2 + $skor->task3 + $skor->task4 + $skor->task5 + $skor->task6 + $skor->task7 + $skor->task8) / 8 }}</td>
              <td class="text-center align-middle">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihatNilaiModal{{ $skor->id }}">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editNilaiModal{{ $skor->id }}">
                    <i class="fa-solid fa-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target="#deleteModal{{ $skor->id }}">
                  <i class="fa-solid fa-trash"></i>
              </button>
              </td>
          </tr>
          @endforeach
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
      <form action="{{ route('skor.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <select name="nama" id="nama" class="form-control">
                <option value="" disabled selected>Pilih Nama Siswa</option>
                @php
                    $siswasWithoutSkor = $siswas->filter(function ($siswa) use ($skors) {
                        return !$skors->contains('nama', $siswa->nama);
                    });
                @endphp
                @if ($siswasWithoutSkor->isEmpty())
                    <option value="" disabled>Tidak ada siswa yang tersedia</option>
                @else
                    @foreach ($siswasWithoutSkor as $siswa)
                        <option value="{{ $siswa->nama }}">{{ $siswa->nama }}</option>
                    @endforeach
                @endif
            </select>
            @if ($siswasWithoutSkor->isEmpty())
                <p class="text-danger">Silahkan tambah data siswa terlebih dahulu.</p>
            @endif

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
            <label for="angkatan">angkatan</label>
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

@foreach ($skors as $skor)
    <div class="modal fade" id="lihatNilaiModal{{ $skor->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatNilaiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatNilaiModalLabel">Lihat Nilai Siswa: {{ $skor->nama }}</h5>
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
                                    @for ($i = 1; $i <= 4; $i++)
                                        <tr>
                                            <td>Task {{ $i }}</td>
                                            <td>{{ $skor["task$i"] }}</td>
                                        </tr>
                                    @endfor
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
                                    @for ($i = 5; $i <= 8; $i++)
                                        <tr>
                                            <td>Task {{ $i }}</td>
                                            <td>{{ $skor["task$i"] }}</td>
                                        </tr>
                                    @endfor
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
@endforeach


@foreach ($skors as $skor)
    <script>
        $(document).ready(function () {
            $('#lihatNilaiModal{{ $skor->id }}').on('show.bs.modal', function (event) {
                var modal = $(this);
                modal.find('#siswaNama').text('{{ $skor->nama }}');
                @for ($i = 1; $i <= 8; $i++)
                    modal.find('#task{{ $i }}').text('{{ $skor["task$i"] }}');
                @endfor
            });
        });
    </script>
@endforeach

@foreach ($skors as $skor)
    <div class="modal fade" id="editNilaiModal{{ $skor->id }}" tabindex="-1" role="dialog" aria-labelledby="editNilaiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNilaiModalLabel">Edit Nilai: {{ $skor->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('skor.update', $skor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-6">
                                <h4>Task 1 - 4</h4>
                                <label for="task1">Task 1:</label>
                                <input type="number" class="form-control" id="task1" name="task1" value="{{ $skor->task1 }}" required max="100">
                                <label for="task2">Task 2:</label>
                                <input type="number" class="form-control" id="task2" name="task2" value="{{ $skor->task2 }}" required max="100">
                                <label for="task3">Task 3:</label>
                                <input type="number" class="form-control" id="task3" name="task3" value="{{ $skor->task3 }}" required max="100">
                                <label for="task4">Task 4:</label>
                                <input type="number" class="form-control" id="task4" name="task4" value="{{ $skor->task4 }}" required max="100">                            </div>
                            <div class="col-md-6">
                                <h4>Task 5 - 8</h4>
                                <label for="task5">Task 5:</label>
                                <input type="number" class="form-control" id="task5" name="task5" value="{{ $skor->task5 }}" required max="100">
                                <label for="task6">Task 6:</label>
                                <input type="number" class="form-control" id="task6" name="task6" value="{{ $skor->task6 }}" required max="100">
                                <label for="task7">Task 7:</label>
                                <input type="number" class="form-control" id="task7" name="task7" value="{{ $skor->task7 }}" required max="100">
                                <label for="task8">Task 8:</label>
                                <input type="number" class="form-control" id="task8" name="task8" value="{{ $skor->task8 }}" required max="100">
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
@endforeach

@foreach ($skors as $skor)
    <div class="modal fade" id="deleteModal{{ $skor->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                        <p><strong>{{ $skor->nama }}</strong></p>
                        <p>Tindakan ini akan menghapus data secara permanen.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('skor.destroy', $skor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach


@include('atribut.footer')

<script>
    $(document).ready(function () {
      $('#nama').change(function () {
        var selectedNama = $(this).val();
        var selectedSiswa = @json($siswas);
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
