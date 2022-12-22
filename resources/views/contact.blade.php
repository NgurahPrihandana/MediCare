<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Landing Page | MediCare</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="contact">
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
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item right-nav d-flex align-items-center dropdown">
                            <div class="outer" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="img/user-icon.png" width="20px" alt="">
                                <a class="nav-link d-inline-block" href="#" >
                                    <span class="username">Login</span>
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
            <div class="container mt-5">
                <div class="row row-banner d-flex align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="col-lg-12 mt-5">
                            <h2>Contact Us</h2>
                            <h5>Feel free to contact us any time</h5>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-9">
                        <div class="mini-logo mt-5">
                            <img src="/img/collage-icon1.png" alt="">
                            <h6 class="d-inline-block mb-3 ms-3">Patient is Priority</h6>
                        </div>
                        <h2>Live a Healthier life <br> With Medicare</h2>        
                        <p class="mt-5">
                            MediCare is a hospital that provides the best service to improve your life. MediCare service are here so you can have fun with someone you care about
                        </p>
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
                            <form action="" method="POST">
                                <div class="form-contact">
                                    <label for="nama">Nama : </label>
                                    <input type="text" name="nama" id="nama" required>
                                </div>
                                <div class="form-contact">
                                    <label for="email">Email : </label>
                                    <input type="text" name="email" id="email" required>
                                </div>
                                <div class="form-contact">
                                    <label for="message">Message : </label>
                                    <input type="text" name="message" id="message" required>
                                </div>
                                <button type="send" name="send">Send Massage</button>
                            </form>
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
        
    </body>
</html>
