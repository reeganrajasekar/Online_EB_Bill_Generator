<?php
require("../layout/db.php");
$id = $_POST["id"];
$rate = $_POST["rate"];


$sql = "UPDATE bill SET rate='$rate' WHERE id='$id'";
$conn->query($sql);
header("Location: /admin/home.php?err=Bill Updated!");
die();
?>