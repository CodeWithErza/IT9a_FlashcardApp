<?php
include "../database/database.php";

try {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement to delete the flashcard
    $stmt = $conn->prepare("DELETE FROM flashcards WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement and check for success
    if ($stmt->execute()) {
      header("Location: ../index.php"); // Redirect to the main page after success
      exit;
    } else {
      echo "Failed to delete flashcard"; // Error if the operation fails
    }
  }
} catch (\Exception $e) {
  echo "Error: " . $e;
}
?>
