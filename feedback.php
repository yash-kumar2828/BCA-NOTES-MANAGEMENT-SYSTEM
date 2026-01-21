
<?php

$success=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'backend/conn.php'; 
    session_start(); 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

 
    $sql = "INSERT INTO feedback (name, email, feedback) 
            VALUES ('$name', '$email', '$feedback')";

    if (mysqli_query($conn, $sql)) {
        $success=true;
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Feedback</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
<h2>User Feedback Form</h2>
<?php if (!empty($message)) { echo "<p>$message</p>"; } ?>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Feedback:</label><br>
    <textarea name="feedback" rows="4" required></textarea><br><br>
    <button type="submit">Submit Feedback</button>
</form><br>
<a href="index.php" class="homePage" style="text-decoration: none; background-color: #007bff;  padding: 8px; border-radius: 5px; color: white;" >Go-to Home Page</a>
</div>
<?php if ($success) { ?>
<script>
    alert("✅ Feedback successfully submitted!");
</script>
<?php } ?>
</body>
</html>