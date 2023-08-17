@include('atribut.header')
@include('atribut.navbar')

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
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach($siswas as $siswa)
          <tr>
              <td class="text-center align-middle">{{ $no++ }}</td>
              <td class="text-center align-middle">
                  @if ($siswa->photo)
                      <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Foto Siswa" width="50px" class="rounded">
                  @else
                      Tidak Ada Foto
                  @endif
              </td>
              <td class="text-center align-middle fw-bold">{{ $siswa->nama }}</td>
              <td class="text-center align-middle">{{ $siswa->sekolah }}</td>
              <td class="text-center align-middle">
                  @if ($siswa->program === 'Flutter')
                      <i class="fa-brands fa-android text-success"></i> Flutter <i class="fa-brands fa-android text-success"></i>
                  @elseif ($siswa->program === 'Kotlin')
                      <i class="fa-solid fa-robot text-success"></i> Kotlin <i class="fa-solid fa-robot text-success"></i>
                  @elseif ($siswa->program === 'UI Design')
                      <i class="fas fa-paint-brush text-success"></i> UI Design <i class="fas fa-paint-brush text-success"></i>
                  @elseif ($siswa->program === 'Web Developer')
                      <i class="fas fa-code text-success"></i> Web Developer <i class="fas fa-code text-success"></i>
                  @else
                      {{ $siswa->program }}
                  @endif
              </td>
              <td class="text-center align-middle">Batch {{ $siswa->angkatan }}</td>
              <td class="text-center align-middle">
                <button type="button" class="btn btn-info btn-sm viewPhotoButton" data-modal-id="lihatFotoModal{{ $siswa->id }}">
                  <i class="fa-regular fa-image"></i>
              </button>
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal{{ $siswa->id }}">
                      <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal{{ $siswa->id }}">
                      <i class="fa-solid fa-trash"></i>
                  </button>
              </td>
          </tr>
          @endforeach
      </tbody>

        <tfoot>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Sekolah</th>
            <th class="text-center">Program</th>
            <th class="text-center">Angkatan</th>
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
          <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                    @for ($batch = 1; $batch <= 12; $batch++)
                        <option value="{{ $batch }}">Batch {{ $batch }}</option>
                    @endfor
                </select>
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

  @foreach($siswas as $siswa)
  <div class="modal fade" id="editModal{{ $siswa->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $siswa->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}" required>
            </div>
            <div class="mb-3">
              <label for="sekolah" class="form-label">Sekolah</label>
              <input type="text" class="form-control" id="sekolah" name="sekolah" value="{{ $siswa->sekolah }}" required>
            </div>
            <div class="mb-3">
              <label for="program" class="form-label">Program</label>
              <select class="form-select" id="program" name="program" required>
                <option value="" disabled>Pilih Program</option>
                <option value="flutter" {{ $siswa->program === 'flutter' ? 'selected' : '' }}>Flutter</option>
                <option value="kotlin" {{ $siswa->program === 'kotlin' ? 'selected' : '' }}>Kotlin</option>
                <option value="UI Design" {{ $siswa->program === 'UI Design' ? 'selected' : '' }}>UI Design</option>
                <option value="Web Developer" {{ $siswa->program === 'Web Developer' ? 'selected' : '' }}>Web Developer</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="angkatan" class="form-label">
                  Angkatan
              </label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <div class="input-group-text">
                          <i class="fas fa-list"></i>
                      </div>
                  </div>
                  <select class="form-control" id="angkatan" name="angkatan" required>
                      <option value="" disabled>Pilih Batch</option>
                      @for ($batch = 1; $batch <= 12; $batch++)
                          <option value="{{ $batch }}" {{ $siswa->angkatan == $batch ? 'selected' : '' }}>
                              <i class="fas fa-check-circle"></i>
                              Batch {{ $batch }}
                          </option>
                      @endfor
                  </select>
              </div>
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo" value="{{ $siswa->photo }}">
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
  </div>
  @endforeach

  @foreach($siswas as $siswa)
  <div class="modal fade" id="hapusModal{{ $siswa->id }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
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
          <h4>{{ $siswa->nama }}</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($siswas as $siswa)
  <div class="modal fade" id="lihatFotoModal{{ $siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatFotoModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="lihatFotoModalLabel">Foto Siswa : {{ $siswa->nama }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                  <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Foto Siswa" width="200px" class="rounded">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
          </div>
      </div>
  </div>
@endforeach



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
  @include('atribut.footer')
