<?php

    include "./db.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
    <?php include "./css.php" ?>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Photo Gallery</h1>
        <div>
            <!-- Photo Upload section start -->
            <h4>Upload Your Photo</h4>
            <div>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="title" placeholder="Enter Your Title" required>
                    <input type="text" name="description" placeholder="Write Description" required>
                    <input type="file" name="image" accept ="image/*" required>
                    <button type="submit">Upload</button>
                </form>
            </div>
            <!-- Photo Upload section end -->
            <hr>
        </div>
    </div>
</body>
</html>