<?php

session_start();
include '../database/database.php';

try {
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = verify_user($email, $password);

    if ($user) {
      // Generate a unique token
      $token = bin2hex(random_bytes(32));

      // Store the token in the session
      $_SESSION['access_token'] = $token;

      // Optionally store token in a cookie
      // setcookie("access_token", $token, time() + (86400 * 7), "/", "", false, true); // Expires in 7 days

      header("Location: ../views/home.php");
      exit;
    } else {
      $_SESSION['errors'] = "Invalid email or password!";
      header("Location: ../index.php");
      exit;
    }
  }
} catch (\Exception $e) {
  echo "Error: " . $e->getMessage();
}

// Function to verify user credentials
function verify_user($email, $password)
{
  global $conn;

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
      return $row; // Return user info
    }
  }
  return false;
}
