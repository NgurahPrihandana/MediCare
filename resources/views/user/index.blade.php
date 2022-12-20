<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page | MediCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body class="index">
    <nav class="navbar fixed-top nav-user navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-semibold" href="#">
          <img src="img/logo-medicare.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          <span class="text-logo">MediCare</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-center" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item right-nav d-flex align-items-center dropdown">
              <div class="outer" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/user-icon.png" width="20px" alt="">
                <a class="nav-link d-inline-block" href="#" >
                  <span class="username">Prihandana</span>
                </a>
              </div>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="bg-container">
      <div class="container">
          <div class="row row-banner d-flex align-items-center">
            <div class="col-lg-6 col-md-12 banner-img">
              <img src="img/doctor-image2.png" alt="">
            </div>
            <div class="col-lg-6">
              <div class="mini-logo">
                <img src="/img/hearth.png" alt="">
                <h6 class="d-inline-block mb-3 ms-3">Health Come First</h6>
              </div>
              <h2>Live a Healthier life <br> With Medicare</h2>
              <a href="" class="btn btn-danger button">
                {{-- <span>Get in Touch</span> --}}
                <span>See Our Service</span>
                <!-- icon -->
              </a>
              <p class="mt-3">MediCare is a website for users to booking doctors easily. Get doctors for your problems here with MediCare!</p>
            </div>
          </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-6">
              <img src="" alt="">
            </div>
            <div class="col-lg-6">
              <img src="" alt="">
            </div>
            <div class="col-lg-12">
              <img src="" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h3>
            We have been helping patients for more than 10 years
          </h3>
          <p class="mt-3">
            MediCare had experiences to handling patients for more than 10 years. There are some reasons why we become trusted medical website. 
          </p>
          <div class="row mt-5">
            <div class="col-lg-6">
              <img class="d-block" src="" alt="">
              <h5>Experienced Doctors</h5>
              <p>MediCare consist of experienced doctors to serving patients </p>
            </div>
            <div class="col-lg-6">
              <img class="d-block" src="" alt="">
              <h5>Advanced Healthcare</h5>
              <p>MediCare offers advanced and up-to-date healthcare to boost patient’s health</p>
            </div>
            <div class="col-lg-6">
              <img class="d-block" src="" alt="">
              <h5>Fast and Modern Service</h5>
              <p>MediCare use service based on technology to serving patients</p>
            </div>
            <div class="col-lg-6">
              <img class="d-block" src="" alt="">
              <h5>Cheap and Premium</h5>
              <p>Even though MediCare offering a lot of modern, fast, and trusted feature, Medicare is still pocket safe!  </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>