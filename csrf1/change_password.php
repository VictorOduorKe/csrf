<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    die("You must be logged in to change your password.");
}

//generate a CSRF TOKEN
if(empty($_SESSION['csrf_token'])){
    $_SESSION['csrf_token']=bin2hex(random_bytes(32));
}

// Database connection
$host = 'localhost';
$dbname = 'csrf';
$username = 'csrf';
$password = 'csrf_attack';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// handle password change
if($_SERVER["REQUEST_METHOD"]=='POST'){
    if(!isset($_POST['csrf_token'])||$_POST!==$_SESSION['csrf_token']){
        die("csrf validation failed");
    }
}

// Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_password'])) {
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $user = $_SESSION['user'];

    // Update password in the database
    $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE name = :name");
    $stmt->execute(['password' => $_POST['new_password'], 'name' => $user]);

    echo "Password changed successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <form method="POST">
        <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">
        <input type="password" name="new_password" placeholder="New Password" required>
        <button type="submit">Change Password</button>
    </form>
</body>
</html>