<?php
require("./admin/layout/db.php");

$ebno = $_POST["ebno"];
$mobile = $_POST["mobile"];

$sql = "SELECT * FROM user where ebno='$ebno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["mobile"]==$mobile) {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            }
            $_SESSION["id"] = $row["id"];
            header("Location: /user/");
            die();
        } else {
            header("Location: /?err=EB No or Mobile No is Wrong !");
            die();
        }
    }
}else{
    header("Location: /?err=EB No or Mobile No is Wrong !");
    die();
}

?>