<?php

    include "./db.php";


    if($_SERVER['REQUEST_METHOD'] === "POST"){
        // var_dump($_POST);
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        

        $result = $conn->query("SELECT image_path FROM photos WHERE id = $id");

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            unlink($row['image_path']);
        }
        
        //update gallery
        if($image['tmp_name'] !== ""){
            $uploadDir = "uploads/";
            $filePath = $uploadDir . basename($image['name']);

            // echo $filePath;

            //upload the file
            if(move_uploaded_file($image['tmp_name'], $filePath)){
                //insert the file path in DB
                $result = $conn->query("UPDATE photos SET title = '$title', description = '$description', image_path = '$filePath' WHERE id = '$id'");
                echo "Update";
                exit;
            }
        }else{
            echo "Update error";
        }
    }

?>
