@extends('layouts/main')

@section('content')
  <div class="index">
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
          </ul>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item right-nav d-flex align-items-center">
                <a class="nav-link d-inline-block" href="/login" >
                  <img src="img/user-icon.png" width="20px" style="margin-right: .2rem" alt="">
                    <span class="username">Login</span>
                </a>
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
              <img src="img/collage1.png" width="100%" alt="">
            </div>
            <div class="col-lg-6">
              <img src="img/collage2.png" width="100%" alt="">
            </div>
            <div class="col-lg-12 mt-3">
              <img src="img/collage3.png" width="100%" alt="">
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
            <div class="col-lg-6 mt-5">
              <img class="d-block" src="img/collage-icon1.png" alt="">
              <h5>Experienced Doctors</h5>
              <p>MediCare consist of experienced doctors to serving patients </p>
            </div>
            <div class="col-lg-6 mt-5">
              <img class="d-block" src="img/collage-icon2.png" alt="">
              <h5>Advanced Healthcare</h5>
              <p>MediCare offers advanced and up-to-date healthcare to boost patient’s health</p>
            </div>
            <div class="col-lg-6 mt-5">
              <img class="d-block" src="img/collage-icon3.png" alt="">
              <h5>Fast and Modern Service</h5>
              <p>MediCare use service based on technology to serving patients</p>
            </div>
            <div class="col-lg-6 mt-5">
              <img class="d-block" src="img/collage-icon4.png" alt="">
              <h5>Cheap and Premium</h5>
              <p>Even though MediCare offering a lot of modern, fast, and trusted feature, Medicare is still pocket safe!  </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row">
        <div class="contact-container">
          <h3 align="center">High Qualified Doctors </h3> <br>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="card-doctor">
            <div class="row">
              <div class="col-lg-5"><img src="img/doctor1.png" alt=""></div>
              <div class="col-lg-7">
                <div class="card-doctor-title">
                  <h4>Annisa Sahda Devina</h4>
                  <p>Neurologist</p>
                </div>

                <div class="card-doctor-body">
                  <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil officia quas iste consequatur aliquid distinctio temporibus maiores quaerat sequi! Deserunt.
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card-doctor">
            <div class="row">
              <div class="col-lg-5"><img src="img/doctor1.png" alt=""></div>
              <div class="col-lg-7">
                <div class="card-doctor-title">
                  <h4>Mutiara Orlanda H.</h4>
                  <p>Dentist</p>
                </div>

                <div class="card-doctor-body">
                  <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil officia quas iste consequatur aliquid distinctio temporibus maiores quaerat sequi! Deserunt.
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-5">
          <div class="card-doctor">
            <div class="row">
              <div class="col-lg-5"><img src="img/doctor1.png" alt=""></div>
              <div class="col-lg-7">
                <div class="card-doctor-title">
                  <h4>Anis Zahra Nur Azizah</h4>
                  <p>Pediatric</p>
                </div>

                <div class="card-doctor-body">
                  <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil officia quas iste consequatur aliquid distinctio temporibus maiores quaerat sequi! Deserunt.
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-5">
          <div class="card-doctor">
            <div class="row">
              <div class="col-lg-5"><img src="img/doctor1.png" alt=""></div>
              <div class="col-lg-7">
                <div class="card-doctor-title">
                  <h4>Triska Widiantari</h4>
                  <p>Opthalmologist</p>
                </div>

                <div class="card-doctor-body">
                  <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil officia quas iste consequatur aliquid distinctio temporibus maiores quaerat sequi! Deserunt.
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="mt-5">
          <div class="card-contact">
            <div class="row">
              <div class="col-lg-12">
                <h3 class="text-center">Contact us to know more about MediCare</h3>
                <h4 class="text-center">Emergency medical care</h4>
              </div>
              {{-- <div class="col-lg-3 d-flex align-items-center"> --}}
                {{-- <a href="/contact" class="btn-contact-us">Contact Us</a> --}}
              {{-- </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">
      <div class="row">
          <div class="col-lg-7">
              <div class="card-contact">
                  <div class="row" align="center" >
                      <h3>Send us a massage</h3>
                      <hr>
                      <p>Have a Suggestion ? Complaint ? give your suggestions, messages, your impressions or even complaint to us. Every message from you means a lot to us. </p>
                  </div>
                  <div class="row mt-5">
                      <div class="col-lg-4">
                          <h5>Addres</h5>
                          <p>Denpasar, Bali</p>
                      </div>
                      <div class="col-lg-4">
                          <h5>Email</h5>
                          <p>medicare@gmail.com</p>
                      </div>
                      <div class="col-lg-4">
                          <h5>Phone</h5>
                          <p>+6281234567890</p>
                      </div>
                  </div>
                  <div class="container">
                      <div class="row">
                          {{-- <form action="" method="POST">
                              <div class="form-contact">
                                  <label for="nama">Nama : </label>
                                  <input type="text" name="nama" id="nama" required>
                              </div>
                              <br>
                              <div class="form-contact">
                                  <label for="email">Email : </label>
                                  <input type="text" name="email" id="email" required>
                              </div>
                              <br>
                              <div class="form-contact">
                                  <label for="message">Message : </label>
                                  <input type="text" name="message" id="message" required>
                              </div>
                              <div class="btn-container mt-5">
                                  <button type="send" name="send">Send Message</button>
                              </div>
                          </form> --}}
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-5">
              <div class="card-contact">
                  <div class="row" align="center">
                      <h3>Want to Get Closer to Us?</h3>
                      <hr>
                      <p>Message Us Via one of the social media that we have. Be part of our great team, to make the best hospital ever in the world.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <div class="footer mt-5 d-flex justify-content-center align-items-center">
      <div class="">
        <span class="text-logo">MediCare @ All Right Reserved</span>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
    <script>
      
    </script>
@endpush
  