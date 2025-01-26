<?php 

    include "./db.php";

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $id = $_POST['id'];

        $result = $conn->query("SELECT image_path FROM photos WHERE id = $id");

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            unlink($row['image_path']);
        }

        //delete from Database
        $conn->query("DELETE FROM photos WHERE id = $id");
        header("location: gallery.php");

        exit;
    }

?>