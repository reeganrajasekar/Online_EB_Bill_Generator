<?php
require("../admin/layout/db.php");
$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$sid = $_SESSION["id"];
$file = basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $sql = "INSERT INTO bill (uid,img,rate)
    VALUES ('$sid','$file','Waiting List')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /user?page=1&msg=Image uploaded Successfully !");
        die();
    } else {
        header("Location: /user?page=1&err=Something went Wrong!");
        die();
    }
} else {
    header("Location: /user?page=1&err=Something went Wrong!");
    die();
}




?>