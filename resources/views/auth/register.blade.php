<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page | MediCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body class="register">
    <div class="container">
        <div class="u-card row">
            <div class="col-lg-6 pl-0 card-img-container">
                <img src="img/login-banner.png" height="100%" width="100%" alt="">
            </div>
            <div class="col-lg-6 px-5 card-text-container">
                <h2 class="text-center mt-5">Register</h2>
                <form class="mt-5" action="">
                    <label class="mb-2" for="nama">Nama</label>
                    <input class="mb-3" type="text" id="nama">
                    <label class="mb-2" for="username">Username</label>
                    <input class="mb-3" type="text" id="username">
                    <label class="mb-2" for="address">Adress</label>
                    <input class="mb-3" type="text" id="address">
                    <label class="mb-2" for="phone">Phone</label>
                    <input class="mb-3" type="tel" id="phone">
                    <label class="mb-2" for="email">Email</label>
                    <input class="mb-3" type="email" id="email">
                    <label class="mb-2" for="password">Password</label>
                    <input class="mb-3" type="password" id="password">
                    <div class="btn-container mt-5">
                      <button type="submit">Sign Up</button>
                    </div>
                </form>
                <p class="mt-5">Do you already have an account ? <a class="sign-up-link" href="/login">Login Here</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>