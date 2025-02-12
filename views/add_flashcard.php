<?php include '../helpers/authenticated.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Starrycards</title>
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../statics/styles.css">
  <link rel="icon" href="../assets/logo.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <script src="../statics/js/bootstrap.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top px-3" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); padding: 0.25rem 1rem;">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="../assets/logo.png" alt="Logo" style="height: 35px; width: auto; margin-right: 10px;">
        <span class="fw-bold text-dark">Flashcard App</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php" style="color: grey !important; font-weight: bold; transition: color 0.3s;"> <i class="fas fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../handlers/logout_handler.php" style="color: grey !important; font-weight: bold; transition: color 0.3s;"> <i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid p-4 mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-4 p-4 shadow-lg bg-light rounded">
        <h2 class="fw-bold fst-italic text-center text-dark">Add Flashcard</h2>
        <form action="../handlers/add.php" method="POST" class="flashcard-form">
          <div class="mb-3">
            <label class="form-label text-dark fw-bold">Question</label>
            <input type="text" class="form-control" name="question" required>
          </div>
          <div class="mb-3">
            <label class="form-label text-dark fw-bold">Answer</label>
            <textarea class="form-control" name="answer" required></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-custom">Add Flashcard</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
