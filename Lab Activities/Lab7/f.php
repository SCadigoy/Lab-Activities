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

<h2>All Products Whose buyPrice are not Between $20 and $100</h2>

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

$query = "SELECT `products`.`productCode`, `products`.`productName`, `products`.`buyPrice`
FROM `products`
WHERE `products`.`buyPrice` NOT BETWEEN 20 AND 100";

echo '<table> 
      <tr> 
          <th> productCode </th> 
          <th> productName </th> 
          <th> buyPrice </th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $productCode = $row["productCode"];
        $productName = $row["productName"];
        $buyPrice = $row["buyPrice"];

        echo '<tr> 
                  <td>'.$productCode.'</td> 
                  <td>'.$productName.'</td> 
                  <td>'.$buyPrice.'</td> 
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
