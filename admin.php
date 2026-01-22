<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BCA Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;            
        }
        .topbar {
            width:100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .topbar h1 { font-size: 24px; text-align:center; }
        .top-buttons{
            display:flex;
        }
        .top-buttons a {
            color: white;
            text-decoration: none;
            background: rgba(255,255,255,0.2);
            padding: 10px 18px;
            border-radius: 50px;
            margin-left: 10px;
            font-weight: 500;
            transition: 0.3s;
        }
        .top-buttons a:hover { background: rgba(255,255,255,0.3); transform: translateY(-2px); }
        .top-buttons a.logout { background: #e74c3c; }
        .top-buttons a.logout:hover { background: #c0392b; }

        @media(max-width:750px){
            .topbar {   
                display: inline-block;
            }
        }
     
    </style>
</head>
<body>

<div class="topbar">
    <h1>Admin Dashboard</h1>
    <div class="top-buttons">
        <a href="index.php">Home</a>
        <a href="backend/upload.php">Upload PDF</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>
</body>
</html>