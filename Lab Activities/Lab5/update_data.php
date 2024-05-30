<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EmpireDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
}

$sql = "Update Employees SET age = 24 WHERE firstname = 'Sheena' AND lastname = 'Cadigoy'";

if ($conn->query($sql) === TRUE) {
    echo "Record Update Successfully";
}else {
    echo "Error Update Record: " . $conn->error;
}
$conn->close();
?>