<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "test");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['user_name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, user_name, password) VALUES ('$name', '$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="form-container">
        
        <form method="POST">
        <h2>SIGN UP</h2>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="user_name" placeholder="User Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
            <a href="login.php">Already have an account? Login here</a>
        </form>
        
    </div>
</body>
</html>
