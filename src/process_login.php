<?php
// src/process_login.php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM tbl_users WHERE user_email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_firstname'] = $user['user_firstname'];
            
            header("Location: home.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password!";
            header("Location: login.php");
            exit();
        }
        
    } catch(PDOException $e) {
        $_SESSION['error'] = "Login failed: " . $e->getMessage();
        header("Location: login.php");
        exit();
    }
}
?>