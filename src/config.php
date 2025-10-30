<?php
// src/config.php
$host = 'group1_db';
$dbname = 'group1_shareride_db';
$username = 'root';
$password = '12345678';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS tbl_users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        user_firstname VARCHAR(100) NOT NULL,
        user_lastname VARCHAR(100) NOT NULL,
        user_gender VARCHAR(10) NOT NULL,
        user_email VARCHAR(255) UNIQUE NOT NULL,
        user_password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $pdo->exec($sql);
    
} catch(PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
}
?>