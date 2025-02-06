<?php
include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $stmt = $conn->prepare("INSERT INTO flashcards (question, answer) VALUES (?, ?)");
    $stmt->bind_param("ss", $question, $answer);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
