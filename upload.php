<?php

    include "./db.php";

    if($_SERVER['REQUEST_METHOD'] === "POST"){
         // var_dump($_POST);

        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_FILES['image'];

        // echo "<pre>";
        // print_r($_FILES['image']);
        // echo "<pre>";

        //Check if image uploaded
        if(isset($image) && $image['tmp_name'] !== ""){
            $uploadDir = "uploads/";
            $filePath = $uploadDir . basename($image['name']);

            // echo $filePath;

            //upload the file
            if(move_uploaded_file($image['tmp_name'], $filePath)){
                //insert the file path in DB
                $conn->query("INSERT INTO photos (title, description, image_path) VALUES ('$title', '$description', '$filePath')");

                echo "File uploaded successfully!!!";
                header("location: gallery.php");
                exit;
            }
        }else{
            echo "File Uploaded Failed";
        }
       
    }

?>