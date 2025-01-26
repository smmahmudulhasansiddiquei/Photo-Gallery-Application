<?php

    include "./db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery Application</title>
    <?php include "./css.php" ?>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Photo Gallery</h2>
        <div>
            <!-- Photo Details -->
            <?php 
                $result = $conn->query("SELECT * FROM photos ORDER BY created_at DESC");
                // var_dump($result);
                if($result->num_rows > 0):
                     while($row = $result->fetch_assoc()):
            ?>
            <div>
                <b>Title:</b><h4><?= $row['title']; ?></h4>
                <b>Description:</b><p><?= $row['description']; ?></p>
                <img src="<?= $row['image_path']; ?>" alt="image" width="250 px" height="300 px">
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
                <form action="edit.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <button type="submit">Edit</button>
                </form>
                <form action="index.php">
                        <button type="submit">Back to Upload</button>
                </form>
            </div>
            <?php
                    endwhile;
                else:
                    echo "No photos uploaded yet.";

                endif;
            ?>
        </div>
    </div>
</body>
</html>