<?php
include "../database/database.php";

try {
  if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    header("Location: ../views/update_flashcard.php?id=$id");
    exit;
  } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $stmt = $conn->prepare("UPDATE flashcards SET question = ?, answer = ? WHERE id = ?");
    $stmt->bind_param("ssi", $question, $answer, $id);

    if ($stmt->execute()) {
      header("Location: ../index.php");
      exit;
    } else {
      echo "Update failed";
    }
  }
} catch (\Exception $e) {
  echo "Error: " . $e;
}
?>