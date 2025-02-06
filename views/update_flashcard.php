<?php
include '../database/database.php';

try {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM flashcards WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $flashcard = $result->fetch_assoc();
    } else {
        die("Flashcard not found");
    }
    $stmt->close();
} catch (\Exception $e) {
    echo "Error: " . $e;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Flashcard</title>
    <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../statics/styles.css">
    <script src="../statics/js/bootstrap.js"></script>
</head>
<body>
    <div class="container-fluid p-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 p-4 shadow-lg bg-light rounded">
                <h2 class="fw-bold fst-italic text-center text-dark">Update Flashcard</h2>
                <form action="../handlers/update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $flashcard['id'] ?>">
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Question</label>
                        <input type="text" class="form-control" name="question" value="<?= $flashcard['question'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Answer</label>
                        <textarea class="form-control" name="answer" required><?= $flashcard['answer'] ?></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom">Update Flashcard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
