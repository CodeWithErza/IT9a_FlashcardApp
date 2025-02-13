<?php
include '../database/database.php';
include '../helpers/authenticated.php';
?>
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
    <script src="../statics/js/bootstrap.bundle.min.js"></script>
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

    <header>
        <div class="text-center mt-5">
            <img src="../assets/logo.png" alt="Logo" class="img-fluid mb-4">
        </div>
    </header>
    <div class="container">
        <h4 class="text-center text-light fw-bold" style="margin-bottom: 20px; text-shadow: #2e2c31 2px 2px 2px;">"Flip and let the moonlight guide you, one card at a time."</h4>
        <div class="text-center mb-4">
            <a href="add_flashcard.php" class="btn btn-custom">Make Flashcards</a>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <?php
        $result = $conn->query("SELECT * FROM flashcards");
        if ($result->num_rows > 0) {
            while ($flashcard = $result->fetch_assoc()) {
                echo '
                <div class="col">
                    <div class="card flashcard" onclick="this.classList.toggle(\'flipped\')">
                        <div class="flashcard-inner">
                            <div class="flashcard-front">
                                <h5 class="card-title"><strong>Question</strong></h5>
                                <p class="card-text">'.$flashcard['question'].'</p>
                            </div>
                            <div class="flashcard-back">
                                <h5 class="card-title"><strong>Answer</strong></h5>
                                <p class="card-text">'.$flashcard['answer'].'</p>
                                <div class="action-buttons">
                                    <a href="../handlers/update.php?id='.$flashcard['id'].'" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="../handlers/delete.php?id='.$flashcard['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this flashcard?\')">Delete</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>';
            }
        } else {
            echo "
            <div class=\"container d-flex justify-content-center\">
                <div class=\"col text-center\">
                    <div class=\"border rounded p-3 my-5\" style=\"margin-top: 80vh;\"> 
                        <p class=\"text-light\">No flashcards available. Add some!</p>
                    </div>
                </div>
            </div>";
        }
        ?>
        </div>
    </div>
</body>
</html>
