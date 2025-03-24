<?php
session_start();

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

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE name = :name");
    $stmt->execute(['name' => $username]);
    $user = $stmt->fetch();
    //password_verify($password, $user['password']) 
    if ($user && $password == $user['password']) {
        $_SESSION['user'] = $user['name'];
        echo "Logged in as: " . htmlspecialchars($user['name']);
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>