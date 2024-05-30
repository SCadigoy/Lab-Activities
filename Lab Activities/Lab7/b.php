<!DOCTYPE html>
<html>
<head>
    <title>MySQL Database Content</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: rosybrown;
        }
    </style>
</head>
<body>

<h2>All Customer of the Company</h2>

<html>
<body>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT `customers`.`contactLastName`, `customers`.`contactFirstName` FROM `customers` ORDER BY `customers`.`contactLastName` DESC , `customers`.`contactFirstName` ASC;";

echo '<table> 
      <tr> 
          <th> contactLastName </th> 
          <th> contactFirstName </th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
            $contactLastName = $row["contactLastName"];
            $contactFirstName = $row["contactFirstName"];

        echo '<tr> 
                <td>'.$contactLastName.'</td> 
                <td>'.$contactFirstName.'</td> 
            </tr>';
    }
    $result->free();
    echo '</table>';
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
</body>
</html>

