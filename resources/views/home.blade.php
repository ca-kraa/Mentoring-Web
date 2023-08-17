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
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    * {
        font-family: 'Poppins', sans-serif;
        }
        .hero-section {
          background-image: url('https://images.unsplash.com/photo-1611416517780-eff3a13b0359?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1049&q=80'); /* Ganti dengan path gambar Anda */
          background-size: cover;
          background-position: center;
          height: 100vh;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          text-align: center;
        }
    .hero-text {
      font-size: 2.5rem;
    }

    .hero-text span {
      text-decoration: underline;
      margin-right: 10px;
    }
    .about-card {
      display: flex;
      align-items: center;
      margin-top: 50px;
    }

    .about-image {
      flex: 1;
      text-align: center;
    }

    .about-image img {
      max-width: 100%;
      border-radius: 10%;
    }

    .about-text {
      flex: 2;
      padding: 20px;
    }
    .video-card {
      width: 500px;
    }
    .video-frame {
      width: 100%;
      height: 200px;
    }
    .circle-button {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .testimonial-card {
      background-color: #28a745;
      border: none;
    }
    .testimonial-img {
      width: 75px;
      height: 75px;
      border-radius: 50%;
      object-fit: cover;
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
      <div class="container">
      <h1 class="card-title text-center text-success mb-4 text-xl ">Leaderboard</h1>
    </div>
    <div class="container mt-5">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <h6>Juara 2</h6>
                    <div class="card">
                        <div class="card-body">
                            <img src="https://i.ibb.co/17QTLyc/Png.png" alt="Gambar Juara 2" class="rounded-circle-small">
                            <p class="card-text">Anonim</p>
                            <p class="card-text">Kotlin</p>
                            <p class="card-text">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <h6>Juara 1</h6>
                    <div class="card">
                        <div class="card-body">
                            <img src="https://i.ibb.co/17QTLyc/Png.png" alt="Gambar Juara 1" class="rounded-circle-small">
                            <p class="card-text">Anonim</p>
                            <p class="card-text">Kotlin</p>
                            <p class="card-text">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <h6>Juara 3</h6>
                    <div class="card">
                        <div class="card-body">
                            <img src="https://i.ibb.co/17QTLyc/Png.png" alt="Gambar Juara 3" class="rounded-circle-small">
                            <p class="card-text">Anonim</p>
                            <p class="card-text">Kotlin</p>
                            <p class="card-text">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="card video-card">
            <div class="card-body text-center">
                <div id="videoContainer">
                    <iframe id="videoFrame" class="video-frame" src="https://www.youtube.com/embed/AWHu0EB-iXI" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <h4 class="text-success">Portofolio</h4>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button id="prevButton" class="btn btn-success mr-2 circle-button"><i class="fas fa-chevron-left"></i></button>
                    <button id="nextButton" class="btn btn-success ml-2 circle-button"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const videoFrame = document.getElementById('videoFrame');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        const videos = [
            "https://www.youtube.com/embed/AWHu0EB-iXI",
            "https://www.youtube.com/embed/IIl0YzgF6C8",
            "https://www.youtube.com/embed/0HvZtDraYCs",
        ];

        let currentVideoIndex = 0;

        function updateVideo() {
            videoFrame.src = videos[currentVideoIndex];
        }

        prevButton.addEventListener('click', () => {
            currentVideoIndex = (currentVideoIndex - 1 + videos.length) % videos.length;
            updateVideo();
        });

        nextButton.addEventListener('click', () => {
            currentVideoIndex = (currentVideoIndex + 1) % videos.length;
            updateVideo();
        });

        updateVideo();
    </script>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card testimonial-card text-white">
                <img src="https://i.ibb.co/rsyxYCT/tumblr-4ab47da0bc19b46549c3283aaf328e3f-b3519766-1280.jpg" class="card-img-top testimonial-img" alt="Testimonial 1">
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus tortor eu tincidunt consectetur.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card testimonial-card text-white">
                <img src="https://i.ibb.co/rsyxYCT/tumblr-4ab47da0bc19b46549c3283aaf328e3f-b3519766-1280.jpg" class="card-img-top testimonial-img" alt="Testimonial 2">
                <div class="card-body">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Pellentesque nec elit a leo efficitur feugiat nec id justo. Nullam at metus eu risus iaculis ultrices.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card testimonial-card text-white">
                <img src="https://i.ibb.co/rsyxYCT/tumblr-4ab47da0bc19b46549c3283aaf328e3f-b3519766-1280.jpg" class="card-img-top testimonial-img" alt="Testimonial 3">
                <div class="card-body">
                    <h5 class="card-title">Mike Johnson</h5>
                    <p class="card-text">Curabitur laoreet, elit vel venenatis varius, justo odio eleifend tellus, id hendrerit elit justo id dui.</p>
                </div>
            </div>
        </div>
    </div>
</div>

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

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
