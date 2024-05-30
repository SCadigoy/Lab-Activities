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

<h2>Top 5 Customers with the Lowest Credit Limit</h2>

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

$query = "SELECT `customers`.`customerNumber`, `customers`.`customerName`, `customers`.`creditLimit`
FROM `customers`
ORDER BY `customers`.`creditLimit` ASC
LIMIT 5";
;

echo '<table> 
      <tr> 
          <th> customerNumber </th> 
          <th> customerName </th> 
          <th> creditLimit </th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $customerNumber = $row["customerNumber"];
        $customerName = $row["customerName"];
        $creditLimit = $row["creditLimit"];

        echo '<tr> 
                  <td>'.$customerNumber.'</td> 
                  <td>'.$customerName.'</td> 
                  <td>'.$creditLimit.'</td> 
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
