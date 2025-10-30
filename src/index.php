<?php
// src/index.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>HEALTHRWANDA - Home</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 800px; margin: 0 auto; }
        .nav { margin: 20px 0; }
        .nav a { display: inline-block; margin-right: 20px; padding: 10px 20px; 
                background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .nav a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to HEALTHRWANDA</h1>
        <p>Hospital Management System</p>
        
        <div class="nav">
            <a href="registration.php">Register</a>
            <a href="login.php">Login</a>
        </div>
        
        <p>Please register or login to access your medical information.</p>
    </div>
</body>
</html>