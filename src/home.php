<?php
// src/home.php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>HEALTHRWANDA - Home</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 800px; margin: 0 auto; }
        .welcome { background: #d4edda; color: #155724; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .user-info { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>HEALTHRWANDA Patient Portal</h1>
        
        <div class="welcome">
            <h2>Well logged in!</h2>
            <p>Welcome to your patient dashboard.</p>
        </div>
        
        <div class="user-info">
            <h3>Welcome, <?php echo htmlspecialchars($_SESSION['user_firstname']); ?>!</h3>
            <p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
        </div>
        
        <div>
            <h3>Available Features:</h3>
            <ul>
                <li>View Medical Records</li>
                <li>Check Appointment Schedule</li>
                <li>View Payment Information</li>
                <li>Contact Your Doctor</li>
            </ul>
        </div>
        
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>