<?php
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($_POST['name']);
$mobile = test_input($_POST['mobile']);
$ebno = test_input($_POST['ebno']);

$sql = "INSERT INTO user (name , mobile,ebno)
VALUES ('$name' ,'$mobile' ,'$ebno')";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/users.php?page=1&msg=User Details Added Successfully !");
    die();
} else {
    header("Location: /admin/users.php?page=1&err=Something went Wrong!");
    die();
}


?>