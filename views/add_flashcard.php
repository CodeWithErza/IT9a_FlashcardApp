<?php include '../database/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Flashcard</title>
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../statics/styles.css">
  <script src="../statics/js/bootstrap.js"></script>
</head>

<body>
  <div class="container-fluid p-4">
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
