@include('atribut.header')
@include('atribut.navbar')

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
            <th class="text-center">#</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Sekolah</th>
            <th class="text-center">Program</th>
            <th class="text-center">Angkatan</th>
            <th class="text-center">Skor</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
                    $no = 1;
                @endphp
          @foreach($siswas as $siswa)
          <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td class="text-center">{{ $siswa->nama }}</td>
            <td class="text-center">{{ $siswa->sekolah }}</td>
            <td class="text-center">{{ $siswa->program }}</td>
            <td class="text-center">{{ $siswa->angkatan }}</td>
            <td class="text-center">{{ $siswa->skor }}</td>
            <td class="text-center">
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
            <th class="text-center">Nama</th>
            <th class="text-center">Sekolah</th>
            <th class="text-center">Program</th>
            <th class="text-center">Angkatan</th>
            <th class="text-center">Skor</th>
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
          <form action="{{ route('siswa.store') }}" method="POST">
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
              <input type="text" class="form-control" id="angkatan" name="angkatan" value="Batch " required>
            </div>
            <input type="hidden" id="skor" name="skor" value="0">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
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
              <label for="angkatan" class="form-label">Angkatan</label>
              <input type="text" class="form-control" id="angkatan" name="angkatan" value="{{ $siswa->angkatan }}" required>
            </div>
            <div class="mb-3">
              <label for="skor" class="form-label">Skor</label>
              <input type="number" class="form-control" id="skor" name="skor" value="{{ $siswa->skor }}" required>
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





  @include('atribut.footer')
