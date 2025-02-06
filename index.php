<?php 
include 'database/database.php'; ?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flashcard App</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="statics/styles.css">
  <link rel="icon" href="assets/logo.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <script src="statics/js/bootstrap.bundle.min.js"></script>
</head>
<header>
    <div class="text-center mt-3">
    <img src="assets/logo.png" alt="Logo" class="img-fluid mb-4">
  </div>
</header>   
<body>
  <div class="container mt-2">
     <h4 class="text-center text-light fw-bold" style="margin-bottom: 20px; text-shadow: #2e2c31 2px 2px 2px;">"Flip and let the moonlight guide you, one card at a time."</h4>
    <div class="text-center mb-4">
      <a href="views/add_flashcard.php" class="btn btn-custom">Make Flashcards</a>
    </div>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    <?php
    $result = $conn->query("SELECT * FROM flashcards");
    if ($result->num_rows > 0) {
        while ($flashcard = $result->fetch_assoc()) {
            echo "
            <div class='col'>
                <div class='card flashcard' onclick='this.classList.toggle(\"flipped\")'>
                    <div class='flashcard-inner'>
                        <div class='flashcard-front'>
                            <h5 class='card-title'><strong>Question</strong></h5>
                            <p class='card-text'>{$flashcard['question']}</p>
                        </div>
                        <div class='flashcard-back'>
                            <h5 class='card-title'><strong>Answer</strong></h5>
                            <p class='card-text'>{$flashcard['answer']}</p>
                            <div class='action-buttons'>
                                <a href='handlers/update.php?id={$flashcard['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='handlers/delete.php?id={$flashcard['id']}' class='btn btn-danger btn-sm'>Delete</a>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            ";
        }
    } else {
      echo "
      <div class=\"container d-flex justify-content-center\">
        <div class=\"col text-center\">
          <div class=\"border rounded p-3 my-5\" style=\"margin-top: 80vh;\"> 
            <p class=\"text-muted\">No flashcards available. Add some!</p>
          </div>
        </div>
      </div>";
    }
    ?>
    </div>
  </div>
</body>
</html>
