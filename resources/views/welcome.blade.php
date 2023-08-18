<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UdaCoding - Mentoring</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/summernote/summernote-bs4.min.css">
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    * {
        font-family: 'Poppins', sans-serif;
        }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="https://i.ibb.co/HhM1Qgg/image.png" alt="Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Leaderboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Testimonial</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-success link-underline-success" href="/dashboard">{{ "Hai, " . Auth::user()->name }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>


  <div class="container">
    <h1 class="fs-2 text-success mt-5">Leaderboard Mentoring Program</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Siswa</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="program-filter" class="form-label">Filter Program:</label>
                <div class="input-group">
                    <select class="form-select" id="program-filter">
                        <option value="" selected>Semua Program</option>
                        <option value="Flutter">Flutter</option>
                        <option value="Kotlin">Kotlin</option>
                        <option value="UI Design">UI Design</option>
                        <option value="Web Developer">Web Developer</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="batch-filter" class="form-label">Filter Batch:</label>
                <div class="input-group">
                    <select class="form-select" id="batch-filter">
                        <option value="" selected>Semua Batch</option>
                        <?php for ($batch = 1; $batch <= 12; $batch++) { ?>
                            <option value="{{ $batch }}">Batch {{ $batch }}</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <table id="siswa" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Sekolah</th>
                            <th class="text-center">Program</th>
                            <th class="text-center">Angkatan</th>
                            <th class="text-center">Skor</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($sortedSiswas as $siswa)
                            <tr>
                                <td class="text-center align-middle">{{ $no++ }}</td>
                                <td class="text-center align-middle">
                                    @if ($siswa->photo)
                                        <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Foto Siswa" width="60" class="rounded">
                                    @else
                                        Tidak Ada Foto
                                    @endif
                                </td>
                                <td class="text-center align-middle fw-bold">{{ $siswa->nama }}</td>
                                <td class="text-center align-middle">{{ $siswa->sekolah }}</td>
                                <td class="text-center align-middle">{{ $siswa->program }}</td>
                                <td class="text-center align-middle"> Batch {{ $siswa->angkatan }}</td>
                                <td class="text-center align-middle fw-bold">
                                    @if ($siswa->skors)
                                        <?php
                                        $totalScore = $siswa->skors->task1 + $siswa->skors->task2 + $siswa->skors->task3 + $siswa->skors->task4 +
                                                      $siswa->skors->task5 + $siswa->skors->task6 + $siswa->skors->task7 + $siswa->skors->task8;
                                        $averageScore = $totalScore / 8;
                                        ?>
                                        @if ($averageScore > 75)
                                            <span class="text-success">{{ number_format($averageScore, 2) }}</span>
                                        @elseif ($averageScore >= 70 && $averageScore <= 74)
                                            <span class="text-muted">{{ number_format($averageScore, 2) }}</span>
                                        @else
                                            <span class="text-danger">{{ number_format($averageScore, 2) }}</span>
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <t class="text-center">Foto</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Sekolah</th>
                        <th class="text-center">Program</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Skor</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $("#siswa").DataTable({
            "responsive": true,
            "lengthChange": true,
            "lengthMenu": [ 10, 20, 50, 100 ],
            "autoWidth": false,
        });

        var table = $('#siswa').DataTable();
        var programs = [
            { id: '', text: 'Semua Program' },
            { id: 'Flutter', text: 'Flutter' },
            { id: 'Kotlin', text: 'Kotlin' },
            { id: 'UI Design', text: 'UI Design' },
            { id: 'Web Developer', text: 'Web Developer' }
        ];

        var batches = [
            { id: '', text: 'Semua Batch' },
            <?php for ($batch = 1; $batch <= 12; $batch++) { ?>
                { id: '{{ $batch }}', text: 'Batch {{ $batch }}' },
            <?php } ?>
        ];

        // $('#program-filter').select2({
        //     data: programs,
        //     placeholder: 'Filter Program',
        //     allowClear: true
        // });

        // $('#batch-filter').select2({
        //     data: batches,
        //     placeholder: 'Filter Batch',
        //     allowClear: true
        // });

        $('#program-filter, #batch-filter').on('change', function () {
            var program = $('#program-filter').val();
            var batch = $('#batch-filter').val();

            table.column(4).search(program).column(5).search(batch).draw();
        });
    });
 </script>


</body>
</html>
