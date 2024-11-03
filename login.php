<?php
session_start();
$conn = new mysqli("localhost", "root", "", "test");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE user_name = '$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            header("Location: home.php");
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with this username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="form-container">
        
        <form method="POST">
            <h2>LOGIN</h2>
            <input type="text" name="user_name" placeholder="User Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <a href="register.php" class="signup-btn">Sign Up</a>
        </form>
        
       
    </div>
</body>
</html>
