<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UdaCoding</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <style>@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  *{font-family:'Poppins',sans-serif}.hero-section{background-image:url('https://images.unsplash.com/photo-1611416517780-eff3a13b0359?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1049&q=80');background-size:cover;background-position:center;height:100vh;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center}.hero-text{font-size:2.5rem}.hero-text span{text-decoration:underline;margin-right:10px}.about-card{display:flex;align-items:center;margin-top:50px}.about-image{flex:1;text-align:center}.about-image img{max-width:100%;border-radius:10%}.about-text{flex:2;padding:20px}.center-carousel{display:flex;justify-content:center;align-items:center;height:100vh}.video-card{width:100%;max-width:600px}.video-frame{width:100%;height:0;padding-bottom:56.25%}.circle-button{width:40px;height:40px;border-radius:50%;font-size:18px;display:flex;align-items:center;justify-content:center}.testimonial-card{background-color:#28a745;border:none}.testimonial-img{width:75px;height:75px;border-radius:50%;object-fit:cover}</style>
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
                        <a class="nav-link text-success link-underline-success" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/leaderboard">Leaderboard</a>
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
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 hero-section text-white py-5">
            <div class="hero-text">
                <span class="text-primary">Mentoring</span>
                <span class="text-success">Program</span>
              </div>
            <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo quos praesentium quis corrupti repellendus molestias omnis culpa doloremque enim eveniet tempora veritatis delectus, nam laborum assumenda quam! Ullam, nesciunt sint.</p>
            <a href="#" class="btn btn-success btn-lg">Join With Us</a>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title text-center text-success">About Us</h2>
              </div>
              <div class="card-body">
                <div class="about-card">
                  <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="About Us Image">
                  </div>
                  <div class="about-text ">
                    <h1 class="mb-4">About Mentoring</h1>
                    <p class="justify-content-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Sed sit amet metus sed orci interdum fringilla vel nec justo.</p>
                    <p class="justify-content-start">Sed euismod ante eu elit laoreet, a posuere est mollis. Nullam in arcu luctus, ullamcorper dolor eu, bibendum nunc.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="card border-0 shadow-lg mt-2">
          <div class="row g-0">
            <div class="col-md-6 bg-success text-white p-5 d-flex flex-column justify-content-center align-items-center">
                <h2 class="card-title text-center mb-4">Mentoring Categories</h2>
                <p class="card-text text-center">Pick your favorite categories for mentoring, bring yourself one step further from the others.</p>
              </div>
            <div class="col-md-6 d-flex align-items-center justify-content-around p-5">
              <div class="text-center bg-light p-3 rounded">
                <i class="fas fa-laptop-code fa-3x text-success"></i>
                <p class="mt-2">Kotlin</p>
              </div>
              <div class="text-center bg-light p-3 rounded">
                <i class="fas fa-globe-americas fa-3x text-success"></i>
                <p class="mt-2">English</p>
              </div>
              <div class="text-center bg-light p-3 rounded">
                <i class="fas fa-paint-brush fa-3x text-success"></i>
                <p class="mt-2">Web Design</p>
              </div>
              <div class="text-center bg-light p-3 rounded">
                <i class="fab fa-android fa-3x text-success"></i>
                <p class="mt-2">Flutter</p>
              </div>
              <div class="text-center bg-light p-3 rounded">
                <i class="fas fa-palette fa-3x text-success"></i>
                <p class="mt-2">UI Design</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-5">
        <h1 class="card-title text-center text-success mb-4 text-xl">Leaderboard</h1>
        <p class="text-center"><a href="/leaderboard" class="text-primary">Lihat Leaderboard Semua</a></p>
        <div class="row justify-content-center">
            @php
            $juaraCounter = 0;
            @endphp
            @foreach ($siswas as $siswa)
            @if ($siswa->skors)
            <?php
            $totalScore = $siswa->skors->task1 + $siswa->skors->task2 + $siswa->skors->task3 + $siswa->skors->task4 +
                          $siswa->skors->task5 + $siswa->skors->task6 + $siswa->skors->task7 + $siswa->skors->task8;
            $averageScore = $totalScore / 8;
            ?>
            @if ($averageScore > 75)
            @php
            $program = $siswa->program;
            @endphp
            @if ($juaraCounter < 3) <!-- Hanya menampilkan tiga juara -->
            <div class="col-md-4 {{ $program }}">
                <h6 class="text-success">Juara {{ ++$juaraCounter }}</h6>
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Gambar Juara {{ $juaraCounter }}" width="50px" class="rounded">
                        <p class="card-text">{{ $siswa->nama }}</p>
                        <p class="card-text">
                            @if ($program === 'Flutter')
                            <i class="fab fa-android text-success"></i> Flutter <i class="fab fa-android text-success"></i>
                            @elseif ($program === 'Kotlin')
                            <i class="fas fa-robot text-success"></i> Kotlin <i class="fas fa-robot text-success"></i>
                            @elseif ($program === 'UI Design')
                            <i class="fas fa-paint-brush text-success"></i> UI Design <i class="fas fa-paint-brush text-success"></i>
                            @elseif ($program === 'Web Developer')
                            <i class="fas fa-code text-success"></i> Web Developer <i class="fas fa-code text-success"></i>
                            @else
                            {{ $program }}
                            @endif
                        </p>
                        <p class="card-text fw-bold">
                            @if ($averageScore > 75)
                            <span class="text-success">{{ number_format($averageScore, 2) }}</span>
                            @else
                            <span class="text-muted">{{ number_format($averageScore, 2) }}</span>
                            @endif
                        </p>
                        <p class="card-text">Batch {{ $siswa->angkatan }}</p>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endif
            @endforeach
        </div>
    </div>






<div class="container mt-5">
  <div class="card">
      <div class="card-header text-center">
          <h4 class="text-success fw-bold">Portofolio</h4>
      </div>
      <div class="card-body">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                  @foreach ($siswas as $index => $siswa)
                  <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                      @if ($siswa->portofolio)
                      <iframe width="100%" height="500" src="{{ $siswa->portofolio }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      @else
                      Portofolio belum ditambahkan.
                      @endif
                      <div class="carousel-caption d-none d-md-block">
                          Nama: {{ $siswa->nama }} | Batch {{ $siswa->angkatan }} |
                          @if ($siswa->program === 'Flutter')
                              <i class="fab fa-android"></i> Flutter <i class="fab fa-android"></i>
                          @elseif ($siswa->program === 'Kotlin')
                              <i class="fas fa-robot"></i> Kotlin <i class="fas fa-robot"></i>
                          @elseif ($siswa->program === 'UI Design')
                              <i class="fas fa-paint-brush"></i> UI Design <i class="fas fa-paint-brush"></i>
                          @elseif ($siswa->program === 'Web Developer')
                              <i class="fas fa-code"></i> Web Developer <i class="fas fa-code"></i>
                          @else
                              {{ $siswa->program }}
                          @endif
                      </div>
                  </div>
                  @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
  </div>
</div>


<script>
  $(document).ready(function() {
      var siswaData = @json($siswas);
      var currentSlideIndex = 0;

      function updateCarouselCaption(index) {
          var siswa = siswaData[index];
          var nama = siswa.nama;
          var batch = siswa.angkatan;
          var program = siswa.program;

          var programIcon = '';
          if (program === 'Flutter') {
              programIcon = '<i class="fab fa-android"></i> Flutter <i class="fab fa-android"></i>';
          } else if (program === 'Kotlin') {
              programIcon = '<i class="fas fa-robot"></i> Kotlin <i class="fas fa-robot"></i>';
          } else if (program === 'UI Design') {
              programIcon = '<i class="fas fa-paint-brush"></i> UI Design <i class="fas fa-paint-brush"></i>';
          } else if (program === 'Web Developer') {
              programIcon = '<i class="fas fa-code"></i> Web Developer <i class="fas fa-code"></i>';
          } else {
              programIcon = program;
          }

          $('.carousel-caption p').html(nama + ' | Batch: ' + batch + ' | ' + programIcon);
      }

      updateCarouselCaption(currentSlideIndex);

      $('#carouselExampleControls').on('slide.bs.carousel', function (event) {
          currentSlideIndex = $(event.relatedTarget).index();

          if (currentSlideIndex >= 0 && currentSlideIndex < siswaData.length) {
              updateCarouselCaption(currentSlideIndex);
          }
      });

      function autoSlide() {
          $('#carouselExampleControls').carousel('next');
      }
      setInterval(autoSlide, 9000);
  });
</script>





<div class="container mt-5">
  <h2 class="text-center text-success">Testimonials</h2>
  <div class="row">
      <div class="col-md-12">
          <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                  @foreach($reviews as $index => $review)
                      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                          <div class="card testimonial-card text-white">
                              <div class="text-center mt-3">
                                  @if ($review->photo)
                                      <img src="{{ asset('storage/' . $review->photo) }}" alt="Foto Siswa" width="50px" class="rounded">
                                  @else
                                      Tidak Ada Foto
                                  @endif
                              </div>
                              <div class="card-body">
                                  <p class="card-text text-center">{{ $review->nama }}</p>
                                  <p class="card-text text-center">{{ $review->review }}</p>
                              </div>
                              <div class="text-center mb-3">
                                Batch {{ $review->angkatan }} |

                                 @if ($review->program === 'Flutter')
                                      <i class="fab fa-android"></i> Flutter <i class="fab fa-android"></i>
                                  @elseif ($review->program === 'Kotlin')
                                      <i class="fas fa-robot"></i> Kotlin <i class="fas fa-robot"></i>
                                  @elseif ($review->program === 'UI Design')
                                      <i class="fas fa-paint-brush"></i> UI Design <i class="fas fa-paint-brush"></i>
                                  @elseif ($review->program === 'Web Developer')
                                      <i class="fas fa-code"></i> Web Developer <i class="fas fa-code"></i>
                                  @else
                                      {{ $review->program }}
                                  @endif
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
              <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
  </div>
</div>
<script>
  $(document).ready(function() {
      var reviewData = @json($reviews);
      var currentSlideIndex = 0;

      function updateCarouselText(index) {
          var review = reviewData[index];
          var nama = review.nama;
          var angkatan = review.angkatan;
          var program = review.program;

          var programIcon = '';
          if (program === 'Flutter') {
              programIcon = '<i class="fab fa-android"></i> Flutter <i class="fab fa-android"></i>';
          } else if (program === 'Kotlin') {
              programIcon = '<i class="fas fa-robot"></i> Kotlin <i class="fas fa-robot"></i>';
          } else if (program === 'UI Design') {
              programIcon = '<i class="fas fa-paint-brush"></i> UI Design <i class="fas fa-paint-brush"></i>';
          } else if (program === 'Web Developer') {
              programIcon = '<i class="fas fa-code"></i> Web Developer <i class="fas fa-code"></i>';
          } else {
              programIcon = program;
          }

          var carouselText = 'Batch ' + angkatan + ' | ' + programIcon;
          $('.carousel-text').html(carouselText);
      }

      updateCarouselText(currentSlideIndex);

      $('#testimonialCarousel').on('slide.bs.carousel', function (event) {
          currentSlideIndex = $(event.relatedTarget).index();

          if (currentSlideIndex >= 0 && currentSlideIndex < reviewData.length) {
              updateCarouselText(currentSlideIndex);
          }
      });

      function autoSlide() {
          $('#testimonialCarousel').carousel('next');
      }
      setInterval(autoSlide, 9000);
  });
</script>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        var isCollapsed = true;

        $('#read-all-button').click(function(e){
            e.preventDefault();

            if (isCollapsed) {
                $('.read-more-content').show();
                $(this).text('Read Less');
            } else {
                $('.read-more-content').hide();
                $(this).text('Read More');
            }

            isCollapsed = !isCollapsed;
        });
    });
</script>












<footer class="text-center text-lg-start bg-light text-muted">
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>UdaMentoring
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>

          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Kotlin</a>
            </p>
            <p>
              <a href="#!" class="text-reset">English</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Web Design</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Flutter</a>
            </p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Home</a>
            </p>
            <p>
              <a href="#!" class="text-reset">About</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Categories</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Leaderboard</a>
            </p>
            <p>
                <a href="#!" class="text-reset">Portofolio</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Testimonial</a>
              </p>
          </div>
        </div>
      </div>
    </section>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.min.js"></script>
  <script>
      $(document).ready(function(){
          $('.testimonial-slider').slick({
              dots: true,
              infinite: true,
              speed: 500,
              slidesToShow: 1,
              adaptiveHeight: true,
              // Optional: Add more Slick options here
          });
      });
  </script>

  </body>

  </html>
