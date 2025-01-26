<?php

    include "./db.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery</title>
    <?php include "./css.php" ?>
</head>
<body>
    <!-- <div class="container">
        <form>
            <fieldset>
                <label for="nameField">Name</label>
                <input type="text" id="nameField">
            
                <input class="button-primary" type="submit" value="Send">
            </fieldset>
        </form>
    </div> -->

    <div class="container my-4">
    <h1>Edit Photo Gallery</h1>
        <?php
        
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $id = $_POST['id'];
                $result = $conn->query("SELECT * FROM photos WHERE id = '$id'");
                
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                }

            }          
        
        ?>

        <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Photo Title</label>
                <input type="text" name="title" class="form-control" value="<?= $row['title']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Photo Description</label>
                <input type="text" name="description" class="form-control" value="<?= $row['description'] ?>" required>
            </div>

            <div>
                <img src="<?= $row['image_path']; ?>" alt="image" width="250 px" height="300 px">
                
                <label for="">Choose a new photo to update. <i>(Optional field)</i></label>
                <input type="file" name="image" accept="image/*">
            </div>
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <button type="submit" class="btn btn-primary">Update Gallery<a href="./gallery.php"></a></button>
            
        </form>

       
        <hr>       
        
    </div>
</body>
</html>