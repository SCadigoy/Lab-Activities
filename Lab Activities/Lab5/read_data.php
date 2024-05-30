<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EmpireDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, age, email, position FROM Employees";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "id: " . $row["id"] . "Name: " . $row["firstname"] . " " . $row["lastname"] . " -Age: " . $row["age"] . " -Email: " . $row["email"] . " -Course: " . $row["position"] . "<br>";
    }
}else {
    echo "0 results";
}
$conn->close();
?>