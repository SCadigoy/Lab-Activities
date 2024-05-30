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

<h2>All Customer Located in California, USA</h2>

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

$query = "SELECT `offices`.`officeCode`, `offices`.`city`, `offices`.`phone`
FROM `offices`
WHERE `offices`.`city` NOT IN ('France', 'USA')
ORDER BY `offices`.`officeCode`DESC";

echo '<table> 
      <tr> 
          <th> officeCode </th> 
          <th> city </th> 
          <th> phone </th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $officeCode = $row["officeCode"];
        $city = $row["city"];
        $phone = $row["phone"];

        echo '<tr> 
                  <td>'.$officeCode.'</td> 
                  <td>'.$city.'</td> 
                  <td>'.$phone.'</td> 
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
