<?php
include('conn.php');
if (isset($_POST['submit'])) {
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == 0) {
        $file_name = basename($_FILES['pdf']['name']);
        $tempname = $_FILES['pdf']['tmp_name'];
        $folder = '../pdf/' . $file_name;

        $file_type = mime_content_type($tempname);
        if ($file_type !== 'application/pdf') {
            echo "Only PDF files are allowed.";
            exit;
        }

        if (move_uploaded_file($tempname, $folder)) {
            $query = mysqli_query($conn, "INSERT INTO pdf (pdf) VALUES ('$file_name')");

            if ($query) {
                echo "Upload and save successful.";
            } else {
                echo "Database insert error.";
            }
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>PDF Upload</title>
</head>
<body>
    <div class="login-box">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="pdf" required>
        <br><br>
        <button type="submit" name="submit">Submit</button> 
    </form>
    </div>

    <div>
        <h2>Uploaded PDFs:</h2>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM pdf");
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<a href="pdf/' . htmlspecialchars($row['pdf']) . '" target="_blank">' . htmlspecialchars($row['pdf']) . '</a><br>';
        }
        ?>
    </div>
</body>
</html>
