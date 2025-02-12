<?php

include '../database/database.php';
session_start();

try {
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if email already exists
    if (email_exists($email)) {
      $_SESSION['errors'] = "Email already taken!";
      header("Location: ../register.php");
      exit;
    }

    // Check if username already exists
    if (username_exists($username)) {
      $_SESSION['errors'] = "Username already taken!";
      header("Location: ../register.php");
      exit;
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
      $_SESSION['errors'] = "Password Mismatch!";
      header("Location: ../register.php");
      exit;
    }

    // Create an account if email and username do not exist
    if (create_account($username, $email, $password)) {
      $_SESSION['success'] = "Account created successfully! You can now login.";
      header("Location: ../index.php");
      exit;
    } else {
      $_SESSION['errors'] = "Account creation failed!";
      header("Location: ../register.php");
      exit;
    }
  }
} catch (\Exception $e) {
  $_SESSION['errors'] = "Error: " . $e->getMessage();
  header("Location: ../register.php");
  exit;
}

function email_exists($email)
{
  global $conn;

  $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  return $stmt->num_rows > 0;
}

function username_exists($username)
{
  global $conn;

  $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  return $stmt->num_rows > 0;
}

function create_account($username, $email, $password)
{
  global $conn;

  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("sss", $username, $email, $hashed_password);
  return $stmt->execute();
}
