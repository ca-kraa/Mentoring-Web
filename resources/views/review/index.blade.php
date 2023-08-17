@include('atribut.header')
@include('atribut.navbar')

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
                  <th class="text-center" >No</th>
                  <th class="text-center" >Photo</th>
                  <th class="text-center" >Nama</th>
                  <th class="text-center" >angkatan</th>
                  <th class="text-center" >Program</th>
                  <th class="text-center" >Review</th>
                  <th class="text-center" >Aksi</th>
              </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
              @foreach ($reviews as $review)
                  <tr>
                    <td class="text-center align-middle">{{ $no++ }}</td>
                      <td class="text-center align-middle">
                        @if ($review->photo)
                        <img src="{{ asset('storage/' . $review->photo) }}" alt="Foto Siswa" width="50px" class="rounded">
                    @else
                        Tidak Ada Foto
                    @endif
                  </td>
                      <td class="text-center align-middle">{{ $review->nama }}</td>
                      <td class="text-center align-middle">{{ $review->angkatan }}</td>
                      <td class="text-center align-middle">
                        @if ($review->program === 'Flutter')
                            <i class="fa-brands fa-android text-success"></i> Flutter <i class="fa-brands fa-android text-success"></i>
                        @elseif ($review->program === 'Kotlin')
                            <i class="fa-solid fa-robot text-success"></i> Kotlin <i class="fa-solid fa-robot text-success"></i>
                        @elseif ($review->program === 'UI Design')
                            <i class="fas fa-paint-brush text-success"></i> UI Design <i class="fas fa-paint-brush text-success"></i>
                        @elseif ($review->program === 'Web Developer')
                            <i class="fas fa-code text-success"></i> Web Developer <i class="fas fa-code text-success"></i>
                        @else
                            {{ $review->program }}
                        @endif
                    </td>
                    <td class="text-center align-middle">
                      @if (str_word_count($review->review) <= 20)
                          {{ $review->review }}
                      @else
                          {{ substr($review->review, 0, 10) }} ...
                          <a href="#" data-toggle="modal" data-target="#reviewModal{{ $review->id }}">Read More</a>
                      @endif
                  </td>
                      <td class="text-center align-middle">
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tampilFotoModal{{ $review->id }}"><i class="fa-solid fa-image"></i></a>
                        <a href="#" class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editReviewModal{{ $review->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteReviewModal{{ $review->id }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                  </tr>
              @endforeach
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
          <form action="{{ route('review.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <select class="form-select" id="nama" name="nama" required>
                          <option value="" disabled selected>Pilih Nama Siswa</option>
                          @php
                              $siswasWithoutReview = $siswas->filter(function ($siswa) use ($reviews) {
                                  return !$reviews->pluck('nama')->contains($siswa->nama);
                              });
                          @endphp
                          @if ($siswasWithoutReview->isEmpty())
                              <option value="" disabled>--- Silakan tambahkan data siswa terlebih dahulu. ---</option>
                          @else
                              @foreach ($siswasWithoutReview as $siswa)
                                  <option value="{{ $siswa->nama }}" data-foto="{{ $siswa->photo }}" data-angkatan="{{ $siswa->angkatan }}" data-program="{{ $siswa->program }}">{{ $siswa->nama }}</option>
                              @endforeach
                          @endif
                      </select>
                      @if ($siswasWithoutReview->isEmpty())
                          <p class="text-danger">Silakan tambahkan data siswa terlebih dahulu.</p>
                      @endif
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

<div class="modal fade" id="reviewModal{{ $review->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Review Dari : {{ $review->nama }}</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              {{ $review->review }}
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
      </div>
  </div>
</div>

@foreach ($reviews as $review)
    <div class="modal fade" id="editReviewModal{{ $review->id }}" tabindex="-1" aria-labelledby="editReviewModalLabel{{ $review->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReviewModalLabel{{ $review->id }}">Edit Review</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('review.update', $review->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $review->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Review</label>
                            <textarea class="form-control" id="review" name="review" required>{{ $review->review }}</textarea>
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
@endforeach

@foreach ($reviews as $review)
    <div class="modal fade" id="deleteReviewModal{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteReviewModalLabel" aria-hidden="true">
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
                        <p><strong>{{ $review->nama }}</strong></p>
                        <p>Tindakan ini akan menghapus review secara permanen.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('review.destroy', $review->id) }}" method="POST">
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

@foreach ($reviews as $review)
    <div class="modal fade" id="tampilFotoModal{{ $review->id }}" tabindex="-1" aria-labelledby="tampilFotoModalLabel{{ $review->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tampilFotoModalLabel{{ $review->id }}">{{ $review->nama }} - Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if ($review->photo)
                        <img src="{{ asset('storage/' . $review->photo) }}" alt="Foto Siswa" class="img-fluid" style="max-height: 400px;">
                    @else
                        Tidak Ada Foto
                    @endif
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

@include('atribut.footer')
