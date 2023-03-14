<?php 
require("./db.php");

// 
$sql = "CREATE TABLE user(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(500) NOT NULL,
    ebno VARCHAR(500) NOT NULL,
    mobile VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table User created successfully<br>";
} else {
    echo "Error creating table: ";
}

$sql = "CREATE TABLE bill(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uid INT(6) NOT NULL,
    img VARCHAR(500) NOT NULL,
    rate VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Bill created successfully<br>";
} else {
    echo "Error creating table: ";
}

?>