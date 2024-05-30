<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EmpireDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "ALTER TABLE Employees
    ADD Email VARCHAR(50),
    ADD Position VARCHAR(50)";

if ($conn->query($sql)===TRUE){
    echo "Columns were added successfully";
} else {
    echo " Error adding columns: " . $conn->error;
}

$conn->close();
?>
