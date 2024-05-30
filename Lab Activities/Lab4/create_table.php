<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EmpireDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE Employees (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Firstname VARCHAR(30) NOT NULL,
    Lastname VARCHAR(30) NOT NULL,
    Age INT(3),
    Reg_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

    if ($conn->query($sql)===TRUE){
        echo "The Employees Table was created successfully";
    }else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
    ?>