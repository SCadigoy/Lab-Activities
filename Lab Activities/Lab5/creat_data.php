<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EmpireDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
}

$sql = "INSERT INTO Employees (firstname, lastname, age, email, position)
VALUES ('Sheena', 'Cadigoy', 23, 'scadigoy@ssct.edu.ph', 'Data Analyst')";

if ($conn->query($sql) === TRUE){
    echo "New record created successfully";
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>