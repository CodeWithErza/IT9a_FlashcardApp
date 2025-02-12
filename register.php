    <?php
    include 'helpers/not_authenticated.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Starrycards</title>
        <link href="statics/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="assets/logo.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <script src="statics/js/bootstrap.js"></script>
    </head>

    <body style="font-family: 'Arial', sans-serif;">
        <section class="vh-100" style="background-image: url('assets/background_image1.png'); background-size: cover; background-position: center;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-8">
                        <div class="card shadow" style="border-radius: 1rem; background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px);">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="assets/signup.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;" />
                                    </div>
                                    <div class="col-md-6 col-lg-7">
                                        <div class="card-body py-2 px-3 py-lg-3 px-lg-5 text-black">
                                            <div class="text-center">
                                                <h2 class="card-header" style="font-size: 2rem; font-weight: bold;">
                                                    <i class="fas fa-user-plus" style="height: 2rem;"></i>
                                                    Sign Up
                                                </h2>    <p class="fw-bold">Create your account</p>
                                            </div>
                                            <?php if (isset($_SESSION['errors'])): ?>    
                                                <div class="alert alert-danger">
                                                    <?php
                                                    echo $_SESSION['errors'];
                                                    unset($_SESSION['errors']);
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                            <form class="form" action="handlers/register_handler.php" method="POST">
                                                <div class="mb-3">
                                                    <label class="form-label" style="font-weight: bold;">Username</label>
                                                    <input type="text" class="form-control" name="username" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="font-weight: bold;">Email Address</label>
                                                    <input type="email" class="form-control" name="email" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="font-weight: bold;">Password</label>
                                                    <input type="password" class="form-control" name="password" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="font-weight: bold;">Confirm Password</label>
                                                    <input type="password" class="form-control" name="confirm_password" required />
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="terms" required>
                                                    <label class="form-check-label" for="terms">I agree to all statements in <a href="#">Terms of Service</a></label>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-success" style="background-color: #28a745; color: white; font-weight: bold;">Register</button>
                                                </div>
                                            </form>
                                            <div class="text-center mt-3">
                                                <p>Have already an account? <a href="index.php">Login here</a></p>
                                            </div>
                                        </div>    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>
