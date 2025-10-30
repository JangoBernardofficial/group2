<?php
// src/process_registration.php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $gender = $_POST['gender'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    try {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT user_id FROM tbl_users WHERE user_email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "Email already registered!";
            header("Location: registration.php");
            exit();
        }
        
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user
        $stmt = $pdo->prepare("INSERT INTO tbl_users (user_firstname, user_lastname, user_gender, user_email, user_password) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$firstname, $lastname, $gender, $email, $hashed_password]);
        
        $_SESSION['success'] = "Registration successful! Please login.";
        header("Location: login.php");
        exit();
        
    } catch(PDOException $e) {
        $_SESSION['error'] = "Registration failed: " . $e->getMessage();
        header("Location: registration.php");
        exit();
    }
}
?>