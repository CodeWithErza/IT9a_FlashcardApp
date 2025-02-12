<?php include 'helpers/not_authenticated.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Starrycards</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="assets/logo.png" />
  <script src="statics/js/bootstrap.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head> 

<body>
<section class="vh-100" style="background-image: url('assets/background_image1.png'); background-size: cover; background-position: center;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-9">
        <div class="card shadow" style="border-radius: 1rem; background: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px);">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
                <div class="d-flex flex-column align-items-center">
                <img src="assets/logo.png" alt="Logo" class="img-fluid" style="height: 150px; padding-top: 10px;">
                <img src="assets/icon-login.png" alt="login form" class="img-fluid mt-0" style="border-radius: 1rem 0 0 1rem;" />
                </div>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center" style="background: linear-gradient(to right, rgba(162, 165, 171), rgba(245, 245, 245, 0.5)); border-radius: 0 1rem 1rem 0; backdrop-filter: blur(10px);">
              <div class="card-body p-4 p-lg-5 text-black">

                <form class="form" action="handlers/login_handler.php" method="POST">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="bi bi-box-arrow-in-right" style="font-size: 40px; margin-right: 10px;"></i>
                        <i class="fas fa-sign-in-alt" style="font-size: 40px; margin-right: 10px;"></i>
                        <span class="h1 fw-bold mb-0" style="font-family: 'Arial', sans-serif; font-weight: 700; color: #333;">Log in</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</html>
