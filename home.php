<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <center>
    <div class="home-container">
        <h2>Hello, <?php echo $_SESSION['user']; ?></h2>
        <a href="logout.php" class="signup-btn">Logout</a>
    </div>
    </center>
</body>
</html>
