<?php
include 'backend/conn.php';
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin.php");
    } else {
        echo "<script>alert('Invalid login!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BCA Notes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><img src="images/sy.png" alt="logo"></div>
    </header>
<div class="login-box">
    <h2>Admin Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
</div>
</body>
</html>
